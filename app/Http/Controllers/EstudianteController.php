<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Ppff;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.nuevos.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ppffs = Ppff::all();
        return view('admin.estudiantes.nuevos.create', compact('ppffs'));
    }

    public function get_ppff(Request $request)
    {
        $ppff_id = $request->id;
        $ppff = Ppff::findOrFail($ppff_id);
        return response()->json(['data' => $ppff]);
    } // End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
