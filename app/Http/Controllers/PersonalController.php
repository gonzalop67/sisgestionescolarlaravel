<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tipo)
    {
        $personals = Personal::where('tipo', $tipo)->get();
        return view('admin.personal.index', compact('personals', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tipo)
    {
        $roles = Role::all();
        return view('admin.personal.create', compact('tipo', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:personals',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
            'email' => 'required|email|unique:users',
            'direccion' => 'required',
            'tipo' => 'required'
        ]);

        $usuario = new User();
        $usuario->name = $request->apellidos . " " . $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $personal = new Personal();
        $personal->usuario_id = $usuario->id;
        $personal->tipo = $request->tipo;
        $personal->nombres = $request->nombres;
        $personal->apellidos = $request->apellidos;
        $personal->apellidos = $request->apellidos;
        $personal->ci = $request->ci;
        $personal->fecha_nacimiento = $request->fecha_nacimiento;
        $personal->direccion = $request->direccion;
        $personal->telefono = $request->telefono;
        $personal->profesion = $request->profesion;

        $personal->foto = $request->file('foto')->store('uploads/fotos', 'public');

        $personal->save();

        return redirect()->route('admin.personal.index', $request->tipo)
            ->with('mensaje', 'El personal ' . $request->tipo . ' se ha creado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personal = Personal::findOrFail($id);
        return view('admin.personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        $roles = Role::all();
        return view('admin.personal.edit', compact('personal', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $personal = Personal::findOrFail($id);
        $usuario = User::findOrFail($personal->usuario->id);

        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:personals,ci,' . $id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'direccion' => 'required'
        ]);


        $usuario->name = $request->apellidos . " " . $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);


        $personal->nombres = $request->nombres;
        $personal->apellidos = $request->apellidos;
        $personal->apellidos = $request->apellidos;
        $personal->ci = $request->ci;
        $personal->fecha_nacimiento = $request->fecha_nacimiento;
        $personal->direccion = $request->direccion;
        $personal->telefono = $request->telefono;
        $personal->profesion = $request->profesion;

        //return $personal->foto;

        if ($request->hasFile('foto')) {
            //Eliminar foto anterior
            if ($personal->foto && Storage::disk('public')->exists($personal->foto)) {
                Storage::disk('public')->delete($personal->foto);
            }
            $personal->foto = $request->file('foto')->store('uploads/fotos', 'public');
        }

        $personal->save();

        return redirect()->route('admin.personal.index', $personal->tipo)
            ->with('mensaje', 'El personal ' . $personal->tipo . ' se ha actualizado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $usuario = User::findOrFail($personal->usuario_id);

        //Eliminar la foto anterior
        if ($personal->foto && Storage::disk('public')->exists($personal->foto)) {
            Storage::disk('public')->delete($personal->foto);
        }

        $usuario->delete();
        $personal->delete();

        return redirect()->route('admin.personal.index', $personal->tipo)
            ->with('mensaje', 'El personal ' . $personal->tipo . ' se ha eliminado exitosamente')
            ->with('icono', 'success');
    }
}
