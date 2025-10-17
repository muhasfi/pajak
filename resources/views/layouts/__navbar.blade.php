<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Modern Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('assets/customer/css/navbar.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <span>Paham Pajak</span>
            </a>
            
            <ul class="nav-menu">
                <!-- Peraturan & Artikel -->
                <li class="nav-item">
                    <a href="/artikel" class="nav-link active">
                        <i class="fas fa-file-alt"></i> Peraturan
                    </a>
                </li>
                
                <!-- Produk & Aplikasi (6 items - 2 columns) -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-laptop-code"></i> Produk <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid two-columns">
                            <div class="dropdown-column">
                                <a href="{{ route('book') }}" class="dropdown-item">
                                    <i class="fas fa-book"></i> Buku USKP
                                </a>
                                <a href="#aplikasi-pembukuan" class="dropdown-item">
                                    <i class="fas fa-calculator"></i> Aplikasi Pembukuan
                                </a>
                                <a href="/pph21" class="dropdown-item">
                                    <i class="fas fa-file-invoice-dollar"></i> Kertas Kerja PPH 21
                                </a>
                            </div>
                            <div class="dropdown-column">
                                <a href="/spt" class="dropdown-item">
                                    <i class="fas fa-file-contract"></i> Kertas Kerja SPT Tahunan
                                </a>
                                <a href="/ppn" class="dropdown-item">
                                    <i class="fas fa-receipt"></i> Kertas Kerja PPN
                                </a>
                                <a href="/kertas-kerja-spt-masa-unifikasi" class="dropdown-item">
                                    <i class="fas fa-file-alt"></i> Kertas Kerja SPT Masa Unifikasi
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                
                <!-- Pelatihan & Workshop (5 items - 2 columns) -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i> Pelatihan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid two-columns">
                            <div class="dropdown-column">
                                <a href="/brevet-ab" class="dropdown-item">
                                    <i class="fas fa-user-graduate"></i> Brevet A & B
                                </a>
                                <a href="/brevet-c" class="dropdown-item">
                                    <i class="fas fa-user-graduate"></i> Brevet C
                                </a>
                                <a href="/webinar" class="dropdown-item">
                                    <i class="fas fa-microphone"></i> Webinar
                                </a>
                            </div>
                            <div class="dropdown-column">
                                <a href="/seminar" class="dropdown-item">
                                    <i class="fas fa-users"></i> Seminar Offline
                                </a>
                                <a href="/in-house-training" class="dropdown-item">
                                    <i class="fas fa-building"></i> In house Training
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                
                <!-- Bimbel USKP (2 items - 1 column) -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-graduation-cap"></i> Bimbel USKP <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid">
                            <a href="/bimbel" class="dropdown-item">
                                <i class="fas fa-users"></i> Bimbel USKP
                            </a>
                            <a href="#tryout-uskp-online" class="dropdown-item">
                                <i class="fas fa-clipboard-list"></i> TryOut USKP Online
                            </a>
                        </div>
                    </div>
                </li>
                <!-- Layanan Akuntansi & Perpajakan (6 items - 2 columns) -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-balance-scale"></i> Layanan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid two-columns">
                            <div class="dropdown-column">
                                <a href="/corporate-services" class="dropdown-item">
                                    <i class="fas fa-building"></i> Pembuatan PT, NIB, & NPWP
                                </a>
                                <a href="/jasa-akuntansi" class="dropdown-item">
                                    <i class="fas fa-chart-line"></i> Jasa Akuntansi & Pembukuan
                                </a>
                                <a href="/jasa-perpajakan" class="dropdown-item">
                                    <i class="fas fa-calculator"></i> Jasa Perpajakan
                                </a>
                            </div>
                            <div class="dropdown-column">
                                <a href="/litigasi" class="dropdown-item">
                                    <i class="fas fa-gavel"></i> Litigasi & Sengketa Perpajakan
                                </a>
                                <a href="/audit" class="dropdown-item">
                                    <i class="fas fa-search-dollar"></i> Audit Laporan Keuangan
                                </a>
                                <a href="/transfer-pricing" class="dropdown-item">
                                    <i class="fas fa-exchange-alt"></i> Transfer Pricing Doc
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                
                <!-- Konsultasi Kasus (2 items - 1 column) -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-comments"></i>Konsultasi Kasus<i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid">
                            <a href="/forum" class="dropdown-item">
                                <i class="fas fa-comments"></i> Forum
                            </a>
                            <a href="/private" class="dropdown-item">
                                <i class="fas fa-comment-dots"></i> Konsultasi Private
                            </a>
                        </div>
                    </div>
                </li>
                
                <!-- Login Button -->
                <li class="nav-item">
                {{-- <li class="nav-item">
                    <a href="/login" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li> --}}

                <li class="nav-item">
                    @guest
                        {{-- Kalau belum login --}}
                        <a href="{{ route('login') }}" class="login-btn">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    @endguest

                    @auth
                        {{-- Kalau sudah login --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="border: none; background: none;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    @endauth
                </li>


            </ul>

            <div class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>


    </body>
<script>
    const mobileBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('.nav-menu');

    // toggle mobile menu
    mobileBtn.addEventListener('click', function () {
        this.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // toggle dropdown di mobile
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function (e) {
        if (window.innerWidth <= 768) {
            const dropdown = this.nextElementSibling;
            if (dropdown && dropdown.classList.contains('dropdown')) {
            e.preventDefault();        // cegah scroll ke atas
            e.stopPropagation();       // cegah klik sampai ke document
            dropdown.classList.toggle('active');
            }
        }
        });
    });

    // tutup mobile menu setelah klik dropdown-item
    document.querySelectorAll('.dropdown-item').forEach(link => {
        link.addEventListener('click', () => {
        mobileBtn.classList.remove('active');
        navMenu.classList.remove('active');
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
        });
    });

    // tutup dropdown kalau klik di luar nav-menu pada mobile
    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 768 && !navMenu.contains(e.target)) {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
        }
    });

    // handle resize
    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
        mobileBtn.classList.remove('active');
        navMenu.classList.remove('active');
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
        }
    });
    </script>
</html>