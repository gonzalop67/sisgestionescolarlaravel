<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());

        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'El rol se ha creado correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $id,
        ]);

        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'El rol se ha actualizado correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $turno = Role::findOrFail($id);
        $turno->delete();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'El rol se ha eliminado correctamente.')
            ->with('icono', 'success');
    }
}
