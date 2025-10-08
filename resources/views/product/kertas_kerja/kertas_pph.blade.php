@extends('layouts.master')

@section('title', 'Kertas Kerja PPh 21')

@section('content')
<section class="pph21-service">
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
                        <span class="title-line">Kertas Kerja</span>
                        <span class="title-line highlight">PPh 21</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi lengkap perhitungan dan pelaporan PPh 21 untuk <span class="text-highlight">karyawan tetap</span>, 
                        <span class="text-highlight">tidak tetap</span>, dan <span class="text-highlight">peserta program pensiun</span>
                    </p>
                    <p class="hero-description">
                        Optimalkan pemotongan PPh 21 dengan template excel terstruktur yang sudah sesuai 
                        dengan UU HPP dan PER Dirjen Pajak terbaru.
                    </p>
                    <div class="hero-actions">
                        <a href="#features" class="btn btn-primary">
                            <span>Lihat Fitur</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="#pricing" class="btn btn-outline-light">
                            <span>Pilih Paket</span>
                            <i class="fas fa-box"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="excel-preview">
                        <div class="excel-window">
                            <div class="excel-header">
                                <div class="excel-controls">
                                    <span class="control red"></span>
                                    <span class="control yellow"></span>
                                    <span class="control green"></span>
                                </div>
                                <div class="excel-filename">Kertas Kerja PPh 21.xlsx</div>
                            </div>
                            <div class="excel-sheet">
                                <div class="sheet-tabs">
                                    <div class="tab active">Perhitungan</div>
                                    <div class="tab">Bukti Potong</div>
                                    <div class="tab">Rekap</div>
                                </div>
                                <div class="sheet-content">
                                    <div class="excel-grid">
                                        <div class="grid-header">
                                            <div class="cell">A</div>
                                            <div class="cell">B</div>
                                            <div class="cell">C</div>
                                            <div class="cell">D</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">1</div>
                                            <div class="cell formula">=SUM(B2:B5)</div>
                                            <div class="cell value">Penghasilan Bruto</div>
                                            <div class="cell number">15.000.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">2</div>
                                            <div class="cell formula">=B1*0.05</div>
                                            <div class="cell value">Biaya Jabatan</div>
                                            <div class="cell number">750.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">3</div>
                                            <div class="cell formula">=B1-B2</div>
                                            <div class="cell value">Penghasilan Neto</div>
                                            <div class="cell number">14.250.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">4</div>
                                            <div class="cell formula">=VLOOKUP(B3,...)</div>
                                            <div class="cell value">PPh 21 Terutang</div>
                                            <div class="cell number highlight">675.000</div>
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
                    <span class="stat-number">8.500+</span>
                    <span class="stat-label">Perusahaan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99.9%</span>
                    <span class="stat-label">Akurasi Hitung</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">70%</span>
                    <span class="stat-label">Penghematan Waktu</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">PPh Support</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Fitur Unggulan Kertas Kerja PPh 21</h2>
                <p class="section-subtitle">Dirancang khusus untuk memudahkan perhitungan dan pelaporan PPh 21 dengan akurasi maksimal</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4>Auto Calculation PPh 21</h4>
                    <p>Perhitungan otomatis PPh 21 dengan tarif progresif UU HPP, PTKP, dan biaya jabatan</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <h4>Bukti Potong A1 & A2</h4>
                    <p>Generate otomatis bukti potong A1 untuk karyawan tetap dan A2 untuk tidak tetap</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h4>Rekonsiliasi Otomatis</h4>
                    <p>Rekonsiliasi otomatis antara data gaji dengan perhitungan PPh 21</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <h4>Compliance Ready</h4>
                    <p>Sudah disesuaikan dengan UU HPP dan PER Dirjen Pajak terbaru</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Multi Karyawan</h4>
                    <p>Mendukung perhitungan untuk karyawan tetap, tidak tetap, dan peserta pensiun</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Easy to Use</h4>
                    <p>User interface yang intuitif dengan panduan langkah demi langkah</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Worksheet Structure -->
    <div class="structure-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Struktur Kertas Kerja PPh 21</h2>
                <p class="section-subtitle">Organisasi worksheet yang terstruktur untuk efisiensi maksimal</p>
            </div>
            <div class="structure-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="perhitungan">Perhitungan</button>
                    <button class="tab-button" data-tab="bukti-potong">Bukti Potong</button>
                    <button class="tab-button" data-tab="rekap">Rekap</button>
                    <button class="tab-button" data-tab="supporting">Dokumen Pendukung</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="perhitungan">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Worksheet Perhitungan PPh 21</h4>
                                <p>Worksheet utama untuk perhitungan PPh 21 bulanan dan tahunan</p>
                                <ul>
                                    <li>Data Master Karyawan</li>
                                    <li>Perhitungan Bulanan</li>
                                    <li>Kumulatif Penghasilan</li>
                                    <li>PTKP & Biaya Jabatan</li>
                                    <li>Tarif Progresif UU HPP</li>
                                    <li>PPh 21 Terutang</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="form-preview">
                                    <div class="form-header">PERHITUNGAN PPh 21</div>
                                    <div class="form-field">
                                        <label>Penghasilan Bruto</label>
                                        <div class="field-value">15.000.000</div>
                                    </div>
                                    <div class="form-field">
                                        <label>Biaya Jabatan</label>
                                        <div class="field-value">750.000</div>
                                    </div>
                                    <div class="form-field">
                                        <label>Penghasilan Neto</label>
                                        <div class="field-value">14.250.000</div>
                                    </div>
                                    <div class="form-field highlight">
                                        <label>PPh 21 Terutang</label>
                                        <div class="field-value">675.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="bukti-potong">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Worksheet Bukti Potong</h4>
                                <p>Worksheet untuk generate bukti potong A1 dan A2</p>
                                <ul>
                                    <li>Formulir 1721-A1</li>
                                    <li>Formulir 1721-A2</li>
                                    <li>Data Penerima Penghasilan</li>
                                    <li>Rincian Penghasilan</li>
                                    <li>PPh Dipotong</li>
                                    <li>Validasi NPWP</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="bukti-preview">
                                    <div class="bukti-item">
                                        <i class="fas fa-file-certificate"></i>
                                        <div>
                                            <strong>1721-A1</strong>
                                            <span>Karyawan Tetap</span>
                                        </div>
                                        <span class="count">45 karyawan</span>
                                    </div>
                                    <div class="bukti-item">
                                        <i class="fas fa-file-signature"></i>
                                        <div>
                                            <strong>1721-A2</strong>
                                            <span>Karyawan Tidak Tetap</span>
                                        </div>
                                        <span class="count">12 karyawan</span>
                                    </div>
                                    <div class="bukti-item">
                                        <i class="fas fa-check-circle"></i>
                                        <div>
                                            <strong>Status</strong>
                                            <span>Siap Cetak</span>
                                        </div>
                                        <span class="count">57 dokumen</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="rekap">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Worksheet Rekapitulasi</h4>
                                <p>Worksheet untuk rekapitulasi dan SPT Masa PPh 21</p>
                                <ul>
                                    <li>Rekap Per Karyawan</li>
                                    <li>Rekap Per Bulan</li>
                                    <li>SPT Masa PPh 21</li>
                                    <li>Laporan Ke DJP</li>
                                    <li>Arsip Digital</li>
                                    <li>Audit Trail</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="rekap-preview">
                                    <div class="rekap-header">
                                        <span>Bulan</span>
                                        <span>Jumlah Karyawan</span>
                                        <span>Total PPh 21</span>
                                    </div>
                                    <div class="rekap-row">
                                        <span>Jan</span>
                                        <span>57</span>
                                        <span>8.250.000</span>
                                    </div>
                                    <div class="rekap-row">
                                        <span>Feb</span>
                                        <span>57</span>
                                        <span>8.450.000</span>
                                    </div>
                                    <div class="rekap-row">
                                        <span>Mar</span>
                                        <span>58</span>
                                        <span>8.750.000</span>
                                    </div>
                                    <div class="rekap-total">
                                        <span>Q1 Total</span>
                                        <span>58</span>
                                        <span>25.450.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="supporting">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Dokumen Pendukung</h4>
                                <p>Worksheet untuk dokumentasi pendukung dan arsip digital</p>
                                <ul>
                                    <li>Data Master Karyawan</li>
                                    <li>Slip Gaji Digital</li>
                                    <li>Arsip Bukti Potong</li>
                                    <li>Laporan Per Departemen</li>
                                    <li>Backup Data</li>
                                    <li>Compliance Checklist</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="supporting-preview">
                                    <div class="doc-item">
                                        <i class="fas fa-user-tie"></i>
                                        <span>Data Karyawan</span>
                                        <span class="count">58 records</span>
                                    </div>
                                    <div class="doc-item">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        <span>Slip Gaji</span>
                                        <span class="count">696 dokumen</span>
                                    </div>
                                    <div class="doc-item">
                                        <i class="fas fa-archive"></i>
                                        <span>Arsip Bukti Potong</span>
                                        <span class="count">57 dokumen</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div id="pricing" class="pricing-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Paket Layanan Kertas Kerja PPh 21</h2>
                <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan perusahaan Anda</p>
            </div>
            
            <div class="pricing-grid">
                <!-- Paket Startup -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Startup</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 550.000</span>
                        </div>
                        <div class="package-info">≤ 10 Karyawan</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja PPh 21 Bulanan</li>
                            <li><i class="fas fa-check"></i> Perhitungan PPh 21 karyawan tetap</li>
                            <li><i class="fas fa-check"></i> Bukti potong A1 dan A2</li>
                            <li><i class="fas fa-check"></i> SPT Masa PPh 21</li>
                            <li><i class="fas fa-check"></i> Karyawan tidak tetap</li>
                            <li><i class="fas fa-check"></i> Final DTP dan insentif</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Admin</a>
                    </div>
                </div>

                <!-- Paket Professional -->
                <div class="service-card featured">
                    <div class="card-badge">Best Seller</div>
                    <div class="card-header">
                        <h3>Paket Professional</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 950.000</span>
                        </div>
                        <div class="package-info">11 - 50 Karyawan</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja PPh 21 lengkap</li>
                            <li><i class="fas fa-check"></i> Karyawan tetap & tidak tetap</li>
                            <li><i class="fas fa-check"></i> Semua bukti potong (A1, A2, dll)</li>
                            <li><i class="fas fa-check"></i> SPT Masa dan Tahunan</li>
                            <li><i class="fas fa-check"></i> Final DTP dan insentif</li>
                            <li><i class="fas fa-check"></i> Konsultasi bulanan</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Admin</a>
                    </div>
                </div>

                <!-- Paket Enterprise -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Enterprise</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 1.800.000</span>
                        </div>
                        <div class="package-info">> 50 Karyawan</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja komprehensif</li>
                            <li><i class="fas fa-check"></i> Semua jenis penerima penghasilan</li>
                            <li><i class="fas fa-check"></i> Bukti potong lengkap</li>
                            <li><i class="fas fa-check"></i> Rekonsiliasi bulanan</li>
                            <li><i class="fas fa-check"></i> Analisis optimasi PPh 21</li>
                            <li><i class="fas fa-check"></i> Pendampingan pemeriksaan</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="/order-pph" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Admin</a>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="pricing-info">
                <div class="info-grid">
                    <div class="info-item">
                        <i class="fas fa-sync-alt"></i>
                        <h4>Update Berkala</h4>
                        <p>Selalu update dengan UU HPP dan PER Dirjen Pajak terbaru</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <h4>Garansi Kepuasan</h4>
                        <p>Uang kembali 100% jika tidak sesuai kebutuhan</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-headset"></i>
                        <h4>PPh Support 24/7</h4>
                        <p>Tim ahli PPh 21 siap membantu kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Apa Kata Pengguna?</h2>
                <p class="section-subtitle">Testimoni dari HRD dan perusahaan yang telah menggunakan kertas kerja PPh 21 kami</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Kertas kerja PPh 21 ini sangat membantu tim HR kami. Perhitungan yang rumit sekarang jadi sederhana dan akurat."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="author-info">
                            <h5>Budi Santoso</h5>
                            <span>HR Manager, Jakarta</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Auto calculation untuk karyawan tetap dan tidak tetap sangat menghemat waktu. Bukti potong otomatis sangat membantu."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="author-info">
                            <h5>Sarah Wijaya</h5>
                            <span>Payroll Staff, Bandung</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Template yang sangat profesional untuk perusahaan. Rekonsiliasi otomatis sangat membantu tim accounting kami."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="author-info">
                            <h5>Andi Pratama</h5>
                            <span>Finance Manager, Startup Tech</span>
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
                <p class="section-subtitle">Informasi lengkap seputar kertas kerja PPh 21</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah kertas kerja ini sesuai dengan UU HPP terbaru?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kertas kerja telah disesuaikan dengan UU Harmonisasi Peraturan Perpajakan (HPP) termasuk tarif progresif baru, PTKP, dan ketentuan biaya jabatan terbaru.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bagaimana sistem perhitungan untuk karyawan tidak tetap?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Sistem sudah mendukung perhitungan PPh 21 untuk karyawan tidak tetap dengan pemotongan final dan tidak final, termasuk mekanisme gross up dan perhitungan insentif DTP.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah bisa generate bukti potong A1 dan A2?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kertas kerja dapat secara otomatis generate bukti potong 1721-A1 untuk karyawan tetap dan 1721-A2 untuk karyawan tidak tetap dalam format yang sudah sesuai dengan DJP.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bisakah digunakan untuk multiple company?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Paket Startup untuk 1 perusahaan maksimal 10 karyawan. Paket Professional untuk 1 perusahaan 11-50 karyawan. Paket Enterprise dapat digunakan untuk 1 perusahaan dengan lebih dari 50 karyawan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Mengoptimalkan Perhitungan PPh 21?</h3>
                <p>Dapatkan kertas kerja PPh 21 sekarang dan rasakan kemudahan dalam pemotongan pajak karyawan</p>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-green: #059669;
    --secondary-green: #047857;
    --dark-green: #065f46;
    --light-green: #d1fae5;
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

.pph21-service {
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
    background: linear-gradient(135deg, #065f46 0%, #059669 50%, #10b981 100%);
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

.excel-preview {
    perspective: 1000px;
}

.excel-window {
    background: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    transform: rotateY(-5deg) rotateX(5deg);
    transition: transform 0.3s ease;
}

.excel-window:hover {
    transform: rotateY(0) rotateX(0);
}

.excel-header {
    background: #f3f4f6;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid #e5e7eb;
}

.excel-controls {
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

.excel-filename {
    color: var(--gray-600);
    font-size: 0.9rem;
    font-weight: 500;
}

.excel-sheet {
    background: var(--white);
}

.sheet-tabs {
    display: flex;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.tab {
    padding: 8px 16px;
    font-size: 0.8rem;
    color: var(--gray-600);
    border-right: 1px solid #e5e7eb;
    cursor: pointer;
}

.tab.active {
    background: var(--white);
    color: var(--primary-green);
    font-weight: 600;
}

.sheet-content {
    padding: 20px;
}

.excel-grid {
    display: grid;
    grid-template-columns: 60px 1fr 1fr 1fr;
    gap: 1px;
    background: #e5e7eb;
    border: 1px solid #e5e7eb;
}

.cell {
    background: var(--white);
    padding: 8px 12px;
    font-size: 0.8rem;
    min-height: 35px;
    display: flex;
    align-items: center;
}

.grid-header .cell {
    background: #f8fafc;
    font-weight: 600;
    color: var(--gray-600);
    justify-content: center;
}

.grid-row .cell.header {
    background: #f8fafc;
    font-weight: 600;
    color: var(--gray-600);
    justify-content: center;
}

.cell.formula {
    color: #059669;
    font-family: 'Courier New', monospace;
    background: #f0fdf4;
}

.cell.value {
    color: var(--gray-700);
}

.cell.number {
    color: var(--gray-800);
    font-weight: 600;
    justify-content: flex-end;
}

.cell.highlight {
    background: var(--light-green);
    color: var(--primary-green);
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
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
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
}

/* =========================
   PRICING SECTION - PPh 21
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

.service-card {
    background-color: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid #e2e8f0;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.service-card.featured {
    border: 2px solid var(--primary-green);
    transform: scale(1.05);
}

.service-card.featured:hover {
    transform: scale(1.05) translateY(-10px);
}

.card-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
    color: var(--white);
    padding: 8px 40px;
    transform: rotate(45deg);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
}

/* Card header */
.card-header {
    padding: 30px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
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
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
    color: var(--white);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
}

.btn-outline-kk {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: transparent;
    color: var(--primary-green);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--primary-green);
    font-size: 0.95rem;
}

.btn-outline-kk:hover {
    background-color: var(--primary-green);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(5, 150, 105, 0.2);
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
    color: var(--primary-green);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--light-green) 0%, #d1fae5 100%);
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
   STRUCTURE SECTION
   ========================= */
.structure-section {
    padding: 100px 0;
    background: var(--white);
}

.structure-tabs {
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
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.tab-button.active {
    background: var(--primary-green);
    border-color: var(--primary-green);
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
    align-items: center;
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
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--success);
    font-weight: 600;
}

/* Form Preview Styles */
.form-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.form-header {
    text-align: center;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: var(--primary-green);
}

.form-field {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid var(--gray-200);
}

.form-field label {
    flex: 1;
    color: var(--gray-600);
}

.field-value {
    font-weight: 600;
    color: var(--gray-800);
}

.form-field.highlight {
    background: var(--light-green);
    margin: 0 -2rem;
    padding: 1rem 2rem;
    border-bottom: none;
}

.form-field.highlight .field-value {
    color: var(--primary-green);
    font-size: 1.1rem;
}

/* Bukti Potong Preview */
.bukti-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.bukti-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--gray-200);
}

.bukti-item:last-child {
    border-bottom: none;
}

.bukti-item i {
    width: 50px;
    height: 50px;
    background: var(--light-green);
    color: var(--primary-green);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.bukti-item div {
    flex: 1;
}

.bukti-item strong {
    display: block;
    color: var(--gray-800);
    margin-bottom: 0.25rem;
}

.bukti-item span:first-of-type {
    color: var(--gray-600);
    font-size: 0.9rem;
}

.count {
    background: var(--primary-green);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

/* Rekap Preview */
.rekap-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.rekap-header, .rekap-row, .rekap-total {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
    padding: 0.5rem 0;
}

.rekap-header {
    font-weight: 600;
    color: var(--gray-600);
    border-bottom: 2px solid var(--gray-300);
}

.rekap-row {
    border-bottom: 1px solid var(--gray-200);
}

.rekap-row:last-child {
    border-bottom: none;
}

.rekap-total {
    font-weight: 700;
    border-top: 2px solid var(--primary-green);
    border-bottom: none;
    margin-top: 0.5rem;
    padding-top: 1rem;
    color: var(--primary-green);
}

/* Supporting Docs Preview */
.supporting-preview {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.doc-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--gray-200);
}

.doc-item:last-child {
    border-bottom: none;
}

.doc-item i {
    width: 40px;
    height: 40px;
    background: var(--light-green);
    color: var(--primary-green);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.doc-item span:first-of-type {
    flex: 1;
    color: var(--gray-700);
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
    background: var(--primary-green);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
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
}

.faq-question i {
    color: var(--primary-green);
    transition: transform 0.3s ease;
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
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
}

.btn-outline-light {
    color: var(--white);
    background: transparent;
    border: 2px solid var(--white);
}

.btn-outline-light:hover {
    color: var(--primary-green);
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
    background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 100%);
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

    .service-card.featured {
        transform: none;
    }

    .service-card.featured:hover {
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

    .pricing-grid {
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

    .excel-window {
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

<script>
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