@extends('layouts.master')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container position-relative">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-4">
                    Wujudkan Perusahaan Impian Anda
                </h1>
                <p class="lead mb-5 opacity-90">
                    Layanan pembuatan PT profesional dengan proses cepat, transparan, dan didukung tim ahli berpengalaman. 
                    Lebih dari 1.000+ perusahaan telah mempercayakan pembuatan PT kepada kami.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#layanan" class="btn btn-light btn-lg px-5 py-3 fw-bold rounded-pill">
                        <i class="fas fa-rocket me-2"></i>Lihat Layanan
                    </a>
                    <a href="#tentang" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold rounded-pill">
                        <i class="fas fa-play-circle me-2"></i>Pelajari Lebih
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number">1.000+</div>
                    <p class="text-muted mb-0">Perusahaan Terbentuk</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <p class="text-muted mb-0">Kepuasan Klien</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <p class="text-muted mb-0">Support Online</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number">5-10</div>
                    <p class="text-muted mb-0">Hari Kerja</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Section -->
<section id="layanan" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 rounded-pill mb-3">
                <i class="fas fa-star me-2"></i>Paket Layanan Terbaik
            </span>
            <h2 class="display-5 fw-bold mb-3">Pilih Solusi Terbaik untuk Bisnis Anda</h2>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Kami menawarkan berbagai paket layanan pembuatan PT yang disesuaikan dengan kebutuhan dan anggaran bisnis Anda.
            </p>
        </div>

        <div class="row justify-content-center g-4">
            @foreach($layanans as $index => $layanan)
            <div class="col-lg-4 col-md-6">
                <div class="card-service h-100 {{ $index % 2 == 1 ? 'premium' : '' }} position-relative">
                    @if($index % 2 == 1)
                    <div class="badge-premium">
                        <i class="fas fa-crown me-1"></i>RECOMMENDED
                    </div>
                    @endif

                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="icon-wrapper mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" 
                                     style="width: 80px; height: 80px;">
                                    <i class="fas fa-{{ $index == 0 ? 'gem' : ($index == 1 ? 'crown' : 'rocket') }} fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold text-primary mb-2">{{ $layanan->judul }}</h4>
                            <div class="price-tag mb-2">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</div>
                            <small class="text-muted">All-inclusive package</small>
                        </div>

                        <p class="text-muted text-center mb-4">{{ $layanan->deskripsi }}</p>

                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ min(100, ($layanan->detailLayanans->count() / 8) * 100) }}%"></div>
                        </div>

                        <h6 class="fw-bold text-primary mb-3">
                            <i class="fas fa-list-check me-2"></i>Yang termasuk:
                        </h6>

                        <ul class="feature-list list-unstyled mb-4">
                            @foreach($layanan->detailLayanans->take(5) as $detail)
                            <li class="d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mt-1 me-3"></i>
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $detail->nama_langkah }}</strong>
                                    <small class="text-muted">{{ Str::limit($detail->keterangan, 40) }}</small>
                                    <span class="badge bg-primary bg-opacity-10 text-primary ms-2">
                                        {{ $detail->estimasi_hari }}d
                                    </span>
                                </div>
                            </li>
                            @endforeach

                            @if($layanan->detailLayanans->count() > 5)
                            <li class="text-center pt-2">
                                <small class="text-primary fw-bold">
                                    +{{ $layanan->detailLayanans->count() - 5 }} langkah profesional lainnya
                                </small>
                            </li>
                            @endif
                        </ul>

                        {{-- <div class="text-center mt-auto">
                            <a href="{{ route('customer.layanan.show', $layanan->id) }}" 
                               class="btn {{ $index % 2 == 1 ? 'btn-primary-custom' : 'btn-outline-custom' }} w-100 mb-2">
                                <i class="fas fa-eye me-2"></i>Detail Layanan
                            </a>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Total: {{ $layanan->detailLayanans->sum('estimasi_hari') }} hari kerja
                            </small>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Proses Section -->
<section id="tentang" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 rounded-pill mb-3">
                <i class="fas fa-cogs me-2"></i>Proses Kerja
            </span>
            <h2 class="display-5 fw-bold mb-3">Bagaimana Kami Bekerja</h2>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Proses pembuatan PT yang terstruktur dan transparan memastikan bisnis Anda berjalan lancar dari awal.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="step-indicator mx-auto mb-3">1</div>
                    <h5 class="fw-bold mb-3">Konsultasi Awal</h5>
                    <p class="text-muted">Diskusikan kebutuhan bisnis Anda dengan konsultan ahli kami</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="step-indicator mx-auto mb-3">2</div>
                    <h5 class="fw-bold mb-3">Pengecekan Dokumen</h5>
                    <p class="text-muted">Verifikasi kelengkapan dan keabsahan dokumen yang diperlukan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="step-indicator mx-auto mb-3">3</div>
                    <h5 class="fw-bold mb-3">Proses Pengurusan</h5>
                    <p class="text-muted">Tim kami mengurus semua proses administrasi dan hukum</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="step-indicator mx-auto mb-3">4</div>
                    <h5 class="fw-bold mb-3">Selesai & Serah Terima</h5>
                    <p class="text-muted">Dokumen lengkap diserahkan dan bisnis siap beroperasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start text-white">
                <h3 class="fw-bold mb-3">Siap Memulai Bisnis Impian Anda?</h3>
                <p class="mb-0 opacity-90">Konsultasi gratis dengan ahli kami sekarang juga</p>
            </div>
            <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                <a href="https://wa.me/6281234567890" class="btn btn-light btn-lg px-5 rounded-pill fw-bold">
                    <i class="fab fa-whatsapp me-2"></i>Konsultasi Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
@endsection