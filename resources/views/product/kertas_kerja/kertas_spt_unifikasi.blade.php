@extends('layouts.master')

@section('title', 'Kertas Kerja SPT Masa Unifikasi')

@section('content')
<section class="spt-unification-service">
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
                        <span class="title-line highlight">SPT Masa Unifikasi</span>
                    </h1>
                    <p class="hero-subtitle">
                        Template profesional untuk penyusunan SPT Masa PPN dengan sistem <span class="text-highlight">terintegrasi</span>, 
                        <span class="text-highlight">akurat</span>, dan <span class="text-highlight">sesuai PER-03/PJ/2022</span>
                    </p>
                    <p class="hero-description">
                        Optimalkan proses pelaporan PPN Anda dengan kertas kerja excel yang telah terstruktur, 
                        mengurangi risiko kesalahan, dan memastikan kepatuhan regulasi terbaru.
                    </p>
                    <div class="hero-actions">
                        <a href="#features" class="btn btn-primary">
                            <span>Lihat Fitur</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="#pricing" class="btn btn-outline-light">
                            <span>Beli Sekarang</span>
                            <i class="fas fa-shopping-cart"></i>
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
                                <div class="excel-filename">Kertas Kerja SPT Masa Unifikasi.xlsx</div>
                            </div>
                            <div class="excel-sheet">
                                <div class="sheet-tabs">
                                    <div class="tab active">Formulir 1111</div>
                                    <div class="tab">Rekonsiliasi</div>
                                    <div class="tab">Working Paper</div>
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
                                            <div class="cell formula">=SUM(B2:B10)</div>
                                            <div class="cell value">PPN Keluaran</div>
                                            <div class="cell number">15.000.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">2</div>
                                            <div class="cell formula">=SUM(C2:C10)</div>
                                            <div class="cell value">PPN Masukan</div>
                                            <div class="cell number">12.500.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">3</div>
                                            <div class="cell formula">=B1-C1</div>
                                            <div class="cell value">Kurang/Lebih Bayar</div>
                                            <div class="cell number highlight">2.500.000</div>
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
                    <span class="stat-number">5000+</span>
                    <span class="stat-label">Pengguna Aktif</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99.8%</span>
                    <span class="stat-label">Akurasi Laporan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">70%</span>
                    <span class="stat-label">Penghematan Waktu</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Fitur Unggulan Kertas Kerja</h2>
                <p class="section-subtitle">Dirancang khusus untuk memudahkan penyusunan SPT Masa PPN Unifikasi</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4>Auto Calculation</h4>
                    <p>Perhitungan otomatis PPN Keluaran, Masukan, dan kurang/lebih bayar dengan formula Excel yang sudah terintegrasi</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h4>Auto Reconciliation</h4>
                    <p>Rekonsiliasi otomatis antara buku pembukuan dengan faktur pajak dan dokumen pendukung</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-excel"></i>
                    </div>
                    <h4>Excel Based</h4>
                    <p>Berbasis Microsoft Excel yang familiar, mudah digunakan, dan kompatibel dengan berbagai versi Office</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <h4>Compliance Ready</h4>
                    <p>Sudah disesuaikan dengan PER-03/PJ/2022 dan update regulasi terbaru Direktorat Jenderal Pajak</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Audit Trail</h4>
                    <p>Fitur tracking perubahan data dan history calculation untuk keperluan audit internal</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Easy to Use</h4>
                    <p>User interface yang intuitif dengan panduan langkah demi langkah dalam Bahasa Indonesia</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Worksheet Structure -->
    <div class="structure-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Struktur Kertas Kerja</h2>
                <p class="section-subtitle">Organisasi worksheet yang terstruktur untuk efisiensi maksimal</p>
            </div>
            <div class="structure-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="formulir">Formulir 1111</button>
                    <button class="tab-button" data-tab="rekonsiliasi">Rekonsiliasi</button>
                    <button class="tab-button" data-tab="working-paper">Working Paper</button>
                    <button class="tab-button" data-tab="supporting">Supporting Docs</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="formulir">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Formulir SPT Masa PPN 1111</h4>
                                <p>Worksheet utama yang berisi formulir 1111 lengkap dengan semua lampiran yang diperlukan</p>
                                <ul>
                                    <li>Induk SPT Masa PPN</li>
                                    <li>Lampiran I - PKP Pedagang Eceran</li>
                                    <li>Lampiran II - Ekspor BKP Berwujud</li>
                                    <li>Lampiran III - Perhitungan PPN</li>
                                    <li>Lampiran IV - Faktur Pajak</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="form-preview">
                                    <div class="form-header">FORMULIR 1111</div>
                                    <div class="form-field">
                                        <label>Masa Pajak</label>
                                        <div class="field-value">Januari 2024</div>
                                    </div>
                                    <div class="form-field">
                                        <label>PPN Keluaran</label>
                                        <div class="field-value">15.000.000</div>
                                    </div>
                                    <div class="form-field">
                                        <label>PPN Masukan</label>
                                        <div class="field-value">12.500.000</div>
                                    </div>
                                    <div class="form-field highlight">
                                        <label>PPN Kurang/Lebih Bayar</label>
                                        <div class="field-value">2.500.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="rekonsiliasi">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Rekonsiliasi Fiskal</h4>
                                <p>Worksheet untuk rekonsiliasi antara laporan komersial dengan fiskal</p>
                                <ul>
                                    <li>Rekonsiliasi Pendapatan</li>
                                    <li>Rekonsiliasi Beban</li>
                                    <li>Koreksi Fiskal</li>
                                    <li>Penyesuaian PPN</li>
                                    <li>Analisis Selisih</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="reconciliation-preview">
                                    <div class="recon-item">
                                        <span>Laba Komersial</span>
                                        <span>25.000.000</span>
                                    </div>
                                    <div class="recon-item">
                                        <span>Koreksi Fiskal (+)</span>
                                        <span>5.000.000</span>
                                    </div>
                                    <div class="recon-item">
                                        <span>Koreksi Fiskal (-)</span>
                                        <span class="negative">-2.000.000</span>
                                    </div>
                                    <div class="recon-item total">
                                        <span>Laba Fiskal</span>
                                        <span>28.000.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="working-paper">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Working Paper Detail</h4>
                                <p>Worksheet untuk pencatatan transaksi detail dan analisis mendalam</p>
                                <ul>
                                    <li>Detail Transaksi Harian</li>
                                    <li>Analisis Faktur Pajak</li>
                                    <li>Penggolongan Transaksi</li>
                                    <li>Backup Documentation</li>
                                    <li>Audit Working Paper</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="working-paper-preview">
                                    <div class="wp-header">
                                        <span>Tanggal</span>
                                        <span>Keterangan</span>
                                        <span>Nominal</span>
                                    </div>
                                    <div class="wp-row">
                                        <span>02/01/2024</span>
                                        <span>Penjualan Tunai</span>
                                        <span>5.000.000</span>
                                    </div>
                                    <div class="wp-row">
                                        <span>05/01/2024</span>
                                        <span>Pembelian Bahan</span>
                                        <span>3.500.000</span>
                                    </div>
                                    <div class="wp-row">
                                        <span>15/01/2024</span>
                                        <span>Pembayaran Listrik</span>
                                        <span>1.200.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="supporting">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Supporting Documentation</h4>
                                <p>Worksheet untuk dokumentasi pendukung dan arsip digital</p>
                                <ul>
                                    <li>Daftar Faktur Pajak Masukan</li>
                                    <li>Daftar Faktur Pajak Keluaran</li>
                                    <li>Dokumen Ekspor/Impor</li>
                                    <li>Arsip Digital</li>
                                    <li>Checklist Compliance</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="supporting-preview">
                                    <div class="doc-item">
                                        <i class="fas fa-file-invoice"></i>
                                        <span>Faktur Pajak Masukan</span>
                                        <span class="count">45 dokumen</span>
                                    </div>
                                    <div class="doc-item">
                                        <i class="fas fa-file-export"></i>
                                        <span>Faktur Pajak Keluaran</span>
                                        <span class="count">38 dokumen</span>
                                    </div>
                                    <div class="doc-item">
                                        <i class="fas fa-receipt"></i>
                                        <span>Dokumen Ekspor</span>
                                        <span class="count">12 dokumen</span>
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
                <h2 class="section-title">Paket Layanan Kertas Kerja SPT Masa Unifikasi</h2>
                <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan pelaporan PPN perusahaan Anda</p>
            </div>
            
            <div class="pricing-grid">
                <!-- Paket Basic -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Basic</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 350.000</span>
                        </div>
                        <div class="package-info">Untuk UMKM & Startup</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Template Excel SPT Masa Unifikasi</li>
                            <li><i class="fas fa-check"></i> Formulir 1111 Lengkap</li>
                            <li><i class="fas fa-check"></i> Auto Calculation Basic</li>
                            <li><i class="fas fa-check"></i> Panduan penggunaan</li>
                            <li><i class="fas fa-times"></i> Rekonsiliasi Otomatis</li>
                            <li><i class="fas fa-times"></i> Priority Support</li>
                            <li><i class="fas fa-times"></i> Update Regulasi</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Kami</a>
                    </div>
                </div>

                <!-- Paket Professional -->
                <div class="service-card featured">
                    <div class="card-badge">Best Seller</div>
                    <div class="card-header">
                        <h3>Paket Professional</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 650.000</span>
                        </div>
                        <div class="package-info">Untuk Perusahaan Menengah</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Semua Fitur Basic</li>
                            <li><i class="fas fa-check"></i> Rekonsiliasi Otomatis</li>
                            <li><i class="fas fa-check"></i> Working Paper Template</li>
                            <li><i class="fas fa-check"></i> Priority Email Support</li>
                            <li><i class="fas fa-check"></i> Update 1 Tahun</li>
                            <li><i class="fas fa-check"></i> Backup Documentation</li>
                            <li><i class="fas fa-times"></i> Customization Service</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Kami</a>
                    </div>
                </div>

                <!-- Paket Enterprise -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Enterprise</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 1.200.000</span>
                        </div>
                        <div class="package-info">Untuk Perusahaan Besar</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Semua Fitur Professional</li>
                            <li><i class="fas fa-check"></i> Customization Service</li>
                            <li><i class="fas fa-check"></i> Dedicated Support</li>
                            <li><i class="fas fa-check"></i> Lifetime Updates</li>
                            <li><i class="fas fa-check"></i> Training Session</li>
                            <li><i class="fas fa-check"></i> Multiple User License</li>
                            <li><i class="fas fa-check"></i> Audit Trail Feature</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="/order-spt-unifikasi" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Kami</a>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="pricing-info">
                <div class="info-grid">
                    <div class="info-item">
                        <i class="fas fa-sync-alt"></i>
                        <h4>Update Berkala</h4>
                        <p>Selalu update dengan regulasi terbaru PER-03/PJ/2022</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <h4>Garansi Kepuasan</h4>
                        <p>Uang kembali 100% jika tidak sesuai kebutuhan</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-headset"></i>
                        <h4>Support 24/7</h4>
                        <p>Tim support siap membantu kapan saja</p>
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
                <p class="section-subtitle">Testimoni dari konsultan pajak dan perusahaan yang telah menggunakan kertas kerja kami</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Kertas kerja ini sangat membantu tim kami dalam menyusun SPT Masa PPN. Proses yang biasanya memakan waktu 3 hari sekarang bisa selesai dalam 1 hari saja."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="author-info">
                            <h5>Budi Santoso</h5>
                            <span>Konsultan Pajak, Jakarta</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Auto calculation dan rekonsiliasi otomatis sangat menghemat waktu. Error dalam perhitungan berkurang drastis sejak menggunakan template ini."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="author-info">
                            <h5>Sarah Wijaya</h5>
                            <span>Accountant, PT Maju Jaya</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Template yang sangat user-friendly bahkan untuk yang belum berpengalaman. Panduan langkah demi langkah sangat membantu tim baru."</p>
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
                <p class="section-subtitle">Informasi lengkap seputar kertas kerja SPT Masa Unifikasi</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah kertas kerja ini sesuai dengan regulasi terbaru?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kertas kerja telah disesuaikan dengan PER-03/PJ/2022 tentang Pedoman Teknis Tata Cara Pemungutan, Penyetoran, dan Pelaporan Pajak Pertambahan Nilai. Kami juga memberikan update gratis untuk paket Professional dan Enterprise ketika ada perubahan regulasi.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Berapa lama proses pengiriman setelah pembelian?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>File akan dikirimkan secara instan melalui email dalam waktu maksimal 15 menit setelah pembayaran dikonfirmasi. Untuk pembayaran transfer bank, proses mungkin memakan waktu 1-2 jam tergantung bank.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah ada panduan penggunaan?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, setiap kertas kerja dilengkapi dengan panduan penggunaan lengkap dalam Bahasa Indonesia yang berisi langkah-langkah detail dari input data hingga generate laporan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bisakah kertas kerja digunakan untuk multiple company?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Paket Basic dan Professional untuk 1 perusahaan/license. Paket Enterprise dapat digunakan untuk maksimal 5 perusahaan dalam 1 grup usaha.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Mengoptimalkan Pelaporan PPN Anda?</h3>
                <p>Dapatkan kertas kerja SPT Masa Unifikasi sekarang dan rasakan kemudahan dalam penyusunan laporan pajak</p>
            </div>
        </div>
    </div>
</section>
<style>
    :root {
        --primary-indigo: #4f46e5;
        --secondary-indigo: #4338ca;
        --dark-indigo: #3730a3;
        --light-indigo: #e0e7ff;
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

    .spt-unification-service {
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
        background: linear-gradient(135deg, #3730a3 0%, #4f46e5 50%, #6366f1 100%);
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
        color: var(--primary-indigo);
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
        background: var(--light-indigo);
        color: var(--primary-indigo);
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
        background: linear-gradient(135deg, var(--primary-indigo), var(--secondary-indigo));
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
        border-color: var(--primary-indigo);
        color: var(--primary-indigo);
    }

    .tab-button.active {
        background: var(--primary-indigo);
        border-color: var(--primary-indigo);
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
        color: var(--primary-indigo);
    }

    .form-field {
        display: flex;
        justify-content: between;
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
        background: var(--light-indigo);
        margin: 0 -2rem;
        padding: 1rem 2rem;
        border-bottom: none;
    }

    .form-field.highlight .field-value {
        color: var(--primary-indigo);
        font-size: 1.1rem;
    }

    .reconciliation-preview {
        background: var(--white);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .recon-item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid var(--gray-200);
    }

    .recon-item.total {
        font-weight: 700;
        border-top: 2px solid var(--primary-indigo);
        border-bottom: none;
        margin-top: 0.5rem;
        padding-top: 1rem;
    }

    .negative {
        color: var(--error);
    }

    .working-paper-preview {
        background: var(--white);
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .wp-header, .wp-row {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        gap: 1rem;
        padding: 0.5rem 0;
    }

    .wp-header {
        font-weight: 600;
        color: var(--gray-600);
        border-bottom: 2px solid var(--gray-300);
    }

    .wp-row {
        border-bottom: 1px solid var(--gray-200);
    }

    .wp-row:last-child {
        border-bottom: none;
    }

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
        background: var(--light-indigo);
        color: var(--primary-indigo);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .doc-item span:first-of-type {
        flex: 1;
        color: var(--gray-700);
    }

    .count {
        background: var(--primary-indigo);
        color: var(--white);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* =========================
   PRICING SECTION 
   ========================= */
.pricing-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-800);
    background: linear-gradient(135deg, var(--primary-indigo) 0%, var(--secondary-indigo) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-subtitle {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    color: var(--gray-600);
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
    border: 2px solid var(--primary-indigo);
    transform: scale(1.05);
}

.service-card.featured:hover {
    transform: scale(1.05) translateY(-10px);
}

.card-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(135deg, var(--primary-indigo) 0%, var(--secondary-indigo) 100%);
    color: var(--white);
    padding: 8px 40px;
    transform: rotate(45deg);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
}

/* Card header */
.card-header {
    padding: 30px;
    background: linear-gradient(135deg, var(--primary-indigo) 0%, var(--secondary-indigo) 100%);
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
    background: linear-gradient(135deg, var(--primary-indigo) 0%, var(--secondary-indigo) 100%);
    color: var(--white);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
}

.btn-outline-kk {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: transparent;
    color: var(--primary-indigo);
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--primary-indigo);
    font-size: 0.95rem;
}

.btn-outline-kk:hover {
    background-color: var(--primary-indigo);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.2);
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
    color: var(--primary-indigo);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--light-indigo) 0%, #e0e7ff 100%);
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

/* Responsive adjustments */
@media (max-width: 1024px) {
    .service-card.featured {
        transform: none;
    }
    
    .service-card.featured:hover {
        transform: translateY(-10px);
    }
    
    .pricing-grid {
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    }
}

@media (max-width: 768px) {
    .pricing-grid {
        grid-template-columns: 1fr;
        max-width: 400px;
    }
    
    .service-card {
        margin: 0 auto;
        max-width: 400px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .card-header,
    .card-body,
    .card-footer {
        padding-left: 25px;
        padding-right: 25px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .pricing-grid {
        grid-template-columns: 1fr;
    }
    
    .card-header h3 {
        font-size: 1.3rem;
    }
    
    .amount {
        font-size: 1.8rem;
    }
    
    .card-header,
    .card-body,
    .card-footer {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .feature-list li {
        font-size: 0.9rem;
    }
    
    .card-badge {
        right: -30px;
        padding: 6px 30px;
        font-size: 0.7rem;
    }
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
        background: var(--gray-50);
        border-radius: 16px;
        padding: 2rem;
        transition: transform 0.3s ease;
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
        background: var(--primary-indigo);
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
        color: var(--primary-indigo);
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
        background: linear-gradient(135deg, var(--primary-indigo) 0%, var(--secondary-indigo) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-indigo);
        border-color: var(--primary-indigo);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-indigo);
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
        background: linear-gradient(135deg, var(--dark-indigo) 0%, var(--primary-indigo) 100%);
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

        .pricing-card.featured {
            transform: none;
        }

        .pricing-card.featured:hover {
            transform: translateY(-5px);
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