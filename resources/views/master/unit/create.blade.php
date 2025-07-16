@extends('layout.app')
@section('content-header')
    Create Unit
@endsection
@section('content')
    <div class="col-12">
        <form class="card" method="post" action="{{ route('unit.store') }}">
            @csrf
            <div class="card-header">
            <h3 class="card-title">Unit form</h3>
            </div>
            <div class="card-body">
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Name</label>
                <div class="col">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
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