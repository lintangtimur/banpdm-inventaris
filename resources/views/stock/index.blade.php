@extends('layout.app')
@section('content-header')
    History Stock
@endsection
@section('content')
    <div class="mb-2">
        @can("create transaction")
        <a href="{{ route('stock.create') }}" class="btn btn-blue btn-animate-icon btn-animate-icon-rotate">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Add New Transaction</a>
        @endcan

            <label class="form-label mt-2">Laporan</label>
            <form action="{{ route('stock.index') }}" method="get">
                @csrf
            <fieldset class="form-fieldset">
                    <div class="mb-3">
                        <label class="form-label required">Start Date</label>
                        <input class="form-control datepicker start mb-2" name="start" placeholder="Select a date" value="{{ request('start') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">End Date</label>
                        <input class="form-control datepicker end mb-2" name="end" placeholder="Select a date" value="{{ request('end') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    @can("export transaction pdf")
                    <a class="btn btn-youtube" href="{{ route('stock.pdf', ['start' => request('start'), 'end' => request('end')]) }}">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
            PDF</a>
            @endcan
                </fieldset>
    </div>
    
    <x-alert :message="session('success')" />
    
    <div class="card">
        <div class="card-body p-0">
            <div id="table-default" data-list class="table-responsive">
                <div class="mb-3">
                    <input type="text" class="search form-control" placeholder="Cari ...">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                            <th><button class="table-sort" data-sort="sort-source">Source</button></th>
                            <th><button class="table-sort" data-sort="sort-type">Transaction Type</button></th>
                            <th><button class="table-sort" data-sort="sort-qty">Qty</button></th>
                            <th><button class="table-sort" data-sort="sort-trx_date">Transaction Date</button></th>
                            <th><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                            {{-- <th><button class="table-sort" data-sort="sort-updated_at">Updated At</button></th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach ($itemTransactions as $item)
                            <tr>
                                <td class="sort-name">{{ $item->item->name }}</td>
                                <td class="sort-source">{{ $item->source }}</td>
                                <td class="sort-type">
                                    @if ($item->transaction_type == 'in')
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="green"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 2l-.15 .005a2 2 0 0 0 -1.85 1.995v6.999l-2.586 .001a2 2 0 0 0 -1.414 3.414l6.586 6.586a2 2 0 0 0 2.828 0l6.586 -6.586a2 2 0 0 0 .434 -2.18l-.068 -.145a2 2 0 0 0 -1.78 -1.089l-2.586 -.001v-6.999a2 2 0 0 0 -2 -2h-4z" /></svg>
                                    @else
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="red"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.586 3l-6.586 6.586a2 2 0 0 0 -.434 2.18l.068 .145a2 2 0 0 0 1.78 1.089h2.586v7a2 2 0 0 0 2 2h4l.15 -.005a2 2 0 0 0 1.85 -1.995l-.001 -7h2.587a2 2 0 0 0 1.414 -3.414l-6.586 -6.586a2 2 0 0 0 -2.828 0z" /></svg>
                                    @endif
                                </td>
                                <td class="sort-qty">{{ $item->qty }}</td>
                                <td class="sort-trx_date">{{ $item->transaction_date->format('d F Y') }}</td>
                                <td class="sort-created_at">{{ $item->created_at->format('d F Y H:i') }}</td>
                                {{-- <td class="sort-updated_at">{{ $item->updated_at->format('d F Y H:i') }}</td> --}}
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        @can("edit transaction")
                                            <a href="{{ route('stock.edit', $item->id) }}" class="btn btn-1"> Edit </a>
                                            {{-- <a href="{{ route('stock.destroy', $item->id) }}" class="btn btn-1"> Delete </a> --}}
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('stock.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                            </form>
                                        @endcan
                                        {{-- <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"> Action </a>
                                                <a class="dropdown-item" href="#"> Another action </a>
                                            </div>
                                        </div> --}}
                                    </div>
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
<script src="{{ asset('libs/litepicker/dist/litepicker.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new List("table-default", {
            sortClass: "table-sort",
            listClass: "table-tbody",
            valueNames: [
                "sort-name",
                "sort-source",
                "sort-created_at",
                "sort-updated_at"
            ]
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".datepicker").forEach(function (el) {
            new Litepicker({
                element: el,
                maxDate: new Date(),
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
        
    });
        
</script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data ini tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush