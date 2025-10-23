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
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-400: #9ca3af;
    --gray-500: #6b7280;
    --gray-600: #4b5563;
    --gray-700: #374151;
    --gray-800: #1f2937;
    --gray-900: #111827;
    --border-radius: 12px;
    --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.artikel-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    line-height: 1.6;
    color: var(--gray-800);
    background: var(--white);
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.artikel-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* ================================
   IMPROVED HERO SECTION - RESPONSIVE
   ================================ */
.artikel-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: var(--white);
    padding: 70px 0 40px;
    margin-bottom: 0;
    position: relative;
    overflow: hidden;
}

.artikel-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.05) 0%, transparent 50%);
}

.artikel-header-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
    padding: 0 10px;
}

.artikel-header h1 {
    font-size: clamp(1.8rem, 4.5vw, 3rem);
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--white);
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.artikel-header p {
    font-size: clamp(0.95rem, 1.8vw, 1.15rem);
    opacity: 0.95;
    margin-bottom: 0;
    font-weight: 400;
    line-height: 1.5;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

/* ================================
   IMPROVED SEARCH SECTION - RESPONSIVE
   ================================ */
.search-section {
    background: var(--white);
    padding: 25px 0;
    margin-bottom: 0;
    border-bottom: 1px solid var(--gray-200);
}

.search-container {
    display: flex;
    gap: 10px;
    max-width: 700px;
    margin: 0 auto;
    align-items: stretch;
    width: 100%;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
    min-width: 0;
}

.search-input {
    width: 100%;
    padding: 14px 16px 14px 44px;
    border: 2px solid var(--gray-300);
    border-radius: var(--border-radius);
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: var(--white);
    font-weight: 500;
    height: 100%;
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
    font-size: 1rem;
    z-index: 2;
}

.search-button {
    padding: 14px 20px;
    background: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: var(--border-radius);
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 6px;
    height: auto;
    min-width: fit-content;
}

.search-button:hover {
    background: var(--secondary-color);
    transform: translateY(-1px);
    box-shadow: var(--shadow);
}

/* ================================
   MAIN CONTENT LAYOUT
   ================================ */

.artikel-main {
    display: grid;
    grid-template-columns: 2.5fr 1fr;
    gap: 40px;
    margin: 40px 0;
    align-items: start;
    min-height: 60vh;
}

/* Artikel Content Area */
.artikel-content {
    width: 100%;
}

.featured-section {
    margin-bottom: 0;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--gray-200);
}

.section-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--gray-900);
    margin: 0;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -17px;
    left: 0;
    width: 50px;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
}

.view-all {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 700;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    padding: 6px 12px;
    border-radius: var(--border-radius);
    background: var(--gray-100);
}

.view-all:hover {
    color: var(--secondary-color);
    gap: 8px;
    background: var(--gray-200);
}

/* Artikel List */
.artikel-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
    width: 100%;
}

.artikel-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 20px;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
    position: relative;
    overflow: hidden;
    width: 100%;
}

.artikel-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(to bottom, var(--primary-color) 0%, var(--secondary-color) 100%);
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.artikel-item:hover::before {
    transform: scaleY(1);
}

.artikel-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    border-color: var(--gray-300);
}

.artikel-image {
    width: 120px;
    height: 90px;
    min-width: 120px;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
}

.artikel-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.artikel-item:hover .artikel-image img {
    transform: scale(1.05);
}

.artikel-content-inner {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.artikel-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 0;
    font-size: 0.75rem;
    flex-wrap: wrap;
}

.artikel-category {
    background: var(--primary-color);
    color: var(--white);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    white-space: nowrap;
}

.artikel-date {
    color: var(--gray-500);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
}

.artikel-title {
    font-size: 1.1rem;
    font-weight: 700;
    line-height: 1.4;
    margin: 0;
    color: var(--gray-900);
}

.artikel-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.artikel-title a:hover {
    color: var(--primary-color);
}

.artikel-excerpt {
    color: var(--gray-600);
    line-height: 1.5;
    margin: 0;
    font-size: 0.85rem;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.artikel-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.75rem;
    color: var(--gray-500);
    margin-top: 4px;
}

.read-more {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    font-size: 0.8rem;
    white-space: nowrap;
}

.read-more:hover {
    color: var(--secondary-color);
    gap: 8px;
}

/* Sidebar */
.sidebar {
    display: flex;
    flex-direction: column;
    gap: 24px;
    position: sticky;
    top: 100px;
    height: fit-content;
}

.sidebar-widget {
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 20px;
    box-shadow: var(--shadow);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.widget-title {
    font-size: 1.1rem;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--gray-900);
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary-color);
    position: relative;
}

.popular-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.popular-item {
    display: flex;
    gap: 10px;
    padding: 12px 0;
    border-bottom: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.popular-rank {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--primary-color);
    min-width: 25px;
    text-align: center;
}

.popular-content {
    flex: 1;
    min-width: 0;
}

.popular-content h4 {
    font-size: 0.9rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 4px;
}

.popular-content h4 a {
    color: var(--gray-800);
    text-decoration: none;
    transition: color 0.3s ease;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.popular-meta {
    font-size: 0.7rem;
    color: var(--gray-500);
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.category-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    background: var(--gray-100);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--gray-700);
    transition: all 0.3s ease;
    font-weight: 600;
}

.category-count {
    background: var(--white);
    color: var(--gray-600);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 700;
}

.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.tag {
    padding: 5px 10px;
    background: var(--gray-100);
    color: var(--gray-700);
    border-radius: 20px;
    font-size: 0.75rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin: 40px 0 20px;
    flex-wrap: wrap;
}

.pagination-item {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 10px;
    border: 2px solid var(--gray-300);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--gray-700);
    font-weight: 700;
    transition: all 0.3s ease;
    font-size: 0.85rem;
    background: var(--white);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: var(--gray-100);
    border-radius: var(--border-radius);
    border: 1px solid var(--gray-200);
    margin: 20px 0;
}

/* ================================
   IMPROVED RESPONSIVE DESIGN
   ================================ */

/* Large Desktop */
@media (min-width: 1440px) {
    .artikel-container {
        max-width: 1400px;
    }
}

/* Tablet Landscape */
@media (max-width: 1199px) and (min-width: 1025px) {
    .artikel-main {
        grid-template-columns: 2fr 1fr;
        gap: 35px;
    }
}

/* Tablet */
@media (max-width: 1024px) and (min-width: 769px) {
    .artikel-main {
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }
    
    .artikel-header {
        padding: 60px 0 35px;
    }
    
    .search-section {
        padding: 22px 0;
    }
}

/* ================================
   IMPROVED MOBILE RESPONSIVE
   ================================ */

/* Tablet Portrait */
@media (max-width: 768px) {
    .artikel-container {
        padding: 40px;
    }
    
    /* Improved Hero Section for Mobile */
    .artikel-header {
        padding: 80px 0 40px;
        width: 100vw;
        background: linear-gradient(135deg, #1e3a8a 0%, #1342a5 100%);
        color: #fff;
        text-align: center;
    }
    
    .artikel-header h1 {
        font-size: 1.7rem;
        margin-bottom: 12px;
        line-height: 1.3;
    }
    
    .artikel-header p {
        font-size: 1rem;
        line-height: 1.4;
    }
    
    .search-section {
        padding: 20px 0;
    }
    
    .search-container {
        flex-direction: column;
        gap: 8px;
        max-width: 100%;
    }
    
    .search-input {
        padding: 12px 14px 12px 40px;
        font-size: 0.9rem;
        border-radius: 10px;
    }
    
    .search-input-wrapper i {
        left: 14px;
        font-size: 0.9rem;
    }
    
    .search-button {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #143989;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 12px 18px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: 0.3s;
    }
    
    /* Main Content Mobile */
    .artikel-main {
        grid-template-columns: 1fr;
        gap: 25px;
        margin: 25px 0;
    }
    
    .sidebar {
        order: -1;
        position: static;
        gap: 18px;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 18px;
    }
    
    .view-all {
        align-self: stretch;
        text-align: center;
        justify-content: center;
        padding: 8px 12px;
    }
    
    /* Artikel Item Mobile */
    .artikel-item {
        padding: 16px;
        gap: 12px;
    }
    
    .artikel-image {
        width: 90px;
        height: 70px;
        min-width: 90px;
    }
    
    .artikel-title {
        font-size: 1rem;
    }
    
    .artikel-footer {
        flex-direction: row;
    }
    
    /* Sidebar Mobile */
    .sidebar-widget {
        padding: 16px;
    }
    
    .widget-title {
        font-size: 1.05rem;
    }
    
    .pagination {
        margin: 30px 0 15px;
    }
}

/* Small Mobile */
@media (max-width: 480px) {
    .artikel-container {
        padding: 0 14px;
    }
    
    /* Hero Section - Small Mobile */
    .artikel-header {
        padding: 40px 0 20px;
    }
    
    .artikel-header h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    
    .artikel-header p {
        font-size: 0.9rem;
    }
    
    .artikel-header-content {
        padding: 0 5px;
    }
    
    /* Search Section - Small Mobile */
    .search-section {
        padding: 18px 0;
    }
    
    .search-container {
        gap: 6px;
    }
    
    .search-input {
        padding: 10px 12px 10px 36px;
        font-size: 0.85rem;
        border-radius: 8px;
    }
    
    .search-input-wrapper i {
        left: 12px;
        font-size: 0.85rem;
    }
    
    .search-button {
        padding: 10px 14px;
        font-size: 0.8rem;
        border-radius: 8px;
        gap: 4px;
    }
    
    .search-button i {
        font-size: 0.8rem;
    }
    
    /* Main Content - Small Mobile */
    .artikel-main {
        gap: 20px;
        margin: 20px 0;
    }
    
    .artikel-item {
        padding: 14px;
        gap: 10px;
        flex-direction: row;
    }
    
    .artikel-image {
        width: 80px;
        height: 60px;
        min-width: 80px;
    }
    
    .artikel-title {
        font-size: 0.95rem;
    }
    
    .artikel-excerpt {
        font-size: 0.8rem;
    }
    
    .sidebar-widget {
        padding: 14px;
    }
    
    .empty-state {
        padding: 40px 16px;
    }
}

/* Extra Small Mobile */
@media (max-width: 360px) {
    .artikel-container {
        padding: 0 12px;
    }
    
    /* Hero Section - Extra Small */
    .artikel-header {
        padding: 35px 0 18px;
    }
    
    .artikel-header h1 {
        font-size: 1.35rem;
    }
    
    .artikel-header p {
        font-size: 0.85rem;
    }
    
    /* Search Section - Extra Small */
    .search-section {
        padding: 16px 0;
    }
    
    .search-input {
        padding: 9px 10px 9px 32px;
        font-size: 0.8rem;
    }
    
    .search-input-wrapper i {
        left: 10px;
    }
    
    .search-button {
        padding: 9px 12px;
        font-size: 0.75rem;
    }
    
    /* Compact layout for very small screens */
    .artikel-item {
        padding: 12px;
        gap: 8px;
    }
    
    .artikel-image {
        width: 70px;
        height: 55px;
        min-width: 70px;
    }
    
    .artikel-title {
        font-size: 0.9rem;
    }
    
    .sidebar-widget {
        padding: 12px;
    }
}

/* Animation Improvements */
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

/* Utility Classes */
.text-gradient {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Ensure proper background */
body {
    overflow-x: hidden;
    background: var(--white);
}

main {
    position: relative;
    z-index: 1;
    background: var(--white);
}

.artikel-page,
.artikel-main,
.artikel-content,
.featured-section,
.search-section {
    background: var(--white);
}
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
                    <input type="text" name="search" class="search-input" placeholder="Cari artikel tentang pajak, keuangan, investasi..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Cari Artikel
                </button>
            </form>
        </div>
    </section>

    <!-- Main Content (tetap sama seperti sebelumnya) -->
    <main class="artikel-container">
        <div class="artikel-main">
            <!-- Artikel List -->
            <div class="artikel-content">
                @if($artikels && $artikels->count())
                    <!-- Featured Articles -->
                    <section class="featured-section">
                        <div class="section-header">
                            <h2 class="section-title">Artikel Terbaru</h2>
                            <a href="#" class="view-all">
                                Lihat Semua
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        
                        <div class="artikel-list">
                            @foreach ($artikels as $artikel)
                                <article class="artikel-item">
                                    <div class="artikel-image">
                                        @if($artikel->thumbnail)
                                            <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="{{ $artikel->title }}" loading="lazy">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="{{ $artikel->title }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="artikel-content-inner">
                                        <div class="artikel-meta">
                                            @if($artikel->category)
                                                <span class="artikel-category">{{ $artikel->category->name }}</span>
                                            @endif
                                            <span class="artikel-date">
                                                <i class="far fa-calendar"></i>
                                                {{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}
                                            </span>
                                        </div>
                                        <h3 class="artikel-title">
                                            <a href="{{ route('artikel.user.show', $artikel->slug) }}">
                                                {{ $artikel->title }}
                                            </a>
                                        </h3>
                                        <p class="artikel-excerpt">{{ Str::limit($artikel->excerpt, 120) }}</p>
                                        <div class="artikel-footer">
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
                                Hasil pencarian untuk "{{ request('search') }}" tidak ditemukan. Coba gunakan kata kunci lain atau lihat artikel terbaru kami.
                            @else
                                Maaf, saat ini belum ada artikel yang tersedia. Silakan kembali lagi nanti untuk membaca artikel terbaru seputar perpajakan dan keuangan.
                            @endif
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Popular Articles -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-fire"></i>
                        Artikel Populer
                    </h3>
                    <div class="popular-list">
                        @php
                            $popularArticles = [
                                ['title' => 'Cara Mudah Lapor SPT Tahunan 2024', 'views' => '1.2K', 'days' => '2'],
                                ['title' => 'Tips Mengoptimalkan Pajak untuk UMKM', 'views' => '980', 'days' => '3'],
                                ['title' => 'Panduan Lengkap PPN 11% 2024', 'views' => '1.5K', 'days' => '1'],
                                ['title' => 'Investasi yang Efisien Secara Pajak', 'views' => '850', 'days' => '5'],
                                ['title' => 'Update Terbaru Tax Amnesty Jilid II', 'views' => '2.1K', 'days' => '1']
                            ];
                        @endphp
                        @foreach($popularArticles as $index => $article)
                            <div class="popular-item">
                                <div class="popular-rank">{{ $index + 1 }}</div>
                                <div class="popular-content">
                                    <h4>
                                        <a href="#">{{ $article['title'] }}</a>
                                    </h4>
                                    <div class="popular-meta">
                                        <span><i class="far fa-eye"></i> {{ $article['views'] }} views</span>
                                        <span><i class="far fa-clock"></i> {{ $article['days'] }} days ago</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Categories -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-folder"></i>
                        Kategori
                    </h3>
                    <div class="category-list">
                        @php
                            $categories = [
                                ['name' => 'Berita Pajak', 'count' => 24],
                                ['name' => 'Tips Keuangan', 'count' => 18],
                                ['name' => 'Kebijakan Fiskal', 'count' => 12],
                                ['name' => 'PPN & PPh', 'count' => 32],
                                ['name' => 'UMKM', 'count' => 15],
                                ['name' => 'Investasi', 'count' => 9]
                            ];
                        @endphp
                        @foreach($categories as $category)
                            <a href="#" class="category-item">
                                <span>{{ $category['name'] }}</span>
                                <span class="category-count">{{ $category['count'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Tags -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-tags"></i>
                        Tags Populer
                    </h3>
                    <div class="tags-container">
                        @php
                            $tags = ['SPT', 'PPN', 'PPh', 'UMKM', 'E-Filing', 'Tax Amnesty', 'Keuangan', 'Investasi', 'Pajak', 'Fiskal', 'DJP', 'E-Billing'];
                        @endphp
                        @foreach($tags as $tag)
                            <a href="#" class="tag">#{{ $tag }}</a>
                        @endforeach
                    </div>
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

    // Intersection Observer untuk animasi
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    // Observe artikel items
    document.querySelectorAll('.artikel-item').forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);
    });

    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas fa-${type === 'success' ? 'check' : 'info'}-circle"></i>
                <span>${message}</span>
            </div>
        `;
        
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : '#3b82f6'};
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            box-shadow: var(--shadow-lg);
            z-index: 1000;
            transform: translateX(400px);
            transition: transform 0.3s ease;
            max-width: 300px;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
});
</script>
@endpush