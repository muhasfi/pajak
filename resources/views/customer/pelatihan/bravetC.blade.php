@extends('layouts.master')

@section('title', 'Catalog Seminar & Workshop')

@section('style')
<style>
    :root {
        --primary: #4361ee;
        --primary-light: #eef2ff;
        --primary-dark: #3730a3;
        --secondary: #8b5cf6;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --dark: #1f2937;
        --light: #f8fafc;
        --gray: #6b7280;
        --gray-light: #f3f4f6;
        --border: #e5e7eb;
        --radius: 12px;
        --radius-lg: 16px;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
        --transition: all 0.3s ease;
    }

    .catalog-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        padding: 60px 0 80px;
        color: white;
        text-align: center;
        margin-bottom: 40px;
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
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 极 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.5;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 16px;
        color: white;
    }

    .hero-subtitle {
        font-size: 1.125rem;
        font-weight: 400;
        margin-bottom: 32px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        color: rgba(255, 255, 255, 0.9);
    }

    .search-box {
        max-width: 500px;
        margin: 0 auto;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 14px 50px 14px 20px;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        outline: none;
        box-shadow: var(--shadow-lg);
        transition: var(--transition);
        background: rgba(255, 255, 255, 0.95);
    }

    .search-input:focus {
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
        background: white;
    }

    .search-btn {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--primary);
        border: none;
        border-radius: 50px;
        padding: 8px 16px;
        color: white;
        cursor: pointer;
        transition: var(--transition);
    }

    .search-btn:hover {
        background: var(--primary-dark);
    }

    /* Filter Section */
    .filter-section {
        margin-bottom: 30px;
        background: white;
        padding: 20px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        min-width: 200px;
    }

    .filter-label {
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 8px;
        color: var(--gray);
    }

    .filter-select {
        padding: 10px 16px;
        border: 1px solid var(--border);
        border-radius: 8px;
        font-size: 14px;
        background: white;
        cursor: pointer;
        transition: var(--transition);
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
        padding-right: 40px;
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-light);
    }

    .filter-reset {
        padding: 10px 16px;
        background: var(--gray-light);
        color: var(--gray);
        border: none;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        margin-top: 28px;
    }

    .filter-reset:hover {
        background: var(--border);
        color: var(--dark);
    }

    /* Event Cards */
    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 50px;
    }

    .event-card {
        background: white;
        border-radius: var(--radius);
        overflow: hidden;
        transition: var(--transition);
        box-shadow: var(--shadow);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .event-image {
        height: 160px;
        background: linear-gradient(45deg, #4361ee, #8b5cf6);
        position: relative;
        overflow: hidden;
    }

    .event-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: white;
        font-size: 2.5rem;
        opacity: 0.8;
    }

    .event-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-upcoming {
        background: var(--success);
        color: white;
    }

    .status-completed {
        background: var(--gray);
        color: white;
    }

    .status-ongoing {
        background: var(--warning);
        color: white;
    }

    .event-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .event-type {
        font-size: 0.75rem;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 10px;
    }

    .type-seminar {
        background: #dbeafe;
        color: #1e40af;
    }

    .type-workshop {
        background: #fef3c7;
        color: #92400e;
    }

    .type-webinar {
        background: #ecfdf5;
        color: #065f46;
    }

    .event-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark);
        line-height: 1.4;
    }

    .event-description {
        color: var(--gray);
        margin-bottom: 16px;
        flex-grow: 1;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .event-meta {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
        padding: 10px;
        background: var(--gray-light);
        border-radius: 8px;
    }

    .event-date {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: var(--primary);
        color: white;
        padding: 8px;
        border-radius: 6px;
        min-width: 50px;
        margin-right: 12px;
    }

    .event-day {
        font-size: 1rem;
        font-weight: 700;
        line-height: 1;
    }

    .event-month {
        font-size: 0.7rem;
        font-weight: 500;
        text-transform: uppercase;
    }

    .event-details {
        flex-grow: 1;
    }

    .event-time, .event-location {
        font-size: 0.8rem;
        color: var(--gray);
        margin-bottom: 4px;
        display: flex;
        align-items: center;
    }

    .event-time i, .event-location i {
        margin-right: 6px;
        font-size: 0.7rem;
    }

    .event-location {
        margin-bottom: 0;
    }

    .event-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .event-price {
        font-size: 1rem;
        font-weight: 700;
        color: var(--success);
    }

    .price-free {
        color: var(--danger);
    }

    .event-action {
        padding: 6px 16px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        font-size: 0.9rem;
    }

    .event-action:hover {
        background: var(--primary-dark);
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .page-item {
        margin: 0 4px;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: white;
        color: var(--dark);
        font-weight: 500;
        text-decoration: none;
        box-shadow: var(--shadow);
        transition: var(--transition);
        font-size: 0.9rem;
    }

    .page-link:hover {
        background: var(--primary-light);
        color: var(--primary);
        text-decoration: none;
    }

    .page-item.active .page-link {
        background: var(--primary);
        color: white;
    }

    /* Newsletter */
    .newsletter {
        background: var(--light);
        padding: 60px 0;
        margin-top: 60px;
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }

    .newsletter-content {
        text-align: center;
        max-width: 500px;
        margin: 0 auto;
    }

    .newsletter-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .newsletter-text {
        color: var(--gray);
        margin-bottom: 24px;
        font-size: 0.95rem;
    }

    .newsletter-form {
        display: flex;
        max-width: 400px;
        margin: 0 auto;
    }

    .newsletter-input {
        flex-grow: 1;
        padding: 10px 16px;
        border: 1px solid var(--border);
        border-radius: 8px 0 0 8px;
        font-size: 14px;
        outline: none;
        transition: var(--transition);
    }

    .newsletter-input:focus {
        border-color: var(--primary);
    }

    .newsletter-button {
        padding: 10px 20px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 0 8px 8px 0;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        font-size: 0.9rem;
    }

    .newsletter-button:hover {
        background: var(--primary-dark);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        margin-bottom: 40px;
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--gray-light);
        margin-bottom: 16px;
    }

    .empty-state h3 {
        font-size: 1.25rem;
        color: var(--gray);
        margin-bottom: 8px;
    }

    .empty-state p {
        color: var(--gray);
        margin-bottom: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.75rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .events-grid {
            grid-template-columns: 1fr;
        }
        
        .newsletter-form {
            flex-direction: column;
        }
        
        .newsletter-input {
            border-radius: 8px;
            margin-bottom: 12px;
        }
        
        .newsletter-button {
            border-radius: 8px;
        }
        
        .filter-section {
            flex-direction: column;
            align-items: stretch;
        }
        
        .filter-group {
            width: 100%;
        }
        
        .filter-reset {
            margin-top: 0;
            align-self: flex-start;
        }
        
        .catalog-hero {
            padding: 40px 0 60px;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="catalog-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Catalog Pelatihan & Seminar</h1>
            <p class="hero-subtitle">Tingkatkan expertise Anda dalam bidang perpajakan dan akuntansi bersama para ahli</p>
            
            <div class="search-box">
                <form action="{{ route('catalog.index') }}" method="GET" id="searchForm">
                    <input type="text" class="search-input" name="search" placeholder="Cari seminar, workshop, atau webinar..." 
                           id="searchInput" value="{{ request('search') }}">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Filter Section -->
    <section class="filter-section">
        <form action="{{ route('catalog.index') }}" method="GET" id="filterForm">
            <input type="hidden" name="search" value="{{ request('search') }}">
{{--             
            <div class="filter-group">
                <label class="filter-label">Status Event</label>
                <select class="filter-select" name="status" id="statusFilter">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                    <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                    <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div> --}}
            
            {{-- <div class="filter-group">
                <label class="filter-label">Jenis Event</label>
                <select class="filter-select" name="type" id="typeFilter">
                    <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>Semua Jenis</option>
                    <option value="seminar" {{ request('type') == 'seminar' ? 'selected' : '' }}>Seminar</option>
                    <option value="workshop" {{ request('type') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                    <option value="webinar" {{ request('type') == 'webinar' ? 'selected' : '' }}>Webinar</option>
                </select>
            </div> --}}
            
            {{-- <div class="filter-group">
                <label class="filter-label">Urutkan</label>
                <select class="filter-select" name="sort" id="sortFilter">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Harga Tertinggi</option>
                </select>
            </div> --}}
            
            {{-- <button type="button" class="filter-reset" id="resetFilters">Reset Filter</button> --}}
        </form>
    </section>
    
    <!-- Events Grid -->
    <div class="events-grid" id="eventsContainer">
        @forelse($brevetCs as $item)
        
        <div class="event-card" data-status="{{ $item->status }}" data-type="{{ $item->type }}" 
             data-date="{{ $item->tanggal_mulai->format('d/m/Y') }}" 
             data-price="{{ $item->harga }}">
            <div class="event-image">
                @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" 
                     style="width: 100%; height: 100%; object-fit: cover;">
                @else
                <div class="event-image-placeholder">
                    @if($webinar->type == 'seminar')
                    <i class="fas fa-chart-line"></i>
                    @elseif($webinar->type == 'workshop')
                    <i class="fas fa-file-invoice-dollar"></i>
                    @else
                    <i class="fas fa-laptop"></i>
                    @endif
                </div>
                @endif
                
                <span class="event-badge status-{{ $item->status }}">
                    @if($item->status == 'upcoming')
                    Akan Datang
                    @elseif($item->status == 'ongoing')
                    Berlangsung
                    @else
                    Selesai
                    @endif
                </span>
            </div>
            
            <div class="event-content">
                <span class="event-type type-{{ $item->type }}">
                    @if($item->type == 'seminar')
                    Seminar
                    @elseif($item->type == 'workshop')
                    Workshop
                    @else
                    Webinar
                    @endif
                </span>
                
                <h3 class="event-title">{{ $item->judul }}</h3>
                <p class="event-description">{{ Str::limit($item->deskripsi, 120) }}</p>
                
                <div class="event-meta">
                    <div class="event-date">
                        <span class="event-day">{{ $item->day }}</span>
                        <span class="event-month">{{ $item->tanggal_mulai->format('d/m') }}</span>
                    </div>
                    <div class="event-details">
                        <div class="event-time">
                            <i class="fas fa-clock"></i>
                            {{ \Carbon\Carbon::parse($item->waktu_pelaksanaan)->format('H:i') }}
                        </div>
                        <div class="event-location">
                            <i class="fas @if($item->type == 'item') fa-globe @else fa-map-marker-alt @endif"></i>
                            {{ $item->lokasi }}
                        </div>
                    </div>
                </div>
                
                <div class="event-footer">
                    @if($item->harga == 0)
                    <div class="event-price price-free">GRATIS</div>
                    @else
                    <div class="event-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    @endif
                    
                    @if($item->status == 'upcoming')
                    <button class="event-action">Daftar</button>
                    @elseif($item->status == 'ongoing')
                    <button class="event-action" style="background: var(--warning);">Join</button>
                    @else
                    <button class="event-action" style="background: var(--gray);">Materi</button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state" id="emptyState">
            <i class="fas fa-search"></i>
            <h3>Tidak ada event yang ditemukan</h3>
            <p>Coba ubah filter atau kata kunci pencarian Anda</p>
            <button class="filter-reset" id="resetFiltersEmpty">Reset Filter</button>
        </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    {{-- @if($item->hasPages())
    <div class="pagination">
        {{ $item->links('vendor.pagination.bootstrap-4') }}
    </div>
    @endif --}}
</div>

<!-- Newsletter Section -->
<section class="newsletter">
    <div class="container">
        <div class="newsletter-content">
            <h3 class="newsletter-title">Jangan Lewatkan Update Terbaru</h3>
            <p class="newsletter-text">Dapatkan informasi seminar dan workshop terbaru langsung di inbox Anda</p>
            
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Masukkan email Anda">
                <button type="submit" class="newsletter-button">Subscribe</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const sortFilter = document.getElementById('sortFilter');
        const searchInput = document.getElementById('searchInput');
        const filterForm = document.getElementById('filterForm');
        const searchForm = document.getElementById('searchForm');
        
        // Auto-submit form when filters change
        [statusFilter, typeFilter, sortFilter].forEach(filter => {
            filter.addEventListener('change', function() {
                filterForm.submit();
            });
        });
        
        // Auto-submit search form when typing (with debounce)
        let searchTimeout;
        searchInput.addEventListener('keyup', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500);
        });
        
        // Reset filters
        document.getElementById('resetFilters').addEventListener('click', function() {
            window.location.href = "{{ route('catalog.index') }}";
        });
        
        document.getElementById('resetFiltersEmpty').addEventListener('click', function() {
            window.location.href = "{{ route('catalog.index') }}";
        });
        
        // Event card click handlers
        document.querySelectorAll('.event-action').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.event-card');
                const status = card.getAttribute('data-status');
                const title = card.querySelector('.event-title').textContent;
                
                if (status === 'upcoming') {
                    alert('Mendaftar untuk: ' + title);
                    // Implement registration logic here
                } else if (status === 'ongoing') {
                    alert('Bergabung dengan: ' + title);
                    // Implement join logic here
                } else {
                    alert('Mengakses materi: ' + title);
                    // Implement material access logic here
                }
            });
        });
    });
</script>
@endsection