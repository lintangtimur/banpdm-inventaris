@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah User Baru</h2>

    <form method="POST" class="card" action="{{ route('users.store') }}">
        @csrf

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label required">Nama</label>
                <input type="text" name="name" class="form-control @error("name") is-invalid @enderror" value="{{ old('name') }}" required>
                 @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label required">Email</label>
                <input type="email" name="email" class="form-control @error("email") is-invalid @enderror" value="{{ old('email') }}" required>
                 @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label required">Password</label>
                <input type="password" name="password" class="form-control @error("password") is-invalid @enderror" required>
                 @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label required">Role</label>
                <select name="role_id" class="form-select @error("role_id") is-invalid @enderror" required>
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                 @error('role_id')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
            </div>

             <div class="text-end">
                <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

       
    
    </form>
</div>
@endsection
