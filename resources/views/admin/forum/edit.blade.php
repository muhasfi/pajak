@extends('admin.layouts.master')
@section('title', 'Edit Balasan Komentar')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <!-- Breadcrumb Navigation -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-transparent p-0">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li> --}}
                    {{-- <li class="breadcrumb-item"><a href="{{ route('admin.comments') }}" class="text-decoration-none">Komentar</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Edit Balasan</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <!-- Card Header -->
                <div class="card-header bg-gradient border-0 py-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1 text-white fw-bold">
                                <i class="fa-solid fa-pen-to-square me-2"></i>Edit Balasan Admin
                            </h4>
                            <p class="mb-0 text-white-50 small">Perbarui konten balasan komentar</p>
                        </div>
                        <a href="{{ route('admin.comments') }}" class="btn btn-light btn-sm rounded-pill shadow-sm px-3">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4 p-md-5">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-circle-check me-2 fs-5"></i>
                                <div>{{ session('success') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Information Box -->
                    <div class="alert alert-info border-0 rounded-3 mb-4" role="alert">
                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-3 mt-1"></i>
                            <div>
                                <strong>Informasi:</strong> Pastikan balasan Anda profesional, informatif, dan sesuai dengan kebijakan komunitas.
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('reply.update', $reply) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Original Comment Context (Optional) -->
                        @if(isset($reply->comment))
                        <div class="mb-4">
                            <label class="form-label text-muted small text-uppercase fw-semibold mb-2">
                                <i class="fa-solid fa-comment me-1"></i> Komentar Asli
                            </label>
                            <div class="bg-light border border-2 rounded-3 p-3">
                                <p class="mb-0 text-secondary">{{ Str::limit($reply->comment->content, 200) }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Reply Content -->
                        <div class="mb-4">
                            <label for="content" class="form-label fw-semibold mb-2">
                                <i class="fa-solid fa-message me-1"></i> Isi Balasan
                                <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                name="content" 
                                id="content" 
                                class="form-control form-control-lg rounded-3 border-2 @error('content') is-invalid @enderror" 
                                rows="6" 
                                placeholder="Tulis balasan Anda di sini..."
                                required
                                style="resize: vertical; min-height: 150px;"
                            >{{ old('content', $reply->content) }}</textarea>
                            
                            @error('content')
                                <div class="invalid-feedback d-flex align-items-center">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            <div class="form-text mt-2">
                                <i class="fa-solid fa-lightbulb me-1"></i>
                                Minimal 10 karakter. Gunakan bahasa yang sopan dan profesional.
                            </div>
                        </div>

                        <!-- Character Counter (Optional) -->
                        <div class="mb-4">
                            <small class="text-muted">
                                <i class="fa-solid fa-keyboard me-1"></i>
                                Jumlah karakter: <span id="charCount">{{ strlen(old('content', $reply->content)) }}</span>
                            </small>
                        </div>

                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center gap-3">
                            <div class="d-flex gap-2 order-2 order-sm-1">
                                <a href="{{ route('admin.comments') }}" class="btn btn-outline-secondary rounded-pill px-4 flex-fill flex-sm-grow-0">
                                    <i class="fa-solid fa-xmark me-1"></i> Batal
                                </a>
                            </div>
                            <div class="order-1 order-sm-2">
                                <button type="submit" class="btn btn-primary rounded-pill px-4 w-100 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                    <i class="fa-solid fa-check me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-light border-0 py-3 text-center">
                    <small class="text-muted">
                        <i class="fa-solid fa-clock me-1"></i>
                        Terakhir diperbarui: {{ $reply->updated_at->format('d M Y, H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Character Counter
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('content');
        const charCount = document.getElementById('charCount');
        
        if (textarea && charCount) {
            textarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });
        }

        // Auto-resize textarea
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
</script>
@endpush

@push('styles')
<style>
    .card {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .btn-outline-secondary:hover {
        transform: translateY(-1px);
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        font-size: 1.2rem;
    }

    .alert {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush
@endsection