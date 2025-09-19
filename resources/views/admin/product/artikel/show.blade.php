@extends('layouts.app')

@section('title', $artikel->nama)

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($artikel->img)
            <img src="{{ asset('storage/' . $artikel->img) }}" alt="{{ $artikel->nama }}" class="product-image w-100">
        @else
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                <i class="bi bi-image display-1"></i>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <h2>{{ $artikel->nama }}</h2>
        <p class="h3 text-primary my-3">Rp {{ number_format($artikel->harga, 0, ',', '.') }}</p>
        <div class="mb-4">
            <h4>Deskripsi</h4>
            <p>{{ $artikel->deskripsi }}</p>
        </div>
        <a href="{{ route('artikel.catalog') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Katalog
        </a>
    </div>
</div>
@endsection