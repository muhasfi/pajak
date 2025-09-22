@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h3>Tambah Layanan</h3>
    <form action="{{ route('item_layanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi (gunakan Enter untuk poin baru)</label>
            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis tiap poin di baris baru, contoh:
        - Poin pertama
        - Poin kedua"></textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('item_layanan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
