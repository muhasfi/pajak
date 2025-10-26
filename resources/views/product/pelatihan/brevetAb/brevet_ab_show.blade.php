@extends('layouts.master')

@section('title', 'Detail Brevet')

@section('style')
<style>
    :root {
        --primary: #2563eb;
        --primary-light: #3b82f6;
        --primary-dark: #1d4ed8;
        --secondary: #64748b;
        --accent: #f59e0b;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --light: #f8fafc;
        --light-gray: #f1f5f9;
        --dark: #1e293b;
        --dark-gray: #475569;
        --white: #ffffff;
        
        --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        --gradient-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --gradient-warning: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        
        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.08), 0 4px 6px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.04);
        
        --radius-sm: 8px;
        --radius: 12px;
        --radius-lg: 16px;
        --radius-xl: 20px;
        
        --transition: all 0.3s ease;
    }

    /* Base Styles - Mobile First */
    .brevet-detail-section {
        padding: 1rem 0;
        background: var(--light);
        min-height: 100vh;
    }

    .breadcrumb-nav {
        margin-bottom: 1.5rem;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
        font-size: 0.875rem;
    }

    .breadcrumb-item a {
        color: var(--secondary);
        text-decoration: none;
        transition: var(--transition);
    }

    .breadcrumb-item a:hover {
        color: var(--primary);
    }

    .breadcrumb-item.active {
        color: var(--dark);
        font-weight: 600;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 1.5rem;
        line-height: 1.3;
        word-wrap: break-word;
    }

    .brevet-main-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .image-container {
        position: relative;
        height: 280px;
        overflow: hidden;
        background: var(--light-gray);
    }

    .brevet-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .image-container:hover .brevet-image {
        transform: scale(1.03);
    }

    .brevet-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: var(--gradient-warning);
        color: var(--white);
        z-index: 2;
        box-shadow: var(--shadow);
    }

    .action-sidebar {
        padding: 1.5rem;
        background: var(--light);
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .price-section {
        text-align: center;
        padding: 1.25rem;
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
    }

    .price-label {
        font-size: 0.8rem;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .brevet-price {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0;
        line-height: 1.2;
    }

    .btn-primary, .btn-success {
        border: none;
        padding: 1rem 1.5rem;
        border-radius: var(--radius);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: var(--transition);
        color: var(--white);
        text-decoration: none;
        width: 100%;
        font-size: 0.95rem;
    }

    .btn-primary {
        background: var(--primary);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
    }

    .btn-success {
        background: var(--success);
    }

    .btn-success:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
    }

    .info-content {
        padding: 1.5rem;
    }

    .info-section {
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary);
        width: 20px;
        font-size: 1rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: var(--light);
        border-radius: var(--radius);
        transition: var(--transition);
    }

    .info-item:hover {
        background: var(--light-gray);
        transform: translateY(-1px);
    }

    .info-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius);
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1rem;
        flex-shrink: 0;
    }

    .info-text {
        flex: 1;
        min-width: 0;
    }

    .info-label {
        font-size: 0.8rem;
        color: var(--secondary);
        margin-bottom: 0.25rem;
        font-weight: 600;
    }

    .info-value {
        font-size: 0.95rem;
        color: var(--dark);
        font-weight: 600;
        word-wrap: break-word;
    }

    .description-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .description-item {
        padding: 0.75rem 0;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        border-bottom: 1px solid var(--light-gray);
    }

    .description-item:last-child {
        border-bottom: none;
    }

    .description-icon {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 0.1rem;
        font-size: 0.75rem;
    }

    .icon-success {
        background: var(--success);
        color: var(--white);
    }

    .icon-danger {
        background: var(--danger);
        color: var(--white);
    }

    .description-text {
        color: var(--dark-gray);
        line-height: 1.5;
        flex: 1;
        font-size: 0.95rem;
        word-wrap: break-word;
    }

    .detail-card {
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: none;
        margin-bottom: 1.5rem;
    }

    .detail-card .card-body {
        padding: 1.5rem;
    }

    .detail-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .detail-title i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
        gap: 0.375rem;
    }

    .detail-label {
        font-size: 0.8rem;
        color: var(--secondary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        font-size: 0.95rem;
        color: var(--dark);
        font-weight: 600;
        word-wrap: break-word;
    }

    .content-block {
        margin-top: 1.25rem;
    }

    .content-label {
        font-size: 0.95rem;
        color: var(--dark);
        font-weight: 700;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-label i {
        color: var(--primary);
        font-size: 0.9rem;
    }

    .content-text {
        color: var(--dark-gray);
        line-height: 1.6;
        background: var(--light);
        padding: 1.25rem;
        border-radius: var(--radius);
        border-left: 4px solid var(--primary);
        font-size: 0.9rem;
        word-wrap: break-word;
    }

    .btn-back {
        background: transparent;
        border: 2px solid var(--secondary);
        color: var(--secondary);
        padding: 0.75rem 1.25rem;
        border-radius: var(--radius);
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
        text-decoration: none;
        font-size: 0.9rem;
        width: 100%;
        justify-content: center;
    }

    .btn-back:hover {
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-1px);
    }

    .action-note {
        text-align: center;
        font-size: 0.8rem;
        color: var(--secondary);
        line-height: 1.4;
    }

    .action-note i {
        color: var(--primary);
        margin-right: 0.25rem;
    }

    /* Tablet Styles (768px and up) */
    @media (min-width: 768px) {
        .brevet-detail-section {
            padding: 2rem 0;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .image-container {
            height: 350px;
        }

        .action-sidebar {
            padding: 2rem;
            gap: 1.25rem;
        }

        .price-section {
            padding: 1.5rem;
        }

        .brevet-price {
            font-size: 2rem;
        }

        .info-content {
            padding: 2rem;
        }

        .info-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .detail-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }

        .btn-back {
            width: auto;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .detail-title {
            font-size: 1.3rem;
        }
    }

    /* Desktop Styles (992px and up) */
    @media (min-width: 992px) {
        .brevet-detail-section {
            padding: 3rem 0;
        }

        .page-title {
            font-size: 2.25rem;
        }

        .image-container {
            height: 400px;
        }

        .brevet-main-card {
            margin-bottom: 3rem;
        }

        .info-grid {
            grid-template-columns: repeat(4, 1fr);
        }

        .detail-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-sidebar {
            height: 100%;
            justify-content: flex-start;
        }

        .btn-primary, .btn-success {
            padding: 1rem 2rem;
            font-size: 1rem;
        }
    }

    /* Large Desktop Styles (1200px and up) */
    @media (min-width: 1200px) {
        .page-title {
            font-size: 2.5rem;
        }

        .image-container {
            height: 450px;
        }

        .info-content {
            padding: 2.5rem;
        }

        .action-sidebar {
            padding: 2.5rem;
        }
    }

    /* Small Mobile Styles (480px and down) */
    @media (max-width: 480px) {
        .brevet-detail-section {
            padding: 0.75rem 0;
        }

        .page-title {
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
        }

        .image-container {
            height: 240px;
        }

        .brevet-badge {
            top: 0.75rem;
            left: 0.75rem;
            padding: 0.4rem 0.8rem;
            font-size: 0.7rem;
        }

        .action-sidebar {
            padding: 1.25rem;
        }

        .info-content {
            padding: 1.25rem;
        }

        .info-item {
            padding: 0.75rem;
        }

        .detail-card .card-body {
            padding: 1.25rem;
        }

        .content-text {
            padding: 1rem;
        }

        .btn-primary, .btn-success {
            padding: 0.875rem 1.25rem;
            font-size: 0.9rem;
        }
    }

    /* Extra Small Mobile Styles (360px and down) */
    @media (max-width: 360px) {
        .page-title {
            font-size: 1.3rem;
        }

        .image-container {
            height: 200px;
        }

        .info-grid {
            gap: 0.5rem;
        }

        .info-item {
            padding: 0.625rem;
            gap: 0.5rem;
        }

        .info-icon {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
        }

        .section-title {
            font-size: 1.1rem;
        }

        .detail-title {
            font-size: 1.1rem;
        }
    }

    /* Animation Styles */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    /* Utility Classes for Better Responsive Behavior */
    .text-wrap-balance {
        text-wrap: balance;
    }

    .img-responsive {
        max-width: 100%;
        height: auto;
    }

    /* Prevent horizontal scroll on mobile */
    .container {
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Improve touch targets for mobile */
    @media (max-width: 768px) {
        .btn-primary, .btn-success, .btn-back {
            min-height: 44px;
        }

        .info-item, .description-item {
            min-height: 44px;
        }
    }
</style>
@endsection

@section('content')
<section class="brevet-detail-section">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('brevet.ab') }}">Brevet A&B</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($brevet->judul, 25) }}</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="page-title animate-fade-in text-wrap-balance">{{ $brevet->judul }}</h1>

        <div class="brevet-main-card animate-fade-in">
            <div class="row g-0">
                <!-- Image and Action Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="image-container">
                        @if($brevet->gambar)
                            <img src="{{ Str::startsWith($brevet->gambar, ['http://','https://']) ? $brevet->gambar : asset('storage/' . $brevet->gambar) }}"
                                 class="brevet-image img-responsive"
                                 alt="{{ $brevet->judul }}"
                                 onerror="this.onerror=null;this.src='{{ asset('images/no-image.jpg') }}'">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" 
                                 class="brevet-image img-responsive" 
                                 alt="No image">
                        @endif
                        <div class="brevet-badge">
                            Brevet A&B
                        </div>
                    </div>

                    <!-- Action Sidebar -->
                    <div class="action-sidebar">
                        <div class="price-section">
                            <div class="price-label">Investasi Pelatihan</div>
                            <div class="brevet-price">Rp {{ number_format($brevet->harga, 0, ',', '.') }}</div>
                        </div>

                        <button type="button" 
                                class="btn btn-primary"
                                onclick="addToCart({{ $brevet->id }}, 'ItemBrevetAB')">
                            <i class="fas fa-shopping-cart"></i>
                            Daftar Sekarang
                        </button>

                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20pelatihan%20{{ urlencode($brevet->judul) }}" 
                           class="btn btn-success"
                           target="_blank">
                            <i class="fab fa-whatsapp"></i>
                            Konsultasi via WhatsApp
                        </a>

                        <div class="action-note">
                            <i class="fas fa-info-circle"></i>
                            Kuota terbatas. Daftar sekarang juga dapat konsultasi gratis!
                        </div>
                    </div>
                </div>

                <!-- Information Content -->
                <div class="col-12 col-lg-8">
                    <div class="info-content">
                        <!-- Basic Information -->
                        <div class="info-section">
                            <h3 class="section-title">
                                <i class="fas fa-info-circle"></i>
                                Informasi Pelatihan
                            </h3>
                            
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="info-text">
                                        <div class="info-label">Periode</div>
                                        <div class="info-value">
                                            {{ \Carbon\Carbon::parse($brevet->tanggal_mulai)->translatedFormat('d F Y') }} - 
                                            {{ \Carbon\Carbon::parse($brevet->tanggal_selesai)->translatedFormat('d F Y') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="info-text">
                                        <div class="info-label">Hari</div>
                                        <div class="info-value">{{ $brevet->hari }}</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="info-text">
                                        <div class="info-label">Level</div>
                                        <div class="info-value">{{ optional($brevet->detail)->level ?? '-' }}</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div class="info-text">
                                        <div class="info-label">Instruktur</div>
                                        <div class="info-value">{{ optional($brevet->detail)->instruktur ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="info-section">
                            <h3 class="section-title">
                                <i class="fas fa-list-ul"></i>
                                Yang Akan Anda Dapatkan
                            </h3>
                            <ul class="description-list">
                                @foreach(preg_split("/\r\n|\n|\r/", $brevet->deskripsi) as $line)
                                    @php $trim = trim($line); @endphp
                                    @if($trim !== '')
                                        <li class="description-item">
                                            @if(str_starts_with($trim, '+'))
                                                <div class="description-icon icon-success">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            @elseif(str_starts_with($trim, '-'))
                                                <div class="description-icon icon-danger">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            @else
                                                <div class="description-icon icon-success">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            @endif
                                            <div class="description-text">
                                                {{ ltrim($trim, '+ -') }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- Detail Information Card -->
                        <div class="detail-card">
                            <div class="card-body">
                                <h4 class="detail-title">
                                    <i class="fas fa-graduation-cap"></i>
                                    Detail Pelatihan
                                </h4>

                                <div class="detail-grid">
                                    <div class="detail-item">
                                        <div class="detail-label">Fasilitas</div>
                                        <div class="detail-value">{{ optional($brevet->detail)->fasilitas ?? '-' }}</div>
                                    </div>

                                    <div class="detail-item">
                                        <div class="detail-label">Durasi</div>
                                        <div class="detail-value">
                                            {{ optional($brevet->detail)->durasi_jam ? optional($brevet->detail)->durasi_jam . ' jam' : '-' }}
                                        </div>
                                    </div>

                                    <div class="detail-item">
                                        <div class="detail-label">Lokasi</div>
                                        <div class="detail-value">{{ optional($brevet->detail)->lokasi ?? '-' }}</div>
                                    </div>

                                    <div class="detail-item">
                                        <div class="detail-label">Kuota</div>
                                        <div class="detail-value">{{ optional($brevet->detail)->kuota_peserta ?? '-' }}</div>
                                    </div>
                                </div>

                                @if(optional($brevet->detail)->syarat_peserta)
                                    <div class="content-block">
                                        <div class="content-label">
                                            <i class="fas fa-clipboard-list"></i>
                                            Syarat Peserta
                                        </div>
                                        <div class="content-text">
                                            {!! nl2br(e(optional($brevet->detail)->syarat_peserta)) !!}
                                        </div>
                                    </div>
                                @endif

                                @if(optional($brevet->detail)->materi_pelatihan)
                                    <div class="content-block">
                                        <div class="content-label">
                                            <i class="fas fa-book"></i>
                                            Materi Pelatihan
                                        </div>
                                        <div class="content-text">
                                            {!! nl2br(e(optional($brevet->detail)->materi_pelatihan)) !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="text-center text-lg-start">
                            <a href="{{ route('brevet.ab') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Daftar Brevet
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addToCart(id, type) {
    const button = event.target;
    const originalText = button.innerHTML;
    
    // Show loading state
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
    button.disabled = true;

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
                title: 'Pendaftaran Berhasil!',
                text: data.message,
                timer: 1500,
                showConfirmButton: false,
                background: '#fff',
                iconColor: '#10b981'
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        } else {
            Swal.fire({
                icon: 'error',
<<<<<<< HEAD:resources/views/product/pelatihan/brevet_ab_show.blade.php
                title: 'Pendaftaran Gagal',
                text: data.message,
                background: '#fff',
                confirmButtonColor: '#2563eb'
=======
                title: 'Oops...',
                text: data.message
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
>>>>>>> 57a570d935c2354eaad6227ce1f0de83c30beef7:resources/views/product/pelatihan/brevetAb/brevet_ab_show.blade.php
            });
            
            // Reset button
            button.innerHTML = originalText;
            button.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: 'Silakan coba lagi nanti',
            background: '#fff',
            confirmButtonColor: '#2563eb'
        });
        
        // Reset button
        button.innerHTML = originalText;
        button.disabled = false;
    });
}

// Animation on scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all animated elements
    document.querySelectorAll('.animate-fade-in').forEach(el => {
        observer.observe(el);
    });

    // Improve mobile experience
    if (window.innerWidth <= 768) {
        // Add touch improvements
        document.querySelectorAll('.btn-primary, .btn-success, .btn-back').forEach(btn => {
            btn.style.webkitTapHighlightColor = 'transparent';
        });
    }
});
</script>
@endsection