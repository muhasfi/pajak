@extends('layouts.master')

@section('title', 'Litigasi & Sengketa Perpajakan')

@section('content')
<section class="litigation-service">
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
                        <span class="title-line">Litigasi &</span>
                        <span class="title-line highlight">Sengketa Perpajakan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi komprehensif untuk penyelesaian sengketa pajak dengan pendekatan <span class="text-highlight">strategis</span>, 
                        <span class="text-highlight">profesional</span>, dan <span class="text-highlight">berpengalaman</span>
                    </p>
                    <p class="hero-description">
                        Tim ahli litigasi pajak kami siap mendampingi Anda dalam setiap tahap sengketa perpajakan, 
                        dari banding hingga pengadilan pajak. Dapatkan perlindungan hukum terbaik untuk hak perpajakan Anda.
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
                            <i class="fas fa-balance-scale"></i>
                            <span>Pengadilan Pajak</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-file-contract"></i>
                            <span>Banding & Gugatan</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-user-tie"></i>
                            <span>Konsultan Hukum</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Layanan Litigasi Perpajakan</h2>
                <p class="section-subtitle">Komprehensif solusi hukum untuk setiap tahap sengketa perpajakan</p>
            </div>

            <div class="services-grid">
                @foreach ($litigasi as $item)
                    <div class="service-card">
                        {{-- Header Card --}}
                        <div class="card-header">
                            <div class="service-icon">
                                @switch($loop->iteration)
                                    @case(1)
                                        <i class="fas fa-gavel"></i>
                                    @break
                                    
                                    @case(2)
                                        <i class="fas fa-balance-scale"></i>
                                    @break
                                    
                                    @case(3)
                                        <i class="fas fa-handshake"></i>
                                    @break
                                    
                                    @default
                                        <i class="fas fa-search"></i>
                                @endswitch
                            </div>

                            <h3 class="service-title">{{ $item->judul }}</h3>
                            <h4 class="service-price">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </h4>
                        </div>

                        {{-- Deskripsi --}}
                        <p class="service-description">
                            {{ $item->detail->deskripsi ?? 'Deskripsi tidak tersedia' }}
                        </p>

                        {{-- Body Card - Benefits --}}
                        <div class="card-body">
                            @if (!empty($item->detail->benefit))
                                <ul class="benefits-list">
                                    @foreach ($item->detail->benefit as $benefit)
                                        @php
                                            $trimmed = trim($benefit);
                                        @endphp

                                        @if ($trimmed !== '')
                                            @php
                                                $isNegative = Str::startsWith($trimmed, '-');
                                                $text = ltrim($trimmed, '+- ');
                                            @endphp

                                            <li class="benefit-item">
                                                <i class="fas fa-{{ $isNegative ? 'times text-danger' : 'check text-success' }} me-2"></i>
                                                {{ $text }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="no-benefits">Benefit belum tersedia.</p>
                            @endif
                        </div>

                        {{-- Footer Card - Action Buttons --}}
                        <div class="card-footer">
                            <a href="{{ route('litigasi.show', $item->id) }}" class="btn btn-primary">
                                Pilih Layanan Ini
                            </a>
                            <a href="{{ route('kontak') }}" class="btn btn-outline">
                                <span>Detail Layanan</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Proses Penanganan Sengketa</h2>
                <p class="section-subtitle">Tahapan sistematis untuk penyelesaian sengketa perpajakan yang optimal</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-content">
                        <h4>Konsultasi Awal</h4>
                        <p>Analisis dokumen dan identifikasi masalah hukum untuk menentukan strategi terbaik</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-content">
                        <h4>Penyusunan Dokumen</h4>
                        <p>Pembuatan memorandum banding, gugatan, atau tanggapan hukum yang komprehensif</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-content">
                        <h4>Proses Hukum</h4>
                        <p>Pendampingan dalam setiap tahap proses hukum dari banding hingga pengadilan</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-content">
                        <h4>Monitoring & Evaluasi</h4>
                        <p>Pemantauan berkelanjutan dan evaluasi perkembangan kasus untuk hasil optimal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Hadapi Sengketa Pajak dengan Percaya Diri</h3>
                <p>Konsultasikan kasus Anda dengan tim litigasi berpengalaman kami dan dapatkan solusi terbaik untuk perlindungan hukum perpajakan Anda</p>
                <div class="cta-buttons">
                    <a href="/kontak" class="btn btn-light">Konsultasi Gratis</a>
                    <a href="tel:+62123456789" class="btn btn-outline-light">Hubungi Kami</a>
                </div>
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
        --success: #10b981;
        --warning: #f59e0b;
    }

    .litigation-service {
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
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
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
        font-size: clamp(2.5rem, 5vw, 3.5rem);
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
        font-size: clamp(1.1rem, 2vw, 1.3rem);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fbbf24;
    }

    .hero-description {
        font-size: clamp(1rem, 1.5vw, 1.1rem);
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
        text-align: center;
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
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .section-subtitle {
        font-size: clamp(1rem, 2vw, 1.2rem);
        max-width: 600px;
        margin: 0 auto;
        color: var(--gray-600);
    }

    /* Services Grid - Responsive dengan jumlah card yang fleksibel */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        justify-items: center;
    }

    /* Service Card - Tetap konsisten ukurannya */
    .service-card {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 380px;
        min-height: 500px;
        padding: 2rem;
        border-radius: 20px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
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

    .service-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--gray-800);
    }

    .service-price {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-blue);
        margin: 0;
    }

    .service-description {
        text-align: center;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .card-body {
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }

    .benefits-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .benefit-item {
        padding: 0.5rem 0;
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.95rem;
    }

    .benefit-item:last-child {
        border-bottom: none;
    }

    .no-benefits {
        color: var(--gray-600);
        text-align: center;
        font-style: italic;
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    /* =========================
       PROCESS SECTION
       ========================= */
    .process-section {
        padding: 100px 0;
        background: var(--white);
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .process-step {
        text-align: center;
        padding: 2rem;
        position: relative;
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 auto 1.5rem;
    }

    .step-content h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .step-content p {
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
        font-size: clamp(2rem, 4vw, 2.5rem);
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--white);
    }

    .cta-content p {
        font-size: clamp(1rem, 2vw, 1.2rem);
        margin: 0 auto 2.5rem;
        max-width: 600px;
        opacity: 0.9;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
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
        min-height: 54px;
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
    
    /* Tablet Landscape dan Desktop Kecil */
    @media (max-width: 1024px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
            padding: 100px 0 60px;
        }

        .hero-text {
            max-width: 100%;
        }

        .floating-cards {
            width: 250px;
            height: 250px;
        }

        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
    }

    /* Tablet Portrait */
    @media (max-width: 768px) {
        .modern-hero {
            min-height: 90vh;
        }

        .hero-content {
            padding: 80px 0 40px;
        }

        .hero-actions {
            justify-content: center;
        }

        .services-section {
            padding: 80px 0;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .service-card {
            max-width: 100%;
            min-height: auto;
            padding: 1.5rem;
        }

        .process-section {
            padding: 80px 0;
        }

        .process-steps {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .process-step {
            padding: 1.5rem;
        }

        .cta-section {
            padding: 80px 0;
        }

        .btn {
            padding: 0.875rem 1.5rem;
            min-height: 48px;
        }
    }

    /* Mobile Devices */
    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }

        .hero-content {
            padding: 60px 0 30px;
        }

        .hero-actions {
            flex-direction: column;
            align-items: center;
        }

        .hero-actions .btn {
            width: 100%;
            max-width: 280px;
        }

        .floating-cards {
            display: none;
        }

        .services-section {
            padding: 60px 0;
        }

        .section-header {
            margin-bottom: 2.5rem;
        }

        .service-card {
            padding: 1.25rem;
            border-radius: 16px;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .service-title {
            font-size: 1.25rem;
        }

        .service-price {
            font-size: 1.1rem;
        }

        .service-description {
            font-size: 0.9rem;
        }

        .benefit-item {
            font-size: 0.85rem;
        }

        .card-footer {
            gap: 0.5rem;
        }

        .card-footer .btn {
            width: 100%;
        }

        .process-section {
            padding: 60px 0;
        }

        .process-step {
            padding: 1rem;
        }

        .step-number {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .step-content h4 {
            font-size: 1.1rem;
        }

        .step-content p {
            font-size: 0.9rem;
        }

        .cta-section {
            padding: 60px 0;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .cta-buttons .btn {
            width: 100%;
            max-width: 280px;
        }
    }

    /* Very Small Mobile Devices */
    @media (max-width: 360px) {
        .services-grid {
            grid-template-columns: 1fr;
        }

        .service-card {
            padding: 1rem;
        }

        .btn {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Touch device optimizations */
    @media (hover: none) {
        .service-card:hover {
            transform: none;
        }
        
        .btn:hover {
            transform: none;
        }
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