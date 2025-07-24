@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Role List</h2>
        @can("create role")
            <a href="{{ route('roles.create') }}" class="btn btn-primary">+ Add New Role</a>
        @endcan
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if ($role->permissions->isEmpty())
                                    <span class="badge bg-secondary">No permissions</span>
                                @else
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-green text-green-fg">{{ $permission->name }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @can("edit role")
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-1"> Edit </a>
                                @endcan
                                <!-- Optional delete button -->
                                <!--
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this role?')">
                                        Delete
                                    </button>
                                </form>
                                -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
