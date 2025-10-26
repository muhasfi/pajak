@extends('layouts.master')

@section('title', $layanan->judul)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-center bg-primary text-white py-4 rounded-top-4">
                    <h2 class="mb-2">{{ $layanan->detail->paket ?? $layanan->judul }}</h2>
                    <h4 class="fw-bold">{{ 'Rp ' . number_format($layanan->harga, 0, ',', '.') }}</h4>
                </div>

                <div class="card-body p-4">
                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-2">Deskripsi Layanan</h5>
                        <p class="text-muted fs-5">
                            {{ $layanan->detail->deskripsi ?? 'Deskripsi belum tersedia.' }}
                        </p>
                    </div>

                    {{-- Benefit --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Benefit yang Anda Dapatkan</h5>

                        @if (!empty($layanan->detail->benefit))
                            <ul class="list-unstyled fs-5">
                                @foreach ($layanan->detail->benefit as $benefit)
                                    @php
                                        $trimmed = trim($benefit);
                                    @endphp

                                    @if ($trimmed !== '')
                                        @php
                                            $isNegative = Str::startsWith($trimmed, '-');
                                            $text = ltrim($trimmed, '+- ');
                                        @endphp

                                        <li class="mb-2">
                                            <i class="fas fa-{{ $isNegative ? 'times text-danger' : 'check text-success' }} me-2"></i>
                                            {{ $text }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted fs-5">Benefit belum tersedia.</p>
                        @endif
                    </div>
                </div>

                <div class="card-footer bg-light py-4 text-center">
                    <button type="button" 
                        class="btn btn-primary"
                        onclick="addToCart({{ $layanan->id }}, 'ItemPajak')">
                        <span>Mulai pajak</span>
                    </button>
                    <a href="/kontak" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-comments me-2"></i> Konsultasi
                    </a>
                </div>
            </div>

            <a href="{{ route('jasa.perpajakan') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>

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