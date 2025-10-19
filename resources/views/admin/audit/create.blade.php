<!-- resources/views/audits/create.blade.php -->
@extends('admin.layouts.master')
@section('title', 'Tambah Audit')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Tambah Audit Baru</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="card shadow-sm border-0 rounded-4">
 <div class="card-body p-4">
    <form action="{{ route('admin.audit.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Judul Audit:</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" value="{{ old('judul') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Harga (Rp):</strong>
                    <input type="number" step="0.01" name="harga" class="form-control" placeholder="Masukkan Harga" value="{{ old('harga') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Benefit (Satu poin per baris):</strong>
                    <textarea class="form-control" style="height:150px" name="benefit" placeholder="Masukkan Benefit, satu poin per baris">{{ old('benefit') }}</textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.audit.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </form>
 </div>
</div>

@endsection