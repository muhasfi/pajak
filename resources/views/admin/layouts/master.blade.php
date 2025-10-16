@include('admin.layouts.__header')

<body>
    <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/admin/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/static/js/pages/dashboard.js') }}"></script>
    <script>
        // Fungsi untuk menambah input benefit - DIPERBAIKI
        function addBenefit() {
            const benefitsContainer = document.getElementById('benefits-container');
            const benefitCount = benefitsContainer.querySelectorAll('.benefit-input').length;
            
            const benefitDiv = document.createElement('div');
            benefitDiv.className = 'benefit-input input-group mb-2';
            benefitDiv.innerHTML = `
                <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
                <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">Hapus</button>
            `;
            
            benefitsContainer.appendChild(benefitDiv);
        }

        // Fungsi untuk menghapus input benefit - DIPERBAIKI
        function removeBenefit(button) {
            const benefitInputs = document.querySelectorAll('.benefit-input');
            if (benefitInputs.length > 1) {
                button.closest('.benefit-input').remove();
            } else {
                alert('Minimal harus ada satu benefit');
            }
        }

        // Pastikan fungsi tersedia secara global
        window.addBenefit = addBenefit;
        window.removeBenefit = removeBenefit;
    </script>
    @yield('script')
    @stack('scripts')
</body>

</html>