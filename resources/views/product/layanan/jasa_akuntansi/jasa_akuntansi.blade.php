@extends('layouts.master')

@section('title', 'Layanan Jasa Akuntansi & Pembukuan')

@section('content')
<section class="service-akuntansi">
    <!-- Hero Section -->
    <div class="modern-hero">
        <div class="hero-background">
            <div class="hero-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="title-line">Jasa Akuntansi</span>
                        <span class="title-line highlight">& Pembukuan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi lengkap akuntansi untuk bisnis Anda yang <span class="text-highlight">profesional</span>, 
                        <span class="text-highlight">transparan</span>, dan <span class="text-highlight">sesuai standar</span>
                    </p>
                    <p class="hero-description">
                        Tim ahli kami membantu mengoptimalkan proses keuangan bisnis Anda dengan layanan akuntansi 
                        yang akurat dan terpercaya. Fokus pada pengembangan bisnis, biarkan kami mengelola pembukuan Anda.
                    </p>
                    <div class="hero-actions">
                        <a href="#services" class="btn btn-primary">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="/kontak" class="btn btn-outline-light">
                            <span>Konsultasi Gratis</span>
                            <i class="fas fa-calendar-check"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="floating-cards">
                        <div class="floating-card card-1">
                            <i class="fas fa-chart-line"></i>
                            <span>Laporan Real-time</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-shield-alt"></i>
                            <span>Data Aman</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-clock"></i>
                            <span>Tepat Waktu</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Klien Terlayani</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Kepuasan Klien</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Ahli Profesional</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Berbagai solusi akuntansi lengkap untuk kebutuhan bisnis Anda</p>
            </div>

            <div class="services-grid">
                @foreach ($services as $service)
                    <div class="service-card {{ $loop->iteration == 4 ? 'featured' : '' }}">
                    @if ($loop->iteration == 4)
                        <div class="card-badge">Populer</div>
                    @endif

                    <div class="card-header">
                        <div class="service-icon">
                            @switch($loop->iteration)
                                @case(1)
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    @break
                                @case(2)
                                    <i class="fas fa-chart-line"></i>
                                    @break
                                @case(3)
                                    <i class="fas fa-check-circle"></i>
                                    @break
                                @default
                                    <i class="fas fa-calculator"></i>
                            @endswitch
                        </div>

                        <h3 class="fw-bold">{{ $service->judul }}</h3>
                        <h4 class="mt-2">
                            Rp {{ number_format($service->harga, 0, ',', '.') }}
                        </h4>
                    </div>
                    <p class="text-muted text-center mb-4">
                            {{ $service->detail->deskripsi ?? 'Deskripsi tidak tersedia' }}
                        </p>

                    <div class="card-body">
                        @if (!empty($service->detail->benefit))
                            <ul class="list-unstyled mt-2">
                                @foreach ($service->detail->benefit as $benefit)
                                    @php
                                        $trimmed = trim($benefit);
                                    @endphp

                                    @if ($trimmed !== '')
                                        @php
                                            $isNegative = Str::startsWith($trimmed, '-');
                                            $text = ltrim($trimmed, '+- ');
                                        @endphp

                                        <li class="mb-2">
                                            <i class="fas fa-{{ $isNegative ? 'times text-danger' : 'check text-success' }} me-2"></i>
                                            {{ $text }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted fs-5">Benefit belum tersedia.</p>
                        @endif
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('jasa.akuntansi.show', $service->id) }}" class="btn btn-primary">
                            Pilih Layanan Ini
                        </a>
                        <a href="/kontak" class="btn btn-outline">
                            <span>Konsultasi Gratis</span>
                        </a>
                    </div>
                </div>

                @endforeach
            </div>


        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <p class="section-subtitle">Keunggulan layanan yang membuat kami berbeda</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Terpercaya & Aman</h4>
                    <p>Data keuangan Anda aman bersama kami dengan sistem keamanan berlapis dan enkripsi tingkat tinggi</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Tepat Waktu</h4>
                    <p>Laporan disampaikan tepat waktu dengan akurasi yang terjamin dan update real-time</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Tim Berpengalaman</h4>
                    <p>Dikelola oleh profesional akuntansi dengan sertifikasi dan pengalaman luas lebih dari 10 tahun</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Support 24/7</h4>
                    <p>Layanan dukungan penuh setiap saat untuk kebutuhan bisnis Anda kapanpun dibutuhkan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Mengoptimalkan Keuangan Bisnis Anda?</h3>
                <p>Konsultasikan kebutuhan akuntansi Anda dengan ahli kami dan dapatkan solusi terbaik untuk perkembangan bisnis</p>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary-blue: #2563eb;
        --secondary-blue: #1d4ed8;
        --dark-blue: #1e3a8a;
        --light-blue: #dbeafe;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-800: #1e293b;
        --gray-600: #475569;
        --gray-400: #94a3b8;
    }

    .service-akuntansi {
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* =========================
       MODERN HERO SECTION
       ========================= */
    .modern-hero {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 50%, var(--dark-blue) 100%);
        color: var(--white);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }

    .hero-shapes {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
        width: 300px;
        height: 300px;
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        top: 60%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape-3 {
        width: 150px;
        height: 150px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .shape-4 {
        width: 100px;
        height: 100px;
        top: 20%;
        right: 20%;
        animation-delay: 1s;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        padding: 120px 0 80px;
    }

    .hero-text {
        max-width: 600px;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }

    .title-line {
        display: block;
    }

    .title-line.highlight {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fbbf24;
    }

    .hero-description {
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 2.5rem;
        opacity: 0.8;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-visual {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .floating-cards {
        position: relative;
        width: 300px;
        height: 300px;
    }

    .floating-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        color: var(--white);
        animation: float 3s ease-in-out infinite;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .floating-card i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .floating-card span {
        font-size: 0.9rem;
        font-weight: 600;
    }

    .card-1 {
        top: 0;
        left: 0;
        animation-delay: 0s;
    }

    .card-2 {
        top: 20%;
        right: 0;
        animation-delay: 1s;
    }

    .card-3 {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        animation-delay: 2s;
    }

    .hero-stats {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        padding: 3rem 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-item {
        text-align: center;
        background-color: transparent;
    }

    .stat-number {
        display: block;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: var(--white);
    }

    .stat-label {
        font-size: 0.9rem;
        font-weight: 500;
        opacity: 0.8;
        color: var(--white);
    }

    /* =========================
       SERVICES SECTION
       ========================= */
    .services-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .section-subtitle {
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
        color: var(--gray-600);
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .service-card {
        position: relative;
        overflow: hidden;
        padding: 2.5rem;
        border-radius: 24px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card.featured {
        border: 2px solid var(--primary-blue);
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--light-blue) 100%);
    }

    .card-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--white);
        background: #dc2626;
        border-radius: 20px;
        text-transform: uppercase;
    }

    .card-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .service-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--primary-blue);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-blue) 0%, #eff6ff 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    }

    .service-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .card-body p {
        margin-bottom: 1.5rem;
        line-height: 1.6;
        color: var(--gray-600);
    }

    .feature-list {
        margin: 1.5rem 0;
        padding: 0;
        list-style: none;
    }

    .feature-list li {
        position: relative;
        padding: 0.5rem 0 0.5rem 1.5rem;
        color: var(--gray-600);
    }

    .feature-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        font-weight: 600;
        color: #10b981;
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-top: 2rem;
    }

    /* =========================
       BUTTONS
       ========================= */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid transparent;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-primary {
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-blue);
        border-color: var(--primary-blue);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-blue);
        background: var(--white);
        transform: translateY(-2px);
    }

    .btn-light {
        color: var(--gray-800);
        background: var(--white);
    }

    .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* =========================
       FEATURES SECTION
       ========================= */
    .features-section {
        padding: 100px 0;
        background: var(--white);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 3rem;
    }

    .feature-item {
        text-align: center;
        padding: 2rem 1rem;
    }

    .feature-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--primary-blue);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-blue) 0%, #eff6ff 100%);
        transition: all 0.3s ease;
    }

    .feature-item:hover .feature-icon {
        transform: scale(1.1);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        color: var(--white);
    }

    .feature-item h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .feature-item p {
        line-height: 1.6;
        color: var(--gray-600);
    }

    /* =========================
       CTA SECTION
       ========================= */
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
        color: var(--white);
        text-align: center;
    }

    .cta-content h3 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--white);
    }

    .cta-content p {
        font-size: 1.2rem;
        margin: 0 auto 2.5rem;
        max-width: 600px;
        opacity: 0.9;
        color: var(--white);
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    /* =========================
       ANIMATIONS
       ========================= */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =========================
       RESPONSIVE DESIGN
       ========================= */
    @media (max-width: 1024px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
        }

        .hero-title {
            font-size: 3.5rem;
        }

        .floating-cards {
            width: 250px;
            height: 250px;
        }
    }

    @media (max-width: 768px) {
        .modern-hero {
            min-height: 90vh;
        }

        .hero-content {
            padding: 100px 0 60px;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
        }

        .hero-stats {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .service-card {
            padding: 2rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .cta-content h3 {
            font-size: 2rem;
        }

        .hero-actions {
            justify-content: center;
        }

        .btn {
            padding: 0.875rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .hero-stats {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 2rem;
        }

        .service-card {
            padding: 1.5rem;
        }

        .cta-section {
            padding: 80px 0;
        }

        .cta-content h3 {
            font-size: 1.75rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn {
            width: 100%;
            max-width: 300px;
        }

        .floating-cards {
            display: none;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function addToCart(id, type) {
    fetch("{{ route('cart.add', [], false) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: id, type: type }),
    })
    .then(response => response.json())
            .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false
                });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message
                        });
                    }
                })
        .catch((error) => {
                console.error('Error:', error);
            });
    } 
</script>