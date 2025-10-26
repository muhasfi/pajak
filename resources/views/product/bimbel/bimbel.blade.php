@extends('layouts.master')
@section('title', 'Program Bimbingan Belajar')
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
        
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">Program Bimbingan Belajar</h2>
                <p class="text-muted">Pilih paket bimbel yang sesuai dengan kebutuhan kamu</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($bimbels as $bimbel)
                    <div class="col-lg-4 col-md-6 mb-4"><!-- col-lg-4 = 3 kartu per baris -->
                        <div class="class-card card border-0 shadow-lg h-100 position-relative overflow-hidden">

                            {{-- Header --}}
                            <div class="card-header bg-gradient-primary text-white text-center py-4 position-relative">
                                <div class="class-icon mb-3">
                                    <i class="fa fa-star fa-3x opacity-75"></i>
                                </div>
                                <h3 class="fw-bold mb-2">{{ $bimbel->judul }}</h3>
                                <h4 class="fw-light opacity-90">Program Bimbel</h4>
                                <div class="wave-decoration"></div>
                            </div>

                            {{-- Body --}}
                            <div class="card-body p-4">
                                <div class="price-section text-center mb-4">
                                    <span class="h2 fw-bold text-primary">Rp {{ number_format($bimbel->harga, 0, ',', '.') }}</span>
                                    <span class="text-muted">/paket</span>
                                </div>

                                {{-- Deskripsi poin-poin --}}
                                <div class="features-list">
                                    @foreach(explode("\n", $bimbel->deskripsi) as $line)
                                        @php
                                            $trimmed = trim($line);
                                            if ($trimmed === '') continue;
                                            $isPositive = Str::startsWith($trimmed, '+');
                                            $isNegative = Str::startsWith($trimmed, '-');
                                            $text = ltrim($trimmed, '+- ');
                                        @endphp

                                        <div class="feature-item d-flex align-items-start mb-2">
                                            @if($isPositive)
                                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                            @elseif($isNegative)
                                                <i class="fa fa-times-circle text-danger me-3 mt-1"></i>
                                            @else
                                                <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                            @endif
                                            <div>
                                                <p class="mb-0 text-muted small">{{ $text }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="features-list">
                                    @foreach($bimbel->detail as $details)
                                        <div class="mb-2">
                                            <p class="text-muted small mb-0">{{ Str::limit($details->deskripsi, 200) }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Footer --}}
                            <div class="card-footer bg-transparent p-4">
                                <div class="card-footer bg-transparent p-4">
                                    <a href="{{ route('bimbel.show', $bimbel->id) }}" 
                                    class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-semibold shadow-sm">
                                        <i class="fa fa-arrow-right me-2"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center mt-5">
                        <p class="text-muted fs-5">Belum ada program bimbel yang tersedia saat ini.</p>
                    </div>
                @endforelse
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
                    timer: 1500,
                    showConfirmButton: false
                });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message
                        });
                    }
                })
        .catch((error) => {
                console.error('Error:', error);
            });
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



