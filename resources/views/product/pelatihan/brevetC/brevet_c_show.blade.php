@extends('layouts.master')

@section('title', 'Detail Brevet')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">{{ $brevet->judul }}</h2>

    <div class="row">
        <!-- Kolom Gambar -->
        <div class="col-md-4">
            @if($brevet->gambar)
                <img src="{{ Str::startsWith($brevet->gambar, ['http://','https://']) ? $brevet->gambar : asset('storage/' . $brevet->gambar) }}"
                     class="img-fluid rounded shadow-sm" alt="{{ $brevet->judul }}"
                     onerror="this.onerror=null;this.src='{{ asset('images/no-image.jpg') }}'">
            @else
                <img src="{{ asset('images/no-image.jpg') }}" class="img-fluid rounded shadow-sm" alt="No image">
            @endif

            <!-- Tombol Daftar Cepat di samping gambar -->
            <div class="mt-3 d-grid">
                <button type="button" 
                        class="btn-order" 
                        onclick="addToCart({{ $brevet->id }}, 'ItemBrevetC')">
                    Daftar Sekarang
                </button>

                <a href="https://wa.me/62xxxxxxxxxx" class="btn btn-outline-success">
                    Hubungi Admin
                </a>
            </div>
        </div>

        <!-- Kolom Informasi -->
        <div class="col-md-8">
            <div class="mb-3">
                <strong>Periode:</strong>
                <div>{{ \Carbon\Carbon::parse($brevet->tanggal_mulai)->translatedFormat('d F Y') }}
                    - {{ \Carbon\Carbon::parse($brevet->tanggal_selesai)->translatedFormat('d F Y') }}
                </div>
            </div>

            <div class="mb-3">
                <strong>Hari:</strong> {{ $brevet->hari }}
            </div>

            <div class="mb-3">
                <strong>Harga:</strong> Rp {{ number_format($brevet->harga, 0, ',', '.') }}
            </div>

            <div class="mb-3">
                <strong>Deskripsi:</strong>
                <ul class="list-unstyled mt-2">
                    @foreach(preg_split("/\r\n|\n|\r/", $brevet->deskripsi) as $line)
                        @php $trim = trim($line); @endphp
                        @if($trim !== '')
                            <li class="mb-1">
                                @if(str_starts_with($trim, '+'))
                                    <i class="fas fa-check text-success"></i> {{ ltrim($trim, '+ ') }}
                                @elseif(str_starts_with($trim, '-'))
                                    <i class="fas fa-times text-danger"></i> {{ ltrim($trim, '- ') }}
                                @else
                                    <i class="fas fa-check text-success"></i> {{ $trim }}
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <hr>

            <h4>Detail Pelatihan</h4>
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="card-title mb-1">{{ optional($brevet->detail)->level ?? '-' }}</h5>
                            <p class="mb-1"><strong>Fasilitas:</strong> {{ optional($brevet->detail)->fasilitas ?? '-' }}</p>
                            <p class="mb-1"><strong>Durasi:</strong> {{ optional($brevet->detail)->durasi_jam ? optional($brevet->detail)->durasi_jam . ' jam' : '-' }}</p>
                            <p class="mb-1"><strong>Instruktur:</strong> {{ optional($brevet->detail)->instruktur ?? '-' }}</p>
                            <p class="mb-1"><strong>Lokasi:</strong> {{ optional($brevet->detail)->lokasi ?? '-' }}</p>
                            <p class="mb-1"><strong>Kuota:</strong> {{ optional($brevet->detail)->kuota_peserta ?? '-' }}</p>
                        </div>
                    </div>

                    @if(optional($brevet->detail)->syarat_peserta)
                        <p class="mt-2"><strong>Syarat:</strong><br>{!! nl2br(e(optional($brevet->detail)->syarat_peserta)) !!}</p>
                    @endif

                    @if(optional($brevet->detail)->materi_pelatihan)
                        <p><strong>Materi:</strong><br>{!! nl2br(e(optional($brevet->detail)->materi_pelatihan)) !!}</p>
                    @endif
                </div>
            </div>


            <a href="{{ route('brevet.ab') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<!-- SweetAlert + addToCart JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

function addToCart(id, type) {
    fetch("{{ route('cart.add', [], false) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: id, type: type }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: data.message,
                timer: 1200,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
@endsection
