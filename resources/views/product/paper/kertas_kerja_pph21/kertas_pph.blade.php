@extends('layouts.master')

@section('title', 'Kertas Kerja PPh 21')
<link rel="stylesheet" href="{{ asset('assets/customer/css/ppn.css') }}">
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
                @foreach($papers as $paper)
                    <div class="service-card">
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
                            <button type="button" 
                                    class="btn-order" 
                                    onclick="addToCart({{ $paper->id }}, 'ItemPaper')">
                                Pesan Sekarang
                            </button>
                        </div>
                        <div class="card-footer">
                            <a href="https://wa.me/62xxxxxxxxxx" class="btn-outline-kk">Hubungi Admin</a>
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