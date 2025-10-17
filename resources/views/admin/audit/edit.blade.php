@extends('admin.layouts.master')
@section('title', 'Edit Audit')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Audit</h3>
            <p class="text-subtitle text-muted">Silakan ubah data audit sesuai kebutuhan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Update Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form class="form" action="{{ route('admin.audit.update', $audit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Judul Audit --}}
                        <div class="form-group">
                            <label for="judul">Judul Audit</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukkan Judul Audit"
                                required
                                value="{{ old('judul', $audit->judul) }}">
                        </div>

                        {{-- Harga --}}
                        <div class="form-group">
                            <label for="harga">Harga (Rp)</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga Audit"
                                required
                                value="{{ old('harga', $audit->harga) }}">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="Masukkan deskripsi audit"
                                rows="4"
                                required>{{ old('deskripsi', $audit->detail->first()->deskripsi ?? '') }}</textarea>
                        </div>

                        {{-- Benefit --}}
                        <div class="form-group">
                            <label for="benefit">Benefit</label>
                            <textarea class="form-control" id="benefit" name="benefit"
                                placeholder="Masukkan benefit, satu per baris"
                                rows="5">@if(isset($audit->detail->first()->benefit))@foreach(json_decode($audit->detail->first()->benefit) as $benefit){{ $benefit }}
                                @endforeach
                                @endif
                            </textarea>
                            <small class="text-muted">Gunakan satu baris untuk setiap benefit (contoh: “Meningkatkan efisiensi kerja”).</small>
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', $audit->is_active) == 1 ? 'checked' : '' }}>
                                <label for="is_active">Aktif / Tidak Aktif</label>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="form-group d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                <i class="bi bi-check-circle"></i> Simpan
                            </button>
                            <a href="{{ route('admin.audit.index') }}" class="btn btn-light-secondary me-1 mb-1">
                                Batal
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
