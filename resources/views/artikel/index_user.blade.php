@extends('layouts.master')

@section('title', 'Artikel')

@section('content')

<!-- Hero Section -->
<section class="artikel-hero">
    <div class="container">
        <h1>Artikel Terbaru</h1>
        <p>Temukan artikel pajak, keuangan, dan tips menarik lainnya</p>

        <!-- Search Box -->
        <div class="artikel-search-container">
            <form action="{{ url()->current() }}" method="GET" class="d-flex">
                <input type="text" name="search" class="artikel-search-input" placeholder="Cari artikel..." value="{{ request('search') }}">
                <button type="submit" class="artikel-search-button">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
    </div>
</section>

<section class="artikel-section">
    <div class="container">
        <!-- Category Filter -->
        <div class="category-filter">
            <div class="filter-tabs">
                <button class="filter-tab active">Semua</button>
                <button class="filter-tab">Berita</button>
                <button class="filter-tab">Komunitas</button>
                <button class="filter-tab">Kebijakan</button>
                <button class="filter-tab">PPN</button>
                <button class="filter-tab">Tips</button>
            </div>
            <div class="filter-actions">
                <div class="sort-dropdown">
                    <select class="sort-select">
                        <option value="newest">Terbaru</option>
                        <option value="popular">Populer</option>
                        <option value="trending">Trending</option>
                    </select>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>

        @if($artikels->count())
            <div class="artikel-list">
                @foreach ($artikels as $artikel)
                    <article class="artikel-item">
                        <div class="artikel-content">
                            <div class="artikel-header">
                                @if($artikel->category)
                                    <span class="artikel-category">{{ $artikel->category->name }}</span>
                                @endif
                                <span class="artikel-bullet">•</span>
                                <span class="artikel-time">{{ \Carbon\Carbon::parse($artikel->publish_date)->diffForHumans() }}</span>
                            </div>
                            
                            <h2 class="artikel-title">
                                <a href="{{ route('artikel.user.show', $artikel->slug) }}">
                                    {{ $artikel->title }}
                                </a>
                            </h2>
                            
                            <p class="artikel-excerpt">{{ Str::limit($artikel->excerpt, 200) }}</p>
                            
                            <div class="artikel-footer">
                                <div class="artikel-meta">
                                    <span class="meta-item">
                                        <i class="far fa-eye"></i>
                                        {{ rand(100, 2000) }} dilihat
                                    </span>
                                    <span class="meta-item">
                                        <i class="far fa-clock"></i>
                                        {{ rand(3, 8) }} min read
                                    </span>
                                </div>
                                <a href="{{ route('artikel.user.show', $artikel->slug) }}" class="read-more-link">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        @if($artikel->thumbnail)
                            <div class="artikel-thumbnail">
                                <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="{{ $artikel->title }}">
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($artikels->hasPages())
                <div class="artikel-pagination">
                    <div class="pagination-content">
                        {{-- Previous Page Link --}}
                        @if ($artikels->onFirstPage())
                            <span class="pagination-arrow disabled">
                                <i class="fas fa-chevron-left"></i>
                                <span>Sebelumnya</span>
                            </span>
                        @else
                            <a href="{{ $artikels->previousPageUrl() }}" class="pagination-arrow">
                                <i class="fas fa-chevron-left"></i>
                                <span>Sebelumnya</span>
                            </a>
                        @endif

                        {{-- Pagination Numbers --}}
                        <div class="pagination-numbers">
                            @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                                @if ($page == $artikels->currentPage())
                                    <span class="pagination-number active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="pagination-number">{{ $page }}</a>
                                @endif
                            @endforeach
                        </div>

                        {{-- Next Page Link --}}
                        @if ($artikels->hasMorePages())
                            <a href="{{ $artikels->nextPageUrl() }}" class="pagination-arrow">
                                <span>Selanjutnya</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="pagination-arrow disabled">
                                <span>Selanjutnya</span>
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        @endif
                    </div>
                    
                    <div class="pagination-info">
                        Menampilkan {{ $artikels->firstItem() ?? 0 }}-{{ $artikels->lastItem() ?? 0 }} dari {{ $artikels->total() }} artikel
                    </div>
                </div>
            @endif
        @else
            <div class="artikel-empty-state">
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
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <div class="newsletter-text">
                <h3>Tetap Update dengan Insight Terbaru</h3>
                <p>Dapatkan artikel dan update terbaru seputar perpajakan langsung ke email Anda</p>
            </div>
            <div class="newsletter-form">
                <form class="subscribe-form">
                    <div class="input-group">
                        <input type="email" placeholder="Masukkan email Anda" class="email-input">
                        <button type="submit" class="subscribe-btn">
                            <span>Berlangganan</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p class="form-note">Dengan berlangganan, Anda menyetujui Kebijakan Privasi kami</p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

<style>
:root {
    --primary-purple: #7c3aed;
    --secondary-purple: #6d28d9;
    --dark-purple: #5b21b6;
    --light-purple: #ede9fe;
    --white: #ffffff;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --gray-900: #0f172a;
}

/* Hero Section (Tetap sama) */
.artikel-hero {
    background: linear-gradient(135deg, var(--dark-purple) 0%, var(--primary-purple) 100%);
    color: var(--white);
    padding: 80px 0 60px;
    text-align: center;
}

.artikel-hero h1 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
    color: var(--white);
}

.artikel-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 2.5rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.artikel-search-container {
    max-width: 600px;
    margin: 0 auto;
}

.artikel-search-form {
    display: flex;
    gap: 12px;
    align-items: center;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

.search-input-wrapper i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-400);
    z-index: 2;
}

.artikel-search-input {
    width: 100%;
    padding: 14px 16px 14px 48px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.1);
    color: var(--white);
    font-size: 1rem;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.artikel-search-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.artikel-search-input:focus {
    outline: none;
    border-color: rgba(255, 255, 255, 0.4);
    background: rgba(255, 255, 255, 0.15);
}

.artikel-search-button {
    padding: 14px 28px;
    background: var(--white);
    color: var(--primary-purple);
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.artikel-search-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
}

/* Main Articles Section */
.artikel-section {
    padding: 60px 0;
    background: var(--white);
}

.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Category Filter */
.category-filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid var(--gray-100);
}

.filter-tabs {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.filter-tab {
    padding: 10px 20px;
    background: var(--gray-100);
    color: var(--gray-600);
    border: 2px solid transparent;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-tab:hover {
    background: var(--gray-200);
    color: var(--gray-700);
}

.filter-tab.active {
    background: var(--primary-purple);
    color: var(--white);
    border-color: var(--primary-purple);
}

.filter-actions {
    display: flex;
    gap: 1rem;
}

.sort-dropdown {
    position: relative;
}

.sort-select {
    appearance: none;
    padding: 10px 40px 10px 16px;
    border: 2px solid var(--gray-200);
    border-radius: 8px;
    background: var(--white);
    color: var(--gray-700);
    font-size: 0.9rem;
    cursor: pointer;
    min-width: 140px;
    outline: none;
    transition: border-color 0.3s ease;
}

.sort-select:focus {
    border-color: var(--primary-purple);
}

.sort-dropdown i {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-400);
    pointer-events: none;
}

/* Artikel List Layout */
.artikel-list {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.artikel-item {
    display: flex;
    align-items: flex-start;
    gap: 2rem;
    padding: 2.5rem 0;
    border-bottom: 1px solid var(--gray-100);
    transition: all 0.3s ease;
    position: relative;
}

.artikel-item:hover {
    background: var(--gray-50);
    margin: 0 -20px;
    padding: 2.5rem 20px;
    border-radius: 12px;
    border-bottom-color: transparent;
}

.artikel-item:last-child {
    border-bottom: none;
}

.artikel-content {
    flex: 1;
    min-width: 0;
}

.artikel-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    font-size: 0.875rem;
}

.artikel-category {
    background: var(--light-purple);
    color: var(--primary-purple);
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.artikel-bullet {
    color: var(--gray-400);
    font-weight: 300;
}

.artikel-time {
    color: var(--gray-500);
    font-weight: 500;
}

.artikel-title {
    margin: 0 0 1rem 0;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1.4;
    color: var(--gray-900);
}

.artikel-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.artikel-title a:hover {
    color: var(--primary-purple);
}

.artikel-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 1.05rem;
}

.artikel-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.artikel-meta {
    display: flex;
    gap: 1.5rem;
    font-size: 0.875rem;
    color: var(--gray-500);
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.read-more-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-purple);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.read-more-link:hover {
    gap: 0.75rem;
    color: var(--dark-purple);
}

.artikel-thumbnail {
    flex-shrink: 0;
    width: 180px;
    height: 120px;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
}

.artikel-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.artikel-item:hover .artikel-thumbnail img {
    transform: scale(1.05);
}

/* Pagination */
.artikel-pagination {
    margin-top: 4rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.pagination-content {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--white);
    padding: 1rem 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    border: 1px solid var(--gray-200);
}

.pagination-arrow {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border: 2px solid var(--gray-200);
    border-radius: 8px;
    color: var(--gray-700);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.pagination-arrow:hover:not(.disabled) {
    background: var(--primary-purple);
    color: var(--white);
    border-color: var(--primary-purple);
}

.pagination-arrow.disabled {
    color: var(--gray-400);
    cursor: not-allowed;
}

.pagination-numbers {
    display: flex;
    gap: 0.5rem;
}

.pagination-number {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 8px;
    color: var(--gray-600);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.pagination-number:hover {
    background: var(--gray-100);
    border-color: var(--gray-200);
}

.pagination-number.active {
    background: var(--primary-purple);
    color: var(--white);
    border-color: var(--primary-purple);
}

.pagination-info {
    color: var(--gray-600);
    font-size: 0.9rem;
    font-weight: 500;
}

/* Empty State */
.artikel-empty-state {
    text-align: center;
    padding: 80px 20px;
    background: var(--gray-50);
    border-radius: 16px;
    margin: 2rem 0;
}

.artikel-empty-state i {
    font-size: 4rem;
    color: var(--gray-400);
    margin-bottom: 1.5rem;
}

.artikel-empty-state h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 1rem;
}

.artikel-empty-state p {
    color: var(--gray-600);
    font-size: 1rem;
    max-width: 400px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Newsletter Section */
.newsletter-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--dark-purple) 0%, var(--primary-purple) 100%);
    color: var(--white);
}

.newsletter-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    max-width: 1000px;
    margin: 0 auto;
}

.newsletter-text h3 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--white);
}

.newsletter-text p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

.subscribe-form {
    max-width: 400px;
}

.input-group {
    display: flex;
    background: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

.email-input {
    flex: 1;
    padding: 16px 20px;
    border: none;
    outline: none;
    font-size: 1rem;
    color: var(--gray-800);
}

.subscribe-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 16px 24px;
    background: var(--secondary-purple);
    color: var(--white);
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.subscribe-btn:hover {
    background: var(--dark-purple);
}

.form-note {
    font-size: 0.875rem;
    opacity: 0.8;
    margin-top: 1rem;
    text-align: center;
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

.artikel-item {
    animation: fadeInUp 0.5s ease forwards;
}

.artikel-item:nth-child(1) { animation-delay: 0.1s; }
.artikel-item:nth-child(2) { animation-delay: 0.2s; }
.artikel-item:nth-child(3) { animation-delay: 0.3s; }
.artikel-item:nth-child(4) { animation-delay: 0.4s; }
.artikel-item:nth-child(5) { animation-delay: 0.5s; }

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }
    
    .artikel-hero h1 {
        font-size: 2.25rem;
    }
    
    .artikel-hero p {
        font-size: 1.1rem;
    }
    
    .category-filter {
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
    }
    
    .filter-tabs {
        width: 100%;
        overflow-x: auto;
        padding-bottom: 0.5rem;
    }
    
    .artikel-item {
        flex-direction: column-reverse;
        gap: 1.5rem;
        padding: 2rem 0;
    }
    
    .artikel-item:hover {
        margin: 0;
        padding: 2rem 1rem;
    }
    
    .artikel-thumbnail {
        width: 100%;
        height: 200px;
    }
    
    .artikel-title {
        font-size: 1.25rem;
    }
    
    .artikel-footer {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .pagination-content {
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem;
    }
    
    .newsletter-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .artikel-hero {
        padding: 60px 0 40px;
    }
    
    .artikel-hero h1 {
        font-size: 2rem;
    }
    
    .artikel-search-container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .artikel-search-input {
        padding: 12px 16px;
    }
    
    .artikel-search-button {
        width: 100%;
        padding: 12px;
    }
    
    .artikel-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .pagination-arrow span {
        display: none;
    }
    
    .pagination-arrow {
        padding: 0.75rem;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>

@push('scripts')
<script>
    // Filter tabs functionality
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            document.querySelectorAll('.filter-tab').forEach(t => {
                t.classList.remove('active');
            });
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Implement filter logic here
            const filterValue = this.textContent.toLowerCase();
            console.log('Filter by:', filterValue);
        });
    });

    // Sort dropdown functionality
    const sortSelect = document.querySelector('.sort-select');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            console.log('Sort by:', this.value);
            // Implement sort logic here
        });
    }

    // Search functionality
    const searchForm = document.querySelector('.artikel-search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const button = this.querySelector('.artikel-search-button');
            const originalText = button.textContent;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';
            button.disabled = true;
            
            // Reset after 2 seconds (fallback)
            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
            }, 2000);
        });
    }

    // Hover effects
    document.querySelectorAll('.artikel-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });

    // Newsletter subscription
    const subscribeForm = document.querySelector('.subscribe-form');
    if (subscribeForm) {
        subscribeForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('.subscribe-btn');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check"></i> Terdaftar!';
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    this.reset();
                }, 2000);
            }, 1500);
        });
    }

    // Scroll animations
    document.addEventListener('DOMContentLoaded', function() {
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

        // Observe artikel items
        document.querySelectorAll('.artikel-item').forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(item);
        });
    });
</script>
@endpush