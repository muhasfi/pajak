@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Layanan Litigasi Baru</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('litigasi.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terdapat masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('litigasi.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Judul Layanan:</strong>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul layanan" value="{{ old('judul') }}" required>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Harga:</strong>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" value="{{ old('harga') }}" required>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Masukkan deskripsi lengkap" required>{{ old('deskripsi') }}</textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Benefit:</strong>
                <button type="button" class="btn btn-sm btn-success mb-2" onclick="addBenefit()">Tambah Benefit</button>
                <div id="benefits-container">
                    <div class="benefit-input input-group mb-2">
                        <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
                        <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">Hapus</button>
                    </div>
                </div>
                <small class="text-muted">Klik "Tambah Benefit" untuk menambah benefit lainnya</small>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

{{-- Script tambahan untuk memastikan fungsi berjalan --}}
<script>
    // Pastikan DOM sudah loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded - benefit functions ready');
    });
</script>
@endsection