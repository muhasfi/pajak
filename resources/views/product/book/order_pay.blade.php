@extends('layouts.master')

@section('content')
<br>
<p>d</p>
<div class="container py-5">
    <p>Bayar Pesanan #{{ $order->order_code }}<p>
    <p>Total: Rp{{ number_format($order->grand_total, 0, ',', '.') }}</p>
    <p>Tanggal Pesanan: {{ $order->created_at->format('d M Y, H:i') }}</p>
    <p>Status: {{ ucfirst($order->status) }}</p>

    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // langsung jalankan popup begitu halaman terbuka
    snap.pay("{{ $order->snap_token }}", {
        onSuccess: function(result) {
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Berhasil!',
                text: 'Terima kasih atas pembayaran Anda',
                confirmButtonText: 'OK',
                confirmButtonColor: '#28a745'
            }).then((result) => {
                window.location.href = "/checkout/success/{{ $order->order_code }}";
            });
        },
        onPending: function(result) {
            Swal.fire({
                icon: 'warning',
                title: 'Menunggu Pembayaran',
                text: 'Silakan selesaikan pembayaran Anda',
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

     window.addEventListener("popstate", function () {
        window.location.href = "/book";
    });


    document.getElementById('pay-button').addEventListener('click', function () {
    snap.pay("{{ $order->snap_token }}", {
        onSuccess: function(result) {
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Berhasil!',
                text: 'Terima kasih atas pembayaran Anda',
                confirmButtonText: 'OK',
                confirmButtonColor: '#28a745'
            }).then((result) => {
                window.location.href = "/checkout/success/{{ $order->order_code }}";
            });
        },
        onPending: function(result) {
            Swal.fire({
                icon: 'warning',
                title: 'Menunggu Pembayaran',
                text: 'Silakan selesaikan pembayaran Anda',
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
});
});
</script>
@endsection
