@extends('admin.layouts.master')
@section('title', 'Edit Webinar')
@section('content')
<div class="container-fluid px-0">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Webinar: {{ $webinar->judul }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.webinar.update', $webinar->id) }}" method="POST" enctype="multipart/form-data" id="webinarForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Informasi Utama Webinar -->
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2">Informasi Utama Webinar</h5>
                                    
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Webinar <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control @error('judul') is-invalid @enderror" 
                                               id="judul" 
                                               name="judul" 
                                               value="{{ old('judul', $webinar->judul) }}" 
                                               required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                                  id="deskripsi" 
                                                  name="deskripsi" 
                                                  rows="4" 
                                                  required>{{ old('deskripsi', $webinar->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal & Waktu <span class="text-danger">*</span></label>
                                                <input type="datetime-local" 
                                                       class="form-control @error('tanggal') is-invalid @enderror" 
                                                       id="tanggal" 
                                                       name="tanggal" 
                                                       value="{{ old('tanggal', \Carbon\Carbon::parse($webinar->tanggal)->format('Y-m-d\TH:i')) }}" 
                                                       required>
                                                @error('tanggal')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                                                <input type="number" 
                                                       class="form-control @error('harga') is-invalid @enderror" 
                                                       id="harga" 
                                                       name="harga" 
                                                       value="{{ old('harga', $webinar->harga) }}" 
                                                       min="0" 
                                                       step="1000" 
                                                       required>
                                                @error('harga')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Webinar</label>
                                        <input type="file" 
                                               class="form-control @error('gambar') is-invalid @enderror" 
                                               id="gambar" 
                                               name="gambar" 
                                               accept="image/*">
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            Biarkan kosong jika tidak ingin mengubah gambar. 
                                            Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                                        </div>
                                    </div>

                                    <!-- Gambar saat ini -->
                                    @if($webinar->gambar)
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Saat Ini</label>
                                        <div>
                                            <img src="{{ asset('storage/' . $webinar->gambar) }}" 
                                                 alt="{{ $webinar->judul }}" 
                                                 class="img-thumbnail" 
                                                 style="max-height: 200px;">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image">
                                                <label class="form-check-label" for="remove_image">
                                                    Hapus gambar saat ini
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- Detail Pembicara -->
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="border-bottom pb-2 mb-0">Detail Pembicara & Agenda</h5>
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="addSpeaker">
                                            <i class="bi bi-plus-circle"></i> Tambah Pembicara
                                        </button>
                                    </div>

                                    <div id="speakers-container">
                                        @foreach($webinar->details as $index => $detail)
                                        <div class="speaker-item card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h6 class="card-title mb-0">Pembicara {{ $index + 1 }}</h6>
                                                    <button type="button" class="btn btn-sm btn-danger remove-speaker">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Pembicara <span class="text-danger">*</span></label>
                                                            <input type="text" 
                                                                   class="form-control" 
                                                                   name="pembicara[]" 
                                                                   value="{{ old('pembicara.' . $index, $detail->pembicara) }}" 
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Topik <span class="text-danger">*</span></label>
                                                            <input type="text" 
                                                                   class="form-control" 
                                                                   name="topik[]" 
                                                                   value="{{ old('topik.' . $index, $detail->topik) }}" 
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Waktu Mulai <span class="text-danger">*</span></label>
                                                            <input type="time" 
                                                                   class="form-control" 
                                                                   name="waktu_mulai[]" 
                                                                   value="{{ old('waktu_mulai.' . $index, $detail->waktu_mulai) }}" 
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Waktu Selesai <span class="text-danger">*</span></label>
                                                            <input type="time" 
                                                                   class="form-control" 
                                                                   name="waktu_selesai[]" 
                                                                   value="{{ old('waktu_selesai.' . $index, $detail->waktu_selesai) }}" 
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Materi yang Dibahas</label>
                                                    <textarea class="form-control" 
                                                              name="materi[]" 
                                                              rows="3" 
                                                              placeholder="Poin-poin materi yang akan dibahas...">{{ old('materi.' . $index, $detail->materi) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Preview Gambar -->
                                <div class="sticky-top" style="top: 20px;">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0">Preview Gambar Baru</h6>
                                        </div>
                                        <div class="card-body text-center">
                                            <div id="imagePreview" class="mb-3" style="display: none;">
                                                <img id="preview" class="img-fluid rounded" 
                                                     style="max-height: 200px; object-fit: cover;">
                                            </div>
                                            <div id="noImage" class="text-muted">
                                                <i class="bi bi-image" style="font-size: 48px;"></i>
                                                <p class="mt-2 mb-0">Gambar baru akan ditampilkan di sini</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Informasi Webinar -->
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h6 class="mb-0">Informasi Webinar</h6>
                                        </div>
                                        <div class="card-body">
                                            <dl class="mb-0">
                                                <dt>Dibuat Pada</dt>
                                                <dd>{{ $webinar->created_at->format('d M Y H:i') }}</dd>
                                                
                                                <dt>Diupdate Pada</dt>
                                                <dd>{{ $webinar->updated_at->format('d M Y H:i') }}</dd>
                                                
                                                <dt>Jumlah Pembicara</dt>
                                                <dd>{{ $webinar->details->count() }}</dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <!-- Informasi Form -->
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h6 class="mb-0">Informasi</h6>
                                        </div>
                                        <div class="card-body">
                                            <small class="text-muted">
                                                <p>Field dengan tanda <span class="text-danger">*</span> wajib diisi.</p>
                                                <p>Anda dapat menambahkan atau menghapus pembicara.</p>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('admin.webinar.index') }}" class="btn btn-secondary me-md-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Update Webinar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Template untuk pembicara baru -->
<template id="speaker-template">
    <div class="speaker-item card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="card-title mb-0">Pembicara Baru</h6>
                <button type="button" class="btn btn-sm btn-danger remove-speaker">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Pembicara <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="pembicara[]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Topik <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="topik[]" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Waktu Mulai <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" name="waktu_mulai[]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Waktu Selesai <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" name="waktu_selesai[]" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Materi yang Dibahas</label>
                <textarea class="form-control" name="materi[]" rows="3" 
                          placeholder="Poin-poin materi yang akan dibahas..."></textarea>
            </div>
        </div>
    </div>
</template>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview gambar baru
    const gambarInput = document.getElementById('gambar');
    const preview = document.getElementById('preview');
    const imagePreview = document.getElementById('imagePreview');
    const noImage = document.getElementById('noImage');

    gambarInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block';
                noImage.style.display = 'none';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
            noImage.style.display = 'block';
        }
    });

    // Manajemen pembicara
    const speakersContainer = document.getElementById('speakers-container');
    const addSpeakerBtn = document.getElementById('addSpeaker');
    const speakerTemplate = document.getElementById('speaker-template');

    addSpeakerBtn.addEventListener('click', function() {
        const speakerClone = speakerTemplate.content.cloneNode(true);
        const removeBtn = speakerClone.querySelector('.remove-speaker');
        
        removeBtn.addEventListener('click', function() {
            if (document.querySelectorAll('.speaker-item').length > 1) {
                this.closest('.speaker-item').remove();
            } else {
                alert('Minimal harus ada satu pembicara');
            }
        });

        speakersContainer.appendChild(speakerClone);
    });

    // Setup remove button untuk pembicara yang sudah ada
    document.querySelectorAll('.remove-speaker').forEach(btn => {
        btn.addEventListener('click', function() {
            if (document.querySelectorAll('.speaker-item').length > 1) {
                this.closest('.speaker-item').remove();
            } else {
                alert('Minimal harus ada satu pembicara');
            }
        });
    });

    // Validasi waktu
    document.addEventListener('change', function(e) {
        if (e.target.name === 'waktu_mulai[]' || e.target.name === 'waktu_selesai[]') {
            const speakerItem = e.target.closest('.speaker-item');
            const waktuMulai = speakerItem.querySelector('input[name="waktu_mulai[]"]');
            const waktuSelesai = speakerItem.querySelector('input[name="waktu_selesai[]"]');
            
            if (waktuMulai.value && waktuSelesai.value && waktuMulai.value >= waktuSelesai.value) {
                alert('Waktu selesai harus setelah waktu mulai');
                waktuSelesai.value = '';
            }
        }
    });
});
</script>

<style>
.bi::before {
    display: inline-block;
    width: 1em;
    height: 1em;
    background-size: cover;
}
.bi-arrow-left::before { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z'/%3E%3C/svg%3E"); }
.bi-plus-circle::before { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'%3E%3Cpath d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/%3E%3Cpath d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/%3E%3C/svg%3E"); }
.bi-trash::before { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'%3E%3Cpath d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/%3E%3Cpath fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/%3E%3C/svg%3E"); }
.bi-image::before { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'%3E%3Cpath d='M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/%3E%3Cpath d='M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z'/%3E%3C/svg%3E"); }
</style>
@endsection