@extends('layouts.app')

@section('title', 'Tambah In House Training')

@section('content')
<h3>Tambah In House Training</h3>

<form action="{{ route('in_house_trainings.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
           value="{{ old('judul') }}" required>
    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
              rows="4">{{ old('deskripsi') }}</textarea>
    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal"
             class="form-control @error('tanggal') is-invalid @enderror"
             value="{{ old('tanggal') }}" required>
      @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" name="harga" id="harga"
             class="form-control @error('harga') is-invalid @enderror"
             step="0.01" value="{{ old('harga') }}" required>
      @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="mb-3">
    <label for="gambar" class="form-label">Gambar (opsional)</label>
    <input type="file" name="gambar" id="gambar"
           class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="{{ route('in_house_trainings.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
