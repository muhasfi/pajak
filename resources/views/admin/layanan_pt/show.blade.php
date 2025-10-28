@extends('admin.layouts.master')
@section('title', 'Detail Layanan PT')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Layanan PT</h3>
            <p class="text-subtitle text-muted">Informasi lengkap tentang layanan PT</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-4 text-center">
                @if($layananPt->gambar)
                    <img src="{{ asset('storage/' . $layananPt->gambar) }}" alt="Gambar Layanan" class="img-fluid rounded shadow-sm mb-3">
                @else
                    <img src="{{ asset('No_image_available.webp') }}" alt="Tidak ada gambar" class="img-fluid rounded shadow-sm mb-3">
                @endif
            </div>

            <div class="col-md-8">
                <h4 class="mb-2">{{ $layananPt->judul }}</h4>
                <p class="mb-2"><strong>Paket:</strong> {{ $layananPt->detail->paket ?? '-' }}</p>
                <h5 class="text-success mb-3">Rp {{ number_format($layananPt->harga, 0, ',', '.') }}</h5>

                <div class="mt-4">
                    <a href="{{ route('admin.layanan-pt.edit', $layananPt->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="{{ route('admin.layanan-pt.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <hr>

        {{-- Deskripsi --}}
        <div class="mt-4">
            <h5 class="mb-3">Deskripsi</h5>
            @php
                $deskripsi = $layananPt->detail->deskripsi ?? '';
                $linesDeskripsi = preg_split('/\r\n|\r|\n/', $deskripsi);
            @endphp

            @if (!empty($deskripsi))
                <ul class="list-unstyled mb-0">
                    @foreach ($linesDeskripsi as $line)
                        @php $trimmed = trim($line); @endphp
                        @if ($trimmed !== '')
                            <li>{{ $trimmed }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="text-muted fst-italic">Tidak ada deskripsi.</p>
            @endif
        </div>

        {{-- Benefit --}}
        <div class="mt-4">
            <h5 class="mb-3">Benefit</h5>
            @php
                $benefitData = $layananPt->detail->benefit ?? [];
                // Jika benefit disimpan sebagai teks, ubah ke array per baris
                if (is_string($benefitData)) {
                    $benefitData = preg_split('/\r\n|\r|\n/', $benefitData);
                }
            @endphp

            @if (!empty($benefitData))
                <ul class="list-unstyled">
                    @foreach ($benefitData as $benefit)
                        @php $trimmed = trim($benefit); @endphp

                        @if(Str::startsWith($trimmed, '+'))
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> {{ ltrim($trimmed, '+ ') }}</li>
                        @elseif(Str::startsWith($trimmed, '-'))
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> {{ ltrim($trimmed, '- ') }}</li>
                        @elseif(!empty($trimmed))
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> {{ ltrim($trimmed, '+ ') }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="text-muted fst-italic">Tidak ada benefit tambahan.</p>
            @endif
        </div>

        <!-- Detail E-Book -->
            @if($layananPt->detail)
                <h5>Link / FIle</h5>
                @php
                    $file = $layananPt->detail->file_path;
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
@endsection
