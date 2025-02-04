<?php
// filepath: /c:/Laravel 11/movisat/app/Http/Controllers/PermisoController.php
namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;
use App\Models\Role;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::all();
        return view('permiso.index', compact('permisos'));
    }

    public function create()
    {
        return view('permiso.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permisos',
        ]);

        Permiso::create($request->all());

        return redirect()->route('permiso.index')->with('success', 'Permiso creado exitosamente.');
    }

    public function edit($id)
    {
        $permiso = Permiso::find($id);

        return view('permiso.create', compact('permiso'));
    }
    
    public function update(Request $request, $id)
    {
        $Permiso = Permiso::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:permisos,name,' . $Permiso->id,
        ]);

        $Permiso->update($request->all());

        return redirect()->route('permiso.index')->with('success', 'Permiso actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $Permiso = Permiso::find($id);
        $Permiso->delete();
        return redirect()->route('permiso.index')->with('success', 'Permiso eliminado exitosamente.');
    }
    
    public function assign($id)
    {
        $permiso = Permiso::find($id);
        $roles = Role::all();
        return view('permiso.assign', compact('permiso', 'roles'));
    }
}