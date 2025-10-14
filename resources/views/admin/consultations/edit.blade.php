@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Konsultasi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ route('consultations.index') }}"> 
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terdapat masalah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Data Konsultasi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label"><strong>Judul:</strong></label>
                            <input type="text" name="judul" value="{{ old('judul', $consultation->judul) }}" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   placeholder="Masukkan Judul Konsultasi">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                            <label for="deskripsi" class="form-label"><strong>Deskripsi:</strong></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      style="height: 200px" name="deskripsi" 
                                      placeholder="Masukkan Deskripsi Lengkap">{{ old('deskripsi', $consultation->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-warning me-md-2">
                                <i class="fas fa-save"></i> Update Data
                            </button>
                            <a href="{{ route('consultations.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Info Card -->
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h6 class="mb-0"><i class="fas fa-info-circle"></i> Informasi</h6>
        </div>
        <div class="card-body">
            <p class="mb-1"><strong>ID Konsultasi:</strong> {{ $consultation->id }}</p>
            <p class="mb-1"><strong>Dibuat pada:</strong> {{ $consultation->created_at->format('d M Y H:i') }}</p>
            <p class="mb-0"><strong>Terakhir diupdate:</strong> {{ $consultation->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .form-label {
        font-weight: 600;
        color: #495057;
    }
    
    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border-radius: 0.5rem;
    }
    
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
        font-weight: 600;
    }
    
    .btn {
        border-radius: 0.375rem;
    }
    
    .form-control {
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>
@endsection