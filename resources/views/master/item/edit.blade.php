@extends('layout.app')
@section('content-header')
    Edit Item
@endsection
@section('content')
    <div class="col-12">
        <form class="card" method="post" action="{{ route('item.update', $id) }}" enctype="multipart/form-data" action="{{ route('item.store') }}">
            @csrf
            @method('PATCH')
            <div class="card-header">
            <h3 class="card-title">Horizontal form</h3>
            </div>
            <div class="card-body">
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Item Code</label>
                <div class="col">
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code',$item->code) }}">
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                <small class="form-hint">Kode barang harus unik, tidak boleh sama dengan yang lain</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Name</label>
                <div class="col">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$item->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Category</label>
                <div class="col">
                <select class="form-select select2 @error('category') is-invalid @enderror" name="category">
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
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
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" {{ $unit->id == $item->unit_id ? 'selected' : '' }}>
                            {{ $unit->name }}
                        </option>
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
                <input type="text" name="min_stock" class="form-control @error('min_stock') is-invalid @enderror" value="{{ old('min_stock',$item->min_stock) }}">
                @error('min_stock')
                    <div class="invalid-feedback">{{ $message }}</div>    
                @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label">Location</label>
                <div class="col">
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location',$item->location) }}">
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