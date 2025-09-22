@extends('admin.layouts.master')
@section('title', 'Detail Artikel')
<style>
    .article-content img {
    max-width: 100%;   /* batasi lebar sesuai container */
    height: auto;      /* biar proporsional */
    display: block;    /* biar tidak inline */
    margin: 1rem auto; /* tengah + ada spasi */
    border-radius: 8px; /* opsional, biar ada sudut rounded */
}

</style>

@section('content')

<div class="card">
    <div class="card-body">
        <!-- Judul -->
        <h2 class="fw-bold">{{ $artikel->title }}</h2>
        <p class="text-muted mb-1">
            <small>
                Slug: <code>{{ $artikel->slug }}</code> | 
                Status: 
                @if($artikel->status === 'publish')
                    <span class="badge bg-success">Publish</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </small>
        </p>
        <p class="text-muted">
            <small>
                Dibuat: {{ $artikel->created_at->format('d M Y H:i') }} |
                Diperbarui: {{ $artikel->updated_at->format('d M Y H:i') }}
            </small>
        </p>

        <!-- Thumbnail -->
        @if($artikel->thumbnail)
            <div class="mb-3">
                <img src="{{ asset('storage/'.$artikel->thumbnail) }}" 
                     alt="Thumbnail" class="img-fluid rounded shadow" style="max-height: 300px;">
            </div>
        @endif

        <!-- Excerpt -->
        @if($artikel->excerpt)
            <blockquote class="blockquote">
                <p class="mb-0">{{ $artikel->excerpt }}</p>
            </blockquote>
        @endif

        <!-- Isi Artikel -->
        <!-- Isi Artikel -->
        <div class="mb-3">
            <strong>Isi Artikel:</strong>
            <div class="mt-2 border rounded p-3 article-content">
                {!! $artikel->content !!}
            </div>
        </div>

    </div>
</div>
@endsection
