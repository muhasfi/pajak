@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Riwayat Transaksi</h3>

    @if($orders->isEmpty())
        <p>Belum ada transaksi.</p>
    @else
        <div class="list-group">
            @foreach($orders as $order)
                <a href="{{ route('transactions.show', $order->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>{{ $order->order_code }}</strong><br>
                            <small>Status: {{ ucfirst($order->status) }}</small><br>
                            <small>Tanggal: {{ $order->created_at->format('d M Y H:i') }}</small><br>

                            {{-- Tambahkan daftar produk --}}
                            <ul class="mb-0 mt-2">
                                @foreach($order->orderItems as $item)
                                    <li>
                                        {{ $item->product->name ?? $item->product->judul ?? '-' }}
                                        ({{ $item->quantity }}) 
                                        - 
                                        <span class="badge bg-info text-dark">
                                            {{ $item->product_type === 'item' ? 'Book' : 'Bimbel' }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <strong>Rp {{ number_format($order->grand_total,0,',','.') }}</strong>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
