<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Asistencia;
use App\Models\DetalleAsistencia;
use App\Models\Matriculacion;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Auth::user()->roles->pluck('name')->implode(', ');
        $id_usuario = Auth::user()->id;

        if ($rol == 'ADMINISTRADOR' || $rol == 'DIRECTOR/A GENERAL' || $rol == 'DIRECTOR/A ACADÉMICO' || $rol == 'SECRETARIO/A' || $rol == 'REGENTE') {
            return view('admin.asistencias.index');
        }

        if ($rol == 'DOCENTE') {
            $docente = Personal::where('usuario_id', $id_usuario)->first();
            $asignaciones = Asignacion::where('personal_id', $docente->id)->get();
            // return response()->json($docente);
            return view('admin.asistencias.index_docente', compact('docente', 'asignaciones'));
        }

        if ($rol == 'ESTUDIANTE') {
            return view('admin.asistencias.index_estudiante');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $asignacion = Asignacion::find($id);
        $docente = Personal::where('usuario_id', Auth::user()->id)->first();
        $asistencias = Asistencia::with('detalleAsistencias')->where('asignacion_id', $id)->get();

        $matriculados = Matriculacion::with('estudiante')
            ->where('turno_id', $asignacion->turno_id)
            ->where('gestion_id', $asignacion->gestion_id)
            ->where('nivel_id', $asignacion->nivel_id)
            ->where('grado_id', $asignacion->grado_id)
            ->where('paralelo_id', $asignacion->paralelo_id)
            ->get()
            ->sortBy('estudiante.apellidos');

        return view('admin.asistencias.create', compact('asignacion', 'docente', 'asistencias', 'matriculados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'asignacion_id' => 'required',
            'fecha' => 'required|date',
            'observacion' => 'nullable|string|max:255',
            'estado_asistencia' => 'required'
        ]);

        $asistencia = new Asistencia();
        $asistencia->asignacion_id = $request->asignacion_id;
        $asistencia->fecha = $request->fecha;
        $asistencia->observacion = $request->observacion;
        $asistencia->save();

        $estado_asistencia = $request->estado_asistencia;

        foreach ($estado_asistencia as $estudiante_id => $estado) {
            DetalleAsistencia::create([
                'asistencia_id' => $asistencia->id,
                'estudiante_id' => $estudiante_id,
                'estado_asistencia' => $estado,
            ]);
        }

        return redirect()->back()
            ->with('mensaje', 'Se registró la asistencia correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'asignacion_id' => 'required',
            'fecha' => 'required|date',
            'observacion' => 'nullable|string|max:255',
            'estado_asistencia' => 'required'
        ]);

        $asistencia = Asistencia::find($id);
        $asistencia->asignacion_id = $request->asignacion_id;
        $asistencia->fecha = $request->fecha;
        $asistencia->observacion = $request->observacion;
        $asistencia->save();

        $estado_asistencia = $request->estado_asistencia;

        foreach ($estado_asistencia as $estudiante_id => $estado) {
            DetalleAsistencia::where('asistencia_id', $asistencia->id)
                ->where('estudiante_id', $estudiante_id)
                ->update(['estado_asistencia' => $estado]);
        }

        return redirect()->back()
            ->with('mensaje', 'Se actualizó la asistencia correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id);
        $asistencia->detalleAsistencias()->delete();
        $asistencia->delete();

        return redirect()->back()
            ->with('mensaje', 'Se eliminó la asistencia correctamente.')
            ->with('icono', 'success');
    }
}
