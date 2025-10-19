@extends('layouts.master')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="container py-5 my-5 d-flex justify-content-center">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 480px;">
        <div class="card-body text-center p-5">
            <div class="mb-3">
                <i class="fa-solid fa-circle-check text-success" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-success mb-2">Pesanan Berhasil Dibuat!</h4>

            @if ($order->payment_method == 'tunai' && $order->status == 'pending')
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">Menunggu Pembayaran</span>
            @elseif ($order->payment_method == 'qris' && $order->status == 'pending')
                <span class="badge bg-info text-dark px-3 py-2 mb-3">Menunggu Konfirmasi Pembayaran</span>
            @else
                <span class="badge bg-success px-3 py-2 mb-3">Pembayaran Berhasil</span>
            @endif

            <hr class="my-3">

            <h5 class="fw-bold mb-1">Kode Bayar</h5>
            <h4 class="text-primary fw-bolder mb-4">{{ $order->order_code }}</h4>

            <h5 class="fw-semibold text-start">Detail Pesanan</h5>
            <table class="table table-sm table-borderless mt-3 mb-1">
                <tbody>
                    @foreach ($orderItems as $orderItem)
                        <tr>
                            <td class="text-start">
                                {{ Str::limit($orderItem->product->name ?? $orderItem->product->judul, 25) }}
                                <small class="text-muted">x{{ $orderItem->quantity }}</small>
                            </td>
                            <td class="text-end">
                                {{ 'Rp'. number_format($orderItem->price, 0, ',','.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr class="my-2">

            <table class="table table-borderless mb-3">
                <tbody>
                    <tr>
                        <td class="text-start">Subtotal</td>
                        <td class="text-end">{{ 'Rp'. number_format($order->subtotal, 0, ',','.') }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Pajak (10%)</td>
                        <td class="text-end">{{ 'Rp'. number_format($order->tax, 0, ',','.') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-start">Total</td>
                        <td class="fw-bold text-end text-success">{{ 'Rp'. number_format($order->grand_total, 0, ',','.') }}</td>
                    </tr>
                </tbody>
            </table>

            @if ($order->payment_method == 'tunai')
                <p class="small text-muted mt-3">
                    Tunjukkan kode bayar ini ke kasir untuk menyelesaikan pembayaran.
                    <br>Jangan lupa senyum ya! 😊
                </p>
            @elseif ($order->payment_method == 'qris')
                <p class="small text-muted mt-3">
                    Yeay! Pembayaranmu telah dikonfirmasi. Terima kasih sudah berbelanja di <span class="text-success fw-semibold">Fruitables</span> 🍉
                </p>
            @endif

            <a href="{{ route('index') }}" class="btn btn-success w-100 mt-3 rounded-pill py-2 fw-semibold">
                <i class="fa-solid fa-house me-2"></i> Kembali ke Menu
            </a>
        </div>
    </div>
</div>
@endsection