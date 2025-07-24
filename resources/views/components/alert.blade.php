@props(['type' => 'success', 'message' => ''])

@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible" role="alert">
        <div class="alert-icon">
            @if ($type === 'success')
                {{-- Icon success --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon alert-icon icon-2">
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            @elseif($type === 'danger' || $type === 'error')
                {{-- Icon error --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon alert-icon icon-2">
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M12 8v4"></path>
                    <path d="M12 16h.01"></path>
                </svg>
            @endif
        </div>
        {{ $message }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
