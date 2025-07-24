@extends('layout.app')
@section('content-header')
    List Unit
@endsection
@section('content')
    <div class="mb-2">
        <a href="{{ route('unit.create') }}" class="btn btn-blue btn-animate-icon btn-animate-icon-rotate">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Add New Unit</a>
    </div>
    <x-alert :message="session('success')" />

    <div class="card">
        <div class="card-body p-0">
            <div id="table-default" data-list class="table-responsive">
                <div class="mb-3">
                    <input type="text" class="search form-control" placeholder="Cari Unit...">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                            <th><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                            <th><button class="table-sort" data-sort="sort-updated_at">Updated At</button></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody"> {{-- ✅ penting: class="list" agar List.js bisa baca --}}
                        @foreach ($units as $unit)
                            <tr>
                                <td class="sort-name">{{ $unit->name }}</td>
                                <td class="sort-created_at">{{ $unit->created_at->format('d F Y H:i') }}</td>
                                <td class="sort-updated_at">{{ $unit->updated_at->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-1"> Edit </a>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new List("table-default", {
            sortClass: "table-sort",
            listClass: "table-tbody",
            valueNames: [
                "sort-name",
                "sort-created_at",
                "sort-updated_at"
            ]
        });
    });
</script>
@endpush