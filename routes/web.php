<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Middleware\CheckPermiso;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->prefix('movisat')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permiso', PermisoController::class);
    
    Route::get('users/{user}/assign_roles', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::post('users/{user}/assign_roles', [UserController::class, 'storeAssignedRoles'])->name('users.storeAssignedRoles');

    Route::get('roles/{role}/assign_permissions', [RoleController::class, 'showAssignPermissionForm'])->name('roles.showAssignPermissionForm');
    Route::post('roles/{role}/assign_permissions', [RoleController::class, 'assignPermisos'])->name('roles.assignPermisos');

});

require __DIR__.'/auth.php';
