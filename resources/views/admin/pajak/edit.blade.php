@extends('admin.layouts.master')
@section('title', 'Edit Layanan Pajak')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Layanan Pajak</h3>
            <p class="text-subtitle text-muted">Silakan ubah data layanan pajak di bawah ini</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Update Error!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form class="form" action="{{ route('admin.pajak.update', $pajak->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    {{-- Judul Layanan --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul Layanan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" 
                                   value="{{ old('judul', $pajak->judul) }}" 
                                   placeholder="Masukkan judul layanan" required>
                        </div>
                    </div>

                    {{-- Harga --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga" name="harga" min="0" 
                                       value="{{ old('harga', $pajak->harga) }}" placeholder="Masukkan harga" required>
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Layanan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" 
                                      placeholder="Masukkan deskripsi layanan" required>{{ old('deskripsi', $pajak->detail->deskripsi) }}</textarea>
                        </div>
                    </div>

                    {{-- Benefit --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Benefit Layanan <span class="text-danger">*</span></label>
                            <small class="text-muted d-block mb-2">Tekan Enter setelah mengetik setiap benefit, atau gunakan tombol tambah.</small>

                            <div id="benefit-container" class="mb-3">
                                @if(old('benefit'))
                                    @foreach(old('benefit') as $benefit)
                                        <div class="input-group mb-2 benefit-item">
                                            <input type="text" class="form-control benefit-input" name="benefit[]" value="{{ $benefit }}" required>
                                            <button type="button" class="btn btn-outline-danger remove-benefit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach($pajak->detail->benefit as $benefit)
                                        <div class="input-group mb-2 benefit-item">
                                            <input type="text" class="form-control benefit-input" name="benefit[]" value="{{ $benefit }}" required>
                                            <button type="button" class="btn btn-outline-danger remove-benefit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addBenefitField()">
                                    <i class="fas fa-plus"></i> Tambah Benefit
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="clearAllBenefits()">
                                    <i class="fas fa-trash"></i> Hapus Semua
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Preview Section --}}
                    {{-- <div class="col-md-12">
                        <hr>
                        <h5>Preview Layanan</h5>
                        <div class="card">
                            <div class="card-body">
                                <p><strong>Judul:</strong> <span id="preview-judul">{{ $pajak->judul }}</span></p>
                                <p><strong>Harga:</strong> <span id="preview-harga">Rp {{ number_format($pajak->harga, 0, ',', '.') }}</span></p>
                                <p><strong>Deskripsi:</strong> <span id="preview-deskripsi">{{ $pajak->detail->deskripsi }}</span></p>
                                <p><strong>Benefit:</strong></p>
                                <ul id="preview-benefit">
                                    @foreach($pajak->detail->benefit as $benefit)
                                        <li>{{ $benefit }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> --}}

                    {{-- Tombol --}}
                    <div class="form-group d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.pajak.show', $pajak->id) }}" class="btn btn-info me-2">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </a>
                        <a href="{{ route('admin.pajak.index') }}" class="btn btn-light-secondary me-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="button" class="btn btn-danger me-2" onclick="confirmReset()">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Layanan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal Reset --}}
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
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="resetForm()">Ya, Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tambah dan hapus field benefit
    window.addBenefitField = function(value = '') {
        const container = document.getElementById('benefit-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2 benefit-item';
        div.innerHTML = `
            <input type="text" class="form-control benefit-input" name="benefit[]" value="${value}" required>
            <button type="button" class="btn btn-outline-danger remove-benefit">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
        attachEvents(div);
        updatePreview();
    };

    window.clearAllBenefits = function() {
        const container = document.getElementById('benefit-container');
        if (container.children.length > 0 && confirm('Apakah Anda yakin ingin menghapus semua benefit?')) {
            container.innerHTML = '';
            updatePreview();
        }
    };

    function attachEvents(element) {
        const removeBtn = element.querySelector('.remove-benefit');
        removeBtn.addEventListener('click', () => {
            element.remove();
            updatePreview();
        });

        const input = element.querySelector('.benefit-input');
        input.addEventListener('input', updatePreview);
        input.addEventListener('keypress', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                window.addBenefitField();
            }
        });
    }

    function updatePreview() {
        document.getElementById('preview-judul').textContent = document.getElementById('judul').value;
        const hargaValue = parseInt(document.getElementById('harga').value) || 0;
        document.getElementById('preview-harga').textContent = 'Rp ' + hargaValue.toLocaleString('id-ID');
        document.getElementById('preview-deskripsi').textContent = document.getElementById('deskripsi').value;

        const benefitContainer = document.getElementById('preview-benefit');
        benefitContainer.innerHTML = '';
        document.querySelectorAll('.benefit-input').forEach(input => {
            if (input.value.trim() !== '') {
                const li = document.createElement('li');
                li.textContent = input.value;
                benefitContainer.appendChild(li);
            }
        });
    }

    // Init
    document.querySelectorAll('.benefit-item').forEach(attachEvents);
    ['judul', 'harga', 'deskripsi'].forEach(id => {
        document.getElementById(id).addEventListener('input', updatePreview);
    });
    updatePreview();
});
</script>
@endpush
