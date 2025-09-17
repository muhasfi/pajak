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
        --dark: #1e293b;
        --success: #10b981;
        --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        --gradient-secondary: linear-gradient(135deg, #64748b 0%, #475569 100%);
        --gradient-accent: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --radius: 12px;
        --transition: all 0.3s ease;
    }

    .catalog-hero {
        background: var(--gradient-primary);
        color: white;
        padding: 4rem 0 2rem;
        position: relative;
        overflow: hidden;
    }

    .catalog-hero::before {
        content: '';
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
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: white;
    }

    .catalog-hero-content p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .search-container {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 1rem 1.5rem;
        border-radius: 50px;
        border: none;
        font-size: 1.1rem;
        box-shadow: var(--shadow-lg);
        transition: var(--transition);
    }

    .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.3);
    }

    .search-button {
        position: absolute;
        right: 8px;
        top: 8px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 0.6rem 1.2rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .search-button:hover {
        background: var(--primary-dark);
    }

    .catalog-filters {
        background: white;
        padding: 1.5rem;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .filter-title {
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--dark);
        font-size: 1.2rem;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
    }

    .filter-button {
        padding: 0.6rem 1.2rem;
        border-radius: 50px;
        border: 2px solid #e2e8f0;
        background: white;
        color: var(--secondary);
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .filter-button:hover, .filter-button.active {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .product-card {
        background: white;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .product-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-book {
        background: var(--accent);
        color: white;
    }

    .badge-article {
        background: var(--primary);
        color: white;
    }

    .badge-other {
        background: var(--success);
        color: white;
    }

    .product-content {
        padding: 1.5rem;
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
    }

    .product-description {
        color: var(--secondary);
        margin-bottom: 1.5rem;
        line-height: 1.6;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .product-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--primary);
    }

    .add-to-cart-btn {
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 0.7rem 1.5rem;
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
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        grid-column: 1 / -1;
    }

    .empty-state i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: var(--secondary);
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #94a3b8;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Loading overlay */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .loading-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid var(--primary);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .catalog-hero-content h1 {
            font-size: 2.3rem;
        }
    }

    @media (max-width: 768px) {
        .catalog-hero {
            padding: 3rem 0 2rem;
        }
        
        .catalog-hero-content h1 {
            font-size: 2rem;
        }
        
        .catalog-hero-content p {
            font-size: 1.1rem;
        }
        
        .catalog-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .catalog-hero-content h1 {
            font-size: 1.8rem;
        }
        
        .filter-buttons {
            justify-content: center;
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

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
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
                    <i class="fas fa-search me-2"></i> Cari
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Catalog Section -->
<section class="section">
    <div class="container">
        <!-- Filters -->
        <div class="catalog-filters">
            <h3 class="filter-title">Filter berdasarkan Kategori:</h3>
            <div class="filter-buttons">
                <button class="filter-button active" data-filter="all">Semua</button>
                <button class="filter-button" data-filter="book">Buku</button>
                <button class="filter-button" data-filter="artikel">Artikel</button>
                <button class="filter-button" data-filter="other">Lainnya</button>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="catalog-grid">
            @forelse ($items as $item)
            <div class="product-card animate-fade-in" data-category="{{ strtolower($item->category->cat_name) }}">
                <div class="product-image">
                    <img 
                            src="{{ asset('img_item_upload/'. $item->img) }}" 
                            class="card-img-top rounded-top-4 img-fluid object-fit-cover"
                            style="height: 250px;"
                            alt="{{ $item->name }}"
                            onerror="this.onerror=null;this.src='{{ $item->img }}';">
                    
                    <span class="product-badge 
                        @if ($item->category->cat_name == 'Book') badge-book
                        @elseif ($item->category->cat_name == 'artikel') badge-article
                        @else badge-other @endif">
                        {{ $item->category->cat_name }}
                    </span>
                </div>
                
                <div class="product-content">
                    <h3 class="product-title">{{ $item->name }}</h3>
                    <p class="product-description">{{ $item->description }}</p>
                    
                    <div class="product-footer">
                        <div class="product-price">{{ 'Rp'. number_format($item->price, 0, ',','.') }}</div>
                        <button onclick="addToCart({{ $item->id }})" class="add-to-cart-btn">
                            <i class="fas fa-shopping-bag me-1"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h3>Belum ada buku atau artikel tersedia</h3>
                <p>Silakan kembali lagi nanti untuk menemukan sumber pengetahuan perpajakan terbaru</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    function addToCart(menuId) {
        // Show loading overlay
        const loadingOverlay = document.getElementById('loadingOverlay');
        loadingOverlay.classList.add('active');
        
        fetch("{{ route('cart.add', [], false) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: menuId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Redirect to cart page after successful addition
                window.location.href = "{{ route('cart') }}";
            } else {
                // Hide loading overlay
                loadingOverlay.classList.remove('active');
                
                // Show error message
                showNotification(data.message || 'Gagal menambah ke keranjang', 'error');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            // Hide loading overlay
            loadingOverlay.classList.remove('active');
            
            // Show error message
            showNotification('Terjadi kesalahan', 'error');
        });
    }
    
    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        
        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            z-index: 10000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease-out;
            ${type === 'success' ? 'background: #10b981;' : 'background: #ef4444;'}
        `;
        
        // Add to body
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-button');
        const productCards = document.querySelectorAll('.product-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');
                
                // Get filter value
                const filterValue = button.getAttribute('data-filter');
                
                // Filter products
                productCards.forEach(card => {
                    if (filterValue === 'all') {
                        card.style.display = 'flex';
                    } else {
                        const category = card.getAttribute('data-category');
                        if (category === filterValue) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });
        
        // Search functionality
        const searchInput = document.querySelector('.search-input');
        const searchButton = document.querySelector('.search-button');
        
        const performSearch = () => {
            const searchTerm = searchInput.value.toLowerCase();
            
            productCards.forEach(card => {
                const title = card.querySelector('.product-title').textContent.toLowerCase();
                const description = card.querySelector('.product-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        };
        
        searchButton.addEventListener('click', performSearch);
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        // Add CSS for notifications
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection