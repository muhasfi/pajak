@extends('admin.layouts.master')


@section('content')
<div class="container">
    <h2>Edit Layanan</h2>
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $service->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $service->judul) }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi (point per baris)</label>
            @foreach($service->deskripsi as $point)
                <input type="text" name="deskripsi[]" class="form-control my-1" value="{{ $point }}">
            @endforeach
            <small class="text-muted">Tambah baris input jika perlu menambah deskripsi.</small>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $service->harga) }}">
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @if($service->gambar)
                <img src="{{ asset('storage/'.$service->gambar) }}" width="120" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
