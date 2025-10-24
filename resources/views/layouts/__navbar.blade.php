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
                    <a href="/artikel" class="nav-link {{ request()->is('artikel') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i> Peraturan
                    </a>
                </li>
                
                <!-- Produk & Aplikasi -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('book*') || request()->is('pph21*') || request()->is('spt*') || request()->is('ppn*') || request()->is('kertas-kerja-spt-masa-unifikasi*') ? 'active' : '' }}">
                        <i class="fas fa-laptop-code"></i> Produk <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid two-columns">
                            <div class="dropdown-column">
                                <a href="{{ route('book') }}" class="dropdown-item {{ Route::is('book') ? 'active' : '' }}">
                                    <i class="fas fa-book"></i> Buku USKP
                                </a>
                                <a href="#aplikasi-pembukuan" class="dropdown-item">
                                    <i class="fas fa-calculator"></i> Aplikasi Pembukuan
                                </a>
                                <a href="/pph21" class="dropdown-item {{ request()->is('pph21') ? 'active' : '' }}">
                                    <i class="fas fa-file-invoice-dollar"></i> Kertas Kerja PPH 21
                                </a>
                            </div>
                            <div class="dropdown-column">
                                <a href="/spt" class="dropdown-item {{ request()->is('spt') ? 'active' : '' }}">
                                    <i class="fas fa-file-contract"></i> Kertas Kerja SPT Tahunan
                                </a>
                                <a href="/ppn" class="dropdown-item {{ request()->is('ppn') ? 'active' : '' }}">
                                    <i class="fas fa-receipt"></i> Kertas Kerja PPN
                                </a>
                                <a href="/kertas-kerja-spt-masa-unifikasi" class="dropdown-item {{ request()->is('kertas-kerja-spt-masa-unifikasi') ? 'active' : '' }}">
                                    <i class="fas fa-file-alt"></i> Kertas Kerja SPT Masa Unifikasi
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Pelatihan & Workshop -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('brevet*') || request()->is('webinar*') || request()->is('seminar*') || request()->is('in-house-training*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher"></i> Pelatihan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid two-columns">
                            <div class="dropdown-column">
                                <a href="/brevet-ab" class="dropdown-item {{ request()->is('brevet-ab') ? 'active' : '' }}">
                                    <i class="fas fa-user-graduate"></i> Brevet A & B
                                </a>
                                <a href="/brevet-c" class="dropdown-item {{ request()->is('brevet-c') ? 'active' : '' }}">
                                    <i class="fas fa-user-graduate"></i> Brevet C
                                </a>
                                <a href="/webinar" class="dropdown-item {{ request()->is('webinar') ? 'active' : '' }}">
                                    <i class="fas fa-microphone"></i> Webinar
                                </a>
                            </div>
                            <div class="dropdown-column">
                                <a href="/seminar" class="dropdown-item {{ request()->is('seminar') ? 'active' : '' }}">
                                    <i class="fas fa-users"></i> Seminar Offline
                                </a>
                                <a href="/in-house-training" class="dropdown-item {{ request()->is('in-house-training') ? 'active' : '' }}">
                                    <i class="fas fa-building"></i> In house Training
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Bimbel USKP -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('bimbel*') ? 'active' : '' }}">
                        <i class="fas fa-graduation-cap"></i> Bimbel USKP <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid">
                            <a href="/bimbel" class="dropdown-item {{ request()->is('bimbel') ? 'active' : '' }}">
                                <i class="fas fa-users"></i> Bimbel USKP
                            </a>
                            <a href="#tryout-uskp-online" class="dropdown-item">
                                <i class="fas fa-clipboard-list"></i> TryOut USKP Online
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Layanan Akuntansi & Perpajakan -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('corporate-services*') || request()->is('jasa-akuntansi*') || request()->is('jasa-perpajakan*') || request()->is('litigasi*') || request()->is('audit*') || request()->is('transfer-pricing*') ? 'active' : '' }}">
                        <i class="fas fa-balance-scale"></i> Layanan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid two-columns">
                            <div class="dropdown-column">
                                <a href="/corporate-services" class="dropdown-item {{ request()->is('corporate-services') ? 'active' : '' }}">
                                    <i class="fas fa-building"></i> Pembuatan PT, NIB, & NPWP
                                </a>
                                <a href="/jasa-akuntansi" class="dropdown-item {{ request()->is('jasa-akuntansi') ? 'active' : '' }}">
                                    <i class="fas fa-chart-line"></i> Jasa Akuntansi & Pembukuan
                                </a>
                                <a href="/jasa-perpajakan" class="dropdown-item {{ request()->is('jasa-perpajakan') ? 'active' : '' }}">
                                    <i class="fas fa-calculator"></i> Jasa Perpajakan
                                </a>
                            </div>
                            <div class="dropdown-column">
                                <a href="/litigasi" class="dropdown-item {{ request()->is('litigasi') ? 'active' : '' }}">
                                    <i class="fas fa-gavel"></i> Litigasi & Sengketa Perpajakan
                                </a>
                                <a href="/audit" class="dropdown-item {{ request()->is('audit') ? 'active' : '' }}">
                                    <i class="fas fa-search-dollar"></i> Audit Laporan Keuangan
                                </a>
                                <a href="/transfer-pricing" class="dropdown-item {{ request()->is('transfer-pricing') ? 'active' : '' }}">
                                    <i class="fas fa-exchange-alt"></i> Transfer Pricing Doc
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Konsultasi Kasus -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('forum*') || request()->is('private*') ? 'active' : '' }}">
                        <i class="fas fa-comments"></i> Konsultasi Kasus <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid">
                            <a href="/forum" class="dropdown-item {{ request()->is('forum') ? 'active' : '' }}">
                                <i class="fas fa-comments"></i> Forum
                            </a>
                            <a href="/private" class="dropdown-item {{ request()->is('private') ? 'active' : '' }}">
                                <i class="fas fa-comment-dots"></i> Konsultasi Private
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Profil / Login -->
                <li class="nav-item">
                    @guest
                        <a href="{{ route('login') }}" class="login-btn {{ request()->is('login') ? 'active' : '' }}">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    @endguest

                    @auth
                        <a href="#profil" class="nav-link {{ request()->is('profil-saya*') || request()->is('cart*') || request()->is('transactions*') ? 'active' : '' }}">
                            <i class="fa-solid fa-user-circle"></i> Profil <i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <div class="dropdown-grid">
                                <a href="/profil-saya" class="dropdown-item {{ request()->is('profil-saya') ? 'active' : '' }}">
                                    <i class="fa-solid fa-id-badge"></i> Profil Saya
                                </a>
                                <a href="/cart" class="dropdown-item {{ request()->is('cart') ? 'active' : '' }}">
                                    <i class="fa-solid fa-cart-shopping"></i> Cart
                                </a>
                                <a href="/transactions" class="dropdown-item {{ request()->is('transactions') ? 'active' : '' }}">
                                    <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Transaksi
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="border: none; background: none; text-align: left;">
                                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
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