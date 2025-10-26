@extends('layouts.master')

@section('title', $layanan->judul)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card card-consultation shadow-lg border-0 rounded-4 fade-in">
                <div class="card-header text-center bg-primary text-white py-4 rounded-top-4">
                    <h2 class="mb-2">{{ $layanan->judul }}</h2>
                    <h4 class="fw-bold">{{ 'Rp ' . number_format($layanan->harga, 0, ',', '.') }}</h4>
                </div>

                <div class="card-body p-4">
                    {{-- Waktu Layanan --}}
                    @if(!empty($layanan->detail->waktu_menit))
                        <div class="text-center mb-4">
                            <span class="duration-badge fs-6">
                                <i class="far fa-clock me-2"></i>{{ $layanan->detail->waktu_menit }} Menit
                            </span>
                        </div>
                    @endif

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-2">Deskripsi Layanan</h5>
                        <p class="text-muted fs-5">
                            {{ ucfirst($layanan->detail->deskripsi ?? 'Deskripsi belum tersedia.') }}
                        </p>
                    </div>

                    {{-- Benefit --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Benefit yang Didapat</h5>

                        @if(!empty($layanan->detail->benefit) && is_array($layanan->detail->benefit))
                            <ul class="feature-list fs-5">
                                @foreach($layanan->detail->benefit as $benefit)
                                    @php
                                        $isNegative = Str::startsWith(trim($benefit), '-');
                                        $text = ltrim(trim($benefit), '+- ');
                                    @endphp

                                    <li class="mb-2">
                                        @if($isNegative)
                                            <i class="fas fa-times text-danger me-2"></i>{{ $text }}
                                        @else
                                            <i class="fas fa-check text-success me-2"></i>{{ $text }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted fs-5">Belum ada benefit yang ditambahkan.</p>
                        @endif
                    </div>
                </div>

                <div class="card-footer bg-light py-4 text-center">
                    <button type="button" 
                        class="btn btn-consult w-100"
                        onclick="addToCart({{ $layanan->id }}, 'ItemKonsultasi')">
                        <span>Pilih Paket Ini</span>
                    </button>

                    <a href="/kontak" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-comments me-2"></i> Konsultasi Dulu
                    </a>
                </div>
            </div>

            {{-- Tombol kembali --}}
            <div class="text-center mt-4">
                <a href="{{ route('private') }}" class="text-decoration-none text-muted">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Layanan
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

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
                text: data.message,
                timer: 1200,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
