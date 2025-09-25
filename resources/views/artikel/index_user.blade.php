@extends('layouts.master')
@section('title', 'Artikel')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Artikel</h2>

    <div class="row">
        @forelse ($artikels as $artikel)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($artikel->thumbnail)
                        <img src="{{ asset('storage/'.$artikel->thumbnail) }}" class="card-img-top" alt="{{ $artikel->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('artikel.user.show', $artikel->slug) }}" class="text-decoration-none">
                                {{ $artikel->title }}
                            </a>
                        </h5>
                        <p class="text-muted small mb-2">
                            {{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}
                        </p>
                        <p class="card-text">{{ Str::limit($artikel->excerpt, 100) }}</p>
                        <a href="{{ route('artikel.user.show', $artikel->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada artikel tersedia.</p>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $artikels->links() }} {{-- pagination --}}
    </div>
</div>
@endsection
