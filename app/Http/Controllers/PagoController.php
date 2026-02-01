<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        $estudiantes = Estudiante::all();

        return view('admin.pagos.index', compact('pagos', 'estudiantes'));
    }

    public function ver_pagos($id)
    {
        $estudiante = Estudiante::find($id);
        $matriculas = Matriculacion::with('pagos')->where('estudiante_id', $id)->get();

        // return response()->json($matriculas);

        return view('admin.pagos.ver_pagos', compact('estudiante', 'matriculas'));
    }

    public function comprobante($id)
    {
        $configuracion = Configuracion::first();

        $pago = Pago::find($id);
        $matricula = Matriculacion::with('estudiante.ppff', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($pago->matriculacion_id);

        $pdf = Pdf::loadView('admin.pagos.comprobante', compact('configuracion', 'pago', 'matricula'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled' => true]);
        return $pdf->stream('pago.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'matriculacion_id' => 'required',
            'monto' => 'required',
            'metodo_pago' => 'required',
            'descripcion' => 'required',
            'fecha_pago' => 'required',
        ]);

        $pago = new Pago();
        $pago->matriculacion_id = $request->matriculacion_id;
        $pago->monto = $request->monto;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->descripcion = $request->descripcion;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->save();

        return redirect()->back()
            ->with('mensaje', 'El pago se registró correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);
        $pago->delete();

        return redirect()->back()
            ->with('mensaje', 'El pago se ha eliminado correctamente.')
            ->with('icono', 'success');
    }
}
