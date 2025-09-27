@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Detail Transaksi</h3>

    <div class="card mb-4">
        <div class="card-body">
            <h5>Kode Transaksi: {{ $order->order_code }}</h5>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            <p><strong>Nama:</strong> {{ $order->fullname }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
        </div>
    </div>

    <h5>Produk</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Tipe</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>PPN (10%)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name ?? $item->product->judul ?? '-' }}</td>
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $item->product_type === 'item' ? 'Book' : 'Bimbel' }}
                        </span>
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->price,0,',','.') }}</td>
                    <td>Rp {{ number_format($item->tax,0,',','.') }}</td>
                    <td>Rp {{ number_format($item->total_price,0,',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end mt-3">
        <p><strong>Subtotal:</strong> Rp {{ number_format($order->subtotal,0,',','.') }}</p>
        <p><strong>PPN (10%):</strong> Rp {{ number_format($order->tax,0,',','.') }}</p>
        <h4><strong>Total:</strong> Rp {{ number_format($order->grand_total,0,',','.') }}</h4>
    </div>

    {{-- Tombol Bayar jika masih pending --}}
    @if($order->status === 'pending')
        <div class="mt-3 text-end">
            <a href="{{ route('checkout.orderPay', $order->order_code) }}" 
               class="btn btn-success">
                <i class="fa fa-credit-card me-2"></i> Bayar Sekarang
            </a>
        </div>
    @endif

    <a href="{{ route('transactions.transaction') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
