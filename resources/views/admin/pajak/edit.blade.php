@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-white">
        <h4 class="mb-0">Edit Layanan Pajak: {{ $pajak->judul }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pajak.update', $pajak->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $pajak->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                                   id="harga" name="harga" value="{{ old('harga', $pajak->harga) }}" required min="0">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                          id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $pajak->detail->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Benefit Layanan <span class="text-danger">*</span></label>
                <small class="text-muted d-block mb-2">Tekan Enter setelah mengetik setiap benefit, atau gunakan tombol tambah</small>
                
                <div id="benefit-container" class="mb-3">
                    @if(old('benefit'))
                        @foreach(old('benefit') as $benefit)
                            <div class="input-group mb-2 benefit-item">
                                <input type="text" class="form-control benefit-input" name="benefit[]" 
                                       value="{{ $benefit }}" placeholder="Masukkan benefit layanan" required>
                                <button type="button" class="btn btn-outline-danger remove-benefit">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        @foreach($pajak->detail->benefit as $benefit)
                            <div class="input-group mb-2 benefit-item">
                                <input type="text" class="form-control benefit-input" name="benefit[]" 
                                       value="{{ $benefit }}" placeholder="Masukkan benefit layanan" required>
                                <button type="button" class="btn btn-outline-danger remove-benefit">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                @error('benefit')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
                @error('benefit.*')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addBenefitField()">
                        <i class="fas fa-plus"></i> Tambah Benefit
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="clearAllBenefits()">
                        <i class="fas fa-trash"></i> Hapus Semua
                    </button>
                </div>
            </div>

            <!-- Preview Section -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Preview Layanan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Judul:</strong>
                            <span id="preview-judul">{{ $pajak->judul }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>Harga:</strong>
                            <span id="preview-harga">Rp {{ number_format($pajak->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <strong>Deskripsi:</strong>
                        <p id="preview-deskripsi" class="mb-0">{{ $pajak->detail->deskripsi }}</p>
                    </div>
                    <div class="mt-2">
                        <strong>Benefit:</strong>
                        <ul id="preview-benefit" class="mb-0">
                            @foreach($pajak->detail->benefit as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('pajak.show', $pajak->id) }}" class="btn btn-info">
                        <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                    <a href="{{ route('pajak.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-danger" onclick="confirmReset()">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update Layanan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="resetModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengembalikan semua data ke nilai semula? Perubahan yang belum disimpan akan hilang.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="resetForm()">Ya, Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.benefit-item {
    transition: all 0.3s ease;
}

.benefit-item:hover {
    background-color: #f8f9fa;
}

.remove-benefit {
    transition: all 0.2s ease;
}

.remove-benefit:hover {
    background-color: #dc3545;
    color: white;
}

#preview-benefit {
    padding-left: 1.5rem;
}

#preview-benefit li {
    margin-bottom: 0.25rem;
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data awal untuk reset
        const initialData = {
            judul: "{{ $pajak->judul }}",
            harga: "{{ $pajak->harga }}",
            deskripsi: `{!! addslashes($pajak->detail->deskripsi) !!}`,
            benefits: @json($pajak->detail->benefit)
        };
    
        // Fungsi untuk menambah field benefit baru
        window.addBenefitField = function(value = '') {
            const container = document.getElementById('benefit-container');
            const newIndex = container.children.length; // Index baru untuk input
            
            const div = document.createElement('div');
            div.className = 'input-group mb-2 benefit-item';
            div.innerHTML = `
                <input type="text" class="form-control benefit-input" name="benefit[]" 
                       value="${value}" placeholder="Masukkan benefit layanan" required>
                <button type="button" class="btn btn-outline-danger remove-benefit">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            container.appendChild(div);
            
            // Pasang event listener untuk tombol hapus yang baru
            const removeButton = div.querySelector('.remove-benefit');
            removeButton.addEventListener('click', function() {
                this.closest('.benefit-item').remove();
                updatePreview();
            });
            
            // Pasang event listener untuk input yang baru
            const inputField = div.querySelector('.benefit-input');
            inputField.addEventListener('input', updatePreview);
            inputField.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    window.addBenefitField();
                }
            });
            
            updatePreview(); // Perbarui preview setelah menambah field
        };
    
        // Fungsi untuk menghapus semua benefit
        window.clearAllBenefits = function() {
            const container = document.getElementById('benefit-container');
            // Konfirmasi sebelum menghapus semua
            if (container.children.length > 0 && confirm('Apakah Anda yakin ingin menghapus semua benefit?')) {
                container.innerHTML = '';
                updatePreview();
            }
        };
    
        // Fungsi untuk meng-update preview
        function updatePreview() {
            // Update judul preview
            const judulInput = document.getElementById('judul');
            const previewJudul = document.getElementById('preview-judul');
            if (judulInput && previewJudul) {
                previewJudul.textContent = judulInput.value;
            }
            
            // Update harga preview
            const hargaInput = document.getElementById('harga');
            const previewHarga = document.getElementById('preview-harga');
            if (hargaInput && previewHarga) {
                const hargaValue = parseInt(hargaInput.value) || 0;
                previewHarga.textContent = 'Rp ' + hargaValue.toLocaleString('id-ID');
            }
            
            // Update deskripsi preview
            const deskripsiInput = document.getElementById('deskripsi');
            const previewDeskripsi = document.getElementById('preview-deskripsi');
            if (deskripsiInput && previewDeskripsi) {
                previewDeskripsi.textContent = deskripsiInput.value;
            }
            
            // Update benefit preview
            const benefitContainer = document.getElementById('preview-benefit');
            if (benefitContainer) {
                benefitContainer.innerHTML = '';
                const benefitInputs = document.querySelectorAll('input[name="benefit[]"]');
                
                benefitInputs.forEach(input => {
                    if (input.value.trim() !== '') {
                        const li = document.createElement('li');
                        li.textContent = input.value;
                        benefitContainer.appendChild(li);
                    }
                });
            }
        }
    
        // Event listener untuk tombol hapus yang sudah ada
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-benefit') || 
                e.target.closest('.remove-benefit')) {
                const button = e.target.classList.contains('remove-benefit') ? 
                              e.target : e.target.closest('.remove-benefit');
                button.closest('.benefit-item').remove();
                updatePreview();
            }
        });
    
        // Event listener untuk input real-time
        const inputs = ['judul', 'harga', 'deskripsi'];
        inputs.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', updatePreview);
            }
        });
    
        // Event listener untuk input benefit yang sudah ada
        document.querySelectorAll('.benefit-input').forEach(input => {
            input.addEventListener('input', updatePreview);
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    window.addBenefitField();
                }
            });
        });
    
        // Inisialisasi preview pertama kali
        updatePreview();
    });
    </script>
@endpush