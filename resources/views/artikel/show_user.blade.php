@extends('layouts.master')
@section('title', $artikel->title)

@section('content')

@php
    // Hitung waktu baca otomatis (200 kata/menit)
    $wordCount = str_word_count(strip_tags($artikel->content));
    $readingTime = ceil($wordCount / 200);
@endphp

<!-- Hero Section -->
<section class="article-hero py-5 bg-light border-bottom">
    <div class="container text-center">
        <h1 class="article-title mb-3">{{ $artikel->title }}</h1>
        <div class="article-meta d-flex justify-content-center gap-3 flex-wrap text-muted small">
            <div class="meta-item d-flex align-items-center gap-1">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}</span>
            </div>
            <div class="meta-item d-flex align-items-center gap-1">
                <i class="fas fa-clock"></i>
                <span>{{ $readingTime }} menit dibaca</span>
            </div>
            @if($artikel->category)
            <div class="meta-item d-flex align-items-center gap-1">
                <i class="fas fa-tag"></i>
                <span>{{ $artikel->category->name }}</span>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="article-section py-5">
    <div class="container">
        <div class="article-wrapper mx-auto" style="max-width:800px;">
            
            @if($artikel->thumbnail)
                <div class="article-image mb-4 text-center">
                    <img src="{{ asset('storage/'.$artikel->thumbnail) }}" class="img-fluid rounded shadow-sm" alt="{{ $artikel->title }}">
                </div>
            @endif

            @if($artikel->excerpt)
                <p class="article-excerpt lead text-muted mb-4">{{ $artikel->excerpt }}</p>
            @endif

            <div class="article-content mb-5">
                {!! $artikel->content !!}
            </div>

            <div class="article-footer d-flex justify-content-between flex-wrap align-items-center border-top pt-3 mt-4">
                <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary mb-2">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Artikel
                </a>
                
                <div class="share-section d-flex align-items-center gap-2 mb-2">
                    <span class="text-muted small">Bagikan:</span>
                    <div class="share-buttons d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary" title="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-info" title="Share on Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-primary" title="Share on LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary copy-link" title="Copy Link">
                            <i class="fas fa-link"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Articles -->
            @if(isset($relatedArticles) && $relatedArticles->count() > 0)
                <div class="related-articles mt-5">
                    <h3 class="section-title h5 mb-4">Artikel Terkait</h3>
                    <div class="row g-3">
                        @foreach($relatedArticles as $related)
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <a href="{{ route('artikel.user.show', $related->slug) }}">
                                        @if($related->thumbnail)
                                            <img src="{{ asset('storage/'.$related->thumbnail) }}" class="card-img-top" alt="{{ $related->title }}">
                                        @else
                                            <img src="{{ asset('assets/images/default-article.jpg') }}" class="card-img-top" alt="Default Artikel">
                                        @endif
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title h6">
                                            <a href="{{ route('artikel.user.show', $related->slug) }}" class="text-decoration-none">{{ $related->title }}</a>
                                        </h4>
                                        <div class="text-muted small">
                                            {{ \Carbon\Carbon::parse($related->publish_date)->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Copy link functionality
    document.querySelectorAll('.copy-link').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = window.location.href;

            navigator.clipboard.writeText(url).then(() => {
                const originalHTML = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i>';
                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-success');
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline-secondary');
                }, 2000);
            });
        });
    });

    // Smooth scroll untuk anchor links dalam konten
    document.querySelectorAll('.article-content a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endpush

@endsection
