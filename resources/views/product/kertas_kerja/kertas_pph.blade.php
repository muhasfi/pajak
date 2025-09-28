@extends('layouts.master')

@section('title', 'Katalog Kertas Kerja PPh 21')

@section('content')
<div class="pph21-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Katalog Kertas Kerja PPh 21</h1>
                <p>Solusi profesional untuk pengelolaan Pajak Penghasilan Pasal 21 dengan sistem yang terstruktur dan sesuai regulasi terbaru. Kelola kewajiban pemotongan PPh 21 dengan lebih efisien.</p>
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
                <h2>Mengapa Kertas Kerja PPh 21 Penting?</h2>
                <p>Kertas kerja PPh 21 membantu pemotong pajak dalam mengelola kewajiban pemotongan dan pelaporan PPh 21 secara sistematis.</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Kelola Karyawan</h3>
                    <p>Dokumentasi lengkap data karyawan dan perhitungan PPh 21 terutang.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3>Perhitungan Akurat</h3>
                    <p>Perhitungan pemotongan PPh 21 yang akurat sesuai tarif progresif.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Bukti Potong</h3>
                    <p>Penerbitan bukti potong yang lengkap dan sesuai format.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3>Pelaporan Tepat Waktu</h3>
                    <p>Memastikan pelaporan SPT Masa PPh 21 sesuai batas waktu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Layanan -->
    <section id="katalog" class="catalog-section">
        <div class="container">
            <div class="section-header">
                <h2>Paket Layanan Kertas Kerja PPh 21</h2>
                <p>Pilih paket yang sesuai dengan jumlah karyawan dan kompleksitas bisnis Anda</p>
            </div>
            
            <div class="catalog-grid">
                <!-- Paket Startup -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Startup</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 550.000</span>
                        </div>
                        <div class="employee-count">≤ 10 Karyawan</div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja PPh 21 Bulanan</li>
                            <li><i class="fas fa-check"></i> Perhitungan PPh 21 karyawan tetap</li>
                            <li><i class="fas fa-check"></i> Bukti potong A1 dan A2</li>
                            <li><i class="fas fa-check"></i> SPT Masa PPh 21</li>
                            <li><i class="fas fa-times"></i> Karyawan tidak tetap</li>
                            <li><i class="fas fa-times"></i> Final DTP dan insentif</li>
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
                            <span class="amount">Rp 950.000</span>
                        </div>
                        <div class="employee-count">11 - 50 Karyawan</div>
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
                        <a href="#" class="btn-outline">Hubungi Admin</a>
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
                        <div class="employee-count">> 50 Karyawan</div>
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
                        <a href="#" class="btn-order">Pesan Sekarang</a>
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
                <h2>Fitur Utama Kertas Kerja PPh 21</h2>
                <p>Semua yang Anda butuhkan untuk pengelolaan PPh 21 yang efektif</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Data Karyawan</h3>
                    <p>Pengelolaan data karyawan lengkap dengan status PTKP dan penangguhan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Perhitungan Terinci</h3>
                    <p>Perhitungan penghasilan bruto, biaya jabatan, dan PPh 21 terutang.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3>Bukti Potong</h3>
                    <p>Generasi bukti potong otomatis sesuai format yang berlaku.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h3>Pelaporan</h3>
                    <p>SPT Masa PPh 21 yang lengkap dengan lampiran required.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Proses Kerja -->
    <section class="workflow-section">
        <div class="container">
            <div class="section-header">
                <h2>Alur Pengerjaan Kertas Kerja PPh 21</h2>
                <p>Proses sistematis untuk hasil yang optimal</p>
            </div>
            <div class="workflow-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Konsultasi Awal</h3>
                        <p>Identifikasi kebutuhan dan pengumpulan data dasar</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Pengumpulan Data</h3>
                        <p>Koleksi data karyawan dan dokumen pendukung</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Perhitungan</h3>
                        <p>Perhitungan PPh 21 dan penyusunan bukti potong</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Review</h3>
                        <p>Pengecekan dan verifikasi bersama klien</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Pelaporan</h3>
                        <p>Pelaporan SPT Masa PPh 21 ke KPP</p>
                    </div>
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
                        <li>Pemotong pajak harus memiliki NPWP aktif</li>
                        <li>Data karyawan harus lengkap dan valid</li>
                        <li>Dokumen pendukung slip gaji dan bukti potong</li>
                        <li>Pembayaran sesuai kesepakatan waktu</li>
                    </ul>
                </div>
                <div class="info-item">
                    <h3>Jenis Penerima Penghasilan</h3>
                    <ul>
                        <li>Karyawan tetap dan tidak tetap</li>
                        <li>Pegawai yang menerima uang pesangon</li>
                        <li>Penerima pensiun berkala</li>
                        <li>Anggota dewan komisaris</li>
                        <li>Tenaga ahli dan freelancer</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection