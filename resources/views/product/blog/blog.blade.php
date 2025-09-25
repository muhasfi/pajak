@extends('layouts.master')

@section('title', 'Blog Pajak - Paham Pajak')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/customer/css/blog.css') }}">
@endsection

@section('content')
<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
</div>

<!-- Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content">
            <h1>Blog Pajak & Keuangan</h1>
            <p>Temukan artikel, tips, dan panduan terbaru seputar perpajakan untuk mengembangkan bisnis dan keahlian Anda</p>
            
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Cari artikel atau topik...">
                <button class="search-button">
                    <i class="fas fa-search me-2"></i> Cari
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="section">
    <div class="container">
        <!-- Filters -->
        <div class="blog-filters">
            <h3 class="filter-title">Filter berdasarkan Kategori:</h3>
            <div class="filter-buttons">
                <button class="filter-button active" data-filter="all">Semua</button>
                <button class="filter-button" data-filter="pajak-penghasilan">Pajak Penghasilan</button>
                <button class="filter-button" data-filter="pajak-pertambahan-nilai">PPN</button>
                <button class="filter-button" data-filter="pajak-daerah">Pajak Daerah</button>
                <button class="filter-button" data-filter="tips-keuangan">Tips Keuangan</button>
                <button class="filter-button" data-filter="berita-pajak">Berita Pajak</button>
            </div>
        </div>
        
        <!-- Featured Post -->
        <div class="featured-post mb-5">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="featured-post-image">
                        <img src="{{ asset('img/blog/featured-post.jpg') }}" alt="Featured Post" class="img-fluid rounded-3">
                        <span class="post-badge">Featured</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="featured-post-content">
                        <span class="post-category">Pajak Penghasilan</span>
                        <h2 class="post-title">Perubahan Terbaru Tarif PPh 21 Tahun 2024: Apa yang Perlu Anda Ketahui?</h2>
                        <p class="post-excerpt">Pemerintah telah mengeluarkan regulasi terbaru mengenai tarif PPh 21. Simak penjelasan lengkap tentang perubahan tarif, cara penghitungan, dan dampaknya bagi wajib pajak.</p>
                        <div class="post-meta">
                            <div class="author-info">
                                <img src="{{ asset('img/blog/author.jpg') }}" alt="Author" class="author-avatar">
                                <span class="author-name">Dr. Ahmad Fauzi</span>
                            </div>
                            <span class="post-date">15 Maret 2024</span>
                        </div>
                        <a href="#" class="read-more-btn">Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Blog Posts Grid -->
        <div class="blog-grid">
            @forelse ($posts as $post)
            <div class="blog-card animate-fade-in" data-category="{{ strtolower($post->category->slug) }}">
                <div class="blog-image">
                    <img 
                        src="{{ asset('img/blog/'. $post->image) }}" 
                        class="img-fluid"
                        alt="{{ $post->title }}"
                        onerror="this.onerror=null;this.src='{{ asset('img/blog/default.jpg') }}';">
                    
                    <span class="post-badge">
                        {{ $post->category->name }}
                    </span>
                </div>
                
                <div class="blog-content">
                    <h3 class="blog-title">{{ $post->title }}</h3>
                    <p class="blog-excerpt">{{ Str::limit($post->excerpt, 150) }}</p>
                    
                    <div class="blog-footer">
                        <div class="post-meta-small">
                            <span class="post-date">{{ $post->created_at->format('d M Y') }}</span>
                            <span class="read-time">{{ $post->read_time }} min read</span>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more-link">
                            Baca <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-newspaper"></i>
                <h3>Belum ada artikel tersedia</h3>
                <p>Silakan kembali lagi nanti untuk menemukan artikel terbaru seputar perpajakan</p>
            </div>
            @endforelse
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="load-more-btn" id="loadMore">
                <i class="fas fa-plus-circle me-2"></i> Muat Lebih Banyak Artikel
            </button>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-button');
        const blogCards = document.querySelectorAll('.blog-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');
                
                // Get filter value
                const filterValue = button.getAttribute('data-filter');
                
                // Filter blog posts
                blogCards.forEach(card => {
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
            
            blogCards.forEach(card => {
                const title = card.querySelector('.blog-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.blog-excerpt').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
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
        
        // Load more functionality
        const loadMoreBtn = document.getElementById('loadMore');
        let currentItems = 6; // Assuming initial load shows 6 items
        
        loadMoreBtn.addEventListener('click', () => {
            // In a real application, this would fetch more data from the server
            // For demonstration, we'll just show more existing items
            const hiddenItems = Array.from(blogCards).filter(card => 
                card.style.display === 'none' || card.style.display === ''
            ).slice(0, 3); // Show 3 more items
            
            if (hiddenItems.length > 0) {
                hiddenItems.forEach(item => {
                    item.style.display = 'flex';
                    item.classList.add('animate-fade-in');
                });
                
                // Hide button if no more items to show
                const remainingHidden = Array.from(blogCards).filter(card => 
                    card.style.display === 'none'
                ).length;
                
                if (remainingHidden === 0) {
                    loadMoreBtn.style.display = 'none';
                }
            } else {
                loadMoreBtn.style.display = 'none';
            }
        });
    });
</script>
@endsection