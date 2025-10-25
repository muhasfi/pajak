@extends('layouts.master')

@section('title', 'Pesanan Kadaluarsa')

@section('content')
<div class="container py-5 my-5 d-flex justify-content-center">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 480px;">
        <div class="card-body text-center p-5">
            <div class="mb-3">
                <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-danger mb-2">Order Telah Kadaluarsa!</h4>
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">Pembayaran Tidak Selesai</span>

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
                        <td class="fw-bold text-end text-danger">{{ 'Rp'. number_format($order->grand_total, 0, ',','.') }}</td>
                    </tr>
                </tbody>
            </table>

            <p class="small text-muted mt-3">
                Order ini telah kadaluarsa karena pembayaran tidak diselesaikan.
                <br>Silakan lakukan pembayaran ulang untuk mengamankan pesananmu.
            </p>

            {{-- <a href="{{ route('product.checkout.orderPay', $order->order_code) }}" class="btn btn-warning w-100 mt-3 rounded-pill py-2 fw-semibold">
                <i class="fa-solid fa-repeat me-2"></i> Bayar Lagi
            </a> --}}

            <a href="{{ route('index') }}" class="btn btn-danger w-100 mt-2 rounded-pill py-2 fw-semibold">
                <i class="fa-solid fa-house me-2"></i> Kembali ke Menu
            </a>
        </div>
    </div>
</div>
@endsection
