@extends('layouts.master')

@section('title', 'Kertas Kerja SPT Tahunan')
<link rel="stylesheet" href="{{ asset('assets/customer/css/spt_tahunan.css') }}">
@section('content')
<section class="spt-yearly-service">
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
                        <span class="title-line highlight">SPT Tahunan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi lengkap penyusunan SPT Tahunan untuk <span class="text-highlight">Orang Pribadi</span> dan 
                        <span class="text-highlight">Badan Usaha</span> dengan sistem terintegrasi
                    </p>
                    <p class="hero-description">
                        Optimalkan pelaporan pajak tahunan Anda dengan template profesional yang telah disesuaikan 
                        dengan regulasi terbaru, mengurangi risiko kesalahan, dan memastikan kepatuhan pajak.
                    </p>
                    <div class="hero-actions">
                        <a href="#features" class="btn btn-outline-light">
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
                                <div class="excel-filename">Kertas Kerja SPT Tahunan.xlsx</div>
                            </div>
                            <div class="excel-sheet">
                                <div class="sheet-tabs">
                                    <div class="tab active">Form 1770/1770S</div>
                                    <div class="tab">Lampiran</div>
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
                                            <div class="cell formula">=SUM(B2:B8)</div>
                                            <div class="cell value">Penghasilan Neto</div>
                                            <div class="cell number">250.000.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">2</div>
                                            <div class="cell formula">=B1*0.05</div>
                                            <div class="cell value">PTKP</div>
                                            <div class="cell number">54.000.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">3</div>
                                            <div class="cell formula">=B1-B2</div>
                                            <div class="cell value">PKP</div>
                                            <div class="cell number highlight">196.000.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">4</div>
                                            <div class="cell formula">=VLOOKUP(B3,...)</div>
                                            <div class="cell value">PPh Terutang</div>
                                            <div class="cell number highlight">12.500.000</div>
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
                    <span class="stat-number">10.000+</span>
                    <span class="stat-label">Pengguna Aktif</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99.9%</span>
                    <span class="stat-label">Akurasi Laporan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">80%</span>
                    <span class="stat-label">Penghematan Waktu</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Tax Support</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Fitur Unggulan Kertas Kerja SPT Tahunan</h2>
                <p class="section-subtitle">Dirancang khusus untuk memudahkan penyusunan SPT Tahunan dengan akurasi maksimal</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4>Auto Calculation PPh 21/25/29</h4>
                    <p>Perhitungan otomatis PPh Pasal 21, 25, dan 29 dengan tarif progresif sesuai UU HPP</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h4>Formulir Lengkap</h4>
                    <p>Template lengkap Form 1770, 1770S, 1770SS dan semua lampiran yang diperlukan</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h4>Rekonsiliasi Fiskal</h4>
                    <p>Rekonsiliasi otomatis antara laporan komersial dengan ketentuan fiskal</p>
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
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Audit Trail</h4>
                    <p>Fitur tracking perubahan data dan history calculation untuk keperluan audit</p>
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
                <h2 class="section-title">Struktur Kertas Kerja SPT Tahunan</h2>
                <p class="section-subtitle">Organisasi worksheet yang terstruktur untuk efisiensi maksimal</p>
            </div>
            <div class="structure-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="formulir">Formulir Induk</button>
                    <button class="tab-button" data-tab="lampiran">Lampiran</button>
                    <button class="tab-button" data-tab="working-paper">Working Paper</button>
                    <button class="tab-button" data-tab="supporting">Dokumen Pendukung</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="formulir">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Formulir SPT Tahunan Induk</h4>
                                <p>Worksheet utama yang berisi formulir induk SPT Tahunan lengkap</p>
                                <ul>
                                    <li>Form 1770 - Orang Pribadi</li>
                                    <li>Form 1770S - Pekerja/Buruh</li>
                                    <li>Form 1770SS - Wajib Pajak UMKM</li>
                                    <li>Form 1771 - Badan Usaha</li>
                                    <li>Perhitungan PPh Final & Tidak Final</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="form-preview">
                                    <div class="form-header">FORMULIR 1770</div>
                                    <div class="form-field">
                                        <label>Penghasilan Neto</label>
                                        <div class="field-value">250.000.000</div>
                                    </div>
                                    <div class="form-field">
                                        <label>PTKP</label>
                                        <div class="field-value">54.000.000</div>
                                    </div>
                                    <div class="form-field">
                                        <label>PKP</label>
                                        <div class="field-value">196.000.000</div>
                                    </div>
                                    <div class="form-field highlight">
                                        <label>PPh Terutang</label>
                                        <div class="field-value">12.500.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="lampiran">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Lampiran SPT Tahunan</h4>
                                <p>Worksheet untuk semua lampiran yang diperlukan dalam SPT Tahunan</p>
                                <ul>
                                    <li>Lampiran I - Penghasilan</li>
                                    <li>Lampiran II - Biaya</li>
                                    <li>Lampiran III - Harta</li>
                                    <li>Lampiran IV - Utang</li>
                                    <li>Lampiran V - Kredit Pajak</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="lampiran-preview">
                                    <div class="lampiran-item">
                                        <i class="fas fa-money-bill-wave"></i>
                                        <div>
                                            <strong>Lampiran I</strong>
                                            <span>Penghasilan & Pengeluaran</span>
                                        </div>
                                    </div>
                                    <div class="lampiran-item">
                                        <i class="fas fa-home"></i>
                                        <div>
                                            <strong>Lampiran III</strong>
                                            <span>Daftar Harta</span>
                                        </div>
                                    </div>
                                    <div class="lampiran-item">
                                        <i class="fas fa-credit-card"></i>
                                        <div>
                                            <strong>Lampiran V</strong>
                                            <span>Kredit Pajak</span>
                                        </div>
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
                                    <li>Detail Transaksi Bulanan</li>
                                    <li>Analisis Koreksi Fiskal</li>
                                    <li>Penggolongan Biaya</li>
                                    <li>Backup Documentation</li>
                                    <li>Audit Working Paper</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="working-paper-preview">
                                    <div class="wp-header">
                                        <span>Bulan</span>
                                        <span>Jenis Transaksi</span>
                                        <span>Nominal</span>
                                    </div>
                                    <div class="wp-row">
                                        <span>Jan</span>
                                        <span>Gaji & Upah</span>
                                        <span>45.000.000</span>
                                    </div>
                                    <div class="wp-row">
                                        <span>Feb</span>
                                        <span>Biaya Operasional</span>
                                        <span>23.500.000</span>
                                    </div>
                                    <div class="wp-row">
                                        <span>Mar</span>
                                        <span>Pembelian Asset</span>
                                        <span>75.000.000</span>
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
                                    <li>Bukti Potong PPh 21/23/26</li>
                                    <li>Faktur Pajak Masukan/Keluaran</li>
                                    <li>Laporan Keuangan</li>
                                    <li>Arsip Digital</li>
                                    <li>Checklist Compliance</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="supporting-preview">
                                    <div class="doc-item">
                                        <i class="fas fa-file-contract"></i>
                                        <span>Bukti Potong PPh 21</span>
                                        <span class="count">12 dokumen</span>
                                    </div>
                                    <div class="doc-item">
                                        <i class="fas fa-file-invoice"></i>
                                        <span>Faktur Pajak</span>
                                        <span class="count">45 dokumen</span>
                                    </div>
                                    <div class="doc-item">
                                        <i class="fas fa-chart-bar"></i>
                                        <span>Laporan Keuangan</span>
                                        <span class="count">4 dokumen</span>
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
                <h2 class="section-title">Paket Layanan Kertas Kerja SPT Tahunan</h2>
                <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan pelaporan pajak tahunan Anda</p>
            </div>
            
            <div class="pricing-grid">
                @foreach($papers as $paper)
                    <div class="service-card {{ $loop->iteration == 2 ? 'featured' : '' }}">
                        {{-- Best Seller Badge --}}
                        @if($loop->iteration == 2)
                            <div class="card-badge">Best Seller</div>
                        @endif

                        <div class="card-header">
                            <h3>{{ $paper->name }}</h3>
                            <div class="price">
                                <span class="starting-from">mulai dari</span>
                                <span class="amount">Rp {{ number_format($paper->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="package-info">
                                {{ $paper->kebutuhan ?? '-' }}
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="feature-list">
                                @foreach(explode("\n", $paper->description) as $desc)
                                    @php $trimmed = trim($desc); @endphp
                                    @if($trimmed !== '')
                                        <li>
                                            @if(str_starts_with($trimmed, '-'))
                                                <i class="fas fa-times"></i> {{ ltrim($trimmed, '-') }}
                                            @elseif(str_starts_with($trimmed, '+'))
                                                <i class="fas fa-check"></i> {{ ltrim($trimmed, '+') }}
                                            @else
                                                {{ $trimmed }}
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('product.paper.show', $paper->id) }}" class="btn-order">
                                Pesan Sekarang
                            </a>
                        </div>
                        <div class="card-footer">
                            <a href="https://wa.me/62xxxxxxxxxx" class="btn-outline-kk">Hubungi Kami</a>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Additional Info -->
            <div class="pricing-info">
                <div class="info-grid">
                    <div class="info-item">
                        <i class="fas fa-sync-alt"></i>
                        <h4>Update Berkala</h4>
                        <p>Selalu update dengan regulasi terbaru UU HPP dan PER Dirjen Pajak</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <h4>Garansi Kepuasan</h4>
                        <p>Uang kembali 100% jika tidak sesuai kebutuhan dalam 30 hari</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-headset"></i>
                        <h4>Tax Support 24/7</h4>
                        <p>Konsultan pajak siap membantu kapan saja</p>
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
                <p class="section-subtitle">Testimoni dari wajib pajak dan perusahaan yang telah menggunakan kertas kerja kami</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Kertas kerja SPT Tahunan ini sangat membantu saya sebagai freelancer. Proses yang biasanya rumit sekarang jadi sederhana dan terstruktur."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="author-info">
                            <h5>Budi Santoso</h5>
                            <span>Freelancer, Jakarta</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Sebagai pemilik UMKM, kertas kerja ini sangat memudahkan dalam menyusun SPT. Auto calculation sangat akurat dan menghemat waktu."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="author-info">
                            <h5>Sarah Wijaya</h5>
                            <span>Pemilik UMKM, Bandung</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Template yang sangat profesional untuk perusahaan. Rekonsiliasi fiskal otomatis sangat membantu tim accounting kami."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="author-info">
                            <h5>Andi Pratama</h5>
                            <span>Finance Manager, PT Maju Jaya</span>
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
                <p class="section-subtitle">Informasi lengkap seputar kertas kerja SPT Tahunan</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah kertas kerja ini sesuai dengan UU HPP terbaru?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kertas kerja telah disesuaikan dengan UU Harmonisasi Peraturan Perpajakan (HPP) dan semua PER Dirjen Pajak terbaru. Kami selalu melakukan update ketika ada perubahan regulasi.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Berapa lama proses pengiriman setelah pembelian?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>File akan dikirimkan secara instan melalui email dalam waktu maksimal 15 menit setelah pembayaran dikonfirmasi. Untuk paket Professional dan Enterprise, Anda akan mendapatkan akses ke member area secara langsung.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah ada panduan penggunaan?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, setiap kertas kerja dilengkapi dengan panduan penggunaan lengkap dalam Bahasa Indonesia berupa video tutorial dan dokumen PDF yang berisi langkah-langkah detail.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bisakah digunakan untuk multiple company?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Paket Dasar untuk 1 wajib pajak/license. Paket Profesional dapat digunakan untuk 1 perusahaan. Paket Enterprise dapat digunakan untuk maksimal 3 perusahaan dalam 1 grup usaha.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Menyusun SPT Tahunan dengan Lebih Mudah?</h3>
                <p>Dapatkan kertas kerja SPT Tahunan sekarang dan rasakan kemudahan dalam pelaporan pajak tahunan</p>
            </div>
        </div>
    </div>
</section>

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