@extends('admin.layouts.master')
@section('title', 'Detail Item Bimbel')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Item Bimbel</h3>
                <p class="text-subtitle text-muted">Meninjau informasi lengkap dari paket bimbel</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-end">
                <a href="{{ route('bimbel.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <section class="section mt-3">
        <div class="card">
            <div class="card-header">
                <h4>{{ $item->judul }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Deskripsi:</strong> {{ $item->deskripsi ?? '-' }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                <p><strong>Status:</strong> 
                    @if($item->is_active)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Nonaktif</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>Daftar Modul</h5>
            </div>
            <div class="card-body">
                @forelse ($item->details as $detail)
                    <div class="border rounded p-3 mb-3">
                        <h6>{{ $detail->urutan }}. {{ $detail->judul }}</h6>
                        <p>{{ $detail->deskripsi ?? '-' }}</p>

                        @if($detail->materi_pdf)
                            <p>
                                📄 <a href="{{ asset('storage/'.$detail->materi_pdf) }}" target="_blank">Lihat Materi PDF</a>
                            </p>
                        @endif

                        @if($detail->video)
                            @if(Str::contains($detail->video, 'youtube.com') || Str::contains($detail->video, 'youtu.be'))
                                {{-- Embed YouTube --}}
                                <div class="ratio ratio-16x9 mb-2">
                                    <iframe src="{{ $detail->video }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            @else
                                {{-- Video upload --}}
                                <video class="w-100 mb-2" controls>
                                    <source src="{{ asset('storage/'.$detail->video) }}" type="video/mp4">
                                    Browser anda tidak mendukung video.
                                </video>
                            @endif
                        @endif

                        <p><strong>Status:</strong> 
                            @if($detail->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </p>
                    </div>
                @empty
                    <p class="text-muted">Belum ada modul untuk item ini.</p>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection
