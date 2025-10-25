@extends('layouts.master')
@section('title', $paper->name)

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
    .product-detail-section {
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

    .product-main-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .product-image-container {
        position: relative;
        height: 280px;
        overflow: hidden;
        background: var(--light-gray);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }

    .product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        border-radius: var(--radius);
    }

    .product-badge {
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
        box-shadow: var(--shadow-sm);
    }

    .product-info {
        padding: 1.5rem;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 1rem;
        line-height: 1.3;
        word-wrap: break-word;
    }

    .product-meta {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.25rem;
        padding-bottom: 1.25rem;
        border-bottom: 1px solid var(--light-gray);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--secondary);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .meta-item i {
        color: var(--primary);
        font-size: 1rem;
        width: 16px;
    }

    .price-section {
        background: var(--light);
        padding: 1.25rem;
        border-radius: var(--radius);
        margin-bottom: 1.5rem;
    }

    .price-label {
        font-size: 0.8rem;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .product-price {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0;
        line-height: 1.2;
    }

    .price-note {
        font-size: 0.8rem;
        color: var(--secondary);
        margin-top: 0.5rem;
        line-height: 1.4;
    }

    .kebutuhan-section {
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary);
        font-size: 1rem;
        width: 16px;
    }

    .kebutuhan-badge {
        display: inline-block;
        background: var(--gradient-primary);
        color: var(--white);
        padding: 0.5rem 1rem;
        border-radius: var(--radius);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .description-section {
        margin-bottom: 2rem;
        flex-grow: 1;
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

    .icon-neutral {
        background: var(--secondary);
        color: var(--white);
    }

    .description-text {
        color: var(--dark-gray);
        line-height: 1.5;
        flex: 1;
        font-size: 0.9rem;
        word-wrap: break-word;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
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
        text-decoration: none;
        font-size: 0.95rem;
        width: 100%;
        min-height: 44px;
    }

    .btn-primary {
        background: var(--primary);
        color: var(--white);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
    }

    .btn-success {
        background: var(--success);
        color: var(--white);
    }

    .btn-success:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
    }

    .features-section {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.25rem;
        margin-top: 1.25rem;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem;
        background: var(--light);
        border-radius: var(--radius);
        transition: var(--transition);
    }

    .feature-item:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .feature-icon {
        width: 44px;
        height: 44px;
        border-radius: var(--radius);
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .feature-content h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.375rem;
    }

    .feature-content p {
        color: var(--dark-gray);
        margin: 0;
        line-height: 1.5;
        font-size: 0.9rem;
    }

    /* Animations */
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

    /* Tablet Styles (768px and up) */
    @media (min-width: 768px) {
        .product-detail-section {
            padding: 2rem 0;
        }

        .product-image-container {
            height: 350px;
            padding: 2rem;
        }

        .product-info {
            padding: 2rem;
        }

        .product-title {
            font-size: 1.75rem;
        }

        .product-meta {
            flex-direction: row;
            gap: 1.5rem;
        }

        .product-price {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.2rem;
        }

        .action-buttons {
            flex-direction: row;
            gap: 1rem;
        }

        .btn-primary, .btn-success {
            width: auto;
            flex: 1;
        }

        .features-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .features-section {
            padding: 2rem;
        }
    }

    /* Desktop Styles (992px and up) */
    @media (min-width: 992px) {
        .product-detail-section {
            padding: 3rem 0;
        }

        .product-image-container {
            height: 400px;
        }

        .product-info {
            padding: 2.5rem;
        }

        .product-title {
            font-size: 2rem;
        }

        .product-price {
            font-size: 2.2rem;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .features-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .feature-item {
            padding: 1.5rem;
        }
    }

    /* Large Desktop Styles (1200px and up) */
    @media (min-width: 1200px) {
        .product-image-container {
            height: 450px;
        }

        .product-title {
            font-size: 2.2rem;
        }

        .product-price {
            font-size: 2.5rem;
        }
    }

    /* Small Mobile Styles (480px and down) */
    @media (max-width: 480px) {
        .product-detail-section {
            padding: 0.75rem 0;
        }

        .product-image-container {
            height: 240px;
            padding: 1rem;
        }

        .product-badge {
            top: 0.75rem;
            left: 0.75rem;
            padding: 0.4rem 0.8rem;
            font-size: 0.7rem;
        }

        .product-info {
            padding: 1.25rem;
        }

        .product-title {
            font-size: 1.3rem;
        }

        .product-price {
            font-size: 1.5rem;
        }

        .price-section {
            padding: 1rem;
        }

        .features-section {
            padding: 1.25rem;
        }

        .feature-item {
            padding: 0.875rem;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }

    /* Extra Small Mobile Styles (360px and down) */
    @media (max-width: 360px) {
        .product-image-container {
            height: 200px;
        }

        .product-info {
            padding: 1rem;
        }

        .product-title {
            font-size: 1.2rem;
        }

        .product-price {
            font-size: 1.3rem;
        }

        .section-title {
            font-size: 1rem;
        }

        .features-grid {
            gap: 1rem;
        }

        .feature-item {
            padding: 0.75rem;
            gap: 0.75rem;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
        }

        .description-item {
            padding: 0.625rem 0;
            gap: 0.625rem;
        }

        .description-icon {
            width: 18px;
            height: 18px;
        }
    }

    /* Utility Classes */
    .text-wrap-balance {
        text-wrap: balance;
    }

    .img-responsive {
        max-width: 100%;
        height: auto;
    }

    /* Improve touch targets for mobile */
    @media (max-width: 768px) {
        .btn-primary, .btn-success {
            min-height: 44px;
        }

        .feature-item, .description-item {
            min-height: 44px;
        }
    }

    /* Prevent horizontal scroll */
    .container {
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Smooth scrolling for better UX */
    html {
        scroll-behavior: smooth;
    }

    /* Hover effects only on devices that support hover */
    @media (hover: hover) {
        .description-item:hover {
            background: var(--light);
            margin: 0 -1rem;
            padding: 0.75rem 1rem;
            border-radius: var(--radius);
        }
    }

    /* Touch device optimizations */
    @media (pointer: coarse) {
        .btn-primary, .btn-success {
            transform: none;
        }
        
        .btn-primary:active, .btn-success:active {
            transform: scale(0.98);
        }
    }
</style>
@endsection

@section('content')
<section class="product-detail-section">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('paper') }}">Dokumen & Formulir</a></li> --}}
                <li class="breadcrumb-item active">{{ Str::limit($paper->name, 25) }}</li>
            </ol>
        </nav>

        <!-- Main Product Card -->
        <div class="product-main-card animate-fade-in">
            <div class="row g-0">
                <!-- Product Image -->
                <div class="col-12 col-lg-6">
                    <div class="product-image-container">
                        @if($paper->img)
                            <img src="{{ asset('storage/' . $paper->img) }}" 
                                 alt="{{ $paper->name }}" 
                                 class="product-image img-responsive">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" 
                                 alt="No Image" 
                                 class="product-image img-responsive">
                        @endif
                        <div class="product-badge">
                            {{ $paper->categoryPaper->name ?? 'Dokumen' }}
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-12 col-lg-6">
                    <div class="product-info">
                        <h1 class="product-title text-wrap-balance">{{ $paper->name }}</h1>
                        
                        <div class="product-meta">
                            <div class="meta-item">
                                <i class="fas fa-tags"></i>
                                <span>Kategori: {{ $paper->categoryPaper->name ?? '-' }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-file-alt"></i>
                                <span>Format: PDF/Document</span>
                            </div>
                        </div>

                        <!-- Price Section -->
                        <div class="price-section">
                            <div class="price-label">Harga Mulai Dari</div>
                            <div class="product-price">Rp {{ number_format($paper->price, 0, ',', '.') }}</div>
                            <div class="price-note">* Harga dapat bervariasi tergantung kompleksitas</div>
                        </div>

                        <!-- Kebutuhan Section -->
                        @if($paper->kebutuhan)
                            <div class="kebutuhan-section">
                                <h3 class="section-title">
                                    <i class="fas fa-bullseye"></i>
                                    Untuk Kebutuhan
                                </h3>
                                <div class="kebutuhan-badge">
                                    {{ $paper->kebutuhan }}
                                </div>
                            </div>
                        @endif

                        <!-- Description Section -->
                        <div class="description-section">
                            <h3 class="section-title">
                                <i class="fas fa-list-ul"></i>
                                Fitur & Keunggulan
                            </h3>
                            <ul class="description-list">
                                @foreach(explode("\n", $paper->description) as $desc)
                                    @php $trimmed = trim($desc); @endphp
                                    @if($trimmed !== '')
                                        <li class="description-item">
                                            @if(str_starts_with($trimmed, '-'))
                                                <div class="description-icon icon-danger">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            @elseif(str_starts_with($trimmed, '+'))
                                                <div class="description-icon icon-success">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            @else
                                                <div class="description-icon icon-neutral">
                                                    <i class="fas fa-circle"></i>
                                                </div>
                                            @endif
                                            <div class="description-text">
                                                {{ ltrim($trimmed, '-+') }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <button type="button" 
                                    class="btn btn-primary"
                                    onclick="addToCart({{ $paper->id }}, 'ItemPaper')">
                                <i class="fas fa-shopping-cart"></i>
                                Tambahkan ke Keranjang
                            </button>

                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($paper->name) }}" 
                               class="btn btn-success"
                               target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                Konsultasi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features-section animate-fade-in">
            <h3 class="section-title">
                <i class="fas fa-star"></i>
                Mengapa Memilih Dokumen Kami?
            </h3>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Legal & Terupdate</h4>
                        <p>Dokumen disesuaikan dengan regulasi terbaru dan standar hukum yang berlaku</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Dapat Diedit</h4>
                        <p>Format dokumen mudah diedit dan disesuaikan dengan kebutuhan spesifik Anda</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Proses Cepat</h4>
                        <p>Dapatkan dokumen Anda secara instan setelah pembayaran dikonfirmasi</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Dukungan Profesional</h4>
                        <p>Tim ahli siap membantu Anda memahami dan menggunakan dokumen dengan benar</p>
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
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menambahkan...';
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
                title: 'Berhasil!',
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
                title: 'Oops...',
                text: data.message,
                background: '#fff',
                confirmButtonColor: '#2563eb'
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
        document.querySelectorAll('.btn-primary, .btn-success').forEach(btn => {
            btn.style.webkitTapHighlightColor = 'transparent';
        });
    }

    // Handle touch devices differently
    if ('ontouchstart' in window || navigator.maxTouchPoints) {
        // Add touch-specific optimizations
        document.addEventListener('touchstart', function() {}, {passive: true});
    }
});
</script>
@endsection