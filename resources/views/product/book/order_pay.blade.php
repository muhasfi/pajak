@extends('layouts.master')

@section('content')
<br>
<p>d</p>
<div class="container py-5">
<<<<<<< HEAD
    <td>Bayar Pesanan #{{ $order->order_code }}<td>
    <td>Total: Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
    <td>Tanggal Pesanan: {{ $order->created_at->format('d M Y, H:i') }}</td>
    <td>Status: {{ ucfirst($order->status) }}</td>
=======
    <td>Bayar Pesanan #{{ $order->order_code }}<td> <br>
    <td>Total: Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td><br>
    <td>Tanggal Pesanan: {{ $order->created_at->format('d M Y, H:i') }}</td><br>
    <td>Status: {{ ucfirst($order->status) }}</td><br>
>>>>>>> ba349360a00ab11cd19d2be99968025aa6592a33

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
