@extends('layouts.master')

@section('title', 'Kertas Kerja SPT Masa Unifikasi')
<link rel="stylesheet" href="{{ asset('assets/customer/css/spt_unifikasi.css') }}">
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
                            <button type="button" 
                                    class="btn-order" 
                                    onclick="addToCart({{ $paper->id }}, 'ItemPaper')">
                                Pesan Sekarang
                            </button>
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