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
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">2.500+</span>
                    <span class="stat-label">Konsultan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <span class="stat-label">Kelulusan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">25+</span>
                    <span class="stat-label">Pengajar Expert</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">10+</span>
                    <span class="stat-label">Tahun</span>
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
            
            <div class="pricing-grid">
                @foreach($brevetc as $brevet)
                    <div class="training-card {{ $loop->iteration == 2 ? 'featured' : '' }}">
                        @if($loop->iteration == 2)
                            <div class="card-badge">Best Value</div>
                        @endif

                        <div class="card-header">
                            <h3>{{ $brevet->judul }}</h3>
                            <div class="price">
                                <span class="starting-from">mulai dari</span>
                                <span class="amount">Rp {{ number_format($brevet->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="package-info">{{ $brevet->hari }}</div>
                        </div>

                        <div class="card-body">
                            <ul class="feature-list">
                                @foreach($brevet->details as $detail)
                                    <li>
                                        @if($detail->keterangan)
                                            <i class="fas fa-check"></i> 
                                            {{ $detail->fasilitas }} 
                                            <small class="text-muted">({{ $detail->keterangan }})</small>
                                        @else
                                            <i class="fas fa-check"></i> {{ $detail->fasilitas }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                        <button type="button" 
                                class="btn-order" 
                                onclick="addToCart({{ $brevet->id }}, 'ItemBrevetC')">
                            Daftar Sekarang
                        </button>
                    </div>
                        <div class="card-footer">
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20program%20{{ urlencode($brevet->judul) }}" class="btn-outline-kk">
                                Konsultasi Program
                            </a>
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

    <!-- Testimonials -->
    <div class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kisah Sukses Alumni Brevet C</h2>
                <p class="section-subtitle">Testimoni dari konsultan pajak dan tax manager yang telah mencapai puncak karir</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Brevet C membuka pintu karir saya sebagai konsultan pajak. Dalam 2 tahun, praktik saya sudah melayani 25 klien korporasi. Materi transfer pricing sangat aplikatif!"</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="author-info">
                            <h5>Andi Wijaya, BKP</h5>
                            <span>Managing Partner - Andi Tax Consulting</span>
                            <div class="author-badge">Lulusan 2021</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Sebagai Tax Director di perusahaan multinasional, Brevet C memberikan perspektif strategis dalam mengelola risiko pajak dan planning untuk grup perusahaan kami."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="author-info">
                            <h5>Sarah Lim</h5>
                            <span>Tax Director - Global Manufacturing Co.</span>
                            <div class="author-badge">Lulusan 2020</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Dari staff pajak menjadi konsultan independen dalam 3 tahun. Brevet C memberikan confidence dan kompetensi untuk mengambil klien kompleks."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="author-info">
                            <h5>Budi Pratama, S.E., Ak.</h5>
                            <span>Independent Tax Consultant</span>
                            <div class="author-badge">Lulusan 2022</div>
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
    --gray-800: #1e293b;
    --gray-600: #475569;
    --gray-400: #94a3b8;
    --success: #10b981;
    --error: #ef4444;
    --warning: #f59e0b;
}

.brevet-c-service {
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
    background: linear-gradient(135deg, #fde68a, #fcd34d);
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
    color: #fde68a;
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
    border: 2px solid var(--accent-gold);
}

.certificate-window:hover {
    transform: rotateY(0) rotateX(0);
}

.certificate-header {
    background: linear-gradient(135deg, var(--primary-navy), var(--secondary-navy));
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid var(--light-navy);
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
    color: var(--accent-gold);
    margin-bottom: 0.5rem;
    display: block;
}

.certificate-badge span {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary-navy);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.certificate-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary-navy);
    margin-bottom: 0.5rem;
}

.certificate-info p {
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.certificate-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
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
    color: var(--primary-navy);
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
   FEATURES SECTION
   ========================= */
.features-section {
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

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.feature-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    border: 1px solid #f1f5f9;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-navy), var(--secondary-navy));
    color: var(--white);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
}

.feature-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.feature-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
}

/* =========================
   CURRICULUM SECTION
   ========================= */
.curriculum-section {
    padding: 100px 0;
    background: var(--white);
}

.curriculum-tabs {
    max-width: 1000px;
    margin: 0 auto;
}

.tab-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    justify-content: center;
}

.tab-button {
    padding: 1rem 2rem;
    background: var(--gray-50);
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    font-weight: 600;
    color: var(--gray-600);
    cursor: pointer;
    transition: all 0.3s ease;
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
    padding: 3rem;
}

.tab-pane {
    display: none;
}

.tab-pane.active {
    display: block;
}

.pane-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: start;
}

.pane-text h4 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.pane-text p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
}

.pane-text ul {
    list-style: none;
    padding: 0;
}

.pane-text li {
    padding: 0.5rem 0;
    color: var(--gray-600);
    position: relative;
    padding-left: 1.5rem;
}

.pane-text li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: var(--primary-navy);
    font-weight: 600;
}

/* Curriculum Preview */
.curriculum-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

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
    width: 50px;
    height: 50px;
    background: var(--light-navy);
    color: var(--primary-navy);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.curriculum-item div {
    flex: 1;
}

.curriculum-item strong {
    display: block;
    color: var(--gray-800);
    margin-bottom: 0.25rem;
}

.curriculum-item span {
    color: var(--gray-600);
    font-size: 0.9rem;
}

/* Consulting Preview */
.consulting-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.consulting-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid var(--gray-200);
}

.consulting-item:last-child {
    border-bottom: none;
}

.consulting-item i {
    color: var(--primary-navy);
    font-size: 1.5rem;
    margin-right: 1rem;
}

.consulting-item span:first-of-type {
    flex: 1;
    color: var(--gray-700);
    font-weight: 500;
}

.level {
    background: var(--accent-gold);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
}

/* Case Preview */
.case-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.case-item {
    padding: 1.5rem;
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
}

.case-header strong {
    color: var(--gray-800);
    font-size: 1rem;
}

.case-header span {
    background: var(--light-navy);
    color: var(--primary-navy);
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
}

.case-item p {
    color: var(--gray-600);
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
}

/* Professional Preview */
.professional-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

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
}

.skill-info span:first-child {
    color: var(--gray-700);
    font-weight: 500;
}

.skill-info span:last-child {
    color: var(--primary-navy);
    font-weight: 600;
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
    padding: 100px 0;
    background: var(--gray-50);
}

.audience-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.audience-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    border: 1px solid #f1f5f9;
}

.audience-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.audience-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--light-navy), #dbeafe);
    color: var(--primary-navy);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
}

.audience-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.audience-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
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
    font-size: 0.9rem;
}

.audience-card li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--success);
    font-weight: 600;
}

/* =========================
   PRICING SECTION - BREVET C
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

.training-card.featured {
    border: 2px solid var(--primary-navy);
    transform: scale(1.05);
}

.training-card.featured:hover {
    transform: scale(1.05) translateY(-10px);
}

.card-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
    color: var(--white);
    padding: 8px 40px;
    transform: rotate(45deg);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
}

/* Card header */
.card-header {
    padding: 30px;
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
    background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
    color: var(--white);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
}

.btn-outline-kk {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: transparent;
    color: var(--primary-navy);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--primary-navy);
    font-size: 0.95rem;
}

.btn-outline-kk:hover {
    background-color: var(--primary-navy);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.2);
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
    color: var(--primary-navy);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--light-navy) 0%, #dbeafe 100%);
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
    background: linear-gradient(135deg, var(--light-navy), #dbeafe);
    color: var(--primary-navy);
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
    color: var(--primary-navy);
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
    background: var(--light-navy);
    color: var(--primary-navy);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* =========================
   CERTIFICATION SECTION
   ========================= */
.certification-section {
    padding: 100px 0;
    background: var(--gray-50);
}

.certification-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.certification-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    border: 1px solid #f1f5f9;
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
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: 700;
}

.certification-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
    margin-top: 1rem;
}

.certification-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
}

/* =========================
   TESTIMONIALS SECTION
   ========================= */
.testimonials-section {
    padding: 100px 0;
    background: var(--white);
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
    border: 1px solid #f1f5f9;
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
    background: var(--primary-navy);
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
    background: var(--light-navy);
    color: var(--primary-navy);
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
    background: var(--gray-50);
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
    color: var(--primary-navy);
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
    background: linear-gradient(135deg, var(--dark-navy) 0%, var(--primary-navy) 100%);
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

    .pane-content {
        grid-template-columns: 1fr;
        gap: 2rem;
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

    .features-grid {
        grid-template-columns: 1fr;
    }

    .tab-buttons {
        flex-direction: column;
        align-items: center;
    }

    .tab-button {
        width: 100%;
        max-width: 300px;
    }

    .audience-grid {
        grid-template-columns: 1fr;
    }

    .pricing-grid {
        grid-template-columns: 1fr;
    }

    .instructors-grid {
        grid-template-columns: 1fr;
    }

    .certification-grid {
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

    .tab-content {
        padding: 2rem 1.5rem;
    }

    .certificate-window {
        transform: none;
    }

    .certificate-details {
        grid-template-columns: 1fr;
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