@extends('layouts.master')

@section('content')
<div class="container py-5">

    {{-- HERO SECTION --}}
    <div class="row align-items-center mb-8 mt-5">
        <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
            <h1 class="fw-bold display-4">Belajar Pajak & Akuntansi Lebih <span class="text-primary">Mudah</span></h1>
            <p class="lead text-muted mt-3">
                BimbelKu menghadirkan pembelajaran online interaktif dengan mentor profesional dan materi yang selalu up-to-date.
            </p>
            <a href="#pilihan-kelas" class="btn btn-primary btn-lg rounded-pill mt-3 shadow smooth-scroll">
                <i class="fa fa-graduation-cap me-2"></i>Pilih Kelas Sekarang
            </a>
        </div>
        <div class="col-lg-6 text-center">
            <img src="https://img.freepik.com/free-vector/financial-accounting-concept-illustration_114360-8115.jpg"
                class="img-fluid rounded-3 shadow-sm"
                style="max-height:360px"
                alt="Belajar Pajak & Akuntansi Online">
        </div>
    </div>

    {{-- PILIHAN KELAS SECTION --}}
    <section id="pilihan-kelas" class="mb-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3">Pilih Kelas yang Tepat untuk Anda</h2>
            <p class="lead text-muted">Kami menyediakan tiga pilihan kelas dengan kurikulum yang disesuaikan dengan kebutuhan Anda</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            {{-- BIMBEL A --}}
            <div class="col-lg-4 col-md-6">
                <div class="class-card card border-0 shadow-lg h-100 position-relative overflow-hidden">
                    <div class="card-header bg-gradient-primary text-white text-center py-4 position-relative">
                        <div class="class-icon mb-3">
                            <i class="fa fa-star fa-3x opacity-75"></i>
                        </div>
                        <h3 class="fw-bold mb-2 text-white" >Bimbel USKP A</h3>
                        <h4 class="fw-light opacity-90 text-white">Program Reguler</h4>
                        <div class="wave-decoration"></div>
                    </div>
                    <div class="card-body p-4">
                        <div class="price-section text-center mb-4">
                            <span class="h2 fw-bold text-primary">Rp 299.000</span>
                            <span class="text-muted">/bulan</span>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>Akses Video Learning</strong>
                                    <p class="text-muted small mb-0">Materi video lengkap pajak & akuntansi</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>E-Book & Modul</strong>
                                    <p class="text-muted small mb-0">Bahan bacaan dan latihan soal</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>Forum Diskusi</strong>
                                    <p class="text-muted small mb-0">Tanya jawab dengan sesama peserta</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>Ujian Online</strong>
                                    <p class="text-muted small mb-0">Test evaluasi berkala</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-4">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>Sertifikat Digital</strong>
                                    <p class="text-muted small mb-0">Sertifikat setelah menyelesaikan kursus</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="class-stats row text-center mb-4">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-primary mb-1">50+</h5>
                                    <small class="text-muted">Video</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-primary mb-1">6 Bulan</h5>
                                    <small class="text-muted">Akses</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-primary mb-1">24/7</h5>
                                    <small class="text-muted">Support</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent p-4">
                        <a href="{{ route('bimbel.a') }}"
                        class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-semibold shadow-sm">
                            <i class="fa fa-arrow-right me-2"></i> Pilih Bimbel USKP A
                        </a>
                    </div>
                </div>
            </div>

            {{-- BIMBEL B --}}
            <div class="col-lg-4 col-md-6">
                <div class="class-card card border-0 shadow-lg h-100 position-relative overflow-hidden premium-card">
                    <div class="premium-badge">
                        <span class="badge bg-warning text-dark fw-bold">
                            <i class="fa fa-crown me-1"></i>PREMIUM
                        </span>
                    </div>
                    <div class="card-header bg-gradient-success text-white text-center py-4 position-relative">
                        <div class="class-icon mb-3">
                            <i class="fa fa-gem fa-3x opacity-75"></i>
                        </div>
                        <h3 class="fw-bold mb-2 text-white">Bimbel USKP B</h3>
                        <h4 class="fw-light opacity-90 text-white">Program Premium</h4>
                        <div class="wave-decoration"></div>
                    </div>
                    <div class="card-body p-4">
                        <div class="price-section text-center mb-4">
                            <span class="h2 fw-bold text-success">Rp 499.000</span>
                            <span class="text-muted">/bulan</span>
                            <div class="mt-1">
                                <small class="text-decoration-line-through text-muted">Rp 699.000</small>
                                <span class="badge bg-danger ms-2">Save 29%</span>
                            </div>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>Semua Fitur Bimbel USKP A</strong>
                                    <p class="text-muted small mb-0">Plus fitur premium eksklusif</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Live Class Interaktif</strong>
                                    <p class="text-muted small mb-0">Kelas langsung dengan mentor 2x/minggu</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>1-on-1 Mentoring</strong>
                                    <p class="text-muted small mb-0">Konsultasi pribadi dengan mentor</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Case Study Real</strong>
                                    <p class="text-muted small mb-0">Studi kasus bisnis nyata</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Job Placement Support</strong>
                                    <p class="text-muted small mb-0">Bantuan penempatan kerja</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-4">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Sertifikat Profesional</strong>
                                    <p class="text-muted small mb-0">Sertifikat terakreditasi industri</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="class-stats row text-center mb-4">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-success mb-1">100+</h5>
                                    <small class="text-muted">Video</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-success mb-1">12 Bulan</h5>
                                    <small class="text-muted">Akses</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-success mb-1">Priority</h5>
                                    <small class="text-muted">Support</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent p-4">
                        <a href="{{ route('bimbel.b') }}"
                        class="btn btn-success btn-lg w-100 rounded-pill fw-semibold shadow">
                            <i class="fa fa-arrow-right me-2"></i> Pilih Bimbel USKP B
                        </a>
                    </div>
                </div>
            </div>

            {{-- BIMBEL USKP C --}}
            <div class="col-lg-4 col-md-6">
                <div class="class-card card border-0 shadow-lg h-100 position-relative overflow-hidden expert-card">
                    <div class="expert-badge">
                        <span class="badge bg-danger text-white fw-bold">
                            <i class="fa fa-award me-1"></i>EXPERT
                        </span>
                    </div>
                    <div class="card-header bg-gradient-warning text-white text-center py-4 position-relative">
                        <div class="class-icon mb-3">
                            <i class="fa fa-trophy fa-3x opacity-75"></i>
                        </div>
                        <h3 class="fw-bold mb-2 text-white">Bimbel USKP C</h3>
                        <h4 class="fw-light opacity-90 text-white">Program USKP</h4>
                        <div class="wave-decoration"></div>
                    </div>
                    <div class="card-body p-4">
                        <div class="price-section text-center mb-4">
                            <span class="h2 fw-bold text-warning">Rp 799.000</span>
                            <span class="text-muted">/bulan</span>
                            <div class="mt-1">
                                <small class="text-decoration-line-through text-muted">Rp 999.000</small>
                                <span class="badge bg-danger ms-2">Save 20%</span>
                            </div>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                <div>
                                    <strong>Semua Fitur Bimbel USKP B</strong>
                                    <p class="text-muted small mb-0">Plus fokus persiapan USKP</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Khusus USKP C</strong>
                                    <p class="text-muted small mb-0">Materi khusus ujian sertifikasi USKP</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Try Out Berkala</strong>
                                    <p class="text-muted small mb-0">Simulasi ujian USKP lengkap</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Bank Soal USKP</strong>
                                    <p class="text-muted small mb-0">Ribuan soal USKP tahun sebelumnya</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-3">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Mentor Berpengalaman</strong>
                                    <p class="text-muted small mb-0">Pengajar bersertifikat USKP</p>
                                </div>
                            </div>
                            <div class="feature-item d-flex align-items-start mb-4">
                                <i class="fa fa-star text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Garansi Sampai Lulus</strong>
                                    <p class="text-muted small mb-0">Bimbingan sampai lulus USKP</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="class-stats row text-center mb-4">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-warning mb-1">200+</h5>
                                    <small class="text-muted">Video</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-warning mb-1">18 Bulan</h5>
                                    <small class="text-muted">Akses</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h5 class="fw-bold text-warning mb-1">VIP</h5>
                                    <small class="text-muted">Support</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent p-4">
                        <a href="{{ route('bimbel.c') }}"
                        class="btn btn-warning btn-lg w-100 rounded-pill fw-semibold shadow">
                            <i class="fa fa-arrow-right me-2"></i> Pilih USKP C
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- COMPARISON TABLE --}}
        <div class="comparison-section mt-5">
            <div class="text-center mb-4">
                <h3 class="fw-bold">Perbandingan Lengkap</h3>
                <p class="text-muted">Pilih paket yang sesuai dengan kebutuhan pembelajaran Anda</p>
            </div>
            
            <div class="table-responsive">
                <table class="table table-borderless comparison-table">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-bold text-dark">Fitur</th>
                            <th class="text-center fw-bold text-primary">Bimbel USKP A</th>
                            <th class="text-center fw-bold text-success">Bimbel USKP B</th>
                            <th class="text-center fw-bold text-warning">Bimbel USKP C</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Video Learning</td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">E-Book & Modul</td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Forum Diskusi</td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">Live Class</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">1-on-1 Mentoring</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">Job Placement</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Try Out USKP</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">Bank Soal USKP</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Garansi Lulus</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">Durasi Akses</td>
                            <td class="text-center text-primary fw-semibold">6 Bulan</td>
                            <td class="text-center text-success fw-semibold">12 Bulan</td>
                            <td class="text-center text-warning fw-semibold">18 Bulan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- SEARCH & FILTER --}}
    <div class="row mb-5">
        <div class="col-md-8 mb-2">
            <form action="{{ route('bimbel.courses.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-lg rounded-start-pill shadow-sm"
                       placeholder="Cari kursus pajak / akuntansi..." value="{{ request('search') }}">
                <button class="btn btn-primary rounded-end-pill px-4 shadow-sm"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select form-select-lg shadow-sm">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected':'' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- KATEGORI --}}
    <h2 class="fw-bold mb-4 text-center">Kategori Kursus</h2>
    <div class="row row-cols-2 row-cols-md-4 g-4 mb-5">
        @foreach ($categories as $cat)
            <div class="col">
                <div class="card shadow-sm border-0 h-100 text-center p-3 category-card">
                    <div class="card-body">
                        <i class="fa fa-layer-group fa-2x text-primary mb-3"></i>
                        <h6 class="fw-semibold">{{ $cat->name }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- KURSUS POPULER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Kursus Populer</h2>
        <a href="{{ route('bimbel.courses.index') }}" class="text-decoration-none">Lihat Semua</a>
    </div>
    <div class="row g-4">
        @foreach ($courses as $course)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 course-card">
                <img src="https://img.freepik.com/free-vector/online-tax-consultation-concept-illustration_114360-6789.jpg"
                    class="card-img-top rounded-top-3" 
                    style="height:220px; object-fit:cover" 
                    alt="{{ $course->title }}" />
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $course->title }}</h5>
                    <p class="text-muted small mb-2">{{ $course->category->name ?? 'Kategori' }}</p>
                    <p class="mb-3 text-truncate">{{ $course->description }}</p>
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-primary">
                            {{ $course->price == 0 ? 'Gratis' : 'Rp'.number_format($course->price,0,',','.') }}
                        </span>
                        <a href="{{ route('bimbel.courses.show',$course->id) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                            <i class="fa fa-eye me-1"></i>Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- KEUNGGULAN --}}
    <div class="row align-items-center mt-5">
        <div class="col-md-6 text-center mb-4 mb-md-0">
           <img src="https://img.freepik.com/free-vector/financial-accounting-concept-illustration_114360-8115.jpg"
     class="img-fluid" alt="Keunggulan">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold mb-3">Mengapa Pilih BimbelKu?</h2>
            <ul class="list-unstyled fs-5">
                <li class="mb-2"><i class="fa fa-check-circle text-success me-2"></i>Materi Pajak & Akuntansi Lengkap</li>
                <li class="mb-2"><i class="fa fa-check-circle text-success me-2"></i>Mentor Profesional</li>
                <li class="mb-2"><i class="fa fa-check-circle text-success me-2"></i>Kelas Live & Rekaman</li>
                <li class="mb-2"><i class="fa fa-check-circle text-success me-2"></i>Latihan Soal & Ujian Online</li>
                <li class="mb-2"><i class="fa fa-check-circle text-success me-2"></i>Sertifikat Resmi</li>
            </ul>
            <a href="{{ route('register') }}" class="btn btn-primary mt-3 rounded-pill shadow">
                <i class="fa fa-user-plus me-2"></i>Daftar Sekarang
            </a>
        </div>
    </div>

    {{-- TESTIMONI --}}
    <div class="mt-5 text-center">
        <h2 class="fw-bold mb-4">Apa Kata Peserta</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-3 h-100">
                    <p>"Materinya jelas dan mudah dipahami. Cocok untuk pemula pajak!"</p>
                    <strong>- Andi</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-3 h-100">
                    <p>"Mentornya profesional dan bisa tanya langsung saat live class."</p>
                    <strong>- Siti</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-3 h-100">
                    <p>"BimbelKu sangat membantu saya persiapan ujian sertifikasi akuntansi."</p>
                    <strong>- Budi</strong>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script>
    // Smooth scrolling for anchor links
    document.addEventListener('DOMContentLoaded', function() {
        const smoothScrollLinks = document.querySelectorAll('.smooth-scroll');
        
        smoothScrollLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
@endsection