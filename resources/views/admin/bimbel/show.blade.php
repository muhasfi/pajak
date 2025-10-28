@extends('admin.layouts.master')
@section('title', 'Detail Paket Bimbel')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Paket Bimbel</h3>
            <p class="text-subtitle text-muted">Informasi lengkap tentang paket bimbel yang dipilih</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-4 text-center">
                @if($bimbel->gambar)
                    <img src="{{ asset('storage/' . $bimbel->gambar) }}" alt="Gambar Bimbel" class="img-fluid rounded shadow-sm mb-3">
                @else
                    <img src="{{ asset('images/no-image.png') }}" alt="Tidak ada gambar" class="img-fluid rounded shadow-sm mb-3">
                @endif
            </div>

            <div class="col-md-8">
                <h4 class="mb-2">{{ $bimbel->judul }}</h4>
                @php
                    // Pisahkan deskripsi berdasarkan baris baru
                    $lines = preg_split('/\r\n|\r|\n/', $bimbel->deskripsi ?? '');
                @endphp

                @if(!empty($lines))
                    <ul class="list-unstyled mb-3">
                        @foreach($lines as $line)
                            @php
                                $trimmed = trim($line);
                            @endphp

                            @if(Str::startsWith($trimmed, '+'))
                                <li><span class="text-success">✅</span> {{ ltrim($trimmed, '+ ') }}</li>
                            @elseif(Str::startsWith($trimmed, '-'))
                                <li><span class="text-danger">❌</span> {{ ltrim($trimmed, '- ') }}</li>
                            @else
                                <li><span class="text-success">✅</span> {{ ltrim($trimmed, '+ ') }}</li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted fst-italic">Tidak ada deskripsi.</p>
                @endif


                <h6><strong>Harga:</strong> Rp {{ number_format($bimbel->harga, 0, ',', '.') }}</h6>

                <div class="mt-4">
                    <a href="{{ route('admin.bimbel.edit', $bimbel->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="{{ route('admin.bimbel.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="mt-4">
            <h5 class="mb-3">Detail Materi</h5>

            @if($bimbel->detail && $bimbel->detail->count() > 0)
                @foreach($bimbel->detail as $detail)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $detail->judul_materi ?? 'Tanpa Judul' }}</h6>
                            <p class="mb-1 text-muted">{{ $detail->deskripsi ?? '-' }}</p>
                            @if($detail->link)
                                <a href="{{ $detail->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-link-45deg"></i> Lihat Materi
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted fst-italic">Belum ada detail materi untuk paket ini.</p>
            @endif
        </div>

    </div>
</div>
@endsection
