@extends('layouts.app')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Role</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning mr-2"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                        <a href="{{ route('roles.showAssignPermissionForm', $role->id) }}"style="margin-left:5px;" class="btn btn-success mr-2">Asignar Permisos</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection