@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Asignar Roles a {{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.storeAssignedRoles', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Assign Roles</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection