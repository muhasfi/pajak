@extends('layouts.master')

@section('title', 'Katalog Kertas Kerja SPT Tahunan Pajak')

@section('content')
<div class="spt-tahunan-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Katalog Kertas Kerja SPT Tahunan Pajak</h1>
                <p>Solusi lengkap dan profesional untuk penyusunan kertas kerja SPT Tahunan Pajak dengan standar akuntansi yang berlaku. Dapatkan kemudahan dalam memenuhi kewajiban perpajakan Anda.</p>
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
                <h2>Mengapa Kertas Kerja SPT Tahunan Penting?</h2>
                <p>Kertas kerja SPT Tahunan merupakan dokumen pendukung yang sistematis untuk memastikan kelengkapan dan keakuratan pelaporan pajak Anda.</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>Dokumentasi Terstruktur</h3>
                    <p>Menyusun semua dokumen perpajakan secara sistematis dan mudah dilacak.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Perlindungan Hukum</h3>
                    <p>Sebagai bukti pendukung jika terjadi pemeriksaan pajak di kemudian hari.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Efisiensi Waktu</h3>
                    <p>Mempermudah proses penyusunan SPT Tahunan dengan data yang sudah terorganisir.</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Kepatuhan Pajak</h3>
                    <p>Memastikan semua kewajiban perpajakan terpenuhi sesuai regulasi yang berlaku.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Layanan -->
    <section id="katalog" class="catalog-section">
        <div class="container">
            <div class="section-header">
                <h2>Katalog Layanan Kertas Kerja SPT Tahunan</h2>
                <p>Pilih paket layanan yang sesuai dengan kebutuhan bisnis Anda</p>
            </div>
            
            <div class="catalog-grid">
                <!-- Paket Dasar -->
                <div class="service-card">
                    <div class="card-header">
                        <h3>Paket Dasar</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 750.000</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja SPT Tahunan Orang Pribadi</li>
                            <li><i class="fas fa-check"></i> Dokumentasi pendukung penghasilan</li>
                            <li><i class="fas fa-check"></i> Formulir SPT Tahunan lengkap</li>
                            <li><i class="fas fa-check"></i> Konsultasi via WhatsApp (5x pertemuan)</li>
                            <li><i class="fas fa-times"></i> Analisis potensi pajak</li>
                            <li><i class="fas fa-times"></i> Review dokumen oleh konsultan pajak</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Kami</a>
                    </div>
                </div>

                <!-- Paket Profesional -->
                <div class="service-card featured">
                    <div class="card-badge">Rekomendasi</div>
                    <div class="card-header">
                        <h3>Paket Profesional</h3>
                        <div class="price">
                            <span class="starting-from">mulai dari</span>
                            <span class="amount">Rp 1.500.000</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja SPT Tahunan Badan Usaha</li>
                            <li><i class="fas fa-check"></i> Dokumentasi lengkap transaksi usaha</li>
                            <li><i class="fas fa-check"></i> Formulir SPT Tahunan dan lampiran</li>
                            <li><i class="fas fa-check"></i> Konsultasi tak terbatas via WhatsApp</li>
                            <li><i class="fas fa-check"></i> Analisis potensi pajak dan optimasi</li>
                            <li><i class="fas fa-check"></i> Review dokumen oleh konsultan pajak</li>
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
                            <span class="amount">Rp 2.500.000</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Kertas kerja SPT Tahunan lengkap</li>
                            <li><i class="fas fa-check"></i> Dokumentasi dan arsip digital</li>
                            <li><i class="fas fa-check"></i> Semua formulir dan lampiran SPT</li>
                            <li><i class="fas fa-check"></i> Konsultasi langsung dengan ahli pajak</li>
                            <li><i class="fas fa-check"></i> Analisis mendalam dan strategi pajak</li>
                            <li><i class="fas fa-check"></i> Pendampingan jika terjadi pemeriksaan</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-order">Pesan Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-outline-kk">Hubungi Kami</a>
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
                        <li>Wajib Pajak harus memiliki NPWP aktif</li>
                        <li>Dokumen pendukung harus diserahkan minimal 2 minggu sebelum batas waktu pelaporan</li>
                        <li>Harga dapat berubah sesuai kompleksitas transaksi</li>
                        <li>Pembayaran dilakukan 50% di muka, 50% setelah selesai</li>
                    </ul>
                </div>
                <div class="info-item">
                    <h3>Proses Pengerjaan</h3>
                    <ol>
                        <li>Konsultasi kebutuhan dan pengumpulan dokumen</li>
                        <li>Penyusunan kertas kerja dan formulir SPT</li>
                        <li>Review bersama Wajib Pajak</li>
                        <li>Revisi dan finalisasi dokumen</li>
                        <li>Pelaporan SPT Tahunan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection