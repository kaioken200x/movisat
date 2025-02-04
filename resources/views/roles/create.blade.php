@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ isset($role) ? 'Edit Role' : 'Create New Role' }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" method="POST">
                        @csrf
                        @if(isset($role))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($role) ? $role->name : '' }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{ isset($role) ? 'Update Role' : 'Create Role' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection