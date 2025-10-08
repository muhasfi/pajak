@extends('layouts.master')

@section('title', $item->name . ' - Paham Pajak')

@section('content')
<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
</div>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Katalog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($item->name, 30) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail Section -->
<section class="product-detail-section section-padding">
    <div class="container">
        <div class="product-detail-grid">
            <!-- Product Images -->
            <div class="product-images">
                <div class="main-image">
                    <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                                ? $item->img 
                                : asset('storage/' . $item->img) }}"
                         alt="{{ $item->name }}"
                         class="img-fluid"
                         id="mainImage"
                         onerror="this.onerror=null;this.src='{{ asset('images/default-book.png') }}';">
                </div>
                @if($item->images && count($item->images) > 0)
                <div class="image-thumbnails">
                    @foreach($item->images as $image)
                    <div class="thumbnail">
                        <img src="{{ asset('storage/' . $image) }}" 
                             alt="Thumbnail {{ $loop->iteration }}"
                             class="img-fluid"
                             onclick="changeImage(this.src)">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <div class="product-badge">
                    <span class="badge {{ $item->type === 'book' ? 'badge-book' : ($item->type === 'article' ? 'badge-article' : 'badge-other') }}">
                        {{ $item->type === 'book' ? 'Buku' : ($item->type === 'article' ? 'Artikel' : 'Lainnya') }}
                    </span>
                </div>
                
                <h1 class="product-title">{{ $item->name }}</h1>
                
                <div class="product-rating">
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $item->average_rating ? 'active' : '' }}"></i>
                        @endfor
                    </div>
                    <span class="rating-text">({{ $item->reviews_count }} ulasan)</span>
                </div>

                <div class="product-price-section">
                    <span class="current-price">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                    @if($item->original_price)
                    <span class="original-price">Rp{{ number_format($item->original_price, 0, ',', '.') }}</span>
                    <span class="discount-badge">-{{ number_format(($item->original_price - $item->price) / $item->original_price * 100, 0) }}%</span>
                    @endif
                </div>

                <div class="product-description">
                    <p>{{ $item->description }}</p>
                </div>

                <div class="product-features">
                    <div class="feature-item">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Gratis Pengiriman</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-undo-alt"></i>
                        <span>Garansi 30 Hari</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-headset"></i>
                        <span>Dukungan 24/7</span>
                    </div>
                </div>

                <div class="product-actions">
                    <div class="quantity-selector">
                        <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="quantity" value="1" min="1" max="10">
                        <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                    </div>
                    
                    <button class="btn-primary btn-add-to-cart" onclick="addToCart({{ $item->id }}, 'Item')">
                        <i class="fas fa-shopping-bag me-2"></i>
                        Tambah ke Keranjang
                    </button>
                    
                    <button class="btn-secondary btn-wishlist">
                        <i class="far fa-heart"></i>
                    </button>
                </div>

                <div class="product-meta">
                    <div class="meta-item">
                        <span class="meta-label">Kategori:</span>
                        <span class="meta-value">{{ $item->category->name ?? 'Umum' }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">ISBN:</span>
                        <span class="meta-value">{{ $item->isbn ?? 'Tersedia' }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Stok:</span>
                        <span class="meta-value {{ $item->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                            {{ $item->stock > 0 ? 'Tersedia' : 'Habis' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Tabs Section -->
<section class="product-tabs-section section-padding">
    <div class="container">
        <div class="tabs-container">
            <ul class="tabs-nav">
                <li class="tab-nav-item active" data-tab="description">Deskripsi</li>
                <li class="tab-nav-item" data-tab="specifications">Spesifikasi</li>
                <li class="tab-nav-item" data-tab="reviews">Ulasan ({{ $item->reviews_count }})</li>
            </ul>

            <div class="tabs-content">
                <!-- Description Tab -->
                <div class="tab-content active" id="description">
                    <div class="tab-content-inner">
                        <h3>Tentang Produk Ini</h3>
                        <p>{{ $item->full_description ?? $item->description }}</p>
                        
                        <div class="features-list">
                            <h4>Keunggulan Produk:</h4>
                            <ul>
                                <li>Materi lengkap dan terupdate</li>
                                <li>Ditulis oleh pakar perpajakan</li>
                                <li>Contoh kasus praktis</li>
                                <li>Bahasa mudah dipahami</li>
                                <li>Format digital dan fisik tersedia</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Specifications Tab -->
                <div class="tab-content" id="specifications">
                    <div class="tab-content-inner">
                        <h3>Spesifikasi Produk</h3>
                        <div class="specs-table">
                            <div class="spec-row">
                                <div class="spec-label">Judul</div>
                                <div class="spec-value">{{ $item->name }}</div>
                            </div>
                            <div class="spec-row">
                                <div class="spec-label">Penulis</div>
                                <div class="spec-value">{{ $item->author ?? 'Tim Paham Pajak' }}</div>
                            </div>
                            <div class="spec-row">
                                <div class="spec-label">Penerbit</div>
                                <div class="spec-value">{{ $item->publisher ?? 'Paham Pajak Publishing' }}</div>
                            </div>
                            <div class="spec-row">
                                <div class="spec-label">Tahun Terbit</div>
                                <div class="spec-value">{{ $item->published_year ?? date('Y') }}</div>
                            </div>
                            <div class="spec-row">
                                <div class="spec-label">Halaman</div>
                                <div class="spec-value">{{ $item->pages ?? '150' }} halaman</div>
                            </div>
                            <div class="spec-row">
                                <div class="spec-label">Bahasa</div>
                                <div class="spec-value">Indonesia</div>
                            </div>
                            <div class="spec-row">
                                <div class="spec-label">Format</div>
                                <div class="spec-value">Soft Cover / Digital PDF</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-content" id="reviews">
                    <div class="tab-content-inner">
                        <h3>Ulasan Pembeli</h3>
                        
                        <div class="reviews-summary">
                            <div class="overall-rating">
                                <div class="rating-score">{{ number_format($item->average_rating, 1) }}</div>
                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $item->average_rating ? 'active' : '' }}"></i>
                                    @endfor
                                </div>
                                <div class="total-reviews">{{ $item->reviews_count }} ulasan</div>
                            </div>
                            
                            <div class="rating-bars">
                                @for($i = 5; $i >= 1; $i--)
                                <div class="rating-bar">
                                    <span class="star-count">{{ $i }} bintang</span>
                                    <div class="bar-container">
                                        <div class="bar" style="width: {{ $item->getRatingPercentage($i) }}%"></div>
                                    </div>
                                    <span class="percentage">{{ $item->getRatingPercentage($i) }}%</span>
                                </div>
                                @endfor
                            </div>
                        </div>

                        <div class="reviews-list">
                            @forelse($item->reviews as $review)
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar">
                                            {{ substr($review->user->name, 0, 1) }}
                                        </div>
                                        <div class="reviewer-details">
                                            <h5>{{ $review->user->name }}</h5>
                                            <div class="review-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $review->rating ? 'active' : '' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <span class="review-date">{{ $review->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="review-content">
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                            @empty
                            <div class="empty-reviews">
                                <i class="fas fa-comment-dots"></i>
                                <p>Belum ada ulasan untuk produk ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedItems->count() > 0)
<section class="related-products-section section-padding">
    <div class="container">
        <div class="section-header">
            <h2>Produk Terkait</h2>
            <p>Temukan produk lain yang mungkin Anda sukai</p>
        </div>
        
        <div class="related-products-grid">
            @foreach($relatedItems as $relatedItem)
            <div class="related-product-card">
                <div class="product-image">
                    <img src="{{ Str::startsWith($relatedItem->img, ['http://', 'https://']) 
                                ? $relatedItem->img 
                                : asset('storage/' . $relatedItem->img) }}"
                         alt="{{ $relatedItem->name }}"
                         class="img-fluid">
                </div>
                <div class="product-content">
                    <h4>{{ Str::limit($relatedItem->name, 50) }}</h4>
                    <div class="product-price">Rp{{ number_format($relatedItem->price, 0, ',', '.') }}</div>
                    <a href="{{ route('catalog.show', $relatedItem->id) }}" class="btn-view-detail">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@section('styles')
<style>
/* Product Detail Styles */
.breadcrumb-section {
    background: #f8fafc;
    padding: 1.5rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.breadcrumb {
    margin: 0;
    font-size: 0.9rem;
}

.breadcrumb-item a {
    color: var(--primary);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: var(--secondary);
}

.section-padding {
    padding: 3rem 0;
}

.product-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
}

.product-images {
    position: sticky;
    top: 2rem;
}

.main-image {
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    margin-bottom: 1rem;
}

.main-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.image-thumbnails {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.thumbnail {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: var(--transition);
}

.thumbnail:hover,
.thumbnail.active {
    border-color: var(--primary);
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    padding: 1rem 0;
}

.product-badge {
    margin-bottom: 1rem;
}

.badge {
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-book { background: var(--accent); color: white; }
.badge-article { background: var(--primary); color: white; }
.badge-other { background: var(--success); color: white; }

.product-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.stars {
    display: flex;
    gap: 0.2rem;
}

.stars .fa-star {
    color: #cbd5e1;
    font-size: 1.1rem;
}

.stars .fa-star.active {
    color: #f59e0b;
}

.rating-text {
    color: var(--secondary);
    font-size: 0.9rem;
}

.product-price-section {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.current-price {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary);
}

.original-price {
    font-size: 1.2rem;
    color: var(--secondary);
    text-decoration: line-through;
}

.discount-badge {
    background: #ef4444;
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 700;
}

.product-description {
    margin-bottom: 2rem;
}

.product-description p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: var(--secondary);
}

.product-features {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: var(--radius);
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--secondary);
}

.feature-item i {
    color: var(--primary);
    font-size: 1.1rem;
}

.product-actions {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
    align-items: center;
}

.quantity-selector {
    display: flex;
    align-items: center;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.quantity-btn {
    background: #f8fafc;
    border: none;
    padding: 0.8rem 1rem;
    cursor: pointer;
    transition: var(--transition);
}

.quantity-btn:hover {
    background: #e2e8f0;
}

#quantity {
    width: 60px;
    border: none;
    text-align: center;
    font-weight: 600;
    background: white;
}

.btn-primary {
    background: var(--primary);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    flex: 1;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-secondary {
    background: white;
    border: 2px solid #e2e8f0;
    padding: 1rem;
    border-radius: 8px;
    cursor: pointer;
    transition: var(--transition);
}

.btn-secondary:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.product-meta {
    border-top: 1px solid #e2e8f0;
    padding-top: 1.5rem;
}

.meta-item {
    display: flex;
    justify-content: between;
    margin-bottom: 0.8rem;
}

.meta-label {
    font-weight: 600;
    color: var(--dark);
    min-width: 100px;
}

.meta-value {
    color: var(--secondary);
}

.meta-value.in-stock {
    color: var(--success);
    font-weight: 600;
}

.meta-value.out-of-stock {
    color: #ef4444;
    font-weight: 600;
}

/* Tabs Styles */
.tabs-container {
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    overflow: hidden;
}

.tabs-nav {
    display: flex;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}

.tab-nav-item {
    padding: 1.2rem 2rem;
    cursor: pointer;
    font-weight: 600;
    color: var(--secondary);
    border-bottom: 3px solid transparent;
    transition: var(--transition);
}

.tab-nav-item.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
    background: white;
}

.tabs-content {
    padding: 0;
}

.tab-content {
    display: none;
    padding: 2.5rem;
}

.tab-content.active {
    display: block;
}

.tab-content-inner h3 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: var(--dark);
}

.tab-content-inner p {
    line-height: 1.7;
    color: var(--secondary);
    margin-bottom: 1.5rem;
}

.features-list h4 {
    margin-bottom: 1rem;
    color: var(--dark);
}

.features-list ul {
    list-style: none;
    padding: 0;
}

.features-list li {
    padding: 0.5rem 0;
    padding-left: 1.5rem;
    position: relative;
    color: var(--secondary);
}

.features-list li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--success);
    font-weight: bold;
}

/* Specifications Table */
.specs-table {
    display: grid;
    gap: 0.5rem;
}

.spec-row {
    display: grid;
    grid-template-columns: 200px 1fr;
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
}

.spec-row:last-child {
    border-bottom: none;
}

.spec-label {
    font-weight: 600;
    color: var(--dark);
}

.spec-value {
    color: var(--secondary);
}

/* Reviews Styles */
.reviews-summary {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: #f8fafc;
    border-radius: var(--radius);
}

.overall-rating {
    text-align: center;
}

.rating-score {
    font-size: 3rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.rating-bars {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.rating-bar {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.star-count {
    min-width: 80px;
    font-size: 0.9rem;
    color: var(--secondary);
}

.bar-container {
    flex: 1;
    height: 8px;
    background: #e2e8f0;
    border-radius: 4px;
    overflow: hidden;
}

.bar {
    height: 100%;
    background: #f59e0b;
    transition: width 0.5s ease;
}

.percentage {
    min-width: 40px;
    font-size: 0.9rem;
    color: var(--secondary);
    text-align: right;
}

/* Review Items */
.review-item {
    padding: 2rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.review-item:last-child {
    border-bottom: none;
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: start;
    margin-bottom: 1rem;
}

.reviewer-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.reviewer-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.2rem;
}

.reviewer-details h5 {
    margin: 0 0 0.3rem 0;
    color: var(--dark);
}

.review-date {
    color: var(--secondary);
    font-size: 0.9rem;
}

.review-content p {
    margin: 0;
    line-height: 1.6;
    color: var(--secondary);
}

.empty-reviews {
    text-align: center;
    padding: 3rem;
    color: var(--secondary);
}

.empty-reviews i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #cbd5e1;
}

/* Related Products */
.related-products-section {
    background: #f8fafc;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-header h2 {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 1rem;
}

.section-header p {
    color: var(--secondary);
    font-size: 1.1rem;
}

.related-products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.related-product-card {
    background: white;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.related-product-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.related-product-card .product-image {
    height: 200px;
    overflow: hidden;
}

.related-product-card .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.related-product-card:hover .product-image img {
    transform: scale(1.05);
}

.related-product-card .product-content {
    padding: 1.5rem;
}

.related-product-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.8rem;
    color: var(--dark);
    line-height: 1.4;
}

.related-product-card .product-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--primary);
    margin-bottom: 1rem;
}

.btn-view-detail {
    display: block;
    text-align: center;
    padding: 0.8rem 1.5rem;
    background: transparent;
    border: 2px solid var(--primary);
    color: var(--primary);
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.btn-view-detail:hover {
    background: var(--primary);
    color: white;
}

/* Responsive Design */
@media (max-width: 968px) {
    .product-detail-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .product-images {
        position: static;
    }
    
    .reviews-summary {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
}

@media (max-width: 768px) {
    .product-title {
        font-size: 1.8rem;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .quantity-selector {
        width: 100%;
        justify-content: center;
    }
    
    .tabs-nav {
        flex-direction: column;
    }
    
    .spec-row {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }
    
    .product-features {
        flex-direction: column;
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .tab-content {
        padding: 1.5rem;
    }
    
    .main-image img {
        height: 300px;
    }
    
    .current-price {
        font-size: 1.5rem;
    }
}
</style>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}

function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}

function addToCart(id, type) {
    const quantity = document.getElementById('quantity').value;
    
    fetch("{{ route('cart.add', [], false) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ 
            id: id, 
            type: type,
            quantity: quantity
        }),
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

// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabNavItems = document.querySelectorAll('.tab-nav-item');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabNavItems.forEach(item => {
        item.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Remove active class from all tabs
            tabNavItems.forEach(nav => nav.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to current tab
            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
</script>
@endsection