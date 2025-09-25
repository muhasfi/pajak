@extends('layouts.master')

@section('title', 'Katalog Buku & Artikel - Paham Pajak')


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
                <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
<<<<<<< HEAD
                    <i class="fa fa-shopping-bag fa-2x" style="color:#2563eb; opacity:1;"></i>
                </a>
=======
                        <i class="fa fa-shopping-bag fa-2x"></i>
                    </a>
>>>>>>> ba349360a00ab11cd19d2be99968025aa6592a33
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="catalog-grid">
            @forelse ($items as $item)
            <div class="product-card animate-fade-in" data-category="{{ strtolower($item->category->cat_name) }}">
                <div class="product-image">
                    <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                                            ? $item->img 
                                            : asset('storage/' . $item->img) }}"
                                    width="60"
                                    class="img-fluid rounded-top"
                                    alt="Gambar {{ $item->name }}"
                                    onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';">
                    
                    <span class="product-badge 
                        @if ($item->category->cat_name == 'Book') badge-book
                        @elseif ($item->category->cat_name == 'Artikel') badge-article
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
        <div class="mt-4 d-flex justify-content-center"> {{ $items->links('pagination::bootstrap-5') }} 
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function addToCart(menuId) {
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