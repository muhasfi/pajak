@extends('admin.layouts.master')


@section('content')
<div class="container">
    <h2>Tambah Layanan</h2>
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi (point per baris)</label>
            <textarea name="deskripsi[]" class="form-control" rows="4" placeholder="Masukkan poin deskripsi..."></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
