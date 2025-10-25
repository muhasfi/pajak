{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.__header')
    {{-- Tempat CSS tambahan dari halaman --}}
    {{-- <link href="{{ asset('assets/customer/css/navbar.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets/customer/css/cart.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/customer/css/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/book.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/artikel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/footer.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/customer/css/webinar.css') }}"> --}}
    @yield('style')
    @yield('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.__navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
        
    </main>

    {{-- Footer --}}
    @include('layouts.__footer')
    <link href="{{ asset('assets/customer/css/footer.css') }}" rel="stylesheet">
    @yield('style')

    {{-- Script JS --}}
    <script src="{{ asset('assets/customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- Script tambahan per halaman --}}
    @yield('script')
</body>
</html>
