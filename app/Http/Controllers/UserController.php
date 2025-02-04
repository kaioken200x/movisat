<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Muestra todos los usuarios
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un usuario
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Almacena un usuario
     * Request $request
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('info', 'Usuario creado correctamente');
    }

    /* Muestra un usuario
     * int $user
     */
    public function edit($user)
    {
        $user = User::find($user);
        return view('users.create', compact('user'));
    }

    /* Actualiza un usuario
     * Request $request
     * User $user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('info', 'Usuario actualizado correctamente');
    }

    /**
     * Elimina un usuario
     * User $user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('info', 'Usuario eliminado correctamente');
    }

    /**
     * Muestra el formulario para asignar roles a un usuario
     * Request $request
     * int $id_user
     */
    public function assignRole(Request $request,$id_user)
    {
        $user = User::find($id_user);
        $roles = Role::all();
        return view('users.assign_roles', compact('user', 'roles'));
    }

    /**
     * Asigna roles a un usuario
     * Request $request
     * int $id_user
     */
    public function storeAssignedRoles(Request $request, $id_user)
    {
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::find($id_user);

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('info', 'Roles asignados correctamente');
    }
    /**
     * Asigna roles a un usuario
     * Request $request
     * int $id_user
     */
    public function assignPermisos(Request $request, Role $role)
    {
        $role->permisos()->sync($request->permisos);
        return redirect()->route('roles.index')->with('info', 'Permisos asignados correctamente');
    }
}