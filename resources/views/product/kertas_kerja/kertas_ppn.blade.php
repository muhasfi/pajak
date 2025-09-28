@extends('layouts.master')

@section('title', 'Katalog Kertas Kerja PPN')

@section('content')
<div class="ppn-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Katalog Kertas Kerja PPN</h1>
                <p>Solusi profesional untuk penyusunan kertas kerja Pajak Pertambahan Nilai (PPN) dengan standar akuntansi terbaru. Kelola kewajiban PPN bisnis Anda dengan lebih efisien.</p>
                <div class="hero-actions">
                    <a href="#katalog" class="btn-primary">Lihat Katalog</a>
                    <a href="#kontak" class="btn-secondary">Konsultasi Gratis</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Deskripsi Layanan -->
    <section class="description-section">
        <div class="container">
            <div class="section-header">
                <h2>Mengapa Kertas Kerja PPN Penting?</h2>
                <p>Kertas kerja PPN membantu Pengusaha Kena Pajak (PKP) dalam mengelola kewajiban perpajakan secara sistematis dan terstruktur.</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <h3>Kelola Faktur Pajak</h3>
                    <p>Dokumentasi lengkap untuk faktur pajak keluaran dan masukan secara terstruktur.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3>Kepatuhan Regulasi</h3>
                    <p>Memastikan kepatuhan terhadap peraturan perpajakan yang berlaku.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Audit Ready</h3>
                    <p>Persiapan dokumen yang lengkap untuk menghadapi pemeriksaan pajak.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Optimasi PPN</h3>
                    <p>Analisis untuk mengoptimalkan pengelolaan PPN bisnis Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Layanan -->
    <section id="katalog" class="catalog-section">
        <div class="container">
            <div class="section-header">
                <h2>Paket Layanan Kertas Kerja PPN</h2>
                <p>Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
            </div>
            
            <div class="catalog-grid">
                <!-- Paket Basic -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Basic</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 450.000</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja PPN Bulanan</li>
                            <li><i class="fas fa-check"></i> Dokumentasi faktur pajak 3 bulan</li>
                            <li><i class="fas fa-check"></i> Formulir SPT Masa PPN</li>
                            <li><i class="fas fa-check"></i> Konsultasi via email</li>
                            <li><i class="fas fa-times"></i> Rekonsiliasi faktur pajak</li>
                            <li><i class="fas fa-times"></i> Analisis potensi restitusi</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                        <a href="#" class="btn-outline">Hubungi Admin</a>
                    </div>
                </div>

                <!-- Paket Professional -->
                <div class="service-card featured">
                    <div class="card-badge">Rekomendasi</div>
                    <div class="card-header">
                        <h3>Paket Professional</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 850.000</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja PPN Triwulan</li>
                            <li><i class="fas fa-check"></i> Dokumentasi faktur pajak 1 tahun</li>
                            <li><i class="fas fa-check"></i> Formulir SPT Masa PPN lengkap</li>
                            <li><i class="fas fa-check"></i> Konsultasi via WhatsApp</li>
                            <li><i class="fas fa-check"></i> Rekonsiliasi faktur pajak</li>
                            <li><i class="fas fa-check"></i> Analisis potensi restitusi</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                        <a href="#" class="btn-outline">Hubungi Admin</a>
                    </div>
                </div>

                <!-- Paket Enterprise -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Enterprise</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 1.500.000</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja PPN Tahunan</li>
                            <li><i class="fas fa-check"></i> Dokumentasi faktur pajak lengkap</li>
                            <li><i class="fas fa-check"></i> Semua formulir SPT PPN</li>
                            <li><i class="fas fa-check"></i> Konsultasi langsung</li>
                            <li><i class="fas fa-check"></i> Rekonsiliasi mendalam</li>
                            <li><i class="fas fa-check"></i> Strategi optimasi PPN</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                       <a href="{{ route('order.ppn') }}" class="btn-order">Pesan Sekarang</a>
                        <a href="#" class="btn-outline">Hubungi Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Layanan -->
    <section class="features-section">
        <div class="container">
            <div class="section-header">
                <h2>Apa yang Anda Dapatkan?</h2>
                <p>Fitur lengkap dalam kertas kerja PPN kami</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <h3>Faktur Pajak Digital</h3>
                    <p>Pengelolaan faktur pajak keluaran dan masukan dalam format digital yang terorganisir.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3>Perhitungan Akurat</h3>
                    <p>Perhitungan PPN terutang, PM yang dapat dikreditkan, dan restitusi secara akurat.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Timeline Jelas</h3>
                    <p>Jadwal penyetoran dan pelaporan PPN yang terencana dengan baik.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Compliance Check</h3>
                    <p>Pemeriksaan kepatuhan terhadap peraturan perpajakan terbaru.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Tambahan -->
    <section class="additional-info">
        <div class="container">
            <div class="info-grid">
                <div class="info-item">
                    <h3>Syarat dan Ketentuan</h3>
                    <ul>
                        <li>Wajib Pajak harus memiliki NPWP aktif</li>
                        <li>Status Pengusaha Kena Pajak (PKP) harus aktif</li>
                        <li>Dokumen pendukung harus lengkap dan valid</li>
                        <li>Pembayaran dilakukan sesuai kesepakatan</li>
                    </ul>
                </div>
                <div class="info-item">
                    <h3>Proses Pengerjaan</h3>
                    <ol>
                        <li>Konsultasi kebutuhan dan pengumpulan dokumen</li>
                        <li>Penyusunan kertas kerja PPN</li>
                        <li>Review bersama klien</li>
                        <li>Revisi dan finalisasi</li>
                        <li>Pelaporan SPT Masa PPN</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection