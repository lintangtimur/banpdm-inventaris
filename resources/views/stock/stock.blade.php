@extends('layout.app')
@section('content-header')
    Stock
@endsection
@section('content')
    {{-- <div class="mb-2">
        <a href="{{ route('stock.create') }}" class="btn btn-blue btn-animate-icon btn-animate-icon-rotate">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Add New Transaction</a>
    </div> --}}
    
    <x-alert :message="session('success')" />
    
    <div class="card">
        <div class="card-body p-0">
            <div id="table-default" data-list class="table-responsive">
                <div class="mb-3">
                    <input type="text" class="search form-control" placeholder="Cari ...">
                </div>
                @can("export stock pdf")
<a class="btn btn-youtube" href="{{ route('stock.stockpdf') }}">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
            PDF</a>
            @endcan
                <table class="table">
                    <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                            <th><button class="table-sort" data-sort="sort-qty">Qty</button></th>
                            {{-- <th><button class="table-sort" data-sort="sort-created_at">Created At</button></th> --}}
                            {{-- <th><button class="table-sort" data-sort="sort-updated_at">Updated At</button></th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach ($stocks as $item)
                            <tr>
                                <td class="sort-name">{{ $item->name }}</td>
                                <td class="sort-qty">{{ $item->qty }}</td>
                                {{-- <td class="sort-updated_at">{{ $item->updated_at->format('d F Y H:i') }}</td> --}}
                                <td>
                                    {{-- <div class="btn-list flex-nowrap">
                                        <a href="{{ route('stock.edit', $item->id) }}" class="btn btn-1"> Edit </a>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"> Action </a>
                                                <a class="dropdown-item" href="#"> Another action </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
@push("scripts")
<script src="{{ asset("libs/list.js/dist/list.min.js") }}" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new List("table-default", {
            sortClass: "table-sort",
            listClass: "table-tbody",
            valueNames: [
                "sort-name",
                "sort-qty",
                
            ]
        });
    });
</script>
@endpush