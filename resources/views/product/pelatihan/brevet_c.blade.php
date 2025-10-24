@extends('layouts.master')

@section('title', 'Pelatihan Brevet C')

@section('content')
<section class="brevet-c-service">
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
                        <span class="title-line highlight">Brevet C</span>
                    </h1>
                    <p class="hero-subtitle">
                        Sertifikasi kompetensi perpajakan tingkat <span class="text-highlight">mahir</span> untuk 
                        <span class="text-highlight">konsultan pajak</span> dan 
                        <span class="text-highlight">profesional pajak</span> berkarir cemerlang
                    </p>
                    <p class="hero-description">
                        Kuasai kompleksitas perpajakan tingkat lanjut dengan Brevet C. Persiapkan diri menjadi 
                        konsultan pajak profesional dengan kurikulum komprehensif dan pengajar expert.
                    </p>
                    <div class="hero-actions">
                        <a href="#features" class="btn btn-primary">
                            <span>Lihat Keunggulan</span>
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
                                <div class="certificate-title">Sertifikat Brevet C</div>
                            </div>
                            <div class="certificate-content">
                                <div class="certificate-badge">
                                    <i class="fas fa-award"></i>
                                    <span>BREVET C</span>
                                </div>
                                <div class="certificate-info">
                                    <h4>SERTIFIKAT KOMPETENSI MAHIR</h4>
                                    <p>Diakui oleh Ikatan Konsultan Pajak Indonesia</p>
                                    <div class="certificate-details">
                                        <div class="detail-item">
                                            <span>Tingkat</span>
                                            <strong>Mahir</strong>
                                        </div>
                                        <div class="detail-item">
                                            <span>Masa Berlaku</span>
                                            <strong>5 Tahun</strong>
                                        </div>
                                        <div class="detail-item">
                                            <span>Prerequisites</span>
                                            <strong>Brevet A&B</strong>
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

    <!-- Features Section -->
    <div id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Keunggulan Brevet C</h2>
                <p class="section-subtitle">Tingkatkan kompetensi Anda ke level konsultan pajak profesional</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h4>Level Mahir</h4>
                    <p>Sertifikasi tingkat tertinggi dalam kompetensi perpajakan yang diakui secara nasional</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Konsultan Profesional</h4>
                    <p>Persiapan menjadi konsultan pajak berlisensi dengan kemampuan teknis mendalam</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-network"></i>
                    </div>
                    <h4>Networking Eksklusif</h4>
                    <p>Akses ke komunitas konsultan pajak dan profesional perpajakan tingkat atas</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Kemitraan Strategis</h4>
                    <p>Peluang kerjasama dengan firma konsultan pajak dan perusahaan multinasional</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4>Karir Cemerlang</h4>
                    <p>Peluang karir sebagai tax manager, konsultan, atau mendirikan praktik sendiri</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Update Regulasi</h4>
                    <p>Materi selalu update dengan UU HPP dan regulasi perpajakan terbaru</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Curriculum Section -->
    <div class="curriculum-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kurikulum Komprehensif Brevet C</h2>
                <p class="section-subtitle">Materi lengkap untuk menguasai kompleksitas perpajakan tingkat lanjut</p>
            </div>
            <div class="curriculum-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="advanced-tax">Perpajakan Lanjutan</button>
                    <button class="tab-button" data-tab="tax-consulting">Konsultasi Pajak</button>
                    <button class="tab-button" data-tab="case-studies">Case Studies</button>
                    <button class="tab-button" data-tab="professional">Profesional Development</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="advanced-tax">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Perpajakan Tingkat Lanjut</h4>
                                <p>Penguasaan mendalam terhadap aspek kompleks perpajakan nasional dan internasional</p>
                                <ul>
                                    <li>Transfer Pricing Documentation</li>
                                    <li>Tax Treaty & International Taxation</li>
                                    <li>Tax Avoidance & Anti-Avoidance Rules</li>
                                    <li>Bussiness Restructuring & M&A Taxation</li>
                                    <li>Thin Capitalization & Debt Equity Rules</li>
                                    <li>Tax Incentives & Special Economic Zones</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="curriculum-preview">
                                    <div class="curriculum-item">
                                        <i class="fas fa-exchange-alt"></i>
                                        <div>
                                            <strong>Transfer Pricing</strong>
                                            <span>Master File, Local File, CbCR</span>
                                        </div>
                                    </div>
                                    <div class="curriculum-item">
                                        <i class="fas fa-globe"></i>
                                        <div>
                                            <strong>International Tax</strong>
                                            <span>Tax Treaty, PE, Withholding Tax</span>
                                        </div>
                                    </div>
                                    <div class="curriculum-item">
                                        <i class="fas fa-handshake"></i>
                                        <div>
                                            <strong>M&A Taxation</strong>
                                            <span>Due Diligence, Restructuring</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tax-consulting">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Konsultasi & Advokasi Pajak</h4>
                                <p>Keterampilan konsultasi dan advokasi untuk klien korporasi dan individu</p>
                                <ul>
                                    <li>Tax Planning & Compliance Strategy</li>
                                    <li>Tax Risk Management & Internal Control</li>
                                    <li>Tax Dispute Resolution & Litigation</li>
                                    <li>Tax Amnesty & Voluntary Disclosure</li>
                                    <li>Client Management & Communication</li>
                                    <li>Professional Ethics & Standards</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="consulting-preview">
                                    <div class="consulting-item">
                                        <i class="fas fa-chess-board"></i>
                                        <span>Tax Planning Strategy</span>
                                        <span class="level">Advanced</span>
                                    </div>
                                    <div class="consulting-item">
                                        <i class="fas fa-balance-scale"></i>
                                        <span>Tax Dispute Resolution</span>
                                        <span class="level">Expert</span>
                                    </div>
                                    <div class="consulting-item">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>Risk Management</span>
                                        <span class="level">Professional</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="case-studies">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Case Studies & Workshop</h4>
                                <p>Pembelajaran berbasis kasus nyata dari pengalaman praktisi</p>
                                <ul>
                                    <li>Multinational Corporation Cases</li>
                                    <li>Manufacturing & Trading Company</li>
                                    <li>Banking & Financial Institution</li>
                                    <li>Mining & Natural Resources</li>
                                    <li>Digital Economy & E-commerce</li>
                                    <li>Tax Court Decision Analysis</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="case-preview">
                                    <div class="case-item">
                                        <div class="case-header">
                                            <strong>Case Study #1</strong>
                                            <span>Manufacturing</span>
                                        </div>
                                        <p>Transfer Pricing Documentation untuk perusahaan manufaktur multinasional</p>
                                    </div>
                                    <div class="case-item">
                                        <div class="case-header">
                                            <strong>Case Study #2</strong>
                                            <span>Digital Company</span>
                                        </div>
                                        <p>Permanent Establishment dan VAT untuk perusahaan digital asing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="professional">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Pengembangan Profesional</h4>
                                <p>Keterampilan soft skills untuk sukses sebagai konsultan pajak profesional</p>
                                <ul>
                                    <li>Business Development & Client Acquisition</li>
                                    <li>Proposal Writing & Fee Structuring</li>
                                    <li>Practice Management & Team Leadership</li>
                                    <li>Continuing Professional Education</li>
                                    <li>Industry Specialization</li>
                                    <li>Professional Certification Path</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="professional-preview">
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Business Development</span>
                                            <span>90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Client Management</span>
                                            <span>85%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Practice Leadership</span>
                                            <span>80%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 80%"></div>
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

    <!-- Target Audience -->
    <div class="audience-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Untuk Siapa Brevet C Ini?</h2>
                <p class="section-subtitle">Program ini dirancang khusus untuk profesional yang ingin mencapai puncak karir perpajakan</p>
            </div>
            <div class="audience-grid">
                <div class="audience-card">
                    <div class="audience-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Tax Manager</h4>
                    <p>Profesional yang memimpin departemen pajak perusahaan dan butuh penguasaan teknis mendalam</p>
                    <ul>
                        <li>Minimal 3 tahun pengalaman</li>
                        <li>Memimpin tim pajak</li>
                        <li>Butuh update regulasi</li>
                    </ul>
                </div>
                <div class="audience-card">
                    <div class="audience-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4>Konsultan Pajak</h4>
                    <p>Praktisi yang ingin meningkatkan kredibilitas dan kemampuan teknis untuk melayani klien kompleks</p>
                    <ul>
                        <li>Sudah memiliki Brevet A&B</li>
                        <li>Pengalaman konsultasi</li>
                        <li>Ingin spesialisasi</li>
                    </ul>
                </div>
                <div class="audience-card">
                    <div class="audience-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>Akuntan Profesional</h4>
                    <p>Akuntan yang ingin mengembangkan spesialisasi perpajakan dan menjadi tax expert</p>
                    <ul>
                        <li>Latar belakang akuntansi</li>
                        <li>Ingin karir spesialis</li>
                        <li>Target posisi strategis</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div id="pricing" class="pricing-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Investasi Brevet C</h2>
            <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan pengembangan karir Anda</p>
        </div>
        
        <div id="pricing" class="pricing-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Investasi Pelatihan</h2>
                <p class="section-subtitle">Pilih paket pelatihan yang sesuai dengan kebutuhan Anda</p>
            </div>
            
            <div class="pricing-grid">
                @foreach($brevetc as $brevet)
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
                                onclick="addToCart({{ $brevet->id }}, 'ItemBrevetC')">
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
<<<<<<< HEAD
=======

        <!-- Additional Info -->
        <div class="pricing-info">
            <div class="info-grid">
                <div class="info-item">
                    <i class="fas fa-calendar-alt"></i>
                    <h4>Flexible Schedule</h4>
                    <p>Pilihan weekday evening dan weekend class untuk profesional</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h4>Cicilan 0%</h4>
                    <p>Kemudahan pembayaran dengan cicilan hingga 24 bulan</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Garansi Ulang</h4>
                    <p>Gratis mengulang jika tidak lulus ujian sertifikasi</p>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Instructors Section -->
    <div class="instructors-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pengajar Expert Brevet C</h2>
                <p class="section-subtitle">Belajar langsung dari konsultan pajak senior dan praktisi berpengalaman</p>
            </div>
            <div class="instructors-grid">
                <div class="instructor-card">
                    <div class="instructor-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="instructor-info">
                        <h4>Dr. Ahmad Wijaya, S.E., M.Ak., CA.</h4>
                        <span>Senior Tax Partner - Big Four</span>
                        <p>20+ tahun pengalaman, ahli transfer pricing dan international taxation, mantan Pejabat DJP</p>
                        <div class="instructor-expertise">
                            <span class="expertise-tag">Transfer Pricing</span>
                            <span class="expertise-tag">International Tax</span>
                            <span class="expertise-tag">M&A</span>
                        </div>
                    </div>
                </div>
                <div class="instructor-card">
                    <div class="instructor-avatar">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="instructor-info">
                        <h4>Prof. Sarah Indah, S.E., M.Ak., BKP.</h4>
                        <span>Tax Litigation Expert</span>
                        <p>15+ tahun pengalaman di tax court, spesialis keberatan, banding, dan gugatan pajak</p>
                        <div class="instructor-expertise">
                            <span class="expertise-tag">Tax Dispute</span>
                            <span class="expertise-tag">Tax Court</span>
                            <span class="expertise-tag">Litigation</span>
                        </div>
                    </div>
                </div>
                <div class="instructor-card">
                    <div class="instructor-avatar">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="instructor-info">
                        <h4>Budi Santoso, S.E., Ak., CA.</h4>
                        <span>Managing Partner Tax Firm</span>
                        <p>18+ tahun pengalaman, ahli tax planning untuk perusahaan multinasional dan konglomerasi</p>
                        <div class="instructor-expertise">
                            <span class="expertise-tag">Tax Planning</span>
                            <span class="expertise-tag">Corporate Tax</span>
                            <span class="expertise-tag">Business Restructuring</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

>>>>>>> d02faebeab8747a5de3202ff73c4b998d7308c51
    <!-- Certification Benefits -->
    <div class="certification-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Manfaat Sertifikasi Brevet C</h2>
                <p class="section-subtitle">Tingkatkan kredibilitas dan buka peluang karir tak terbatas</p>
            </div>
            <div class="certification-grid">
                <div class="certification-card">
                    <div class="cert-number">01</div>
                    <h4>Kredibilitas Profesional</h4>
                    <p>Sertifikat Brevet C sebagai bukti kompetensi tingkat mahir yang diakui industri</p>
                </div>
                <div class="certification-card">
                    <div class="cert-number">02</div>
                    <h4>Peluang Konsultan</h4>
                    <p>Mendirikan praktik konsultan pajak sendiri atau bergabung dengan firma ternama</p>
                </div>
                <div class="certification-card">
                    <div class="cert-number">03</div>
                    <h4>Kompetensi Teknis Mendalam</h4>
                    <p>Penguasaan kompleksitas perpajakan nasional dan internasional</p>
                </div>
                <div class="certification-card">
                    <div class="cert-number">04</div>
                    <h4>Jaringan Profesional</h4>
                    <p>Akses ke komunitas konsultan pajak dan profesional perpajakan tingkat atas</p>
                </div>
                <div class="certification-card">
                    <div class="cert-number">05</div>
                    <h4>Peningkatan Income</h4>
                    <p>Potensi penghasilan yang lebih tinggi sebagai konsultan pajak profesional</p>
                </div>
                <div class="certification-card">
                    <div class="cert-number">06</div>
                    <h4>Karir Global</h4>
                    <p>Peluang karir di perusahaan multinasional dan organisasi internasional</p>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Section -->
    <div class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pertanyaan Umum Brevet C</h2>
                <p class="section-subtitle">Informasi lengkap seputar program dan sertifikasi Brevet C</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apa prerequisites untuk mengikuti Brevet C?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Peserta harus sudah memiliki sertifikat Brevet A&B dan pengalaman kerja di bidang perpajakan minimal 2 tahun. Untuk fresh graduate, diperlukan rekomendasi khusus dari akademisi atau profesional.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Berbeda dengan Brevet A&B, apa keunikan Brevet C?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Brevet C fokus pada aspek kompleks perpajakan seperti transfer pricing, international taxation, tax planning strategis, dan dispute resolution. Levelnya setara dengan konsultan pajak senior.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah Brevet C diakui untuk menjadi konsultan pajak?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, Brevet C merupakan salah satu persyaratan kompetensi untuk menjadi konsultan pajak. Dilengkapi dengan pengalaman praktik, Anda dapat mendaftar sebagai konsultan pajak berlisensi.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bagaimana sistem pembelajaran untuk profesional yang sibuk?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kami menyediakan flexible schedule dengan pilihan weekday evening (19.00-21.00) dan weekend class. Materi juga tersedia dalam format digital untuk belajar mandiri.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Menjadi Konsultan Pajak Profesional?</h3>
                <p>Raih sertifikat Brevet C dan buka pintu karir tak terbatas di dunia perpajakan</p>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-navy: #1e3a8a;
    --secondary-navy: #1e40af;
    --dark-navy: #1e293b;
    --light-navy: #dbeafe;
    --accent-gold: #d97706;
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

.brevet-c-service {
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
    background: linear-gradient(135deg, #1e293b 0%, #1e3a8a 50%, #1e40af 100%);
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
    background: linear-gradient(135deg, #fde68a, #fcd34d);
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
    color: #fde68a;
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
    border: 2px solid var(--accent-gold);
}

.certificate-window:hover {
    transform: rotateY(0) rotateX(0);
}

.certificate-header {
    background: linear-gradient(135deg, var(--primary-navy), var(--secondary-navy));
    padding: clamp(0.75rem, 2vw, 1rem) clamp(1rem, 2vw, 1.5rem);
    display: flex;
    align-items: center;
    gap: clamp(0.5rem, 1.5vw, 1rem);
    border-bottom: 1px solid var(--light-navy);
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
    color: var(--accent-gold);
    margin-bottom: 0.5rem;
    display: block;
}

.certificate-badge span {
    font-size: clamp(1rem, 2vw, 1.2rem);
    font-weight: 700;
    color: var(--primary-navy);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.certificate-info h4 {
    font-size: clamp(1rem, 2vw, 1.1rem);
    font-weight: 700;
    color: var(--primary-navy);
    margin-bottom: 0.5rem;
}

.certificate-info p {
    color: var(--gray-600);
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
}

.certificate-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
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
    color: var(--primary-navy);
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
   FEATURES SECTION
   ========================= */
.features-section {
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

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.feature-card {
    background: var(--white);
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.feature-icon {
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    background: linear-gradient(135deg, var(--primary-navy), var(--secondary-navy));
    color: var(--white);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.75rem, 3vw, 2rem);
    margin: 0 auto 1.5rem;
}

.feature-card h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.feature-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

/* =========================
   CURRICULUM SECTION
   ========================= */
.curriculum-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.curriculum-tabs {
    max-width: min(1000px, 100%);
    margin: 0 auto;
}

.tab-buttons {
    display: flex;
    gap: clamp(0.75rem, 2vw, 1rem);
    margin-bottom: clamp(1.5rem, 3vw, 2rem);
    flex-wrap: wrap;
    justify-content: center;
}

.tab-button {
    padding: clamp(0.875rem, 2vw, 1rem) clamp(1.5rem, 3vw, 2rem);
    background: var(--gray-50);
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    font-weight: 600;
    color: var(--gray-600);
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
    white-space: nowrap;
    flex: 1;
    min-width: fit-content;
    text-align: center;
}

.tab-button:hover {
    border-color: var(--primary-navy);
    color: var(--primary-navy);
}

.tab-button.active {
    background: var(--primary-navy);
    border-color: var(--primary-navy);
    color: var(--white);
}

.tab-content {
    background: var(--gray-50);
    border-radius: 20px;
    padding: clamp(2rem, 4vw, 3rem);
    border: 1px solid var(--gray-200);
}

.tab-pane {
    display: none;
}

.tab-pane.active {
    display: block;
    animation: fadeInUp 0.5s ease;
}

.pane-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(2rem, 4vw, 3rem);
    align-items: start;
}

.pane-text h4 {
    font-size: clamp(1.25rem, 2.5vw, 1.5rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.pane-text p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.pane-text ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pane-text li {
    padding: 0.5rem 0;
    color: var(--gray-600);
    position: relative;
    padding-left: 1.5rem;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.pane-text li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: var(--primary-navy);
    font-weight: 600;
}

/* Preview Components */
.curriculum-preview,
.consulting-preview,
.case-preview,
.professional-preview {
    background: var(--white);
    border-radius: 12px;
    padding: clamp(1.5rem, 3vw, 2rem);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid var(--gray-200);
}

/* Curriculum Preview */
.curriculum-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--gray-200);
}

.curriculum-item:last-child {
    border-bottom: none;
}

.curriculum-item i {
    width: clamp(40px, 5vw, 50px);
    height: clamp(40px, 5vw, 50px);
    background: var(--light-navy);
    color: var(--primary-navy);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1rem, 2vw, 1.25rem);
    flex-shrink: 0;
}

.curriculum-item div {
    flex: 1;
}

.curriculum-item strong {
    display: block;
    color: var(--gray-800);
    margin-bottom: 0.25rem;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.curriculum-item span {
    color: var(--gray-600);
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
}

/* Consulting Preview */
.consulting-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid var(--gray-200);
    gap: 1rem;
}

.consulting-item:last-child {
    border-bottom: none;
}

.consulting-item i {
    color: var(--primary-navy);
    font-size: clamp(1.25rem, 2vw, 1.5rem);
    margin-right: 1rem;
    flex-shrink: 0;
}

.consulting-item span:first-of-type {
    flex: 1;
    color: var(--gray-700);
    font-weight: 500;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.level {
    background: var(--accent-gold);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    font-weight: 600;
    white-space: nowrap;
}

/* Case Preview */
.case-item {
    padding: clamp(1rem, 2vw, 1.5rem);
    border: 1px solid var(--gray-200);
    border-radius: 8px;
    margin-bottom: 1rem;
}

.case-item:last-child {
    margin-bottom: 0;
}

.case-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.75rem;
    gap: 1rem;
    flex-wrap: wrap;
}

.case-header strong {
    color: var(--gray-800);
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.case-header span {
    background: var(--light-navy);
    color: var(--primary-navy);
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    font-weight: 500;
    white-space: nowrap;
}

.case-item p {
    color: var(--gray-600);
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
    line-height: 1.5;
    margin: 0;
}

/* Professional Preview */
.skill-item {
    margin-bottom: 1.5rem;
}

.skill-item:last-child {
    margin-bottom: 0;
}

.skill-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    gap: 1rem;
}

.skill-info span:first-child {
    color: var(--gray-700);
    font-weight: 500;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.skill-info span:last-child {
    color: var(--primary-navy);
    font-weight: 600;
    font-size: clamp(0.8rem, 1.5vw, 0.9rem);
}

.skill-bar {
    height: 8px;
    background: var(--gray-200);
    border-radius: 4px;
    overflow: hidden;
}

.skill-progress {
    height: 100%;
    background: linear-gradient(135deg, var(--primary-navy), var(--secondary-navy));
    border-radius: 4px;
    transition: width 1s ease-in-out;
}

/* =========================
   AUDIENCE SECTION
   ========================= */
.audience-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.audience-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.audience-card {
    background: var(--white);
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
}

.audience-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.audience-icon {
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    background: linear-gradient(135deg, var(--light-navy), #dbeafe);
    color: var(--primary-navy);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.75rem, 3vw, 2rem);
    margin: 0 auto 1.5rem;
}

.audience-card h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.audience-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.audience-card ul {
    list-style: none;
    padding: 0;
    text-align: left;
}

.audience-card li {
    padding: 0.5rem 0;
    color: var(--gray-600);
    position: relative;
    padding-left: 1.5rem;
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
}

.audience-card li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--success);
    font-weight: 600;
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
    background-color: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid var(--gray-200);
    width: 100%;
    max-width: 400px;
}

.training-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.training-card.featured {
    border: 2px solid var(--primary-navy);
}

.card-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
    color: var(--white);
    padding: clamp(6px, 1.5vw, 8px) clamp(30px, 4vw, 40px);
    transform: rotate(45deg);
    font-size: clamp(0.7rem, 1.5vw, 0.8rem);
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
}

.card-header {
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
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
    background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
    color: var(--white);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
}

.btn-outline-kk {
    display: block;
    width: 100%;
    padding: clamp(10px, 2vw, 12px);
    background-color: transparent;
    color: var(--primary-navy);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--primary-navy);
    font-size: clamp(0.85rem, 1.5vw, 0.95rem);
    text-align: center;
}

.btn-outline-kk:hover {
    background-color: var(--primary-navy);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.2);
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
    color: var(--primary-navy);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--light-navy) 0%, #dbeafe 100%);
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
   INSTRUCTORS SECTION
   ========================= */
.instructors-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.instructors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.instructor-card {
    background: var(--white);
    border-radius: 16px;
    padding: clamp(1.5rem, 3vw, 2rem);
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
}

.instructor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.instructor-avatar {
    width: clamp(80px, 10vw, 100px);
    height: clamp(80px, 10vw, 100px);
    background: linear-gradient(135deg, var(--light-navy), #dbeafe);
    color: var(--primary-navy);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(2rem, 4vw, 2.5rem);
    margin: 0 auto 1.5rem;
}

.instructor-info h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--gray-800);
}

.instructor-info span {
    display: block;
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    color: var(--primary-navy);
    font-weight: 500;
    margin-bottom: 1rem;
}

.instructor-info p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
}

.instructor-expertise {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.expertise-tag {
    background: var(--light-navy);
    color: var(--primary-navy);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: clamp(0.75rem, 1.5vw, 0.8rem);
    font-weight: 500;
}

/* =========================
   CERTIFICATION SECTION
   ========================= */
.certification-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.certification-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.certification-card {
    background: var(--white);
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
    position: relative;
}

.certification-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.cert-number {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--primary-navy);
    color: var(--white);
    width: clamp(35px, 5vw, 40px);
    height: clamp(35px, 5vw, 40px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1rem, 2vw, 1.2rem);
    font-weight: 700;
}

.certification-card h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
    margin-top: 1rem;
}

.certification-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}


/* =========================
   FAQ SECTION
   ========================= */
.faq-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
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
    color: var(--primary-navy);
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
    background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(30, 58, 138, 0.3);
}

.btn-outline-light {
    color: var(--white);
    background: transparent;
    border: 2px solid var(--white);
}

.btn-outline-light:hover {
    color: var(--primary-navy);
    background: var(--white);
    transform: translateY(-2px);
}

/* =========================
   CTA SECTION
   ========================= */
.cta-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: linear-gradient(135deg, var(--dark-navy) 0%, var(--primary-navy) 100%);
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

    .pane-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .certificate-window {
        transform: none;
    }

    .certificate-details {
        grid-template-columns: repeat(2, 1fr);
    }

    .tab-buttons {
        gap: 0.75rem;
    }

    .tab-button {
        flex: 0 1 calc(50% - 0.75rem);
        min-width: 140px;
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

    .features-grid,
    .audience-grid,
    .pricing-grid,
    .instructors-grid,
    .certification-grid {
        grid-template-columns: 1fr;
    }

    .tab-buttons {
        flex-direction: column;
        align-items: center;
    }

    .tab-button {
        width: 100%;
        max-width: 300px;
        flex: none;
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

    .consulting-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .consulting-item i {
        margin-right: 0;
        margin-bottom: 0.5rem;
    }

    .case-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .author-info {
        text-align: center;
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

    .tab-content {
        padding: 1.5rem;
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

    .curriculum-item {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
    }

    .curriculum-item div {
        text-align: center;
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

    .feature-card,
    .audience-card,
    .training-card,
    .instructor-card,
    .certification-card {
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

    .cert-number {
        width: 30px;
        height: 30px;
        font-size: 0.9rem;
    }
}

/* Touch Device Optimizations */
@media (hover: none) and (pointer: coarse) {
    .feature-card:hover,
    .audience-card:hover,
    .training-card:hover,
    .instructor-card:hover,
    .certification-card:hover,
    .btn:hover,
    .btn-order:hover,
    .btn-outline-kk:hover {
        transform: none;
    }

    .certificate-window:hover {
        transform: rotateY(-5deg) rotateX(5deg);
    }

    .tab-button:hover {
        border-color: var(--gray-200);
        color: var(--gray-600);
    }

    .tab-button.active:hover {
        border-color: var(--primary-navy);
        color: var(--white);
    }
}

/* High DPI Screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .feature-icon,
    .audience-icon,
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

    .features-section,
    .curriculum-section,
    .audience-section,
    .pricing-section,
    .instructors-section,
    .certification-section,
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
        --primary-navy: #000080;
        --secondary-navy: #0000cd;
    }
}

/* Focus styles */
button:focus,
a:focus,
.tab-button:focus,
.faq-question:focus {
    outline: 2px solid var(--primary-navy);
    outline-offset: 2px;
}

/* Skip link for accessibility */
.skip-link {
    position: absolute;
    top: -40px;
    left: 6px;
    background: var(--primary-navy);
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
.feature-card,
.audience-card,
.training-card,
.instructor-card,
.certification-card,
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

/* Tab functionality */
.tab-pane {
    animation: fadeInUp 0.5s ease;
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
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');
            
            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to current button and pane
            button.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });

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