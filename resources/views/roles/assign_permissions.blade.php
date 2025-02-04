@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Asignar Permisos a {{ $role->name }}</h3>
                </div>
                <div class="card-body">
                    @if($role && $permisos)
                        <form action="{{ route('roles.assignPermisos', $role->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="permisos">Permisos</label>
                                <select name="permisos[]" id="permisos" class="form-control select2" multiple>
                                    @foreach($permisos as $permiso)
                                        <option value="{{ $permiso->id }}" {{ $role->permisos->contains($permiso->id) ? 'selected' : '' }}>{{ $permiso->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Asignar Permisos</button>
                        </form>
                    @else
                        <p>No se pudieron cargar los datos del rol o los permisos.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection