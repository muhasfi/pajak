@extends('layouts.master')

@section('title', 'Pelatihan Brevet A & B')

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
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">5.000+</span>
                    <span class="stat-label">Alumni</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Kelulusan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Pengajar</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Tahun</span>
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
                                @if(!empty(trim($line)))
                                    <li><i class="fas fa-check"></i> {{ trim($line) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer">
                        <button type="button" 
                                class="btn-order" 
                                onclick="addToCart({{ $brevet->id }}, 'ItemBrevetAB')">
                            Daftar Sekarang
                        </button>
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

    <!-- Instructors Section -->
    <div class="instructors-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Tim Pengajar Profesional</h2>
                <p class="section-subtitle">Belajar langsung dari praktisi dan konsultan pajak berpengalaman</p>
            </div>
            <div class="instructors-grid">
                <div class="instructor-card">
                    <div class="instructor-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="instructor-info">
                        <h4>Dr. Ahmad Wijaya, M.Ak.</h4>
                        <span>Konsultan Pajak Senior</span>
                        <p>15+ tahun pengalaman di bidang perpajakan, mantan Pejabat DJP</p>
                        <div class="instructor-expertise">
                            <span class="expertise-tag">PPh Badan</span>
                            <span class="expertise-tag">Tax Planning</span>
                        </div>
                    </div>
                </div>
                <div class="instructor-card">
                    <div class="instructor-avatar">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="instructor-info">
                        <h4>Sarah Indah, S.E., M.Ak.</h4>
                        <span>Tax Manager Multinational</span>
                        <p>12+ tahun pengalaman, spesialis PPN dan transfer pricing</p>
                        <div class="instructor-expertise">
                            <span class="expertise-tag">PPN</span>
                            <span class="expertise-tag">International Tax</span>
                        </div>
                    </div>
                </div>
                <div class="instructor-card">
                    <div class="instructor-avatar">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="instructor-info">
                        <h4>Budi Santoso, S.E., Ak.</h4>
                        <span>Praktisi Perpajakan</span>
                        <p>10+ tahun pengalaman, ahli dalam pemeriksaan dan keberatan pajak</p>
                        <div class="instructor-expertise">
                            <span class="expertise-tag">Tax Audit</span>
                            <span class="expertise-tag">Tax Dispute</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kisah Sukses Alumni</h2>
                <p class="section-subtitle">Testimoni dari alumni yang telah berhasil mengembangkan karir setelah mengikuti brevet</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Setelah ikut Brevet A&B, saya berhasil diterima sebagai Tax Officer di perusahaan multinasional. Materi yang diajarkan sangat aplikatif di dunia kerja."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="author-info">
                            <h5>Rina Amelia</h5>
                            <span>Tax Officer - PT Global Multinational</span>
                            <div class="author-badge">Lulusan 2023</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Pelatihan brevet memberikan dasar yang kuat untuk karir saya sebagai konsultan pajak. Pengajar yang kompeten dan materi selalu update."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="author-info">
                            <h5>Andi Pratama</h5>
                            <span>Konsultan Pajak - Andi Tax Consultant</span>
                            <div class="author-badge">Lulusan 2022</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Sebagai fresh graduate, brevet A&B menjadi nilai tambah yang membuat CV saya menonjol. Sekarang saya bekerja di bagian tax perusahaan manufacturing."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h5>Dewi Sartika</h5>
                            <span>Tax Staff - PT Manufacturing Indonesia</span>
                            <div class="author-badge">Lulusan 2023</div>
                        </div>
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
    --gray-800: #1e293b;
    --gray-600: #475569;
    --gray-400: #94a3b8;
    --success: #10b981;
    --error: #ef4444;
    --warning: #f59e0b;
}

.brevet-training-service {
    min-height: 100vh;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
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
    width: 300px;
    height: 300px;
    top: 10%;
    left: 5%;
    animation-delay: 0s;
}

.shape-2 {
    width: 200px;
    height: 200px;
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.shape-3 {
    width: 150px;
    height: 150px;
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

.shape-4 {
    width: 100px;
    height: 100px;
    top: 20%;
    right: 20%;
    animation-delay: 1s;
}

.hero-content {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    padding: 120px 0 80px;
}

.hero-text {
    max-width: 600px;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
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
    font-size: 1.3rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.text-highlight {
    font-weight: 600;
    color: #fef3c7;
}

.hero-description {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 2.5rem;
    opacity: 0.8;
}

.hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.hero-visual {
    display: flex;
    justify-content: center;
    align-items: center;
}

.certificate-preview {
    perspective: 1000px;
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
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid var(--light-gold);
}

.certificate-controls {
    display: flex;
    gap: 8px;
}

.control {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.control.red { background: #ef4444; }
.control.yellow { background: #f59e0b; }
.control.green { background: #10b981; }

.certificate-title {
    color: var(--white);
    font-size: 0.9rem;
    font-weight: 500;
}

.certificate-content {
    padding: 2rem;
    text-align: center;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
}

.certificate-badge {
    margin-bottom: 1.5rem;
}

.certificate-badge i {
    font-size: 3rem;
    color: var(--primary-gold);
    margin-bottom: 0.5rem;
    display: block;
}

.certificate-badge span {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark-gold);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.certificate-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--dark-gold);
    margin-bottom: 0.5rem;
}

.certificate-info p {
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.certificate-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-top: 1rem;
}

.detail-item {
    text-align: center;
}

.detail-item span {
    display: block;
    font-size: 0.8rem;
    color: var(--gray-600);
    margin-bottom: 0.25rem;
}

.detail-item strong {
    display: block;
    font-size: 0.9rem;
    color: var(--dark-gold);
    font-weight: 700;
}

.hero-stats {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    padding: 3rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-item {
    text-align: center;
    background: transparent;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    color: var(--white);
}

.stat-label {
    font-size: 0.9rem;
    font-weight: 500;
    opacity: 0.8;
    color: var(--white);
}

/* =========================
   PROGRAMS SECTION
   ========================= */
.programs-section {
    padding: 100px 0;
    background: var(--gray-50);
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-title {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.section-subtitle {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    color: var(--gray-600);
}

.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.program-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid #e2e8f0;
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

/* .program-card.featured {
    border: 2px solid var(--primary-gold);
    transform: scale(1.05);
} */

.program-card.featured:hover {
    transform: scale(1.05) translateY(-10px);
}

.program-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary-gold);
    color: var(--white);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.program-header {
    padding: 2rem 2rem 1rem;
    background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
    color: var(--white);
}

.program-header h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--white);
}

.program-level {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.level {
    font-weight: 600;
    font-size: 0.9rem;
}

.duration {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
}

.program-body {
    padding: 1.5rem 2rem;
}

.program-body h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.curriculum-list {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem 0;
}

.curriculum-list li {
    display: flex;
    align-items: flex-start;
    margin-bottom: 0.75rem;
    color: var(--gray-600);
    font-size: 0.9rem;
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
    font-size: 0.9rem;
    color: var(--gray-600);
}

.feature i {
    color: var(--primary-gold);
    width: 16px;
}

.program-footer {
    padding: 1rem 2rem 2rem;
    border-top: 1px solid var(--gray-200);
}

.program-target h5 {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--gray-800);
}

.program-target p {
    font-size: 0.85rem;
    color: var(--gray-600);
    margin: 0;
    line-height: 1.5;
}

/* =========================
   BENEFITS SECTION
   ========================= */
.benefits-section {
    padding: 100px 0;
    background: var(--white);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.benefit-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    border: 1px solid #f1f5f9;
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.benefit-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--light-gold), #fde68a);
    color: var(--primary-gold);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
}

.benefit-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.benefit-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
}

/* =========================
   PRICING SECTION - BREVET
   ========================= */
.pricing-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto 4rem;

    justify-content: center; /* <— ini penting */
    justify-items: center;
}

.training-card {
    background-color: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid #e2e8f0;
}

.training-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

/* .training-card.featured {
    border: 2px solid var(--primary-gold);
    transform: scale(1.05);
} */

.training-card.featured:hover {
    transform: scale(1.05) translateY(-10px);
}

.card-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--secondary-gold) 100%);
    color: var(--white);
    padding: 8px 40px;
    transform: rotate(45deg);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(217, 119, 6, 0.3);
}

/* Card header */
.card-header {
    padding: 30px;
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
    font-size: 1.5rem;
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
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 5px;
}

.amount {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.package-info {
    font-size: 0.85rem;
    opacity: 0.9;
    padding: 5px 15px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    display: inline-block;
}

/* Card body */
.card-body {
    padding: 30px;
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
    font-size: 0.95rem;
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

/* Card footer */
.card-footer {
    padding: 0 30px 20px;
    text-align: center;
}

.card-footer:first-of-type {
    padding-bottom: 15px;
}

.btn-order {
    display: block;
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--secondary-gold) 100%);
    color: var(--white);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(217, 119, 6, 0.3);
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(217, 119, 6, 0.4);
}

.btn-outline-kk {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: transparent;
    color: var(--primary-gold);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--primary-gold);
    font-size: 0.95rem;
}

.btn-outline-kk:hover {
    background-color: var(--primary-gold);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(217, 119, 6, 0.2);
}

/* Additional Info Section */
.pricing-info {
    margin-top: 4rem;
    padding-top: 4rem;
    border-top: 1px solid #e2e8f0;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    max-width: 900px;
    margin: 0 auto;
}

.info-item {
    text-align: center;
    padding: 2rem 1rem;
}

.info-item i {
    font-size: 2.5rem;
    color: var(--primary-gold);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--light-gold) 0%, #fef3c7 100%);
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.info-item h4 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.info-item p {
    color: var(--gray-600);
    line-height: 1.6;
    margin: 0;
}

/* =========================
   INSTRUCTORS SECTION
   ========================= */
.instructors-section {
    padding: 100px 0;
    background: var(--white);
}

.instructors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.instructor-card {
    background: var(--white);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    border: 1px solid #f1f5f9;
}

.instructor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.instructor-avatar {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--light-gold), #fde68a);
    color: var(--primary-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin: 0 auto 1.5rem;
}

.instructor-info h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--gray-800);
}

.instructor-info span {
    display: block;
    font-size: 0.9rem;
    color: var(--primary-gold);
    font-weight: 500;
    margin-bottom: 1rem;
}

.instructor-info p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.instructor-expertise {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.expertise-tag {
    background: var(--light-gold);
    color: var(--primary-gold);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* =========================
   TESTIMONIALS SECTION
   ========================= */
.testimonials-section {
    padding: 100px 0;
    background: var(--gray-50);
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.testimonial-card {
    background: var(--white);
    border-radius: 16px;
    padding: 2rem;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.testimonial-card:hover {
    transform: translateY(-5px);
}

.testimonial-content {
    margin-bottom: 1.5rem;
}

.testimonial-content p {
    line-height: 1.6;
    color: var(--gray-600);
    font-style: italic;
    margin: 0;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.author-avatar {
    width: 50px;
    height: 50px;
    background: var(--primary-gold);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.author-info {
    flex: 1;
}

.author-info h5 {
    font-size: 1rem;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
    color: var(--gray-800);
}

.author-info span {
    font-size: 0.875rem;
    color: var(--gray-600);
    display: block;
    margin-bottom: 0.25rem;
}

.author-badge {
    background: var(--light-gold);
    color: var(--primary-gold);
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
}

/* =========================
   FAQ SECTION
   ========================= */
.faq-section {
    padding: 100px 0;
    background: var(--white);
}

.faq-grid {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: var(--white);
    border-radius: 12px;
    margin-bottom: 1rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid #e2e8f0;
}

.faq-question {
    padding: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.faq-question:hover {
    background: var(--gray-50);
}

.faq-question h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--gray-800);
    margin: 0;
    flex: 1;
}

.faq-question i {
    color: var(--primary-gold);
    transition: transform 0.3s ease;
    flex-shrink: 0;
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 1.5rem;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
    padding: 0 1.5rem 1.5rem;
    max-height: 500px;
}

.faq-answer p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
}

/* =========================
   BUTTONS
   ========================= */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    border: 2px solid transparent;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
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

.btn-light {
    color: var(--gray-800);
    background: var(--white);
}

.btn-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* =========================
   CTA SECTION
   ========================= */
.cta-section {
    padding: 100px 0;
    background: linear-gradient(135deg, var(--dark-gold) 0%, var(--primary-gold) 100%);
    color: var(--white);
    text-align: center;
}

.cta-content h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--white);
}

.cta-content p {
    font-size: 1.2rem;
    margin: 0 auto 2.5rem;
    max-width: 600px;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
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
   RESPONSIVE DESIGN
   ========================= */
@media (max-width: 1024px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
    }

    .hero-title {
        font-size: 3rem;
    }

    .program-card.featured {
        transform: none;
    }

    .program-card.featured:hover {
        transform: translateY(-10px);
    }

    .training-card.featured {
        transform: none;
    }

    .training-card.featured:hover {
        transform: translateY(-10px);
    }
}

@media (max-width: 768px) {
    .modern-hero {
        min-height: 90vh;
    }

    .hero-content {
        padding: 100px 0 60px;
    }

    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
    }

    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .stat-number {
        font-size: 2rem;
    }

    .section-title {
        font-size: 2.2rem;
    }

    .programs-grid {
        grid-template-columns: 1fr;
    }

    .benefits-grid {
        grid-template-columns: 1fr;
    }

    .pricing-grid {
        grid-template-columns: 1fr;
    }

    .instructors-grid {
        grid-template-columns: 1fr;
    }

    .testimonials-grid {
        grid-template-columns: 1fr;
    }

    .cta-content h3 {
        font-size: 2rem;
    }

    .hero-actions {
        justify-content: center;
    }

    .btn {
        padding: 0.875rem 1.5rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .hero-stats {
        grid-template-columns: 1fr;
    }

    .section-title {
        font-size: 1.8rem;
    }

    .certificate-window {
        transform: none;
    }

    .cta-section {
        padding: 80px 0;
    }

    .cta-content h3 {
        font-size: 1.75rem;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 300px;
    }

    .card-badge {
        right: -30px;
        padding: 6px 30px;
        font-size: 0.7rem;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
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