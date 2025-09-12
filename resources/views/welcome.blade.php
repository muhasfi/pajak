@extends('layouts.app')

@section('title', 'Paham Pajak - Solusi Perpajakan Terpercaya')

@section('content')
    <!-- Hero Section -->
    <section class=" py-5" style="background: linear-gradient(135deg, #fefeff, #ffffff); color: rgb(0, 0, 0);">
        <div class="container">
            {{-- <h1>adwadwad</h1>
            <h1>halo</h1> --}}
          <div class="row align-items-center">
            {{-- <h1>halo</h1> --}}
            <!-- Kiri: Judul + Deskripsi -->
            <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
              <h1 class="display-4 fw-bold mb-4 text-dark"> Solusi Perpajakan Terpercaya & Profesional </h1>
              <p class="lead mb-4">
                Dapatkan pemahaman pajak yang mendalam dengan panduan praktis dari ahli berpengalaman. 
                Konsultasi, pelatihan, dan layanan pajak lengkap untuk individu dan perusahaan.
              </p>
              <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                <a href="#beli" class="btn btn-primary btn-lg text-light fw-bold shadow-sm">
                  <i class="fas fa-shopping-cart me-2"></i>Beli Sekarang
                </a>
                <a href="#preview" class="btn btn-outline-primary btn-lg fw-bold">
                  <i class="fas fa-book-open me-2 "></i>Preview Buku
                </a>
              </div>
            </div>
            
            <!-- Kanan: Gambar Buku -->
            <div class="col-lg-6 text-center">
                
              <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=500&q=80" 
                   alt="Cover Buku Pajak" 
                   class="img-fluid rounded-3 shadow-lg" 
                   style="max-height: 420px; transition: transform 0.3s ease;"
                   onmouseover="this.style.transform='scale(1.05)'" 
                   onmouseout="this.style.transform='scale(1)'">
            </div>
            
          </div>
        </div>
      </section>

    <!-- About Section -->
    <section class="py-5 bg-light" id="about">
        <div class="container">
          <div class="row align-items-center">
            
            <!-- Foto Profil -->
            <div class="col-lg-5 mb-4 mb-lg-0">
              <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                <img src="/img/about us.jpg"  
                   alt="Cover Buku Pajak" 
                   class="img-fluid rounded-3 shadow-lg" 
                   style="max-height: 420px; transition: transform 0.3s ease;"
                   onmouseover="this.style.transform='scale(1.05)'" 
                   onmouseout="this.style.transform='scale(1)'">
            </div>
                {{-- <img src="https://via.placeholder.com/600x400.png?text=Foto+Profil" 
                     alt="Foto Profil" class="img-fluid w-100" />
              </div> --}}
            </div>
            
            <!-- Profil Singkat -->
            <div class="col-lg-7">
              <h2 class="display-5 fw-bold mb-4">Sekilas Tentang Saya</h2>
              <p class="lead mb-4">
                Halo, saya <strong>Nama Anda</strong>, seorang web developer yang fokus pada desain modern, clean, dan fungsional.
                Website ini saya bangun sebagai bagian dari proyek kreatif untuk menghadirkan pengalaman digital yang
                fresh, simple, namun tetap profesional.
              </p>
              <p class="mb-4">
                Saya memiliki minat besar dalam dunia teknologi, desain antarmuka, dan pengembangan website berbasis user experience.
                Tujuan saya adalah menghadirkan solusi digital yang membantu orang lebih mudah memahami informasi.
              </p>
              
              <!-- Info Tambahan -->
              <div class="row g-4">
                <div class="col-6">
                  <div class="p-3 bg-white rounded shadow-sm text-center">
                    <h4 class="fw-bold mb-1">3+</h4>
                    <p class="mb-0 text-muted">Tahun Pengalaman</p>
                  </div>
                </div>
                <div class="col-6">
                  <div class="p-3 bg-white rounded shadow-sm text-center">
                    <h4 class="fw-bold mb-1">20+</h4>
                    <p class="mb-0 text-muted">Project Selesai</p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>

       <!-- Services Section -->
<section id="layanan" class="py-5 bg-light">
    <div class="container">
        <!-- Judul Section -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Layanan Unggulan Kami</h2>
            <p class="text-muted">Dapatkan solusi perpajakan terlengkap sesuai kebutuhan Anda</p>
        </div>

        <!-- Grid Layanan -->
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="mb-3 fs-1 text-primary">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h5 class="fw-bold">Buku</h5>
                    <p class="text-muted">Koleksi lengkap buku dan panduan perpajakan terkini yang ditulis oleh ahli pajak berpengalaman untuk membantu pemahaman Anda.</p>
                    <a href="#buku" class="btn btn-outline-primary mt-auto">
                        <i class="fas fa-arrow-right me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="mb-3 fs-1 text-primary">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h5 class="fw-bold">Seminar & Bimbingan Belajar</h5>
                    <p class="text-muted">Program pelatihan komprehensif dengan metode pembelajaran interaktif dan studi kasus nyata dari dunia industri.</p>
                    <a href="#pelatihan" class="btn btn-outline-primary mt-auto">
                        <i class="fas fa-arrow-right me-1"></i> Daftar Sekarang
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            {{-- <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="mb-3 fs-1 text-primary">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="fw-bold">Konsultasi Pajak</h5>
                    <p class="text-muted">Layanan konsultasi personal dengan konsultan pajak bersertifikat untuk menyelesaikan permasalahan perpajakan Anda.</p>
                    <a href="#konsultasi" class="btn btn-outline-primary mt-auto">
                        <i class="fas fa-arrow-right me-1"></i> Konsultasi Gratis
                    </a>
                </div>
            </div> --}}

            <!-- Card 4 -->
            {{-- <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="mb-3 fs-1 text-primary">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h5 class="fw-bold">Aplikasi Pajak Digital</h5>
                    <p class="text-muted">Platform digital terintegrasi untuk memudahkan perhitungan, pelaporan, dan pengelolaan pajak secara online.</p>
                    <a href="#aplikasi" class="btn btn-outline-primary mt-auto">
                        <i class="fas fa-arrow-right me-1"></i> Download App
                    </a>
                </div>
            </div> --}}

            <!-- Card 5 -->
            {{-- <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="mb-3 fs-1 text-primary">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h5 class="fw-bold">Audit & Compliance</h5>
                    <p class="text-muted">Layanan audit pajak profesional dan pendampingan compliance untuk memastikan kepatuhan perpajakan perusahaan Anda.</p>
                    <a href="#audit" class="btn btn-outline-primary mt-auto">
                        <i class="fas fa-arrow-right me-1"></i> Pelajari Lebih
                    </a>
                </div>
            </div> --}}

            <!-- Card 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="mb-3 fs-1 text-primary">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h5 class="fw-bold">Artikel</h5>
                    <p class="text-muted">Update terbaru seputar peraturan perpajakan, tips praktis, dan analisis mendalam dari para ahli pajak terpercaya.</p>
                    <a href="#artikel" class="btn btn-outline-primary mt-auto">
                        <i class="fas fa-arrow-right me-1"></i> Baca Artikel
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

      
      
@endsection