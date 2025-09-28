{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
<<<<<<< HEAD
    @include('layouts.__header') {{-- meta, title, favicon, dsb --}}

    {{-- CSS Global --}}
    <link rel="stylesheet" href="{{ asset('assets/customer/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/book.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/customer/css/artikel.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/customer/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/artikel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/show_artikel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/bimbel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/bimbel_a.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/bimbel_b.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/seminar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/webinar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/spt.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/ppn.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/pph.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/order_ppn.css') }}">
    {{-- CSS Tambahan Per Halaman --}}
=======
    @include('layouts.__header')
    {{-- Tempat CSS tambahan dari halaman --}}
    <link href="{{ asset('assets/customer/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/book.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/artikel.css') }}" rel="stylesheet">
>>>>>>> 0a071cbb10510b796f9ab6287b32944a7fe218b5
    @yield('style')
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

    {{-- Script JS Global --}}
    <script src="{{ asset('assets/customer/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    {{-- Script Tambahan Per Halaman --}}
    @yield('script')
</body>
</html>
