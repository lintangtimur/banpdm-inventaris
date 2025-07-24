@extends('layout.app')
@section('content-header')
    Edit Item Transaction
@endsection
@section('content')
    <div class="col-12">
        
        @if ($errors->any())
            <x-alert type="danger" :message="$errors->first('error')" />
        @endif


        <form class="card" method="post" action="{{ route('stock.update', $trx->id) }}">
        @method("patch")
        @csrf
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Trx Form</h3>
            </div>
            <div class="card-body">
                <div class="space-y">
                <div class="row row-cols-2 g-4">
                    <div>
                    <label class="form-label"> Yang Ambil </label>
                    <input type="text" placeholder="Nama pengambil" name="source" value="{{ old('source', $trx->source) }}" class="form-control @error("source") is-invalid @enderror">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div>
                    <label class="form-label"> Jumlah </label>
                    <input type="text" placeholder="masukkan jumlah" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $trx->qty) }}">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>    
                    @enderror
                    </div>
                    <div>
                    <label class="form-label"> Item </label>
                    <div>
                        <select class="form-select select2 @error('item') is-invalid @enderror" name="item">
                            <option value="">-- Pilih --</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" {{ old('item', $trx->item_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error("item")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div>
                    <label class="form-label"> Tanggal transaksi </label>
                    <div>
                        <div class="input-icon">
                        <input class="form-control @error("date") is-invalid @enderror" placeholder="Select a date" id="datepicker-trx" value="{{ old('date', $trx->transaction_date->format('Y-m-d')) }}" name="date">
                        @error("date")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                            <path d="M16 3v4"></path>
                            <path d="M8 3v4"></path>
                            <path d="M4 11h16"></path>
                            <path d="M11 15h1"></path>
                            <path d="M12 15v3"></path></svg></span>
                        </div>
                    </div>
                    </div>
                </div>
                <div>
                    <label class="form-label"> Transaction Type </label>
                    <div>
                    <select class="form-select @error('inout') is-invalid @enderror" name="inout">
                        <option value="">-- Pilih --</option>
                        @foreach ($transactionsType as $key => $item)
                            <option value="{{ $key }}" {{ old('inout', $trx->transaction_type) == $key ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach

                    </select>
                    @error("inout")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
   
                <div class="text-end">
                    <a href="{{ route('stock.index') }}" class="btn btn-1"> Cancel </a>
                    <button type="submit" class="btn btn-primary btn-2">Submit</button>
                </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('libs/litepicker/dist/litepicker.js') }}" defer></script>
    <script>

        $(document).ready(function() {
            $('.select2').select2();
        });
        document.addEventListener("DOMContentLoaded", function () {
            window.Litepicker &&
            new Litepicker({
                element: document.getElementById("datepicker-trx"),
                maxDate: new Date(), // ⬅️ ini buat maksimal hari ini
                buttonText: {
                    previousMonth: `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="icon icon-1"><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="icon icon-1"><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            });
        });

    </script>
@endpush