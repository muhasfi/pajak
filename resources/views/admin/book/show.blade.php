@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header text-white">
            <h5 class="mb-0">{{ $book->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Gambar -->
                <div class="col-md-4 text-center">
                    <img 
                        src="{{ $book->img ? asset('storage/' . $book->img) : asset('No_image_available.webp') }}"
                        alt="Cover E-Book"
                        class="img-fluid rounded mb-3"
                        style="max-height: 250px; object-fit: cover;"
                        onerror="this.onerror=null;this.src='{{ asset('No_image_available.webp') }}';">
                </div>

                <!-- Info -->
                <div class="col-md-8">
                    <h4>{{ $book->name }}</h4>
                    <p class="text-muted">{{ $book->description ?? '-' }}</p>

                    <p><strong>Harga:</strong> Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                    <p>
                        <strong>Status:</strong>
                        @if($book->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Tidak Aktif</span>
                        @endif
                    </p>

                    <hr>

                    <!-- Detail E-Book -->
                    @if($book->detail)
                        <h5>File E-Book</h5>
                        @php
                            $file = $book->detail->file_path;
                            $isLink = Str::startsWith($file, ['http://', 'https://']);
                        @endphp

                        @if($file)
                            @if($isLink)
                                <p><a href="{{ $file }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="bi bi-link-45deg"></i> Buka Link
                                </a></p>
                            @else
                                <p><a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-success">
                                    <i class="bi bi-file-earmark-pdf"></i> Lihat File
                                </a></p>
                            @endif
                        @else
                            <p class="text-muted">Tidak ada file atau link tersedia.</p>
                        @endif
                    @else
                        <p class="text-muted">Detail e-book belum ditambahkan.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.book.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
