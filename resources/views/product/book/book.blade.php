@extends('layouts.master')

@section('title', 'Katalog Buku & Artikel - Paham Pajak')

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
        --gradient-secondary: linear-gradient(135deg, #64748b 0%, #475569 100%);
        --gradient-accent: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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
        --transition-slow: all 0.5s ease;
    }

    /* ===== HERO SECTION ===== */
    .catalog-hero {
        background: var(--gradient-primary);
        color: var(--white);
        padding: 5rem 0 3rem;
        position: relative;
        overflow: hidden;
    }

    .catalog-hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .catalog-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .catalog-hero-content h1 {
        font-size: clamp(2.2rem, 5vw, 3.2rem);
        font-weight: 800;
        margin-bottom: 1.2rem;
        color: var(--white);
        line-height: 1.2;
    }

    .catalog-hero-content p {
        font-size: clamp(1rem, 2.5vw, 1.3rem);
        opacity: 0.9;
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .search-container {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 1.2rem 1.8rem;
        border-radius: 50px;
        border: none;
        font-size: 1.1rem;
        box-shadow: var(--shadow-lg);
        transition: var(--transition);
        background: rgba(255, 255, 255, 0.95);
    }

    .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
        background: var(--white);
    }

    .search-button {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: 50px;
        padding: 0.8rem 1.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-button:hover {
        background: var(--primary-dark);
        transform: translateY(-50%) scale(1.03);
    }

    /* ===== CATALOG GRID ===== */
    .catalog-section {
        padding: 3rem 0;
    }

    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .product-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-xl);
    }

    .product-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition-slow);
    }

    .product-card:hover .product-image img {
        transform: scale(1.08);
    }

    .product-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }

    .badge-book {
        background: var(--accent);
        color: var(--white);
    }

    .badge-article {
        background: var(--primary);
        color: var(--white);
    }

    .badge-other {
        background: var(--success);
        color: var(--white);
    }

    .product-content {
        padding: 1.8rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.8rem;
        color: var(--dark);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-description {
        margin-bottom: 1.5rem;
        line-height: 1.6;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: var(--dark-gray);
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        color: var(--secondary);
    }

    .product-type {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
    }

    .add-to-cart-btn {
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: var(--radius);
        padding: 0.8rem 1.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .add-to-cart-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        grid-column: 1 / -1;
    }

    .empty-state i {
        font-size: 4.5rem;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.6rem;
        color: var(--secondary);
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #94a3b8;
        max-width: 500px;
        margin: 0 auto 2rem;
    }

    .empty-state-btn {
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: 50px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .empty-state-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* ===== LOADING OVERLAY ===== */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
    }

    .loading-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .spinner {
        width: 60px;
        height: 60px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid var(--primary);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* ===== PAGINATION ===== */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .custom-pagination .page-link {
        border: none;
        color: var(--dark);
        padding: 0.7rem 1.2rem;
        margin: 0 0.2rem;
        border-radius: var(--radius);
        transition: var(--transition);
    }

    .custom-pagination .page-link:hover {
        background: var(--light-gray);
        color: var(--primary);
    }

    .custom-pagination .page-item.active .page-link {
        background: var(--primary);
        color: var(--white);
    }

    /* ===== ANIMATIONS ===== */
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
        opacity: 0;
    }

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 992px) {
        .catalog-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .catalog-hero {
            padding: 4rem 0 2.5rem;
        }

        .filter-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-buttons {
            width: 100%;
            justify-content: center;
        }

        .sort-dropdown {
            width: 100%;
        }

        .sort-button {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .catalog-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .product-footer {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .add-to-cart-btn {
            width: 100%;
            justify-content: center;
        }

        .search-button span {
            display: none;
        }

        .search-button {
            padding: 0.8rem;
        }

        .search-button i {
            margin: 0;
        }
    }

    @media (max-width: 480px) {
        .catalog-hero-content h1 {
            font-size: 1.8rem;
        }

        .filter-buttons {
            gap: 0.5rem;
        }

        .filter-button {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <!-- Hero Section -->
    <section class="catalog-hero">
        <div class="container">
            <div class="catalog-hero-content">
                <h1>Katalog Buku & Artikel Pajak</h1>
                <p>Temukan sumber pengetahuan perpajakan terbaik untuk mengembangkan bisnis dan keahlian Anda</p>

                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Cari buku atau artikel...">
                    <button class="search-button">
                        <i class="fas fa-search"></i>
                        <span>Cari</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Catalog Section -->
    <section class="catalog-section">
        <div class="container">
            <!-- Products Grid -->
            <div class="catalog-grid">
                @forelse($items as $index => $item)
                    @php
                        $type = $item->type ?? 'other';
                        $badgeClass = 'badge-' . $type;
                        $delayClass = $index % 3 == 1 ? 'delay-100' : ($index % 3 == 2 ? 'delay-200' : '');
                    @endphp

<<<<<<< HEAD
                    <div class="product-card animate-fade-in {{ $delayClass }}" data-category="{{ $type }}">
                        <div class="product-image">
                            <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                                ? $item->img 
                                : asset('storage/' . $item->img) }}"
                                alt="Gambar {{ $item->name }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/default-book.jpg') }}';">
                            <div class="product-badge {{ $badgeClass }}">
                                {{ ucfirst($type) }}
                            </div>
                        </div>

                        <div class="product-content">
                            <h3 class="product-title">{{ $item->name }}</h3>
                            <p class="product-description">{{ Str::limit($item->description, 120) }}</p>

                            <div class="product-meta">
                                <div class="product-type">
                                    @if($type == 'book')
                                        <i class="far fa-file-alt"></i>
                                        <span>Buku Fisik</span>
                                    @elseif($type == 'article')
                                        <i class="far fa-newspaper"></i>
                                        <span>Artikel Digital</span>
                                    @else
                                        <i class="fas fa-tablet-alt"></i>
                                        <span>E-Book</span>
                                    @endif
                                </div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <span>{{ $item->rating ?? '4.5' }}</span>
                                </div>
                            </div>

                            <div class="product-footer">
                                <div class="product-price">{{ 'Rp' . number_format($item->price, 0, ',', '.') }}</div>
                                <a href="{{ route('product.book.show', $item->id) }}" class="add-to-cart-btn">
                                    <i class="fas fa-eye"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
=======
<!-- Catalog Section -->
<section class="section">
    <div class="container">
        <!-- Products Grid -->
        <div class="catalog-grid">
            @forelse ($items as $item)
            <div class="product-card animate-fade-in">
                <div class="product-image">
                    <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                            ? $item->img 
                            : asset('storage/' . $item->img) }}"
                    width="60"
                    class="img-fluid rounded-top"
                    alt="Gambar {{ $item->name }}"
                    onerror="this.onerror=null;this.src='{{ asset('No_image_available.webp') }}';">  
                </div>
                
                <div class="product-content">
                    <h3 class="product-title">{{ $item->name }}</h3>
                    <p class="product-description">{{ $item->description }}</p>
                    
                    <div class="product-footer">
                        <div class="product-price">{{ 'Rp'. number_format($item->price, 0, ',','.') }}</div>
                       <a href="{{ route('product.book.show', $item->id) }}" class="add-to-cart-btn">
                            <i class="fas fa-info-circle me-1"></i> Lihat Detail
                        </a>
>>>>>>> 57a570d935c2354eaad6227ce1f0de83c30beef7
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-book-open"></i>
                        <h3>Belum ada buku atau artikel tersedia</h3>
                        <p>Silakan kembali lagi nanti untuk menemukan sumber pengetahuan perpajakan terbaru</p>
                        <button class="empty-state-btn" onclick="window.location.reload()">
                            <i class="fas fa-redo"></i> Muat Ulang
                        </button>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($items->count() > 0)
                <div class="pagination-container">
                    <nav aria-label="Page navigation">
                        <ul class="pagination custom-pagination">
                            {{-- Previous Page Link --}}
                            @if($items->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach(range(1, $items->lastPage()) as $i)
                                @if($i == $items->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if($items->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $items->nextPageUrl() }}">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadingOverlay = document.getElementById('loadingOverlay');
        
        // Show loading
        loadingOverlay.classList.add('active');
        
        // Hide loading after content load
        window.addEventListener('load', () => {
            setTimeout(() => {
                loadingOverlay.classList.remove('active');
            }, 500);
        });

        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-button');
        const productCards = document.querySelectorAll('.product-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');
                
                const filterValue = button.getAttribute('data-filter');
                
                // Filter products
                productCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    
                    if (filterValue === 'all' || category === filterValue) {
                        card.style.display = 'flex';
                        card.classList.add('animate-fade-in');
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
        
        // Search functionality
        const searchInput = document.querySelector('.search-input');
        const searchButton = document.querySelector('.search-button');
        
        const performSearch = () => {
            const searchTerm = searchInput.value.toLowerCase().trim();
            
            productCards.forEach(card => {
                const title = card.querySelector('.product-title').textContent.toLowerCase();
                const description = card.querySelector('.product-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'flex';
                    card.classList.add('animate-fade-in');
                } else {
                    card.style.display = 'none';
                }
            });
        };
        
        searchButton.addEventListener('click', performSearch);
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') performSearch();
        });

        // Animation on scroll
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
        
        // Observe all product cards
        productCards.forEach(card => {
            observer.observe(card);
        });

        // Add loading state to detail buttons
        const detailButtons = document.querySelectorAll('.add-to-cart-btn');
        detailButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            });
        });
    });
</script>
@endsection