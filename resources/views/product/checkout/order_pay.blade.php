@extends('layouts.master')

@section('title', 'Halaman Pembayaran')

@section('content')
<div class="container py-5 my-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 500px; width: 100%;">
        <div class="card-body text-center p-5">
            <div class="mb-3">
                <i class="fa-solid fa-chalkboard-user text-success" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-success mb-3">Selesaikan Pembayaranmu</h4>

            <div class="text-start mb-4">
                <p class="mb-1"><strong>Kode Transaksi:</strong> #{{ $order->order_code }}</p>
                <p class="mb-1"><strong>Total Pembayaran:</strong> 
                    <span class="text-success fw-semibold">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</span>
                </p>
                <p class="mb-1"><strong>Tanggal Transaksi:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                <p class="mb-1"><strong>Status:</strong> 
                    <span class="badge bg-info text-dark">{{ ucfirst($order->status) }}</span>
                </p>
            </div>

            <button id="pay-button" class="btn btn-success w-100 rounded-pill py-2 fw-semibold shadow-sm">
                <i class="fa-solid fa-credit-card me-2"></i> Bayar Sekarang
            </button>

            <p class="text-muted small mt-3 mb-0">
                Sistem pembayaran terintegrasi dengan <strong>Midtrans</strong>.  
                Jangan tutup halaman sampai pembayaran selesai.
            </p>
        </div>
    </div>
</div>

{{-- Midtrans & SweetAlert --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const snapToken = "{{ $order->snap_token }}";
    const orderStatus = "{{ $order->status }}";
    const expiredUrl = "{{ route('checkout.expired', $order->order_code) }}";
    const orderCode = "{{ $order->order_code }}";

    if(orderStatus === "expired"){
        window.location.href = expiredUrl;
        return;
    }

    function processPayment() {
        snap.pay(snapToken, {
            onSuccess: function(result) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pembayaran Berhasil 🎉',
                    confirmButtonColor: '#28a745'
                }).then(() => {
                    window.location.href = "/checkout/success/" + orderCode;
                });
            },
            onPending: function(result) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Menunggu Pembayaran',
                    text: 'Silakan selesaikan pembayaranmu terlebih dahulu.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ffc107'
                });
            },
            onError: function(result) {
                Swal.fire({
                    icon: 'error',
                    title: 'Pembayaran Gagal',
                    text: 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.',
                    confirmButtonText: 'Coba Lagi',
                    confirmButtonColor: '#dc3545'
                });
            }
        });
    }

    // Jalankan popup otomatis
    processPayment();
    document.getElementById('pay-button').addEventListener('click', processPayment);
});
</script>
@endsection
