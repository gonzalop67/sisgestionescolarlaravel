<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Ppff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ppffs = Ppff::all();
        $roles = Role::all();
        return view('admin.estudiantes.create', compact('ppffs', 'roles'));
    }

    public function get_ppff(Request $request)
    {
        // Validar si la petición es AJAX
        if ($request->ajax()) {
            $ppff_id = $request->id;
            $ppff = Ppff::findOrFail($ppff_id);
            return response()->json(['data' => $ppff]);
        }

        return response()->json(['error' => 'Petición inválida'], 400);
    } // End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'ppff_id' => 'required',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:estudiantes',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required',
            'email' => 'required|email|unique:users',
            'direccion' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $usuario = new User();
        $usuario->name = $request->apellidos . " " . $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $estudiante = new Estudiante();
        $estudiante->usuario_id = $usuario->id;
        $estudiante->ppff_id = $request->ppff_id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->direccion = $request->direccion;
        $estudiante->telefono = $request->telefono;
        $estudiante->genero = $request->genero;
        $estudiante->estado = "activo";

        $estudiante->foto = $request->file('foto')->store('uploads/fotos/estudiantes', 'public');

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'El estudiante se ha creado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::with('usuario', 'ppff')->find($id);
        return view('admin.estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppffs = Ppff::all();
        $roles = Role::all();
        $estudiante = Estudiante::with('usuario', 'ppff')->find($id);
        return view('admin.estudiantes.edit', compact('estudiante', 'ppffs', 'roles'));
        // return response()->json($estudiante);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $estudiante = Estudiante::findOrFail($id);
        $usuario = User::findOrFail($estudiante->usuario->id);

        $request->validate([
            'ppff_id' => 'required',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:estudiantes,ci,' . $id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'direccion' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $usuario->name = $request->apellidos . " " . $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);

        $estudiante->ppff_id = $request->ppff_id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->direccion = $request->direccion;
        $estudiante->telefono = $request->telefono;
        $estudiante->genero = $request->genero;

        if ($request->hasFile('foto')) {
            //Eliminar foto anterior
            if ($estudiante->foto && Storage::disk('public')->exists($estudiante->foto)) {
                Storage::disk('public')->delete($estudiante->foto);
            }
            $estudiante->foto = $request->file('foto')->store('uploads/fotos/estudiantes', 'public');
        }

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'El estudiante se ha actualizado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $usuario = User::findOrFail($estudiante->usuario_id);

        //Eliminar la foto anterior
        if ($estudiante->foto && Storage::disk('public')->exists($estudiante->foto)) {
            Storage::disk('public')->delete($estudiante->foto);
        }

        $usuario->delete();
        $estudiante->delete();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'El estudiante se ha eliminado exitosamente')
            ->with('icono', 'success');
    }
}
