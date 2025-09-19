@extends('admin.layouts.master')

@section('title', 'Detail Item Seminar')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Item Seminar</h5>
        <div class="btn-group">
            <a href="{{ route('item-seminars.edit', $itemSeminar->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('item-seminars.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                @if($itemSeminar->img)
                    <img src="{{ asset('storage/item_seminars/' . $itemSeminar->img) }}" 
                         alt="{{ $itemSeminar->nama }}" class="img-fluid rounded">
                @else
                    <div class="text-center text-muted py-5 border rounded">
                        <i class="bi bi-image" style="font-size: 3rem;"></i>
                        <p>Tidak ada gambar</p>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama</th>
                        <td>{{ $itemSeminar->nama }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $itemSeminar->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($itemSeminar->harga, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge {{ $itemSeminar->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $itemSeminar->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat pada</th>
                        <td>{{ $itemSeminar->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Diperbarui pada</th>
                        <td>{{ $itemSeminar->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection