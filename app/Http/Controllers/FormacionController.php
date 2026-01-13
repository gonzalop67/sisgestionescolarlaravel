<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use App\Models\Personal;
use Faker\Provider\Person;
use Illuminate\Http\Request;

class FormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $personal = Personal::find($id);
        $formaciones = Formacion::where('personal_id', $id)->get();
        return view('admin.formaciones.index', compact('formaciones', 'personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('admin.formaciones.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'personal_id' => 'required',
            'titulo' => 'required',
            'institucion' => 'required',
            'nivel' => 'required',
            'fecha_graduacion' => 'required',
            'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $formacion = new Formacion();
        $formacion->personal_id = $request->personal_id;
        $formacion->titulo = $request->titulo;
        $formacion->institucion = $request->institucion;
        $formacion->nivel = $request->nivel;
        $formacion->fecha_graduacion = $request->fecha_graduacion;

        $formacion->archivo = $request->file('archivo')->store('uploads/formaciones', 'public');

        $formacion->save();

        return redirect()->route('admin.formaciones.index', $request->personal_id)
            ->with('mensaje', 'La formación se ha creado correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formacion $formacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formacion $formacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formacion $formacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formacion $formacion)
    {
        //
    }
}
