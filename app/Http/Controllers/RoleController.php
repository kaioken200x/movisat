<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permiso;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol creado con éxito');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.create', compact('role'));
    }

    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito');
    }

    public function showAssignPermissionForm(Role $role)
    {
        $permisos = Permiso::all();
        return view('roles.assign_permissions', compact('role', 'permisos'));
    }

    /**
     * Asigna permisos a un rol
     * Request $request
     * Role $role
     */

     public function assignPermisos(Request $request, Role $role)
     {
         $request->validate([
             'permisos' => 'required|array',
             'permisos.*' => 'exists:permisos,id',
         ]);
 
         $role->permisos()->sync($request->permisos);
 
         return redirect()->route('roles.index')->with('success', 'Permisos asignados correctamente.');
     }
}