@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Katalog Bimbel</h2>
    <div class="row">
        @foreach($items as $item)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $item->judul }}</h5>
                    <p>{{ Str::limit($item->deskripsi, 100) }}</p>
                    <p><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>
                    <a href="{{ route('customer.item_bimbel.show', $item->id) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
