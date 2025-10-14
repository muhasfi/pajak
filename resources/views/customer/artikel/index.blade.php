@extends('layouts.master')

@section('title', 'Berita Pilihan')

@section('content')
<div class="container my-4">
    <!-- Judul -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold border-start border-4 border-danger ps-2">Berita Pilihan</h5>
        <a href="#" class="text-danger fw-semibold text-decoration-none hover-link">Selengkapnya ></a>
    </div>

    <!-- Bagian Atas -->
    <div class="row">
        <!-- Berita Utama -->
        <div class="col-md-8 mb-3">
            <div class="card berita-card border-0 shadow-sm overflow-hidden">
                <div class="position-relative">
                    <img src="https://source.unsplash.com/800x400?technology" class="card-img-top rounded" alt="Berita Teknologi">

                    <img src="https://cdn1-production-images-kly.akamaized.net/0bgy9cgxYbzEOVIdhQ48kto5pO8=/0x106:1920x1186/800x450/filters:quality(75):format(webp)/kly-media-production/2023/09/25/4723315-1695618183825-4cd0b7323cfc8ab2a2b38f8e1a6e38c4.jpeg" 
                        class="card-img-top berita-img rounded-top" alt="Vape Zombie Malaysia">
                </div>
                <div class="card-body">
                    <small class="text-muted">9 menit lalu</small>
                    <h5 class="card-title mt-2 fw-semibold berita-title">Vape Zombie, Rokok Elektrik yang Diduga Mengandung Narkoba Berasal dari Malaysia</h5>
                    <p class="card-text text-secondary">
                        Direktorat Tindak Pidana Narkoba Bareskrim Polri berhasil menggagalkan penyelundupan 84 cairan vape yang diduga mengandung zat etomidate atau dikenal sebagai Vape Zombie dari Malaysia.
                    </p>
                </div>
            </div>
        </div>

        <!-- Berita Samping -->
        <div class="col-md-4">
            <div class="berita-samping d-flex mb-3 hover-card">
                <img src="https://cdn0-production-images-kly.akamaized.net/yoNRF_dq7cJqDNX2gI9gbjDiP1g=/640x360/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/2022/03/10/206e3b23965f7b6a0b86562dd52d5738.jpg" 
                    class="rounded me-3" width="100" height="70" alt="Penjual Tahu Goreng">
                <div>
                    <small class="text-muted">15 menit lalu</small>
                    <p class="fw-semibold mb-0">Penjual Tahu Goreng di China Viral karena Dagang Pakai Cosplay Kaisar Kuno</p>
                </div>
            </div>

            <div class="berita-samping d-flex mb-3 hover-card">
                <img src="https://cdn0-production-images-kly.akamaized.net/T6zC3zlbNoyUOgMeSnGrEwIuJjM=/0x0:800x450/640x360/filters:quality(75):format(webp)/kly-media-production/2021/11/30/2497a089196a6a6bcd20e5b6a062c3a8.jpg" 
                    class="rounded me-3" width="100" height="70" alt="Bandara YIA Kuliner">
                <div>
                    <small class="text-muted">24 menit lalu</small>
                    <p class="fw-semibold mb-0">12 Rekomendasi Tempat Makan Enak Dekat Bandara YIA, Kuliner Lezat di Sekitar...</p>
                </div>
            </div>

            <div class="berita-samping d-flex mb-3 hover-card">
                <img src="https://akcdn.detik.net.id/community/media/visual/2023/03/25/timnas-italia-2_169.jpeg?w=700&q=90" 
                    class="rounded me-3" width="100" height="70" alt="Italia vs Israel">
                <div>
                    <small class="text-muted">24 menit lalu</small>
                    <p class="fw-semibold mb-0">Prediksi Italia vs Israel: Kemenangan Adalah Satu-satunya Pilihan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sorotan -->
    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold border-start border-4 border-warning ps-2">Sorotan</h5>
            <a href="#" class="text-danger fw-semibold text-decoration-none hover-link">Selengkapnya ></a>
        </div>

        <div class="row">
            <div class="col-6 col-md-3 mb-3">
                <div class="card berita-grid border-0 shadow-sm h-100 hover-zoom">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2023/10/08/gleison-bremer_169.jpeg?w=700&q=90" 
                        class="card-img-top rounded-top" alt="Gleison Bremer">
                    <div class="card-body">
                        <small class="text-muted">Bola • 26 menit lalu</small>
                        <p class="fw-semibold mt-2 mb-0">Cedera Lutut Gleison Bremer Jadi Masalah Baru untuk Juventus</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <div class="card berita-grid border-0 shadow-sm h-100 hover-zoom">
                    <img src="https://cdn0-production-images-kly.akamaized.net/0Pp2iOEpwMPrN9fKHDWJHTbAQ9s=/640x360/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/2023/09/15/514e11b6b7b7b7a2a58b7158bfa8a6e4.jpg" 
                        class="card-img-top rounded-top" alt="Obamacare">
                    <div class="card-body">
                        <small class="text-muted">Bisnis • 29 menit lalu</small>
                        <p class="fw-semibold mt-2 mb-0">Kebutuhan Pendanaan Obamacare Picu Shutdown Pemerintahan AS</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <div class="card berita-grid border-0 shadow-sm h-100 hover-zoom">
                    <img src="https://cdn0-production-images-kly.akamaized.net/l9EHRRvwFmfI2J5Qe3-7gT6eM0w=/0x0:640x426/640x360/filters:quality(75):format(webp)/kly-media-production/2021/02/03/155d7cc0b8a49a95f08f5195c5b302d5.jpg" 
                        class="card-img-top rounded-top" alt="Jeff Bezos">
                    <div class="card-body">
                        <small class="text-muted">Bisnis • 44 menit lalu</small>
                        <p class="fw-semibold mt-2 mb-0">Jeff Bezos Ungkap Rahasia Sebelum Mulai Bangun Blue Origin</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <div class="card berita-grid border-0 shadow-sm h-100 hover-zoom">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2023/09/14/ibl_169.jpeg?w=700&q=90" 
                        class="card-img-top rounded-top" alt="IBL 2026">
                    <div class="card-body">
                        <small class="text-muted">Bola • 44 menit lalu</small>
                        <p class="fw-semibold mt-2 mb-0">IBL 2026 Siap Bergulir: Format Kandang-Tandang akan Diterapkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CSS tambahan --}}
<style>
/* Efek hover umum */
.berita-card, .berita-grid, .hover-card {
    transition: all 0.25s ease-in-out;
}
.berita-card:hover, .berita-grid:hover, .hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
}

/* Efek zoom gambar */
.hover-zoom img {
    transition: transform 0.4s ease;
}
.hover-zoom:hover img {
    transform: scale(1.05);
}

/* Efek warna link */
.hover-link {
    position: relative;
}
.hover-link::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0%;
    height: 2px;
    background-color: #dc3545;
    transition: width 0.3s ease;
}
.hover-link:hover::after {
    width: 100%;
}

/* Efek teks judul */
.berita-title:hover {
    color: #dc3545;
    transition: color 0.3s ease;
}

/* Tampilan responsif */
@media (max-width: 768px) {
    .berita-samping img {
        width: 90px;
        height: 60px;
    }
    .berita-title {
        font-size: 1rem;
    }
}
</style>
@endsection
