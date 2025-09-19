@extends('layouts.customer')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="text-center">Daftar Artikel Kami</h1>
        <p class="text-center text-muted">Temukan berbagai artikel menarik dengan harga terbaik</p>
    </div>
</div>

@if($articles->count() > 0)
<div class="row">
    @foreach($articles as $article)
    <div class="col-md-4 mb-4">
        <div class="card article-card h-100">
            @if($article->img)
                <img src="{{ asset('storage/' . $article->img) }}" class="card-img-top" alt="{{ $article->name }}">
            @else
                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center">
                    <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
                </div>
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $article->name }}</h5>
                <p class="card-text flex-grow-1">{{ Str::limit($article->description, 100) }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h5 text-primary mb-0">Rp {{ number_format($article->price, 0, ',', '.') }}</span>
                    <a href="{{ route('customer.articles.show', $article->id) }}" class="btn btn-primary">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info text-center">
    <h4 class="alert-heading">Belum ada artikel</h4>
    <p>Silakan kembali lagi nanti untuk melihat artikel terbaru kami.</p>
</div>
@endif
@endsection