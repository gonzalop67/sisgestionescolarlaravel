<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Matriculacion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Personal;
use App\Models\Turno;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculaciones = Matriculacion::with('estudiante', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->get();
        return view('admin.matriculaciones.index', compact('matriculaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        $paralelos = Paralelo::all();
        $estudiantes = Estudiante::orderBy('apellidos', 'asc')
            ->orderBy('nombres', 'asc')
            ->get();
        return view('admin.matriculaciones.create', compact('estudiantes', 'turnos', 'gestiones', 'niveles', 'grados', 'paralelos'));
    }

    public function buscar_estudiante($id)
    {
        $estudiante = Estudiante::with('usuario', 'matriculaciones.turno', 'matriculaciones.gestion', 'matriculaciones.nivel', 'matriculaciones.grado', 'matriculaciones.paralelo')->find($id);

        if (!$estudiante) {
            return response()->json('error', 'Estudiante no encontrado');
        }

        if ($estudiante->foto && Storage::disk('public')->exists($estudiante->foto)) {
            $estudiante->foto_url = url('storage/' . $estudiante->foto);
        } else {
            $estudiante->foto_url = url('storage/uploads/fotos/estudiantes/No_image_available.svg.png');
        }

        return response()->json($estudiante);
    }

    public function buscar_grados($id)
    {
        $grados = Grado::where('nivel_id', $id)->pluck('nombre', 'id');

        if (!$grados) {
            return response()->json('error', 'Grados no encontrados');
        }

        return response()->json($grados);
    }

    public function buscar_paralelos($id)
    {
        $paralelos = Paralelo::where('grado_id', $id)->pluck('nombre', 'id');

        if (!$paralelos) {
            return response()->json('error', 'Paralelos no encontrados');
        }

        return response()->json($paralelos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'estudiante_id' => 'required',
            'turno_id' => 'required',
            'gestion_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'paralelo_id' => 'required',
            'fecha_matriculacion' => 'required',
        ]);

        //validación para estudiantes ya matriculados
        $estudiante_duplicado = Matriculacion::where('estudiante_id', $request->estudiante_id)
            ->where('turno_id', $request->turno_id)
            ->where('gestion_id', $request->gestion_id)
            ->where('nivel_id', $request->nivel_id)
            ->where('grado_id', $request->grado_id)
            ->where('paralelo_id', $request->paralelo_id)
            ->exists();

        if ($estudiante_duplicado) {
            return redirect()->back()->with([
                'mensaje' => 'El estudiante ya está matriculado',
                'icono' => 'error'
            ]);
        }

        $matriculacion = new Matriculacion();
        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->turno_id = $request->turno_id;
        $matriculacion->gestion_id = $request->gestion_id;
        $matriculacion->nivel_id = $request->nivel_id;
        $matriculacion->grado_id = $request->grado_id;
        $matriculacion->paralelo_id = $request->paralelo_id;
        $matriculacion->fecha_matriculacion = $request->fecha_matriculacion;

        $matriculacion->save();

        return redirect()->route('admin.matriculaciones.index')
            ->with('mensaje', 'La matriculación se ha creado correctamente.')
            ->with('icono', 'success');
    }

    public function pdf_matricula($id)
    {
        $configuracion = Configuracion::first();
        $user = User::role('DIRECTOR/A GENERAL')->first();
        $director = Personal::where('usuario_id', $user->id)->first();

        // return response()->json($director->profesion);

        $matricula = Matriculacion::with('estudiante.ppff', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);

        $pdf = Pdf::loadView('admin.matriculaciones.pdf', compact('configuracion', 'matricula', 'director'));
        $pdf->setPaper('letter', 'portrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled' => true]);
        return $pdf->stream('matriculas.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matricula = Matriculacion::with('estudiante.ppff', 'estudiante.matriculaciones', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);

        return view('admin.matriculaciones.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matricula = Matriculacion::with('estudiante.ppff', 'estudiante.matriculaciones', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);

        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::where('nivel_id', $matricula->nivel_id)->get();
        $paralelos = Paralelo::where('grado_id', $matricula->grado_id)->get();
        $estudiantes = Estudiante::orderBy('apellidos', 'asc')
            ->orderBy('nombres', 'asc')
            ->get();

        // return response()->json($matricula);

        return view('admin.matriculaciones.edit', compact('matricula', 'turnos', 'gestiones', 'niveles', 'grados', 'paralelos', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());

        $matriculacion = Matriculacion::find($id);

        $request->validate([
            'estudiante_id' => 'required',
            'turno_id' => 'required',
            'gestion_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'paralelo_id' => 'required',
            'fecha_matriculacion' => 'required',
        ]);

        //validación para estudiantes ya matriculados
        $estudiante_duplicado = Matriculacion::where('estudiante_id', $request->estudiante_id)
            ->where('turno_id', $request->turno_id)
            ->where('gestion_id', $request->gestion_id)
            ->where('nivel_id', $request->nivel_id)
            ->where('grado_id', $request->grado_id)
            ->where('paralelo_id', $request->paralelo_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($estudiante_duplicado) {
            return redirect()->back()->with([
                'mensaje' => 'El estudiante ya está matriculado',
                'icono' => 'error'
            ]);
        }

        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->turno_id = $request->turno_id;
        $matriculacion->gestion_id = $request->gestion_id;
        $matriculacion->nivel_id = $request->nivel_id;
        $matriculacion->grado_id = $request->grado_id;
        $matriculacion->paralelo_id = $request->paralelo_id;
        $matriculacion->fecha_matriculacion = $request->fecha_matriculacion;

        $matriculacion->save();

        return redirect()->route('admin.matriculaciones.index')
            ->with('mensaje', 'La matriculación se ha actualizado correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matricula = Matriculacion::find($id);
        $matricula->delete();

        return redirect()->route('admin.matriculaciones.index')
            ->with('mensaje', 'La matriculación se ha eliminado correctamente.')
            ->with('icono', 'success');
    }
}
