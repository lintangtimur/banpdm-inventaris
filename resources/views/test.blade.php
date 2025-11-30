@extends('layout.app')

@section('content')
     <style>
        #lottie-container {
            width: 100%;
            height: 100%;
        }
    </style>

    <div id="lottie-container"></div>
@endsection

@push('scripts')
    <script>
    lottie.loadAnimation({
        container: document.getElementById('lottie-container'), // ID div
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'coming soon.json' // ganti dengan path file json animasi kamu
    });
</script>
@endpush