@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="text-center">Daftar Seminar Tersedia</h1>
        <p class="text-center text-muted">Temukan seminar yang sesuai dengan minat dan kebutuhan Anda</p>
    </div>
</div>

<div class="row">
    @forelse($seminars as $seminar)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            @if($seminar->img)
                <img src="{{ asset('storage/' . $seminar->img) }}" class="card-img-top" alt="{{ $seminar->nama }}" style="height: 200px; object-fit: cover;">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span class="text-muted">Tidak ada gambar</span>
                </div>
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $seminar->nama }}</h5>
                <p class="card-text flex-grow-1">{{ Str::limit($seminar->deskripsi, 100) }}</p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <span class="h5 mb-0 text-primary">Rp {{ number_format($seminar->harga, 0, ',', '.') }}</span>
                    <a href="{{ route('seminars.show', $seminar->id) }}" class="btn btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Saat ini tidak ada seminar yang tersedia. Silakan kembali lagi nanti.
        </div>
    </div>
    @endforelse
</div>
@endsection