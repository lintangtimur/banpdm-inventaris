@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Role: {{ $role->name }}</h2>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">← Back to Roles</a>
    </div>

    <form class="card" action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('patch')

        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label required">Role Name</label>
                <input type="text" name="name" id="name" class="form-control @error("name") is-invalid @enderror" value="{{ old('name', $role->name) }}" required>
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Assign Permissions</label>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Permission</th>
                                    <th>Assigned</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @error('permissions') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            </div>
        </div>
        

        
    </form>
</div>
@endsection
