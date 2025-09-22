@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Edit Seminar</h2>
    <form action="{{ route('admin.item_seminar.update', $item_seminar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $item_seminar->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $item_seminar->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $item_seminar->harga }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $item_seminar->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            @if($item_seminar->img)
                <img src="{{ asset('storage/'.$item_seminar->img) }}" width="120" class="mb-2"><br>
            @endif
            <input type="file" name="img" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $item_seminar->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$item_seminar->is_active ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
