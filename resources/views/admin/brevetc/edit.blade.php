@extends('admin.layouts.master')
@section('title', 'Edit Brevet C')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Data Brevet C</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.brevetc.update', $brevetC->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($brevetC->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $brevetC->gambar) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul *</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $brevetC->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari *</label>
                        <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" value="{{ old('hari', $brevetC->hari) }}" required>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $brevetC->tanggal_mulai->format('Y-m-d')) }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $brevetC->tanggal_selesai->format('Y-m-d')) }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('waktu_pelaksanaan') is-invalid @enderror" 
                            id="waktu_pelaksanaan" name="waktu_pelaksanaan" 
                            value="{{ old('waktu_pelaksanaan', \Carbon\Carbon::parse($brevetC->waktu_pelaksanaan)->format('H:i')) }}" required>

                            @error('waktu_pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $brevetC->lokasi) }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $brevetC->harga) }}" min="0" step="0.01" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $brevetC->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                            @foreach($brevetC->details as $detail)
                                <input type="url" 
                                    class="form-control mb-2"
                                    name="file_link[]" 
                                    value="{{ old('file_link.' . $loop->index, $detail->file_path) }}">
                            @endforeach
                    </div>
            </div>

            <!-- Fasilitas Section -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Fasilitas</h6>
                    <button type="button" class="btn btn-sm btn-success" id="addFasilitas">
                        <i class="fas fa-plus"></i> Tambah Fasilitas
                    </button>
                </div>
                <div class="card-body" id="fasilitas-container">
                    @if(old('fasilitas'))
                        @foreach(old('fasilitas') as $index => $fasilitas)
                            <div class="row fasilitas-item mb-3">
                                <div class="col-md-5">
                                    <label class="form-label">Fasilitas *</label>
                                    <input type="text" class="form-control" name="fasilitas[]" value="{{ $fasilitas }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan[]" value="{{ old('keterangan')[$index] ?? '' }}">
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="button" class="btn btn-danger btn-sm remove-fasilitas" style="display: {{ $index > 0 ? 'block' : 'none' }};">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @elseif($brevetC->details->count() > 0)
                        @foreach($brevetC->details->sortBy('urutan') as $index => $detail)
                            <div class="row fasilitas-item mb-3">
                                <div class="col-md-5">
                                    <label class="form-label">Fasilitas *</label>
                                    <input type="text" class="form-control" name="fasilitas[]" value="{{ $detail->fasilitas }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan[]" value="{{ $detail->keterangan }}">
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="button" class="btn btn-danger btn-sm remove-fasilitas" style="display: {{ $index > 0 ? 'block' : 'none' }};">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row fasilitas-item mb-3">
                            <div class="col-md-5">
                                <label class="form-label">Fasilitas *</label>
                                <input type="text" class="form-control" name="fasilitas[]" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan[]">
                            </div>
                            <div class="col-md-1">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-danger btn-sm remove-fasilitas" style="display: none;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('admin.brevetc.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
document.getElementById('addFasilitas').addEventListener('click', function() {
    const container = document.getElementById('fasilitas-container');
    const newItem = container.firstElementChild.cloneNode(true);
    
    // Clear values
    newItem.querySelector('input[name="fasilitas[]"]').value = '';
    newItem.querySelector('input[name="keterangan[]"]').value = '';
    
    // Show remove button
    newItem.querySelector('.remove-fasilitas').style.display = 'block';
    
    container.appendChild(newItem);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-fasilitas') || e.target.closest('.remove-fasilitas')) {
        if (document.querySelectorAll('.fasilitas-item').length > 1) {
            const button = e.target.classList.contains('remove-fasilitas') ? e.target : e.target.closest('.remove-fasilitas');
            button.closest('.fasilitas-item').remove();
        }
    }
});
</script>
@endsection