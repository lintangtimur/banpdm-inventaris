@extends('layout.app')
@section('content-header')
    Add New Item
@endsection
@section('content')
    <div class="col-12">
        <form class="card" method="post" action="{{ route('item.store') }}">
            @csrf
            <div class="card-header">
            <h3 class="card-title">Horizontal form</h3>
            </div>
            <div class="card-body">
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Item Code</label>
                <div class="col">
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror">
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                <small class="form-hint">Kode barang harus unik, tidak boleh sama dengan yang lain</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Name</label>
                <div class="col">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Category</label>
                <div class="col">
                <select class="form-select select2 @error('category') is-invalid @enderror" name="category">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Unit</label>
                <div class="col">
                <select class="form-select select2 @error('unit') is-invalid @enderror" name="unit">
                    @foreach ($units as $item)
                        <option value="{{ $item->id }}" {{ old('unit') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('unit')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Min Stock</label>
                <div class="col">
                <input type="text" name="min_stock" class="form-control @error('min_stock') is-invalid @enderror" value="0">
                @error('min_stock')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label">Location</label>
                <div class="col">
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush