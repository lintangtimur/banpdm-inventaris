@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <h2>Create New Role</h2>
        </div>
    </div>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter role name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Assign Permissions</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-6">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                            <span class="form-check-label">{{ $permission->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
