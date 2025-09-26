@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $itemBimbel->judul }}</h2>
                <p class="text-muted">Harga: <span class="h4 text-primary">Rp {{ number_format($itemBimbel->harga, 0, ',', '.') }}</span></p>
                
                <h4>Deskripsi</h4>
                <p>{{ $itemBimbel->deskripsi }}</p>
                
                @if($itemBimbel->materi_pdf)
                <div class="mt-4">
                    <h4>Materi PDF</h4>
                    <a href="{{ Storage::url($itemBimbel->materi_pdf) }}" class="btn btn-outline-primary" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i> Download Materi
                    </a>
                </div>
                @endif
                
                @if($itemBimbel->video)
                <div class="detail-item">
                    <div class="detail-label">Video Pembelajaran</div>
                    <div class="file-preview">
                        <i class="bi bi-play-btn-fill text-primary me-2"></i>
                        <span>{{ basename($itemBimbel->video) }}</span>
                        <div class="mt-2">
                            <video class="video-preview" controls>
                                <source src="{{ Storage::url($itemBimbel->video) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                            <div class="mt-2">
                                <a href="{{ Storage::url($itemBimbel->video) }}" download class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Download Video
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $itemBimbel->judul }}</h2>
                <p class="text-muted">Harga: <span class="h4 text-primary">Rp {{ number_format($itemBimbel->harga, 0, ',', '.') }}</span></p>
                
                <h4>Deskripsi</h4>
                <p>{{ $itemBimbel->deskripsi }}</p>
                
                @if($itemBimbel->materi_pdf)
                <div class="mt-4">
                    <h4>Materi PDF</h4>
                    <a href="{{ Storage::url($itemBimbel->materi_pdf) }}" class="btn btn-outline-primary" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i> Download Materi
                    </a>
                </div>
                @endif
                
                @if($itemBimbel->video)
                <div class="detail-item">
                    <div class="detail-label">Video Pembelajaran</div>
                    <div class="file-preview">
                        <i class="bi bi-play-btn-fill text-primary me-2"></i>
                        <span>{{ basename($itemBimbel->video) }}</span>
                        <div class="mt-2">
                            <video class="video-preview" controls>
                                <source src="{{ Storage::url($itemBimbel->video) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                            <div class="mt-2">
                                <a href="{{ Storage::url($itemBimbel->video) }}" download class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Download Video
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection