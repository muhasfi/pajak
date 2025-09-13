@extends('bimbel.layouts.master')

@section('content')
<div class="container py-5">

    {{-- HERO SECTION --}}
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
            <h1 class="fw-bold display-4">Belajar Pajak & Akuntansi Lebih <span class="text-primary">Mudah</span></h1>
            <p class="lead text-muted mt-3">
                BimbelKu menghadirkan pembelajaran online interaktif dengan mentor profesional dan materi yang selalu up-to-date.
            </p>
            <a href="{{ route('bimbel.courses.index') }}" class="btn btn-primary btn-lg rounded-pill mt-3 shadow">
                <i class="fa fa-graduation-cap me-2"></i>Mulai Belajar Sekarang
            </a>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('images/hero-elearning.svg') }}" class="img-fluid rounded-3 shadow-sm" style="max-height:360px" alt="E-Learning">
        </div>
    </div>

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
                <img src="{{ asset('storage/courses/'.$course->thumbnail) }}"
                     class="card-img-top rounded-top-3" style="height:220px; object-fit:cover" alt="{{ $course->title }}">
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
            <img src="{{ asset('images/benefit.svg') }}" class="img-fluid" alt="Keunggulan">
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
    @media (max-width: 576px) {
        .text-truncate {
            white-space: normal;
        }
    }
</style>
@endsection
