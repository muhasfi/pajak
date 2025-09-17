{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.header')
    {{-- Tempat CSS tambahan dari halaman --}}
    @yield('style')
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Script JS --}}
    <script src="{{ asset('assets/customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- Script tambahan per halaman --}}
    @yield('script')
</body>
</html>
