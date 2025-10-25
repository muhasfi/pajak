@extends('layouts.master')

@section('title', 'Pelatihan Brevet A & B')
{{-- <link rel="stylesheet" href="{{ asset('assets/customer/css/brevet.css') }}"> --}}
@section('content')
<section class="brevet-training-service">
    <!-- Hero Section -->
    <div class="modern-hero">
        <div class="hero-background">
            <div class="hero-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="title-line">Pelatihan</span>
                        <span class="title-line highlight">Brevet A & B</span>
                    </h1>
                    <p class="hero-subtitle">
                        Sertifikasi kompetensi perpajakan tingkat <span class="text-highlight">A</span> dan 
                        <span class="text-highlight">B</span> yang diakui secara nasional untuk 
                        <span class="text-highlight">profesional pajak</span>
                    </p>
                    <p class="hero-description">
                        Tingkatkan kompetensi perpajakan Anda dengan pelatihan brevet berstandar nasional. 
                        Persiapkan karir di bidang perpajakan dengan kurikulum komprehensif dan pengajar berpengalaman.
                    </p>
                    <div class="hero-actions">
                        <a href="#programs" class="btn btn-primary">
                            <span>Lihat Program</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="#pricing" class="btn btn-outline-light">
                            <span>Daftar Sekarang</span>
                            <i class="fas fa-user-graduate"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="certificate-preview">
                        <div class="certificate-window">
                            <div class="certificate-header">
                                <div class="certificate-controls">
                                    <span class="control red"></span>
                                    <span class="control yellow"></span>
                                    <span class="control green"></span>
                                </div>
                                <div class="certificate-title">Sertifikat Brevet</div>
                            </div>
                            <div class="certificate-content">
                                <div class="certificate-badge">
                                    <i class="fas fa-award"></i>
                                    <span>BREVET A&B</span>
                                </div>
                                <div class="certificate-info">
                                    <h4>SERTIFIKAT KOMPETENSI</h4>
                                    <p>Diakui oleh Direktorat Jenderal Pajak</p>
                                    <div class="certificate-details">
                                        <div class="detail-item">
                                            <span>Tingkat</span>
                                            <strong>A & B</strong>
                                        </div>
                                        <div class="detail-item">
                                            <span>Masa Berlaku</span>
                                            <strong>5 Tahun</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <div id="programs" class="programs-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Program Pelatihan Brevet</h2>
                <p class="section-subtitle">Pilih program yang sesuai dengan kebutuhan dan level kompetensi Anda</p>
            </div>
            <div class="programs-grid">
                <!-- Brevet A -->
                <div class="program-card">
                    <div class="program-badge">Level Dasar</div>
                    <div class="program-header">
                        <h3>Brevet A</h3>
                        <div class="program-level">
                            <span class="level">Pemula</span>
                            <span class="duration">6 Minggu</span>
                        </div>
                    </div>
                    <div class="program-body">
                        <h4>Kurikulum Brevet A</h4>
                        <ul class="curriculum-list">
                            <li><i class="fas fa-check"></i> Dasar-dasar Perpajakan</li>
                            <li><i class="fas fa-check"></i> PPh Orang Pribadi</li>
                            <li><i class="fas fa-check"></i> PPh Pasal 21</li>
                            <li><i class="fas fa-check"></i> PPN & PPnBM Dasar</li>
                            <li><i class="fas fa-check"></i> Ketentuan Umum Perpajakan</li>
                            <li><i class="fas fa-check"></i> Pengisian SPT</li>
                        </ul>
                        <div class="program-features">
                            <div class="feature">
                                <i class="fas fa-users"></i>
                                <span>Kelas Online & Offline</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-book"></i>
                                <span>Modul Lengkap</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Pengajar Berpengalaman</span>
                            </div>
                        </div>
                    </div>
                    <div class="program-footer">
                        <div class="program-target">
                            <h5>Cocok Untuk:</h5>
                            <p>Mahasiswa, Fresh Graduate, Staff Administrasi Pajak</p>
                        </div>
                    </div>
                </div>

                <!-- Brevet B -->
                <div class="program-card featured">
                    <div class="program-badge">Level Lanjutan</div>
                    <div class="program-header">
                        <h3>Brevet B</h3>
                        <div class="program-level">
                            <span class="level">Mahir</span>
                            <span class="duration">8 Minggu</span>
                        </div>
                    </div>
                    <div class="program-body">
                        <h4>Kurikulum Brevet B</h4>
                        <ul class="curriculum-list">
                            <li><i class="fas fa-check"></i> Semua Materi Brevet A</li>
                            <li><i class="fas fa-check"></i> PPh Badan</li>
                            <li><i class="fas fa-check"></i> PPN Komprehensif</li>
                            <li><i class="fas fa-check"></i> Akuntansi Pajak</li>
                            <li><i class="fas fa-check"></i> Tax Planning</li>
                            <li><i class="fas fa-check"></i> Pemeriksaan Pajak</li>
                            <li><i class="fas fa-check"></i> Keberatan & Banding</li>
                        </ul>
                        <div class="program-features">
                            <div class="feature">
                                <i class="fas fa-users"></i>
                                <span>Kelas Intensif</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-book"></i>
                                <span>Case Study</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Konsultan Pajak</span>
                            </div>
                        </div>
                    </div>
                    <div class="program-footer">
                        <div class="program-target">
                            <h5>Cocok Untuk:</h5>
                            <p>Accountant, Finance Manager, Konsultan Pajak Pemula</p>
                        </div>
                    </div>
                </div>

                <!-- Brevet A+B Paket -->
                <div class="program-card">
                    <div class="program-badge">Paket Lengkap</div>
                    <div class="program-header">
                        <h3>Brevet A+B</h3>
                        <div class="program-level">
                            <span class="level">Komprehensif</span>
                            <span class="duration">12 Minggu</span>
                        </div>
                    </div>
                    <div class="program-body">
                        <h4>Kurikulum Lengkap</h4>
                        <ul class="curriculum-list">
                            <li><i class="fas fa-check"></i> Semua Materi Brevet A & B</li>
                            <li><i class="fas fa-check"></i> Workshop Praktis</li>
                            <li><i class="fas fa-check"></i> Simulasi Ujian</li>
                            <li><i class="fas fa-check"></i> Mentoring Personal</li>
                            <li><i class="fas fa-check"></i> Sertifikat Ganda</li>
                            <li><i class="fas fa-check"></i> Job Connector</li>
                        </ul>
                        <div class="program-features">
                            <div class="feature">
                                <i class="fas fa-users"></i>
                                <span>Kelas Premium</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-book"></i>
                                <span>Full Package</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Expert Trainer</span>
                            </div>
                        </div>
                    </div>
                    <div class="program-footer">
                        <div class="program-target">
                            <h5>Cocok Untuk:</h5>
                            <p>Profesional yang ingin menguasai perpajakan secara menyeluruh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Manfaat Mengikuti Brevet A & B</h2>
                <p class="section-subtitle">Raih keunggulan kompetitif dalam karir perpajakan Anda</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Sertifikat Resmi</h4>
                    <p>Sertifikat brevet A & B yang diakui secara nasional oleh instansi perpajakan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4>Peluang Karir</h4>
                    <p>Meningkatkan peluang kerja di bidang accounting, finance, dan konsultan pajak</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Kompetensi</h4>
                    <p>Penguasaan teknis perpajakan yang komprehensif dan terupdate</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4>Networking</h4>
                    <p>Jaringan profesional dengan sesama peserta dan pengajar berpengalaman</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Kredibilitas</h4>
                    <p>Meningkatkan kredibilitas sebagai tenaga profesional di bidang perpajakan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h4>Nilai Investasi</h4>
                    <p>Investasi pendidikan yang memberikan return tinggi untuk karir jangka panjang</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div id="pricing" class="pricing-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Investasi Pelatihan</h2>
                <p class="section-subtitle">Pilih paket pelatihan yang sesuai dengan kebutuhan Anda</p>
            </div>
            
            <div class="pricing-grid">
                @foreach($brevetabs as $brevet)
                <div class="training-card {{ $loop->iteration == 2 ? 'featured' : '' }}">
                    @if($loop->iteration == 2)
                        <div class="card-badge">Best Seller</div>
                    @endif

                    <!-- Header -->
                    <div class="card-header">
                        <h3>{{ $brevet->judul }}</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp {{ number_format($brevet->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="package-info">{{ $brevet->detail->first()->level ?? 'Tanpa Level' }}</div>
                    </div>

                    <!-- Body -->
                    <div class="card-body">
                        <ul class="feature-list">
                            @foreach(preg_split("/\r\n|\n|\r/", $brevet->deskripsi) as $line)
                                @php
                                    $trimLine = trim($line);
                                @endphp
                                @if(!empty($trimLine))
                                    <li>
                                        @if(str_starts_with($trimLine, '+'))
                                            <i class="fas fa-check"></i> {{ ltrim($trimLine, '+ ') }}
                                        @elseif(str_starts_with($trimLine, '-'))
                                            <i class="fas fa-times"></i> {{ ltrim($trimLine, '- ') }}
                                        @else
                                            <i class="fas fa-check"></i> {{ $trimLine }}
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>


                    <!-- Footer -->
                    <div class="card-footer">
                        <a href="{{ route('product.brevet_ab.show', $brevet->id) }}" class="btn-order">
                            <i class="fas fa-eye me-1"></i> Lihat Detail
                        </a>

                    </div>
                    <div class="card-footer">
                        <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan {{ urlencode($brevet->judul) }}" 
                        class="btn-outline-kk" target="_blank">Hubungi Kami</a>
                    </div>
                </div>
                @endforeach
            </div>


            <!-- Additional Info -->
            <div class="pricing-info">
                <div class="info-grid">
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        <h4>Flexible Schedule</h4>
                        <p>Pilihan jadwal pagi, siang, malam, dan weekend class</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-hand-holding-usd"></i>
                        <h4>Cicilan 0%</h4>
                        <p>Kemudahan pembayaran dengan cicilan hingga 12 bulan</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-sync-alt"></i>
                        <h4>Garansi Ulang</h4>
                        <p>Gratis mengulang jika tidak lulus dalam ujian sertifikasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pertanyaan Umum</h2>
                <p class="section-subtitle">Informasi lengkap seputar pelatihan Brevet A & B</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apa perbedaan Brevet A dan Brevet B?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Brevet A fokus pada dasar-dasar perpajakan untuk pemula, sedangkan Brevet B mencakup materi lanjutan seperti PPh Badan, PPN komprehensif, akuntansi pajak, dan tax planning. Brevet A cocok untuk mahasiswa dan fresh graduate, sementara Brevet B untuk profesional yang ingin mendalami perpajakan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Berapa lama masa berlaku sertifikat brevet?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Sertifikat Brevet A & B memiliki masa berlaku 5 tahun. Setelah itu, Anda dapat mengikuti penyegaran (refresher) untuk memperpanjang masa berlaku sertifikat. Penyegaran biasanya lebih singkat dan fokus pada update regulasi terbaru.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah ada jaminan kelulusan?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kami memberikan garansi mengulang gratis jika peserta tidak lulus dalam ujian sertifikasi pertama. Dengan catatan, peserta telah mengikuti minimal 80% sesi pelatihan dan menyelesaikan semua tugas yang diberikan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bagaimana sistem pembayaran dan cicilannya?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kami menyediakan opsi pembayaran penuh dengan diskon atau cicilan 0% hingga 12 bulan. Untuk cicilan, dapat melalui kerja sama dengan bank atau finance company. DP minimal 30% untuk dapat mengikuti kelas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Mengembangkan Karir di Bidang Perpajakan?</h3>
                <p>Daftar sekarang dan raih sertifikat Brevet A & B untuk masa depan karir yang lebih cerah</p>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-gold: #d97706;
    --secondary-gold: #b45309;
    --dark-gold: #92400e;
    --light-gold: #fef3c7;
    --white: #ffffff;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --success: #10b981;
    --error: #ef4444;
    --warning: #f59e0b;
}

/* =========================
   BASE STYLES & RESET
   ========================= */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.brevet-training-service {
    min-height: 100vh;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    line-height: 1.6;
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 clamp(1rem, 3vw, 2rem);
}

/* =========================
   MODERN HERO SECTION
   ========================= */
.modern-hero {
    min-height: 100vh;
    background: linear-gradient(135deg, #92400e 0%, #d97706 50%, #f59e0b 100%);
    color: var(--white);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-shapes {
    position: relative;
    width: 100%;
    height: 100%;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: clamp(150px, 25vw, 300px);
    height: clamp(150px, 25vw, 300px);
    top: 10%;
    left: 5%;
    animation-delay: 0s;
}

.shape-2 {
    width: clamp(100px, 20vw, 200px);
    height: clamp(100px, 20vw, 200px);
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.shape-3 {
    width: clamp(75px, 15vw, 150px);
    height: clamp(75px, 15vw, 150px);
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

.shape-4 {
    width: clamp(50px, 10vw, 100px);
    height: clamp(50px, 10vw, 100px);
    top: 20%;
    right: 20%;
    animation-delay: 1s;
}

.hero-content {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(2rem, 4vw, 4rem);
    align-items: center;
    padding: clamp(4rem, 10vw, 8rem) 0 clamp(3rem, 8vw, 5rem);
    width: 100%;
}

.hero-text {
    max-width: min(600px, 100%);
}

.hero-title {
    font-size: clamp(2.25rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
}

.title-line {
    display: block;
}

.title-line.highlight {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: clamp(1.1rem, 2vw, 1.3rem);
    line-height: 1.6;
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
    opacity: 0.9;
}

.text-highlight {
    font-weight: 600;
    color: #fef3c7;
}

.hero-description {
    font-size: clamp(1rem, 1.5vw, 1.1rem);
    line-height: 1.7;
    margin-bottom: clamp(2rem, 4vw, 2.5rem);
    opacity: 0.8;
}

.hero-actions {
    display: flex;
    gap: clamp(0.75rem, 2vw, 1rem);
    flex-wrap: wrap;
}

.hero-visual {
    display: flex;
    justify-content: center;
    align-items: center;
}

.certificate-preview {
    perspective: 1000px;
    width: 100%;
    max-width: min(500px, 100%);
}

.certificate-window {
    background: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    transform: rotateY(-5deg) rotateX(5deg);
    transition: transform 0.3s ease;
    border: 2px solid var(--light-gold);
}

.certificate-window:hover {
    transform: rotateY(0) rotateX(0);
}

.certificate-header {
    background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
    padding: clamp(0.75rem, 2vw, 1rem) clamp(1rem, 2vw, 1.5rem);
    display: flex;
    align-items: center;
    gap: clamp(0.5rem, 1.5vw, 1rem);
    border-bottom: 1px solid var(--light-gold);
}

.certificate-controls {
    display: flex;
    gap: 0.5rem;
}

.control {
    width: clamp(10px, 1.5vw, 12px);
    height: clamp(10px, 1.5vw, 12px);
    border-radius: 50%;
}

.control.red { background: #ef4444; }
.control.yellow { background: #f59e0b; }
.control.green { background: #10b981; }

.certificate-title {
    color: var(--white);
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
    font-weight: 500;
}

.certificate-content {
    padding: clamp(1.5rem, 3vw, 2rem);
    text-align: center;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
}

.certificate-badge {
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
}

.certificate-badge i {
    font-size: clamp(2rem, 5vw, 3rem);
    color: var(--primary-gold);
    margin-bottom: 0.5rem;
    display: block;
}

.certificate-badge span {
    font-size: clamp(1rem, 2vw, 1.2rem);
    font-weight: 700;
    color: var(--dark-gold);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.certificate-info h4 {
    font-size: clamp(1rem, 2vw, 1.1rem);
    font-weight: 700;
    color: var(--dark-gold);
    margin-bottom: 0.5rem;
}

.certificate-info p {
    color: var(--gray-600);
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
}

.certificate-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(0.75rem, 2vw, 1rem);
    margin-top: clamp(0.75rem, 2vw, 1rem);
}

.detail-item {
    text-align: center;
}

.detail-item span {
    display: block;
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    color: var(--gray-600);
    margin-bottom: 0.25rem;
}

.detail-item strong {
    display: block;
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
    color: var(--dark-gold);
    font-weight: 700;
}

.hero-stats {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: clamp(1rem, 3vw, 2rem);
    padding: clamp(2rem, 5vw, 3rem) 0;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-item {
    text-align: center;
    background: transparent;
}

.stat-number {
    display: block;
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: 0.5rem;
    color: var(--white);
}

.stat-label {
    font-size: clamp(0.75rem, 1.5vw, 0.9rem);
    font-weight: 500;
    opacity: 0.8;
    color: var(--white);
}

/* =========================
   PROGRAMS SECTION
   ========================= */
.programs-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.section-header {
    text-align: center;
    margin-bottom: clamp(2.5rem, 5vw, 4rem);
}

.section-title {
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.section-subtitle {
    font-size: clamp(1rem, 2vw, 1.2rem);
    max-width: min(600px, 90%);
    margin: 0 auto;
    color: var(--gray-600);
    line-height: 1.6;
}

.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(350px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.program-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid var(--gray-200);
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.program-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary-gold);
    color: var(--white);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.program-header {
    padding: clamp(1.5rem, 3vw, 2rem) clamp(1.5rem, 3vw, 2rem) clamp(1rem, 2vw, 1.5rem);
    background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
    color: var(--white);
}

.program-header h3 {
    font-size: clamp(1.25rem, 2.5vw, 1.5rem);
    margin-bottom: 1rem;
    color: var(--white);
}

.program-level {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}

.level {
    font-weight: 600;
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
}

.duration {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    white-space: nowrap;
}

.program-body {
    padding: clamp(1.25rem, 3vw, 1.5rem) clamp(1.5rem, 3vw, 2rem);
}

.program-body h4 {
    font-size: clamp(1rem, 2vw, 1.1rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.curriculum-list {
    list-style: none;
    padding: 0;
    margin: 0 0 clamp(1.25rem, 3vw, 1.5rem) 0;
}

.curriculum-list li {
    display: flex;
    align-items: flex-start;
    margin-bottom: 0.75rem;
    color: var(--gray-600);
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    line-height: 1.5;
}

.curriculum-list i {
    margin-right: 10px;
    margin-top: 3px;
    color: var(--success);
    flex-shrink: 0;
}

.program-features {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-200);
}

.feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    color: var(--gray-600);
}

.feature i {
    color: var(--primary-gold);
    width: 16px;
    flex-shrink: 0;
}

.program-footer {
    padding: clamp(1rem, 2vw, 1.5rem) clamp(1.5rem, 3vw, 2rem) clamp(1.5rem, 3vw, 2rem);
    border-top: 1px solid var(--gray-200);
}

.program-target h5 {
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--gray-800);
}

.program-target p {
    font-size: clamp(0.8rem, 1.5vw, 0.85rem);
    color: var(--gray-600);
    margin: 0;
    line-height: 1.5;
}

/* =========================
   BENEFITS SECTION
   ========================= */
.benefits-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.benefit-card {
    background: var(--white);
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.benefit-icon {
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    background: linear-gradient(135deg, var(--light-gold), #fde68a);
    color: var(--primary-gold);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.75rem, 3vw, 2rem);
    margin: 0 auto 1.5rem;
}

.benefit-card h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.benefit-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

/* =========================
   PRICING SECTION
   ========================= */
.pricing-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(350px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
    max-width: 1200px;
    margin: 0 auto clamp(3rem, 6vw, 4rem);
    justify-content: center;
    justify-items: center;
}

.training-card {
    display: flex;
    flex-direction: column;       /* header-body-footer vertikal */
    justify-content: space-between; /* body stretch, footer di bawah */
    background-color: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
<<<<<<< HEAD
    border: 1px solid var(--gray-200);
    width: 100%;
    max-width: 400px;
=======
    border: 1px solid #e2e8f0;
    min-height: 450px; /* sesuaikan tinggi minimum agar rata */
>>>>>>> 98f4dc16aaafa2ce28596bd298307eb94b2005b8
}

.training-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.card-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--secondary-gold) 100%);
    color: var(--white);
    padding: clamp(6px, 1.5vw, 8px) clamp(30px, 4vw, 40px);
    transform: rotate(45deg);
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(217, 119, 6, 0.3);
}

.card-header {
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--secondary-gold) 100%);
    color: var(--white);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.card-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    transform: rotate(30deg);
}

.card-header h3 {
    font-size: clamp(1.3rem, 2.5vw, 1.5rem);
    margin-bottom: 15px;
    color: var(--white);
    position: relative;
    z-index: 1;
}

.price {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: var(--white);
    position: relative;
    z-index: 1;
}

.starting-from {
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
    opacity: 0.9;
    margin-bottom: 5px;
}

.amount {
    font-size: clamp(1.8rem, 4vw, 2.2rem);
    font-weight: 700;
    margin-bottom: 10px;
}

.package-info {
    font-size: clamp(0.8rem, 1.5vw, 0.85rem);
    opacity: 0.9;
    padding: 5px 15px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    display: inline-block;
}

.card-body {
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    color: var(--gray-800);
    background: var(--white);
}

.feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-list li {
    display: flex;
    align-items: flex-start;
    margin-bottom: 12px;
    color: var(--gray-600);
    font-size: clamp(0.9rem, 1.5vw, 0.95rem);
    line-height: 1.5;
}

.feature-list i {
    margin-right: 12px;
    margin-top: 3px;
    flex-shrink: 0;
    width: 16px;
    text-align: center;
}

.feature-list .fa-check {
    color: var(--success);
}

.feature-list .fa-times {
    color: var(--error);
    opacity: 0.6;
}

.card-footer {
    padding: 0 clamp(1.5rem, 3vw, 2rem) clamp(1.5rem, 3vw, 2rem);
    text-align: center;
}

.card-footer:first-of-type {
    padding-bottom: 15px;
}

.btn-order {
    display: block;
    width: 100%;
    padding: clamp(12px, 2vw, 14px);
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--secondary-gold) 100%);
    color: var(--white);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
    box-shadow: 0 4px 15px rgba(217, 119, 6, 0.3);
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(217, 119, 6, 0.4);
}

.btn-outline-kk {
    display: block;
    width: 100%;
    padding: clamp(10px, 2vw, 12px);
    background-color: transparent;
    color: var(--primary-gold);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--primary-gold);
    font-size: clamp(0.85rem, 1.5vw, 0.95rem);
    text-align: center;
}

.btn-outline-kk:hover {
    background-color: var(--primary-gold);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(217, 119, 6, 0.2);
}

.pricing-info {
    margin-top: clamp(3rem, 6vw, 4rem);
    padding-top: clamp(3rem, 6vw, 4rem);
    border-top: 1px solid var(--gray-300);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(250px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
    max-width: 900px;
    margin: 0 auto;
}

.info-item {
    text-align: center;
    padding: clamp(1.5rem, 3vw, 2rem) 1rem;
}

.info-item i {
    font-size: clamp(2rem, 4vw, 2.5rem);
    color: var(--primary-gold);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--light-gold) 0%, #fef3c7 100%);
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.info-item h4 {
    font-size: clamp(1.1rem, 2vw, 1.2rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.info-item p {
    color: var(--gray-600);
    line-height: 1.6;
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

/* =========================
   FAQ SECTION
   ========================= */
.faq-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.faq-grid {
    max-width: min(800px, 100%);
    margin: 0 auto;
}

.faq-item {
    background: var(--white);
    border-radius: 12px;
    margin-bottom: 1rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.faq-item:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
}

.faq-question {
    padding: clamp(1.25rem, 3vw, 1.5rem);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    cursor: pointer;
    transition: background-color 0.3s ease;
    gap: 1rem;
}

.faq-question:hover {
    background: var(--gray-50);
}

.faq-question h4 {
    font-size: clamp(1rem, 2vw, 1.1rem);
    font-weight: 600;
    color: var(--gray-800);
    margin: 0;
    flex: 1;
    line-height: 1.4;
}

.faq-question i {
    color: var(--primary-gold);
    transition: transform 0.3s ease;
    flex-shrink: 0;
    margin-top: 0.25rem;
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 clamp(1.25rem, 3vw, 1.5rem);
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
    padding: 0 clamp(1.25rem, 3vw, 1.5rem) clamp(1.25rem, 3vw, 1.5rem);
    max-height: 500px;
}

.faq-answer p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

/* =========================
   BUTTONS
   ========================= */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: clamp(0.875rem, 2vw, 1rem) clamp(1.5rem, 3vw, 2rem);
    font-size: clamp(0.9rem, 1.5vw, 1rem);
    font-weight: 600;
    text-decoration: none;
    border: 2px solid transparent;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    white-space: nowrap;
}

.btn-primary {
    color: var(--white);
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--secondary-gold) 100%);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(217, 119, 6, 0.3);
}

.btn-outline-light {
    color: var(--white);
    background: transparent;
    border: 2px solid var(--white);
}

.btn-outline-light:hover {
    color: var(--primary-gold);
    background: var(--white);
    transform: translateY(-2px);
}

/* =========================
   CTA SECTION
   ========================= */
.cta-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: linear-gradient(135deg, var(--dark-gold) 0%, var(--primary-gold) 100%);
    color: var(--white);
    text-align: center;
}

.cta-content h3 {
    font-size: clamp(2rem, 4vw, 2.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--white);
}

.cta-content p {
    font-size: clamp(1rem, 2vw, 1.2rem);
    margin: 0 auto clamp(2rem, 4vw, 2.5rem);
    max-width: min(600px, 90%);
    opacity: 0.9;
    line-height: 1.6;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: clamp(0.75rem, 2vw, 1rem);
}

/* =========================
   ANIMATIONS
   ========================= */
@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* =========================
   RESPONSIVE BREAKPOINTS
   ========================= */

/* Tablet Landscape (1024px - 1199px) */
@media (max-width: 1199px) {
    .hero-content {
        gap: 3rem;
    }
}

/* Tablet Portrait (768px - 1023px) */
@media (max-width: 1023px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
        padding: 6rem 0 4rem;
    }

    .hero-text {
        margin: 0 auto;
    }

    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .certificate-window {
        transform: none;
    }
}

/* Mobile Landscape (576px - 767px) */
@media (max-width: 767px) {
    .modern-hero {
        min-height: 90vh;
    }

    .hero-content {
        padding: 5rem 0 3rem;
    }

    .hero-actions {
        justify-content: center;
    }

    .hero-stats {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .programs-grid,
    .benefits-grid,
    .pricing-grid,
    .instructors-grid {
        grid-template-columns: 1fr;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 280px;
    }

    .certificate-details {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .program-level {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .duration {
        align-self: flex-start;
    }

    .card-badge {
        right: -30px;
        padding: 6px 30px;
        font-size: 0.7rem;
    }
}

/* Mobile Portrait (480px - 575px) */
@media (max-width: 575px) {
    .container {
        padding: 0 1rem;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .section-title {
        font-size: 1.8rem;
    }

    .program-header,
    .program-body,
    .program-footer {
        padding-left: 1.25rem;
        padding-right: 1.25rem;
    }

    .card-header,
    .card-body,
    .card-footer {
        padding-left: 1.25rem;
        padding-right: 1.25rem;
    }

    .amount {
        font-size: 1.8rem;
    }

    .feature-list li {
        font-size: 0.9rem;
    }
}

/* Small Mobile (320px - 479px) */
@media (max-width: 479px) {
    .container {
        padding: 0 0.75rem;
    }

    .hero-title {
        font-size: 1.75rem;
    }

    .hero-actions {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 100%;
    }

    .section-title {
        font-size: 1.6rem;
    }

    .program-card,
    .benefit-card,
    .training-card,
    .instructor-card {
        padding: 1.25rem;
    }

    .certificate-content {
        padding: 1.25rem;
    }

    .card-badge {
        right: -25px;
        padding: 4px 25px;
        font-size: 0.65rem;
    }
}

/* Touch Device Optimizations */
@media (hover: none) and (pointer: coarse) {
    .program-card:hover,
    .benefit-card:hover,
    .training-card:hover,
    .instructor-card:hover,
    .btn:hover,
    .btn-order:hover,
    .btn-outline-kk:hover {
        transform: none;
    }

    .certificate-window:hover {
        transform: rotateY(-5deg) rotateX(5deg);
    }
}

/* High DPI Screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .benefit-icon,
    .info-item i,
    .instructor-avatar {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Print Styles */
@media print {
    .modern-hero,
    .cta-section,
    .hero-actions,
    .card-footer {
        display: none;
    }

    .programs-section,
    .benefits-section,
    .pricing-section,
    .instructors-section,
    .faq-section {
        padding: 2rem 0;
    }

    .section-title {
        color: #000 !important;
    }
}

/* =========================
   ACCESSIBILITY
   ========================= */
@media (prefers-contrast: high) {
    :root {
        --primary-gold: #8b4513;
        --secondary-gold: #654321;
    }
}

/* Focus styles */
button:focus,
a:focus,
.faq-question:focus {
    outline: 2px solid var(--primary-gold);
    outline-offset: 2px;
}

/* Skip link for accessibility */
.skip-link {
    position: absolute;
    top: -40px;
    left: 6px;
    background: var(--primary-gold);
    color: white;
    padding: 8px;
    text-decoration: none;
    border-radius: 4px;
    z-index: 10000;
}

.skip-link:focus {
    top: 6px;
}

/* =========================
   SMOOTH SCROLLING & PERFORMANCE
   ========================= */
html {
    scroll-behavior: smooth;
}

/* Improve rendering performance */
.program-card,
.benefit-card,
.training-card,
.instructor-card,
.certificate-window {
    transform: translateZ(0);
    backface-visibility: hidden;
}

/* Loading states */
.btn:disabled,
.btn-order:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}
</style>
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

document.addEventListener('DOMContentLoaded', function() {
    // FAQ functionality
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
});
</script>
@endsection