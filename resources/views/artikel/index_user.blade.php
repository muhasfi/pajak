@extends('layouts.master')

@section('title', 'Artikel - Paham Pajak')

@section('style')
<style>
:root {
    --primary-color: #2c5aa0;
    --secondary-color: #1e3a8a;
    --accent-color: #dc2626;
    --light-bg: #f8fafc;
    --white: #ffffff;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --gray-900: #0f172a;
    --border-radius: 8px;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

/* Reset dan Base Styles */
.artikel-page * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.artikel-page {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: var(--gray-800);
    background: var(--white);
}

.artikel-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Section */
.artikel-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: var(--white);
    padding: 40px 0;
    margin-bottom: 40px;
}

.artikel-header-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.artikel-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--white);
}

.artikel-header p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 30px;
}

/* Search Section */
.search-section {
    background: var(--white);
    padding: 20px 0;
    border-bottom: 1px solid var(--gray-200);
    margin-bottom: 30px;
}

.search-container {
    display: flex;
    gap: 12px;
    max-width: 600px;
    margin: 0 auto;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 14px 20px 14px 48px;
    border: 2px solid var(--gray-300);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: all 0.3s ease;
    background: var(--white);
}

.search-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
}

.search-input-wrapper i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-500);
}

.search-button {
    padding: 14px 28px;
    background: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: var(--border-radius);
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.search-button:hover {
    background: var(--secondary-color);
    transform: translateY(-1px);
}

/* Main Content Layout */
.artikel-main {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 60px;
}

/* Featured Articles */
.featured-section {
    margin-bottom: 40px;
}

.section-header {
    display: flex;
    justify-content: between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--gray-200);
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--gray-800);
    margin: 0;
}

.view-all {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
}

.view-all:hover {
    text-decoration: underline;
}

/* Artikel Grid */
.artikel-grid {
    display: grid;
    gap: 24px;
}

.artikel-card {
    background: var(--white);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
}

.artikel-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.artikel-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.artikel-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.artikel-card:hover .artikel-image img {
    transform: scale(1.05);
}

.artikel-content {
    padding: 20px;
}

.artikel-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
    font-size: 0.875rem;
    color: var(--gray-600);
}

.artikel-category {
    background: var(--primary-color);
    color: var(--white);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.artikel-date {
    color: var(--gray-500);
}

.artikel-title {
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 12px;
    color: var(--gray-800);
}

.artikel-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.artikel-title a:hover {
    color: var(--primary-color);
}

.artikel-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: 16px;
    font-size: 0.95rem;
}

.artikel-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: var(--gray-500);
}

.read-more {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: gap 0.3s ease;
}

.read-more:hover {
    gap: 8px;
}

/* Sidebar */
.sidebar {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.sidebar-widget {
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 24px;
    box-shadow: var(--shadow);
    border: 1px solid var(--gray-200);
}

.widget-title {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--gray-800);
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-color);
}

/* Popular Articles */
.popular-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.popular-item {
    display: flex;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--gray-200);
}

.popular-item:last-child {
    border-bottom: none;
}

.popular-rank {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    min-width: 30px;
}

.popular-content h4 {
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 4px;
}

.popular-content h4 a {
    color: var(--gray-800);
    text-decoration: none;
    transition: color 0.3s ease;
}

.popular-content h4 a:hover {
    color: var(--primary-color);
}

.popular-meta {
    font-size: 0.75rem;
    color: var(--gray-500);
}

/* Categories */
.category-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background: var(--gray-100);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--gray-700);
    transition: all 0.3s ease;
}

.category-item:hover {
    background: var(--primary-color);
    color: var(--white);
    transform: translateX(4px);
}

.category-count {
    background: var(--white);
    color: var(--gray-600);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.category-item:hover .category-count {
    background: var(--secondary-color);
    color: var(--white);
}

/* Tags */
.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tag {
    padding: 6px 12px;
    background: var(--gray-100);
    color: var(--gray-700);
    border-radius: 20px;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.tag:hover {
    background: var(--primary-color);
    color: var(--white);
}

/* Newsletter */
.newsletter-widget {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: var(--white);
    text-align: center;
}

.newsletter-widget .widget-title {
    color: var(--white);
    border-bottom-color: rgba(255, 255, 255, 0.3);
}

.newsletter-widget p {
    margin-bottom: 20px;
    opacity: 0.9;
}

.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.newsletter-input {
    padding: 12px 16px;
    border: none;
    border-radius: var(--border-radius);
    font-size: 1rem;
}

.newsletter-button {
    padding: 12px 20px;
    background: var(--accent-color);
    color: var(--white);
    border: none;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}

.newsletter-button:hover {
    background: #b91c1c;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 40px 0;
}

.pagination-item {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    border: 1px solid var(--gray-300);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--gray-700);
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-item:hover {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.pagination-item.active {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.pagination-item.disabled {
    color: var(--gray-400);
    cursor: not-allowed;
}

.pagination-item.disabled:hover {
    background: transparent;
    color: var(--gray-400);
    border-color: var(--gray-300);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: var(--gray-100);
    border-radius: var(--border-radius);
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 4rem;
    color: var(--gray-400);
    margin-bottom: 20px;
}

.empty-state h3 {
    font-size: 1.5rem;
    color: var(--gray-700);
    margin-bottom: 12px;
}

.empty-state p {
    color: var(--gray-600);
    max-width: 400px;
    margin: 0 auto;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .artikel-main {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .sidebar {
        order: -1;
    }
}

@media (max-width: 768px) {
    .artikel-header h1 {
        font-size: 2rem;
    }
    
    .artikel-header p {
        font-size: 1.1rem;
    }
    
    .search-container {
        flex-direction: column;
    }
    
    .artikel-grid {
        grid-template-columns: 1fr;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
}

@media (max-width: 480px) {
    .artikel-container {
        padding: 0 16px;
    }
    
    .artikel-header {
        padding: 30px 0;
    }
    
    .artikel-header h1 {
        font-size: 1.75rem;
    }
    
    .artikel-content {
        padding: 16px;
    }
    
    .artikel-title {
        font-size: 1.125rem;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.artikel-card {
    animation: fadeInUp 0.6s ease forwards;
}

.artikel-card:nth-child(1) { animation-delay: 0.1s; }
.artikel-card:nth-child(2) { animation-delay: 0.2s; }
.artikel-card:nth-child(3) { animation-delay: 0.3s; }
.artikel-card:nth-child(4) { animation-delay: 0.4s; }
.artikel-card:nth-child(5) { animation-delay: 0.5s; }
</style>
@endsection

@section('content')
<div class="artikel-page">
    <!-- Header Section -->
    <header class="artikel-header">
        <div class="artikel-container">
            <div class="artikel-header-content">
                <h1>Artikel Pajak & Keuangan</h1>
                <p>Update terbaru seputar perpajakan, kebijakan fiskal, dan tips keuangan dari para ahli</p>
            </div>
        </div>
    </header>

    <!-- Search Section -->
    <section class="search-section">
        <div class="artikel-container">
            <form action="{{ url()->current() }}" method="GET" class="search-container">
                <div class="search-input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" class="search-input" placeholder="Cari artikel..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
    </section>

    <!-- Main Content -->
    <main class="artikel-container">
        <div class="artikel-main">
            <!-- Artikel List -->
            <div class="artikel-content">
                @if($artikels->count())
                    <!-- Featured Articles -->
                    <section class="featured-section">
                        <div class="section-header">
                            <h2 class="section-title">Artikel Terbaru</h2>
                            <a href="#" class="view-all">Lihat Semua</a>
                        </div>
                        
                        <div class="artikel-grid">
                            @foreach ($artikels as $artikel)
                                <article class="artikel-card">
                                    @if($artikel->thumbnail)
                                        <div class="artikel-image">
                                            <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="{{ $artikel->title }}">
                                        </div>
                                    @endif
                                    <div class="artikel-content">
                                        <div class="artikel-meta">
                                            @if($artikel->category)
                                                <span class="artikel-category">{{ $artikel->category->name }}</span>
                                            @endif
                                            <span class="artikel-date">{{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}</span>
                                        </div>
                                        <h3 class="artikel-title">
                                            <a href="{{ route('artikel.user.show', $artikel->slug) }}">
                                                {{ $artikel->title }}
                                            </a>
                                        </h3>
                                        <p class="artikel-excerpt">{{ Str::limit($artikel->excerpt, 150) }}</p>
                                        <div class="artikel-footer">
                                            <span class="read-time">{{ rand(3, 8) }} min read</span>
                                            <a href="{{ route('artikel.user.show', $artikel->slug) }}" class="read-more">
                                                Baca Selengkapnya
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <!-- Pagination -->
                    @if($artikels->hasPages())
                        <div class="pagination">
                            {{-- Previous Page --}}
                            @if ($artikels->onFirstPage())
                                <span class="pagination-item disabled">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $artikels->previousPageUrl() }}" class="pagination-item">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            {{-- Pagination Numbers --}}
                            @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                                @if ($page == $artikels->currentPage())
                                    <span class="pagination-item active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="pagination-item">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page --}}
                            @if ($artikels->hasMorePages())
                                <a href="{{ $artikels->nextPageUrl() }}" class="pagination-item">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="pagination-item disabled">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>Tidak ada artikel tersedia</h3>
                        <p>
                            @if(request('search'))
                                Hasil pencarian untuk "{{ request('search') }}" tidak ditemukan.
                            @else
                                Silakan kembali lagi nanti untuk membaca artikel terbaru.
                            @endif
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Popular Articles -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Populer</h3>
                    <div class="popular-list">
                        @for($i = 1; $i <= 5; $i++)
                            <div class="popular-item">
                                <div class="popular-rank">{{ $i }}</div>
                                <div class="popular-content">
                                    <h4>
                                        <a href="#">Cara Mudah Lapor SPT Tahunan 2024</a>
                                    </h4>
                                    <div class="popular-meta">1.2K views • 2 days ago</div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Categories -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Kategori</h3>
                    <div class="category-list">
                        <a href="#" class="category-item">
                            <span>Berita Pajak</span>
                            <span class="category-count">24</span>
                        </a>
                        <a href="#" class="category-item">
                            <span>Tips Keuangan</span>
                            <span class="category-count">18</span>
                        </a>
                        <a href="#" class="category-item">
                            <span>Kebijakan Fiskal</span>
                            <span class="category-count">12</span>
                        </a>
                        <a href="#" class="category-item">
                            <span>PPN & PPh</span>
                            <span class="category-count">32</span>
                        </a>
                        <a href="#" class="category-item">
                            <span>UMKM</span>
                            <span class="category-count">15</span>
                        </a>
                    </div>
                </div>

                <!-- Tags -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Tags</h3>
                    <div class="tags-container">
                        <a href="#" class="tag">#SPT</a>
                        <a href="#" class="tag">#PPN</a>
                        <a href="#" class="tag">#PPh</a>
                        <a href="#" class="tag">#UMKM</a>
                        <a href="#" class="tag">#E-Filing</a>
                        <a href="#" class="tag">#Tax Amnesty</a>
                        <a href="#" class="tag">#Keuangan</a>
                        <a href="#" class="tag">#Investasi</a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="sidebar-widget newsletter-widget">
                    <h3 class="widget-title">Newsletter</h3>
                    <p>Dapatkan update terbaru seputar perpajakan langsung di email Anda</p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Masukkan email Anda" required>
                        <button type="submit" class="newsletter-button">
                            <i class="fas fa-paper-plane"></i> Berlangganan
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search form enhancement
    const searchForm = document.querySelector('.search-container');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const button = this.querySelector('.search-button');
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = originalHTML;
                button.disabled = false;
            }, 2000);
        });
    }

    // Newsletter subscription
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('.newsletter-button');
            const originalHTML = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check"></i> Terdaftar!';
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.disabled = false;
                    this.reset();
                }, 2000);
            }, 1500);
        });
    }

    // Smooth scrolling for pagination
    document.querySelectorAll('.pagination-item').forEach(item => {
        item.addEventListener('click', function(e) {
            if (!this.classList.contains('disabled') && !this.classList.contains('active')) {
                e.preventDefault();
                const href = this.getAttribute('href');
                if (href) {
                    window.location.href = href;
                }
            }
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe artikel cards
    document.querySelectorAll('.artikel-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endpush