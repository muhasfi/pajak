@extends('layouts.master')

@section('title', 'Kertas Kerja PPN')

<link rel="stylesheet" href="{{ asset('assets/customer/css/ppn.css') }}">

@section('content')
<section class="ppn-service">
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
                        <span class="title-line highlight">PPN & PPnBM</span>
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
                        <a href="#features" class="btn btn-outline-light">
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
                                <div class="excel-filename">Kertas Kerja PPN.xlsx</div>
                            </div>
                            <div class="excel-sheet">
                                <div class="sheet-tabs">
                                    <div class="tab active">Formulir 1101</div>
                                    <div class="tab">Rekonsiliasi</div>
                                    <div class="tab">Faktur Pajak</div>
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
                                            <div class="cell number">25.000.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">2</div>
                                            <div class="cell formula">=SUM(C2:C10)</div>
                                            <div class="cell value">PPN Masukan</div>
                                            <div class="cell number">18.500.000</div>
                                        </div>
                                        <div class="grid-row">
                                            <div class="cell header">3</div>
                                            <div class="cell formula">=B1-C1</div>
                                            <div class="cell value">Kurang/Lebih Bayar</div>
                                            <div class="cell number highlight">6.500.000</div>
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
                <h2 class="section-title">Fitur Unggulan Kertas Kerja PPN</h2>
                <p class="section-subtitle">Dirancang khusus untuk memudahkan penyusunan SPT Masa PPN dengan akurasi maksimal</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4>Auto Calculation PPN</h4>
                    <p>Perhitungan otomatis PPN Keluaran, Masukan, dan kurang/lebih bayar dengan formula Excel terintegrasi</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h4>Formulir 1101 Lengkap</h4>
                    <p>Template lengkap Formulir 1101 PUT dan semua lampiran yang diperlukan sesuai PER-03/PJ/2022</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h4>Rekonsiliasi Otomatis</h4>
                    <p>Rekonsiliasi otomatis antara buku pembukuan dengan faktur pajak dan dokumen pendukung</p>
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
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Audit Faktur Pajak</h4>
                    <p>Fitur validasi dan audit faktur pajak masukan untuk mencegah pengkreditan yang tidak memenuhi syarat</p>
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
                <h2 class="section-title">Struktur Kertas Kerja PPN</h2>
                <p class="section-subtitle">Organisasi worksheet yang terstruktur untuk efisiensi maksimal</p>
            </div>
            <div class="structure-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="formulir">Formulir 1101</button>
                    <button class="tab-button" data-tab="faktur">Faktur Pajak</button>
                    <button class="tab-button" data-tab="rekonsiliasi">Rekonsiliasi</button>
                    <button class="tab-button" data-tab="supporting">Dokumen Pendukung</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="formulir">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Formulir SPT Masa PPN 1101</h4>
                                <p>Worksheet utama yang berisi formulir 1101 PUT lengkap dengan semua lampiran yang diperlukan</p>
                                <ul>
                                    <li>Induk SPT Masa PPN</li>
                                    <li>Lampiran I - PKP Pedagang Eceran</li>
                                    <li>Lampiran II - Ekspor BKP Berwujud</li>
                                    <li>Lampiran III - Perhitungan PPN</li>
                                    <li>Lampiran IV - Faktur Pajak</li>
                                    <li>Lampiran V - PPnBM</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="form-preview">
                                    <div class="form-header">FORMULIR 1101 PUT</div>
                                    <div class="form-field">
                                        <label>Masa Pajak</label>
                                        <div class="field-value">Maret 2024</div>
                                    </div>
                                    <div class="form-field">
                                        <label>PPN Keluaran</label>
                                        <div class="field-value">25.000.000</div>
                                    </div>
                                    <div class="form-field">
                                        <label>PPN Masukan</label>
                                        <div class="field-value">18.500.000</div>
                                    </div>
                                    <div class="form-field highlight">
                                        <label>PPN Kurang Bayar</label>
                                        <div class="field-value">6.500.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="faktur">
                        <div class="pane-content">
                            <div class="pane-text">
                                <h4>Manajemen Faktur Pajak</h4>
                                <p>Worksheet untuk pencatatan dan manajemen faktur pajak masukan dan keluaran</p>
                                <ul>
                                    <li>Daftar Faktur Pajak Masukan</li>
                                    <li>Daftar Faktur Pajak Keluaran</li>
                                    <li>Validasi Status Faktur</li>
                                    <li>Monitoring Masa Kadaluarsa</li>
                                    <li>Analisis Pengkreditan</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="faktur-preview">
                                    <div class="faktur-item">
                                        <i class="fas fa-file-invoice"></i>
                                        <div>
                                            <strong>Faktur Masukan</strong>
                                            <span>45 faktur - Rp 18.500.000</span>
                                        </div>
                                    </div>
                                    <div class="faktur-item">
                                        <i class="fas fa-file-export"></i>
                                        <div>
                                            <strong>Faktur Keluaran</strong>
                                            <span>38 faktur - Rp 25.000.000</span>
                                        </div>
                                    </div>
                                    <div class="faktur-item">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <div>
                                            <strong>Perlu Validasi</strong>
                                            <span>3 faktur - Rp 2.100.000</span>
                                        </div>
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
                                    <li>Koreksi Fiskal PPN</li>
                                    <li>Penyesuaian Pengkreditan</li>
                                    <li>Analisis Selisih</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="reconciliation-preview">
                                    <div class="recon-item">
                                        <span>Penjualan Komersial</span>
                                        <span>185.000.000</span>
                                    </div>
                                    <div class="recon-item">
                                        <span>Koreksi PPN (+)</span>
                                        <span>15.000.000</span>
                                    </div>
                                    <div class="recon-item">
                                        <span>Koreksi PPN (-)</span>
                                        <span class="negative">-8.500.000</span>
                                    </div>
                                    <div class="recon-item total">
                                        <span>Penjualan Fiskal</span>
                                        <span>191.500.000</span>
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
                                    <li>Daftar Faktur Pajak Masukan</li>
                                    <li>Daftar Faktur Pajak Keluaran</li>
                                    <li>Dokumen Ekspor/Impor</li>
                                    <li>Arsip Digital Faktur</li>
                                    <li>Checklist Compliance</li>
                                </ul>
                            </div>
                            <div class="pane-visual">
                                <div class="supporting-preview">
                                    <div class="doc-item">
                                        <i class="fas fa-file-contract"></i>
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
                <h2 class="section-title">Paket Layanan Kertas Kerja PPN</h2>
                <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan pelaporan PPN perusahaan Anda</p>
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
                                    @if(trim($desc) !== '')
                                        <li>
                                            {{-- Kalau deskripsi diawali dengan tanda "-" kita pakai X --}}
                                            @if(str_starts_with(trim($desc), '-'))
                                                <i class="fas fa-times"></i> {{ ltrim($desc, '-') }}
                                            @else
                                                <i class="fas fa-check"></i> {{ $desc }}
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
                        <p>Selalu update dengan regulasi terbaru PER-03/PJ/2022</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <h4>Garansi Kepuasan</h4>
                        <p>Uang kembali 100% jika tidak sesuai kebutuhan</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-headset"></i>
                        <h4>PPN Support 24/7</h4>
                        <p>Tim ahli PPN siap membantu kapan saja</p>
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
                <p class="section-subtitle">Informasi lengkap seputar kertas kerja PPN</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah kertas kerja ini sesuai dengan PER-03/PJ/2022?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kertas kerja telah disesuaikan dengan PER-03/PJ/2022 tentang Pedoman Teknis Tata Cara Pemungutan, Penyetoran, dan Pelaporan Pajak Pertambahan Nilai. Kami juga memberikan update gratis untuk paket Professional dan Enterprise ketika ada perubahan regulasi.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bagaimana sistem validasi faktur pajak bekerja?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Sistem validasi faktur pajak akan memeriksa kelengkapan data faktur, masa pajak, status approval, dan potensi masalah pengkreditan. Fitur ini membantu mencegah kesalahan dalam pengkreditan PPN Masukan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah ada panduan penggunaan?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, setiap kertas kerja dilengkapi dengan panduan penggunaan lengkap dalam Bahasa Indonesia yang berisi langkah-langkah detail dari input data hingga generate laporan SPT Masa PPN.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Bisakah digunakan untuk multiple company?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Paket Basic untuk 1 perusahaan/license. Paket Professional dapat digunakan untuk 1 perusahaan. Paket Enterprise dapat digunakan untuk maksimal 3 perusahaan dalam 1 grup usaha.</p>
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
                <p>Dapatkan kertas kerja PPN sekarang dan rasakan kemudahan dalam penyusunan laporan pajak masa</p>
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