@extends('admin.layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Edit Layanan
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('layanan-pt.update', ['layanan_pt' => $layanan_pt->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" 
                               value="{{ old('judul', $layanan_pt->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $layanan_pt->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" 
                               value="{{ old('harga', $layanan_pt->harga) }}" 
                               min="0" step="1000" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Detail Layanan Existing -->
                    @if($layanan_pt->detailLayanans->count() > 0)
                    <div class="mb-4">
                        <label class="form-label">Detail Langkah-langkah</label>
                        <div class="list-group">
                            @foreach($layanan_pt->detailLayanans as $detail)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $detail->nama_langkah }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $detail->keterangan }}</small>
                                    <br>
                                    <small class="text-info">Estimasi: {{ $detail->estimasi_hari }} hari</small>
                                </div>
                                <form action="{{ route('detail-layanan.destroy', $detail->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus langkah ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('layanan-pt.show', $layanan_pt->id) }}" 
                           class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Update Layanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection