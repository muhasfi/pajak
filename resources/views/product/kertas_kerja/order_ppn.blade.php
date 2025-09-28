@extends('layouts.master')

@section('title', 'Order Kertas Kerja PPN')

@section('content')
<div class="order-ppn-page">
    <!-- Header Order -->
    <section class="order-header">
        <div class="container">
            <div class="header-content mt-5">
                <h1>Pesan Kertas Kerja PPN</h1>
                <p>Isi formulir berikut untuk memesan layanan kertas kerja PPN profesional kami</p>
            </div>
        </div>
    </section>

    <!-- Order Content -->
    <section class="order-content">
        <div class="container">
            <div class="order-grid">
                <!-- Order Form -->
                <div class="order-form-section">
                    <div class="form-header">
                        <h2>Informasi Pemesan</h2>
                        <p>Lengkapi data diri dan perusahaan Anda</p>
                    </div>
                    
                    <form class="order-form" id="ppnOrderForm">
                        @csrf
                        
                        <!-- Informasi Pribadi -->
                        <div class="form-section">
                            <h3>Data Pribadi</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap *</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Nomor Telepon *</label>
                                    <input type="tel" id="telepon" name="telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan">
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Perusahaan -->
                        <div class="form-section">
                            <h3>Data Perusahaan</h3>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label for="nama_perusahaan">Nama Perusahaan *</label>
                                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP Perusahaan *</label>
                                    <input type="text" id="npwp" name="npwp" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_pkp">Nomor PKP *</label>
                                    <input type="text" id="no_pkp" name="no_pkp" required>
                                </div>
                                <div class="form-group">
                                    <label for="industri">Jenis Industri</label>
                                    <select id="industri" name="industri">
                                        <option value="">Pilih Jenis Industri</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="trading">Trading</option>
                                        <option value="jasa">Jasa</option>
                                        <option value="retail">Retail</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group full-width">
                                    <label for="alamat">Alamat Perusahaan</label>
                                    <textarea id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Paket Layanan -->
                        <div class="form-section">
                            <h3>Pilih Paket Layanan</h3>
                            <div class="package-options">
                                <div class="package-option">
                                    <input type="radio" id="paket_basic" name="paket" value="basic" data-harga="450000">
                                    <label for="paket_basic">
                                        <span class="package-name">Paket Basic</span>
                                        <span class="package-price">Rp 450.000</span>
                                    </label>
                                </div>
                                <div class="package-option">
                                    <input type="radio" id="paket_professional" name="paket" value="professional" data-harga="850000" checked>
                                    <label for="paket_professional">
                                        <span class="package-name">Paket Professional</span>
                                        <span class="package-price">Rp 850.000</span>
                                        <span class="package-badge">Rekomendasi</span>
                                    </label>
                                </div>
                                <div class="package-option">
                                    <input type="radio" id="paket_enterprise" name="paket" value="enterprise" data-harga="1500000">
                                    <label for="paket_enterprise">
                                        <span class="package-name">Paket Enterprise</span>
                                        <span class="package-price">Rp 1.500.000</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Periode Layanan -->
                        <div class="form-section">
                            <h3>Periode Layanan</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="periode_mulai">Periode Mulai *</label>
                                    <input type="month" id="periode_mulai" name="periode_mulai" required>
                                </div>
                                <div class="form-group">
                                    <label for="durasi">Durasi Layanan</label>
                                    <select id="durasi" name="durasi">
                                        <option value="1">1 Bulan</option>
                                        <option value="3" selected>3 Bulan</option>
                                        <option value="6">6 Bulan</option>
                                        <option value="12">1 Tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Tambahan -->
                        <div class="form-section">
                            <h3>Informasi Tambahan</h3>
                            <div class="form-group full-width">
                                <label for="catatan">Catatan Khusus</label>
                                <textarea id="catatan" name="catatan" rows="4" placeholder="Berikan informasi tambahan mengenai kebutuhan spesifik Anda..."></textarea>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="form-section">
                            <h3>Metode Pembayaran</h3>
                            <div class="payment-options">
                                <div class="payment-option">
                                    <input type="radio" id="transfer_bank" name="metode_bayar" value="transfer" checked>
                                    <label for="transfer_bank">
                                        <i class="fas fa-university"></i>
                                        <span>Transfer Bank</span>
                                    </label>
                                </div>
                                <div class="payment-option">
                                    <input type="radio" id="virtual_account" name="metode_bayar" value="virtual_account">
                                    <label for="virtual_account">
                                        <i class="fas fa-credit-card"></i>
                                        <span>Virtual Account</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Agreement -->
                        <div class="form-section agreement">
                            <div class="checkbox-group">
                                <input type="checkbox" id="agree_terms" name="agree_terms" required>
                                <label for="agree_terms">
                                    Saya menyetujui <a href="#">Syarat dan Ketentuan</a> serta 
                                    <a href="#">Kebijakan Privasi</a> yang berlaku
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i>
                                Pesan Sekarang
                            </button>
                            <a href="{{ url('/katalog-ppn') }}" class="btn-back">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Katalog
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="order-summary-section">
                    <div class="summary-card">
                        <div class="summary-header">
                            <h3>Ringkasan Pesanan</h3>
                        </div>
                        
                        <div class="summary-content">
                            <!-- Paket Selected -->
                            <div class="summary-item">
                                <div class="item-label">Paket Layanan</div>
                                <div class="item-value" id="summary-paket">Paket Professional</div>
                            </div>
                            
                            <!-- Harga -->
                            <div class="summary-item">
                                <div class="item-label">Harga Paket</div>
                                <div class="item-value" id="summary-harga">Rp 850.000</div>
                            </div>
                            
                            <!-- Durasi -->
                            <div class="summary-item">
                                <div class="item-label">Durasi</div>
                                <div class="item-value" id="summary-durasi">3 Bulan</div>
                            </div>
                            
                            <!-- Total -->
                            <div class="summary-total">
                                <div class="total-label">Total Pembayaran</div>
                                <div class="total-amount" id="summary-total">Rp 850.000</div>
                            </div>
                        </div>

                        <!-- Package Details -->
                        <div class="package-details">
                            <h4>Detail Paket</h4>
                            <ul class="features-list" id="package-features">
                                <li><i class="fas fa-check"></i> Kertas kerja PPN Triwulan</li>
                                <li><i class="fas fa-check"></i> Dokumentasi faktur pajak 1 tahun</li>
                                <li><i class="fas fa-check"></i> Formulir SPT Masa PPN lengkap</li>
                                <li><i class="fas fa-check"></i> Konsultasi via WhatsApp</li>
                                <li><i class="fas fa-check"></i> Rekonsiliasi faktur pajak</li>
                                <li><i class="fas fa-check"></i> Analisis potensi restitusi</li>
                            </ul>
                        </div>

                        <!-- Support Info -->
                        <div class="support-info">
                            <div class="support-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong>Proses Cepat</strong>
                                    <span>1-3 hari kerja</span>
                                </div>
                            </div>
                            <div class="support-item">
                                <i class="fas fa-shield-alt"></i>
                                <div>
                                    <strong>Garansi</strong>
                                    <span>Revisi gratis 30 hari</span>
                                </div>
                            </div>
                            <div class="support-item">
                                <i class="fas fa-headset"></i>
                                <div>
                                    <strong>Support 24/7</strong>
                                    <span>Tim profesional siap membantu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Success Modal -->
<div class="modal" id="successModal">
    <div class="modal-content">
        <div class="modal-header">
            <i class="fas fa-check-circle"></i>
            <h3>Pesanan Berhasil!</h3>
        </div>
        <div class="modal-body">
            <p>Terima kasih telah memesan layanan kertas kerja PPN kami. Tim kami akan menghubungi Anda dalam 1x24 jam.</p>
            <div class="order-details">
                <div class="detail-item">
                    <span>No. Pesanan:</span>
                    <strong>PPN-2024-00123</strong>
                </div>
                <div class="detail-item">
                    <span>Total:</span>
                    <strong id="modal-total">Rp 850.000</strong>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-close-modal">Tutup</button>
            <a href="#" class="btn-download">Download Invoice</a>
        </div>
    </div>
</div>
@section('script')
document.addEventListener('DOMContentLoaded', function() {
    // Update summary berdasarkan pilihan paket
    const packageRadios = document.querySelectorAll('input[name="paket"]');
    const durasiSelect = document.getElementById('durasi');
    
    function updateSummary() {
        const selectedPackage = document.querySelector('input[name="paket"]:checked');
        const durasi = parseInt(durasiSelect.value);
        const harga = parseInt(selectedPackage.dataset.harga);
        const total = harga * durasi;
        
        // Update summary
        document.getElementById('summary-paket').textContent = 
            selectedPackage.parentElement.querySelector('.package-name').textContent;
        document.getElementById('summary-harga').textContent = 
            formatRupiah(harga);
        document.getElementById('summary-durasi').textContent = 
            durasi + ' Bulan';
        document.getElementById('summary-total').textContent = 
            formatRupiah(total);
        
        // Update modal total
        document.getElementById('modal-total').textContent = 
            formatRupiah(total);
    }
    
    function formatRupiah(amount) {
        return 'Rp ' + amount.toLocaleString('id-ID');
    }
    
    packageRadios.forEach(radio => {
        radio.addEventListener('change', updateSummary);
    });
    
    durasiSelect.addEventListener('change', updateSummary);
    
    // Inisialisasi summary
    updateSummary();
    
    // Form submission
    const orderForm = document.getElementById('ppnOrderForm');
    const successModal = document.getElementById('successModal');
    
    orderForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validasi form
        if (!document.getElementById('agree_terms').checked) {
            alert('Anda harus menyetujui syarat dan ketentuan');
            return;
        }
        
        // Simulasi pengiriman form
        successModal.style.display = 'flex';
    });
    
    // Modal controls
    document.querySelector('.btn-close-modal').addEventListener('click', function() {
        successModal.style.display = 'none';
        orderForm.reset();
        updateSummary();
    });
    
    // Close modal ketika klik di luar
    successModal.addEventListener('click', function(e) {
        if (e.target === successModal) {
            successModal.style.display = 'none';
            orderForm.reset();
            updateSummary();
        }
    });
});
@endsection

@endsection
