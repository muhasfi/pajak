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
        @if($artikels->count())
            <div class="artikel-grid">
                @foreach ($artikels as $artikel)
                    <div class="artikel-card">
                        <div class="artikel-image">
                            @if($artikel->thumbnail)
                                <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="{{ $artikel->title }}">
                            @else
                                <img src="{{ asset('assets/customer/images/seminar2.jpg') }}" alt="Default Artikel">
                            @endif
                        </div>

                        <div class="artikel-content">
                            @if($artikel->category)
                                <span class="artikel-category-tag">{{ $artikel->category->name }}</span>
                            @endif
                            
                            <h3 class="artikel-title">
                                <a href="{{ route('artikel.user.show', $artikel->slug) }}">
                                    {{ $artikel->title }}
                                </a>
                            </h3>
                            
                            <div class="artikel-meta">
                                <i class="far fa-calendar"></i> 
                                {{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}
                            </div>
                            
                            <p class="artikel-excerpt">{{ Str::limit($artikel->excerpt, 120) }}</p>
                            
                            <div class="artikel-footer">
                                <a href="{{ route('artikel.user.show', $artikel->slug) }}" class="artikel-read-more-link">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($artikels->hasPages())
                <div class="artikel-pagination">
                    <div class="artikel-pagination-links">
                        {{-- Previous Page Link --}}
                        @if ($artikels->onFirstPage())
                            <span class="artikel-pagination-link disabled">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $artikels->previousPageUrl() }}" class="artikel-pagination-link">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                            @if ($page == $artikels->currentPage())
                                <span class="artikel-pagination-link active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="artikel-pagination-link">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($artikels->hasMorePages())
                            <a href="{{ $artikels->nextPageUrl() }}" class="artikel-pagination-link">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="artikel-pagination-link disabled">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
        @else
            <div class="artikel-empty-state">
                <i class="fas fa-newspaper"></i>
                <p>Tidak ada artikel tersedia saat ini.</p>
                @if(request('search'))
                    <p>Hasil pencarian untuk "{{ request('search') }}" tidak ditemukan.</p>
                @endif
            </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Efek smooth scroll untuk link internal
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Efek hover yang lebih smooth pada kartu artikel
    document.querySelectorAll('.artikel-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
    });

    // Animasi fade in untuk artikel cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.artikel-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>
@endpush