@extends('admin.layouts.master')
@section('title', 'Edit Transfer')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Edit Transfer</h2>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi kesalahan input.
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.transfer.update', $transfer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label"><strong>Judul:</strong></label>
                <input type="text" name="judul" id="judul" class="form-control" 
                       placeholder="Masukkan judul transfer" value="{{ old('judul', $transfer->judul) }}">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label"><strong>Harga:</strong></label>
                <input type="number" name="harga" id="harga" class="form-control" 
                       placeholder="Masukkan harga" value="{{ old('harga', $transfer->harga) }}" step="0.01">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label"><strong>Deskripsi:</strong></label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi">{{ old('deskripsi', $transfer->detail->first()->deskripsi ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="benefit" class="form-label"><strong>Benefit:</strong></label>
                <textarea name="benefit" id="benefit" class="form-control" rows="4" placeholder="Masukkan benefit, satu item per baris">@if($transfer->detail->count() > 0)
@foreach(json_decode($transfer->detail->first()->benefit) as $benefit)
{{ trim($benefit) }}
@endforeach
@endif</textarea>
                <small class="text-muted">Masukkan satu benefit per baris</small>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update data
                        </button>
                        <a href="{{ route('admin.transfer.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
