<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $jsonData = file_get_contents('https://api.hilariweb.com/divisas');
        $divisas = json_decode($jsonData, true);
        $configuracion = Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }

    public function store(Request $request)
    {
        //return response()->json($request->file('logo'));

        //Buscar si existe la configuración
        $configuracion = Configuracion::first();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'divisa' => 'required',
            'correo_electronico' => 'required|email'
        ];

        if ($configuracion) {
            $rules['logo'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        //return $rules;

        $request->validate($rules);

        if (!$configuracion) {
            $configuracion = new Configuracion();
        }

        $configuracion->nombre = $request->nombre;
        $configuracion->descripcion = $request->descripcion;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->divisa = $request->divisa;
        $configuracion->web = $request->web;
        $configuracion->correo_electronico = $request->correo_electronico;

        if ($request->hasFile('logo')) {
            if ($configuracion->logo && Storage::disk('public')->exists($configuracion->logo)) {
                Storage::disk('public')->delete($configuracion->logo);
            }
            $configuracion->logo = $request->file('logo')->store('uploads/logos', 'public');
        }

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'Se guardó los cambios exitosamente')
            ->with('icono', 'success');
    }
}
