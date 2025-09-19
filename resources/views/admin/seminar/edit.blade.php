@extends('admin.layouts.master')

@section('title', 'Edit Item Seminar')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Item Seminar</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('item-seminars.update', $itemSeminar->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Item</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                       id="nama" name="nama" value="{{ old('nama', $itemSeminar->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                          id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $itemSeminar->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" 
                       id="harga" name="harga" value="{{ old('harga', $itemSeminar->harga) }}" required min="0">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Gambar</label>
                @if($itemSeminar->img)
                    <div class="mb-2">
                        <img src="{{ asset('storage/item_seminars/' . $itemSeminar->img) }}" 
                             alt="{{ $itemSeminar->nama }}" width="100" class="rounded">
                    </div>
                @endif
                <input type="file" class="form-control @error('img') is-invalid @enderror" 
                       id="img" name="img" accept="image/*">
                @error('img')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                       {{ old('is_active', $itemSeminar->is_active) ? 'checked' : '' }} value="1">
                <label class="form-check-label" for="is_active">Aktif</label>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('item-seminars.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection