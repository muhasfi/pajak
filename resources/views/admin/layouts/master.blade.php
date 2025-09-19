@include('admin.layouts.__header')

<body>
    <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script>
    @include('admin.layouts.__sidebar')

    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            @include('admin.layouts.__footer')

        </div>
    </div>

    <script src="{{ asset('assets/admin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/compiled/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/admin/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/static/js/pages/dashboard.js') }}"></script>
    <script>
        // Fungsi untuk menampilkan SweetAlert dari session flash
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
            });
        @endif

        // Fungsi untuk konfirmasi penghapusan
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
    
    @stack('scripts')
</body>

</html>