@extends('layouts.master')
@section('title', $item->name)

@section('style')
<style>
    :root {
        --primary: #2563eb;
        --primary-light: #3b82f6;
        --primary-dark: #1d4ed8;
        --secondary: #64748b;
        --accent: #f59e0b;
        --light: #f8fafc;
        --light-gray: #f1f5f9;
        --dark: #1e293b;
        --dark-gray: #475569;
        --success: #10b981;
        --danger: #ef4444;
        --white: #ffffff;
        
        --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        --gradient-light: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        
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

    .product-detail-card {
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
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 1.5rem;
        transition: var(--transition);
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
        background: var(--accent);
        color: var(--white);
        z-index: 2;
        box-shadow: var(--shadow-sm);
    }

    .product-info {
        padding: 1.5rem;
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

    .product-rating, .product-type {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .product-rating {
        color: var(--accent);
        font-weight: 600;
    }

    .product-type {
        color: var(--secondary);
        font-weight: 500;
    }

    .product-price-section {
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

    .product-description-section {
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.875rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: var(--primary);
        border-radius: 2px;
    }

    .product-description {
        color: var(--dark-gray);
        line-height: 1.6;
        font-size: 0.95rem;
        white-space: pre-line;
        word-wrap: break-word;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .btn-primary, .btn-outline {
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

    .btn-outline {
        background: transparent;
        border: 2px solid var(--light-gray);
        color: var(--secondary);
    }

    .btn-outline:hover {
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .product-features {
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

    .related-products {
        margin-top: 2.5rem;
    }

    .related-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .related-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }

    .related-card {
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: var(--transition);
    }

    .related-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .related-image {
        height: 160px;
        overflow: hidden;
    }

    .related-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .related-card:hover .related-image img {
        transform: scale(1.05);
    }

    .related-content {
        padding: 1.25rem;
    }

    .related-content h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
    }

    .related-price {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .view-detail-btn {
        width: 100%;
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: var(--radius);
        padding: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: var(--transition);
        font-size: 0.9rem;
        min-height: 44px;
    }

    .view-detail-btn:hover {
        background: var(--primary-dark);
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

        .action-buttons {
            flex-direction: row;
            gap: 1rem;
        }

        .btn-primary, .btn-outline {
            width: auto;
            flex: 1;
        }

        .features-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .related-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .related-image {
            height: 180px;
        }

        .product-features {
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

        .related-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .related-image {
            height: 200px;
        }

        .related-title {
            font-size: 1.8rem;
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

        .product-image {
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

        .product-features {
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

        .related-content {
            padding: 1rem;
        }

        .related-image {
            height: 140px;
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
            font-size: 1.1rem;
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

        .related-grid {
            gap: 1rem;
        }

        .related-image {
            height: 120px;
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
        .btn-primary, .btn-outline, .view-detail-btn {
            min-height: 44px;
        }

        .feature-item, .related-card {
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
</style>
@endsection

@section('content')
<section class="product-detail-section">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('book') }}" class="text-decoration-none">Katalog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($item->name, 25) }}</li>
            </ol>
        </nav>

        <!-- Main Product Detail -->
        <div class="product-detail-card animate-fade-in">
            <div class="row g-0">
                <!-- Product Image -->
                <div class="col-12 col-lg-6">
                    <div class="product-image-container">
                        <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                            ? $item->img 
                            : asset('storage/' . $item->img) }}"
                            class="product-image img-responsive"
                            alt="{{ $item->name }}"
                            onerror="this.onerror=null;this.src='{{ asset('No_image_available.webp') }}';">
                        <div class="product-badge">
                            {{ $item->type ?? 'Produk' }}
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-12 col-lg-6">
                    <div class="product-info">
                        <h1 class="product-title text-wrap-balance">{{ $item->name }}</h1>
                        
                        <div class="product-meta">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>4.8 (128 reviews)</span>
                            </div>
                            <div class="product-type">
                                <i class="fas fa-tag"></i>
                                <span>{{ $item->category ?? 'Umum' }}</span>
                            </div>
                        </div>

                        <div class="product-price-section">
                            <div class="price-label">Harga</div>
                            <div class="product-price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        </div>

                        @if($item->description)
                            <div class="product-description-section">
                                <h3 class="section-title">Deskripsi Produk</h3>
                                <div class="product-description">
                                    {{ $item->description }}
                                </div>
                            </div>
                        @endif

                        <div class="action-buttons">
                            <button type="button" class="btn btn-primary" 
                                    onclick="addToCart({{ $item->id }}, 'Item')">
                                <i class="fas fa-shopping-cart"></i>
                                Tambah ke Keranjang
                            </button>

                            <a href="{{ url()->previous() }}" class="btn btn-outline">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Features -->
        <div class="product-features animate-fade-in">
            <h3 class="section-title">Keunggulan Produk</h3>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Konten Terpercaya</h4>
                        <p>Ditulis oleh ahli perpajakan bersertifikat dengan pengalaman praktis</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Update Terkini</h4>
                        <p>Mengikuti regulasi perpajakan terbaru dan perubahan undang-undang</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Mudah Dipahami</h4>
                        <p>Disajikan dengan bahasa yang jelas dan contoh kasus praktis</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Dukungan Konsultasi</h4>
                        <p>Akses konsultasi dengan tim ahli untuk pertanyaan lebih lanjut</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="related-products animate-fade-in">
                <h3 class="related-title">Produk Terkait</h3>
                <div class="related-grid">
                    @foreach($relatedProducts as $related)
                        <div class="related-card">
                            <div class="related-image">
                                <img src="{{ Str::startsWith($related->img, ['http://', 'https://']) 
                                    ? $related->img 
                                    : asset('storage/' . $related->img) }}"
                                    alt="{{ $related->name }}"
                                    class="img-responsive"
                                    onerror="this.onerror=null;this.src='{{ asset('No_image_available.webp') }}';">
                            </div>
                            <div class="related-content">
                                <h4 class="text-wrap-balance">{{ $related->name }}</h4>
                                <div class="related-price">Rp {{ number_format($related->price, 0, ',', '.') }}</div>
                                <a href="{{ route('product.book.show', $related->id) }}" class="view-detail-btn">
                                    <i class="fas fa-eye"></i>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
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
        document.querySelectorAll('.btn-primary, .btn-outline, .view-detail-btn').forEach(btn => {
            btn.style.webkitTapHighlightColor = 'transparent';
        });
    }
});
</script>
@endsection