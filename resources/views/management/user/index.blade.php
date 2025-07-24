@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>User Management</h2>
        @can("create user")
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
        @endcan
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-blue text-blue-fg">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-end">
                                @can("edit user")
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-1"> Edit </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">Belum ada user.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
