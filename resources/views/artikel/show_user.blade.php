@extends('layouts.master')

@section('title', $artikel->title)

@section('meta')
<meta property="og:title" content="{{ $artikel->judul }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($artikel->isi), 150) }}">
<meta property="og:image" content="{{ asset('storage/' . $artikel->gambar) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="article">
<meta property="og:site_name" content="https://www.alodokter.com/">

<!-- Untuk Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $artikel->judul }}">
<meta name="twitter:description" content="{{ Str::limit(strip_tags($artikel->isi), 150) }}">
<meta name="twitter:image" content="{{ asset('storage/' . $artikel->gambar) }}">
@endsection

@section('style')
<style>
:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --primary-light: #dbeafe;
    --accent: #f59e0b;
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
    --border: 1px solid var(--gray-200);
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --radius: 12px;
    --radius-sm: 8px;
}

.article-detail {
    font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
    line-height: 1.7;
    color: var(--gray-800);
    background: var(--white);
    min-height: 100vh;
}

.article-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Hero Section */
.article-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    padding: 80px 0 60px;
    position: relative;
    overflow: hidden;
}

.article-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    color: var(--white);
}

.article-breadcrumb {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    font-size: 0.875rem;
    opacity: 0.9;
}

.article-breadcrumb a {
    color: var(--white);
    text-decoration: none;
    transition: opacity 0.2s ease;
}

.article-breadcrumb a:hover {
    opacity: 0.8;
}

.article-breadcrumb i {
    font-size: 0.75rem;
    opacity: 0.7;
}

.article-title {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
    color: var(--white);
}

.article-excerpt {
    font-size: 1.25rem;
    opacity: 0.9;
    line-height: 1.6;
    margin-bottom: 30px;
}

.article-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.95rem;
    opacity: 0.9;
}

.meta-item i {
    font-size: 0.875rem;
}

/* Main Content Layout */
.article-main {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 48px;
    margin: 60px 0 80px;
    align-items: start;
}

/* Article Content */
.article-content img {
    max-width: 100%;
    height: auto;
}

.article-content .image-style-align-left {
    display: block;
    margin-left: 0;
    margin-right: auto;
}

.article-content .image-style-align-center {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.article-content .image-style-align-right {
    display: block;
    margin-left: auto;
    margin-right: 0;
}

.content-wrapper {
    display: flex;
    gap: 20px;
}

.article-content-wrapper {
    background: var(--white);
    border-radius: var(--radius);
    padding: 0;
}
.main-content {
    flex: 3;
}

.article-featured-image {
    width: 100%;
    height: 400px;
    border-radius: var(--radius);
    overflow: hidden;
    margin-bottom: 32px;
    position: relative;
}

.article-featured-image img {
    width: 100%;
    max-width: 100%;
    height: auto;
    object-fit: cover;
    max-height: 500px;
}

.image-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    color: var(--white);
    padding: 20px;
    font-size: 0.875rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.article-featured-image:hover .image-caption {
    opacity: 1;
}

.article-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--gray-700);
}

.article-content h2 {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 40px 0 20px;
    line-height: 1.3;
}

.article-content h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--gray-800);
    margin: 32px 0 16px;
    line-height: 1.4;
}

.article-content p {
    margin-bottom: 24px;
}

.article-content a {
    color: #007bff; /* biru seperti link standar */
    text-decoration: underline; /* optional, biar mirip link web umum */
}
.article-content a:hover {
    color: #0056b3; /* warna biru lebih gelap saat hover */
    text-decoration: underline;
}

.article-content blockquote {
    border-left: 4px solid var(--primary);
    background: var(--primary-light);
    padding: 24px;
    margin: 32px 0;
    border-radius: 0 var(--radius) var(--radius) 0;
    font-style: italic;
    color: var(--gray-700);
}

.article-content ul, .article-content ol {
    margin-bottom: 24px;
    padding-left: 24px;
}

.article-content li {
    margin-bottom: 8px;
}

.article-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 24px 0;
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
}

.article-content table th {
    background: var(--primary);
    color: var(--white);
    padding: 16px;
    text-align: left;
    font-weight: 600;
}

.article-content table td {
    padding: 16px;
    border-bottom: var(--border);
}

.article-content table tr:last-child td {
    border-bottom: none;
}

/* Article Actions */
.article-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 32px 0;
    margin: 40px 0;
    border-top: var(--border);
    border-bottom: var(--border);
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: var(--gray-100);
    color: var(--gray-700);
    text-decoration: none;
    border-radius: var(--radius-sm);
    font-weight: 600;
    transition: all 0.2s ease;
}

.back-button:hover {
    background: var(--gray-200);
    transform: translateX(-2px);
}

.share-section {
    display: flex;
    align-items: center;
    gap: 16px;
}

.share-label {
    font-size: 0.875rem;
    color: var(--gray-600);
    font-weight: 500;
}

.share-buttons {
    display: flex;
    gap: 8px;
}

.share-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: var(--radius-sm);
    background: var(--gray-100);
    color: var(--gray-600);
    text-decoration: none;
    transition: all 0.2s ease;
    position: relative;
}

.share-button:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow);
}

.share-button.facebook:hover {
    background: #1877f2;
    color: var(--white);
}

.share-button.twitter:hover {
    background: #1da1f2;
    color: var(--white);
}

.share-button.linkedin:hover {
    background: #0a66c2;
    color: var(--white);
}

.share-button.link:hover {
    background: var(--primary);
    color: var(--white);
}

.share-tooltip {
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: var(--gray-800);
    color: var(--white);
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.75rem;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
    margin-bottom: 8px;
}

.share-button:hover .share-tooltip {
    opacity: 1;
    visibility: visible;
}

/* Sidebar */
.sidebar {
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 32px;
    position: sticky;
    top: 100px;
}

.sidebar-widget {
    background: var(--white);
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow);
    border: var(--border);
}

.widget-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--gray-100);
}

.widget-icon {
    width: 32px;
    height: 32px;
    background: var(--primary);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 0.875rem;
}

.widget-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0;
}

/* Popular Articles */
.popular-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.popular-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px 0;
    border-bottom: 1px solid var(--gray-100);
    transition: all 0.2s ease;
}

.popular-item:hover {
    transform: translateX(4px);
}

.popular-item:last-child {
    border-bottom: none;
}

.popular-rank {
    font-size: 1rem;
    font-weight: 700;
    color: var(--primary);
    min-width: 24px;
    padding-top: 2px;
}

.popular-content {
    flex: 1;
}

.popular-content h4 {
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 6px;
}

.popular-content h4 a {
    color: var(--gray-800);
    text-decoration: none;
    transition: color 0.2s ease;
}

.popular-content h4 a:hover {
    color: var(--primary);
}

.popular-meta {
    display: flex;
    align-items: center;
    gap: 12px;
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
    background: var(--gray-50);
    border-radius: var(--radius-sm);
    text-decoration: none;
    color: var(--gray-700);
    transition: all 0.2s ease;
    border: 1px solid transparent;
}

.category-item:hover {
    background: var(--white);
    color: var(--primary);
    border-color: var(--primary-light);
    transform: translateX(4px);
}

.category-count {
    background: var(--gray-200);
    color: var(--gray-600);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    transition: all 0.2s ease;
}

.category-item:hover .category-count {
    background: var(--primary);
    color: var(--white);
}

/* Newsletter */
.newsletter-widget {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: var(--white);
    position: relative;
    overflow: hidden;
}

.newsletter-widget::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M0 0h40v40H0V0zm20 20a8 8 0 1 1 0-16 8 8 0 0 1 0 16z'/%3E%3C/g%3E%3C/svg%3E");
}

.newsletter-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.newsletter-widget .widget-header {
    border-bottom-color: rgba(255, 255, 255, 0.2);
    justify-content: center;
}

.newsletter-widget .widget-title {
    color: var(--white);
}

.newsletter-text {
    margin-bottom: 20px;
    opacity: 0.9;
    line-height: 1.6;
}

.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.newsletter-input {
    padding: 12px 16px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-sm);
    font-size: 0.95rem;
    background: rgba(255, 255, 255, 0.1);
    color: var(--white);
    backdrop-filter: blur(10px);
    transition: all 0.2s ease;
}

.newsletter-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.newsletter-input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.4);
}

.newsletter-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 20px;
    background: var(--accent);
    color: var(--white);
    border: none;
    border-radius: var(--radius-sm);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.newsletter-button:hover {
    background: #eab308;
    transform: translateY(-1px);
}

/* Related Articles */
.related-articles {
    margin-top: 80px;
    padding-top: 60px;
    border-top: var(--border);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0;
}

.view-all {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: color 0.2s ease;
}

.view-all:hover {
    color: var(--primary-dark);
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
}

.related-card {
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    border: var(--border);
    transition: all 0.3s ease;
    position: relative;
}

.related-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.related-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.related-card:hover .related-image img {
    transform: scale(1.05);
}

.related-content {
    padding: 20px;
}

.related-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
    font-size: 0.875rem;
}

.related-category {
    background: var(--primary-light);
    color: var(--primary);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.related-date {
    color: var(--gray-500);
    font-weight: 500;
}

.related-title {
    font-size: 1.125rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 8px;
}

.related-title a {
    color: var(--gray-900);
    text-decoration: none;
    transition: color 0.2s ease;
}

.related-title a:hover {
    color: var(--primary);
}

.related-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .article-main {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .sidebar {
        position: static;
        order: -1;
    }
}

@media (max-width: 768px) {
    .article-container {
        padding: 0 20px;
    }
    .content-wrapper {
        flex-direction: column; /* ✅ ini yang bikin sidebar ke bawah */
    }
    
    .article-hero {
        padding: 60px 0 40px;
    }
    
    .article-title {
        font-size: 2rem;
    }
    
    .article-excerpt {
        font-size: 1.125rem;
    }
    
    .article-meta {
        gap: 16px;
    }
    
    .article-featured-image {
        height: 300px;
    }
    
    .article-actions {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
    }
    
    .share-section {
        width: 100%;
        justify-content: space-between;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .article-title {
        font-size: 1.75rem;
    }
    
    .article-content {
        font-size: 1rem;
    }
    
    .article-content h2 {
        font-size: 1.5rem;
    }
    
    .article-content h3 {
        font-size: 1.25rem;
    }
    
    .share-buttons {
        gap: 4px;
    }
    
    .share-button {
        width: 40px;
        height: 40px;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.related-card {
    animation: fadeInUp 0.6s ease forwards;
}

.related-card:nth-child(1) { animation-delay: 0.1s; }
.related-card:nth-child(2) { animation-delay: 0.2s; }
.related-card:nth-child(3) { animation-delay: 0.3s; }

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Focus styles */
button:focus-visible,
a:focus-visible {
    outline: 2px solid var(--primary);
    outline-offset: 2px;
}

.rank-thumb {
    width: 70px;
    height: 50px;
    border-radius: 8px;
    object-fit: cover;
}
</style>
@endsection

@section('content')
<div class="article-detail">
    <!-- Hero Section -->
    <section class="article-hero">
        <div class="article-container">
            <div class="hero-content">
                <!-- Breadcrumb -->
                <nav class="article-breadcrumb">
                    <a href="{{ url('/') }}">Beranda</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="{{ route('artikel.index') }}">Artikel</a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Detail Artikel</span>
                </nav>

                <!-- Title -->
                <h1 class="article-title">{{ $artikel->title }}</h1>

                <!-- Excerpt -->
                @if($artikel->excerpt)
                    <p class="article-excerpt">{{ $artikel->excerpt }}</p>
                @endif

                <!-- Meta Information -->
                <div class="article-meta">
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>{{ \Carbon\Carbon::parse($artikel->publish_date)->format('d F Y') }}</span>
                    </div>
                    @if($artikel->category)
                    <div class="meta-item">
                        <i class="fas fa-tag"></i>
                        <span>{{ $artikel->category->name }}</span>
                    </div>
                    @endif
                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ rand(3, 8) }} menit dibaca</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="article-container">
        <div class="article-main">
            <!-- Article Content -->
            <article class="article-content-wrapper">
                <main class="main-content">
                    <!-- Featured Image -->
                    @if($artikel->thumbnail)
                        <div class="article-featured-image">
                            <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="{{ $artikel->title }}">
                            <div class="image-caption">
                                Ilustrasi: {{ $artikel->title }}
                            </div>
                        </div>
                    @endif

                    <!-- Article Content -->
                    <div class="article-content">
                        {!! $artikel->content !!}
                    </div>

                    <!-- Article Actions -->
                    <div class="article-actions">
                        <a href="{{ route('artikel.index') }}" class="back-button">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Artikel
                        </a>

                        <div class="share-section">
                            <span class="share-label">Bagikan Artikel:</span>
                            <div class="share-buttons">
                                <a href="#" class="share-button facebook" title="Share on Facebook" id="share-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    <span class="share-tooltip">Facebook</span>
                                </a>

                                <a href="#" class="share-button twitter" title="Share on Twitter" id="share-twitter">
                                    <i class="fab fa-twitter"></i>
                                    <span class="share-tooltip">Twitter</span>
                                </a>

                                <a href="#" class="share-button whatsapp" title="Share on WhatsApp" id="share-whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                    <span class="share-tooltip">WhatsApp</span>
                                </a>

                                <button class="share-button link copy-link" title="Copy Link" id="copy-link">
                                    <i class="fas fa-link"></i>
                                    <span class="share-tooltip">Copy Link</span>
                                </button>
                            </div>
                        </div>


                        <!-- Notifikasi copy -->
                        <div id="copy-notification"
                            style="display:none;position:fixed;bottom:20px;right:20px;background:#333;color:#fff;padding:10px 20px;border-radius:8px;">
                            Link berhasil disalin!
                        </div>
                    </div>
                </main>
            </article>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Popular Articles -->
                <div class="sidebar-widget">
                    <div class="widget-header">
                        <div class="widget-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="widget-title">Artikel Populer</h3>
                    </div>

                    <div class="popular-list">
                        @foreach($popularArticles as $index => $item)
                            <div class="popular-item">
                                <div class="popular-rank">
                                    @if($item->thumbnail)
                                        <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="{{ $item->title }}" class="rank-thumb">
                                    @else
                                        <img src="{{ asset('No_image_available.webp') }}" alt="{{ $item->title }}" class="rank-thumb">
                                    @endif
                                </div>

                                <div class="popular-content">
                                    <h4>
                                        <a href="{{ route('artikel.user.show', $item->slug) }}">
                                            {{ Str::limit($item->title, 60) }}
                                        </a>
                                    </h4>
                                    <div class="popular-meta">
                                        <span>{{ number_format($item->views ?? 0) }} views</span>
                                        <span>•</span>
                                        <span>{{ \Carbon\Carbon::parse($item->publish_date)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>

            
        </div>

        <!-- Related Articles -->
        @if(isset($relatedArticles) && $relatedArticles->count() > 0)
            <section class="related-articles">
                <div class="section-header">
                    <h2 class="section-title">Artikel Terkait</h2>
                    <a href="{{ route('artikel.index') }}" class="view-all">Lihat Semua</a>
                </div>
                <div class="related-grid">
                    @foreach($relatedArticles as $related)
                        <article class="related-card">
                            <div class="related-image">
                                @if($related->thumbnail)
                                    <img src="{{ asset('storage/'.$related->thumbnail) }}" alt="{{ $related->title }}">
                                @else
                                    <div style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); height: 100%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-newspaper" style="font-size: 2rem; opacity: 0.7;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="related-content">
                                <div class="related-meta">
                                    @if($related->category)
                                        <span class="related-category">{{ $related->category->name }}</span>
                                    @endif
                                    <span class="related-date">{{ \Carbon\Carbon::parse($related->publish_date)->format('d M Y') }}</span>
                                </div>
                                <h3 class="related-title">
                                    <a href="{{ route('artikel.user.show', $related->slug) }}">{{ $related->title }}</a>
                                </h3>
                                <p class="related-excerpt">{{ Str::limit($related->excerpt, 100) }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
   const articleUrl = "{{ url()->current() }}";
    const articleTitle = "{{ $artikel->judul }}";
    const articleImage = "{{ asset('storage/' . $artikel->gambar) }}";

    // FACEBOOK
    document.getElementById('share-facebook').addEventListener('click', function (e) {
        e.preventDefault();
        const fbUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(articleUrl)}`;
        window.open(fbUrl, '_blank', 'width=600,height=400');
    });

    // TWITTER
    document.getElementById('share-twitter').addEventListener('click', function (e) {
        e.preventDefault();
        const twUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(articleUrl)}&text=${encodeURIComponent(articleTitle)}`;
        window.open(twUrl, '_blank', 'width=600,height=400');
    });

    // WHATSAPP
    document.getElementById('share-whatsapp').addEventListener('click', function (e) {
        e.preventDefault();
        const waText = `${articleTitle} - ${articleUrl}`;
        const waUrl = `https://wa.me/?text=${encodeURIComponent(waText)}`;
        window.open(waUrl, '_blank');
    });

    // COPY LINK
    document.getElementById('copy-link').addEventListener('click', function () {
        navigator.clipboard.writeText(articleUrl).then(() => {
            const notif = document.getElementById('copy-notification');
            notif.style.display = 'block';
            setTimeout(() => {
                notif.style.display = 'none';
            }, 2000);
        }).catch(err => {
            alert('Gagal menyalin link: ' + err);
        });
    });

    // Newsletter subscription
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('.newsletter-button');
            const originalHTML = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check"></i> Terdaftar!';
                button.style.background = '#10b981';
                
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.disabled = false;
                    button.style.background = '';
                    this.reset();
                }, 2000);
            }, 1500);
        });
    }


    // Intersection Observer untuk animasi related articles
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

    // Observe related cards
    document.querySelectorAll('.related-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endsection