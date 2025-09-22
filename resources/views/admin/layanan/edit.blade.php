@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h3>Edit Layanan</h3>
    <form action="{{ route('item_layanan.update',$item_layanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $item_layanan->judul }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item_layanan->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $item_layanan->harga }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                {{ $item_layanan->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Aktif</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('item_layanan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
