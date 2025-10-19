@extends('layouts.master')
@section('style')
<style>
    .category-card, .course-card {
        transition: transform .25s ease, box-shadow .25s ease;
        border-radius: 1rem;
    }
    .category-card:hover, .course-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.08);
    }
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    /* Class Selection Styles */
    .class-card {
        border-radius: 1.5rem;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    }
    
    .class-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 2rem 4rem rgba(0,0,0,.1);
    }
    
    .premium-card {
        position: relative;
    }
    
    .premium-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 10;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
    }
    
    .wave-decoration {
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 20px;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z' fill='%23ffffff'%3E%3C/path%3E%3C/svg%3E") no-repeat center;
        background-size: cover;
    }
    
    .feature-item {
        padding: 0.5rem 0;
        border-radius: 0.5rem;
        transition: background-color 0.2s ease;
    }
    
    .feature-item:hover {
        background-color: rgba(0,123,255,0.05);
        padding-left: 0.5rem;
    }
    
    .stat-item {
        padding: 1rem;
        border-radius: 0.75rem;
        background: rgba(0,0,0,0.02);
        transition: all 0.2s ease;
    }
    
    .stat-item:hover {
        background: rgba(0,123,255,0.08);
        transform: scale(1.05);
    }
    
    .price-section {
        background: linear-gradient(135deg, rgba(0,123,255,0.05) 0%, rgba(40,167,69,0.05) 100%);
        border-radius: 1rem;
        padding: 1.5rem;
        margin: 0 -0.5rem;
    }
    
    .comparison-table {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08);
    }
    
    .comparison-table th {
        padding: 1rem;
        border: none;
    }
    
    .comparison-table td {
        padding: 1rem;
        border: none;
        vertical-align: middle;
    }
    
    .comparison-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 2rem;
        padding: 3rem 2rem;
        margin: 3rem 0;
    }
    
    .smooth-scroll {
        scroll-behavior: smooth;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .class-card {
            margin-bottom: 2rem;
        }
        
        .comparison-section {
            padding: 2rem 1rem;
        }
        
        .price-section {
            margin: 0;
        }
        
        .stat-item {
            padding: 0.75rem 0.5rem;
        }
    }
    
    @media (max-width: 576px) {
        .text-truncate {
            white-space: normal;
        }
        
        .display-4 {
            font-size: 2rem;
        }
        
        .display-5 {
            font-size: 1.75rem;
        }
        
        .class-card:hover {
            transform: none;
        }
    }
</style>
@endsection

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
            <p class="lead text-muted">Kami menyediakan dua pilihan kelas dengan kurikulum yang disesuaikan dengan kebutuhan Anda</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            {{-- BIMBEL A --}}
                @foreach($bimbels as $bimbel)
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="class-card card border-0 shadow-lg h-100 position-relative overflow-hidden">
                        <div class="card-header bg-gradient-primary text-white text-center py-4 position-relative">
                            <div class="class-icon mb-3">
                                <i class="fa fa-star fa-3x opacity-75"></i>
                            </div>
                            <h3 class="fw-bold mb-2">{{ $bimbel->judul }}</h3>
                            <h4 class="fw-light opacity-90">Program Bimbel</h4>
                            <div class="wave-decoration"></div>
                        </div>
                        <div class="card-body p-4">
                            <div class="price-section text-center mb-4">
                                <span class="h2 fw-bold text-primary">Rp {{ number_format($bimbel->harga, 0, ',', '.') }}</span>
                                <span class="text-muted">/paket</span>
                            </div>

                            {{-- <div class="features-list">
                                @foreach($bimbel->details->take(3) as $detail)
                                    <div class="feature-item d-flex align-items-start mb-3">
                                        <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                        <div>
                                            <strong>{{ $detail->judul }}</strong>
                                            <p class="text-muted small mb-0">{{ Str::limit($detail->deskripsi, 50) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div> --}}

                            <div class="features-list">
                                @foreach(explode("\n", $bimbel->deskripsi) as $line)
                                    @php
                                        // Pisahkan antara judul & deskripsi kalau ada tanda "-"
                                        $parts = explode('-', $line, 2);
                                        $judul = trim($parts[0] ?? '');
                                        $desc  = trim($parts[1] ?? '');
                                    @endphp

                                    @if($judul)
                                        <div class="feature-item d-flex align-items-start mb-3">
                                            <i class="fa fa-star text-warning me-3 mt-1"></i>
                                            <div>
                                                <strong>{{ $judul }}</strong>
                                                @if($desc)
                                                    <p class="text-muted small mb-0">{{ $desc }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer bg-transparent p-4">
                            @auth
                            <button onclick="addToCart('{{ $bimbel->id }}', 'ItemBimbel')" 
                                    class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-semibold shadow-sm">
                                <i class="fa fa-arrow-right me-2"></i> Pilih {{ $bimbel->judul }}
                            </button>
                        @else
                            <a href="{{ route('login') }}" 
                            class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-semibold shadow-sm">
                                <i class="fa fa-sign-in-alt me-2"></i> Login untuk pilih {{ $bimbel->judul }}
                            </a>
                        @endauth

                        </div>

                    </div>
                </div>
                @endforeach

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
                            <th class="text-center fw-bold text-primary">Bimbel A</th>
                            <th class="text-center fw-bold text-success">Bimbel B</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Video Learning</td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">E-Book & Modul</td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Forum Diskusi</td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">Live Class</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">1-on-1 Mentoring</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td class="fw-semibold">Job Placement</td>
                            <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fa fa-check text-success fa-lg"></i></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Durasi Akses</td>
                            <td class="text-center text-primary fw-semibold">6 Bulan</td>
                            <td class="text-center text-success fw-semibold">12 Bulan</td>
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

<script>

    function addToCart(id, type) {
        fetch("{{ route('cart.add', [], false) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id, type: type })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                // reload atau update cart count
                location.reload();
            } else if (data.status === 'redirect') {
                // kalau sudah pernah beli dan masih aktif → langsung ke halaman bimbel
                window.location.href = data.url;
            } else {
                alert(data.message);
            }
        })
        .catch(err => console.error(err));
    }


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