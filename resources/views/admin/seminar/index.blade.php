<!-- resources/views/item_seminar/index.blade.php -->
@extends('admin.layouts.master')

@section('title', 'Daftar Seminar')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="h3">Daftar Seminar</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('item-seminar.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Seminar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="80">Gambar</th>
                        <th>Judul Seminar</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Pembicara</th>
                        <th>Harga</th>
                        <th>Kuota</th>
                        <th>Level</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($seminars as $seminar)
                    <tr>
                        <td>
                            @if($seminar->gambar)
                                <img src="{{ asset('storage/' . $seminar->gambar) }}" 
                                     alt="{{ $seminar->judul }}" 
                                     class="img-thumbnail" 
                                     style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $seminar->judul }}</strong>
                            <br>
                            <small class="text-muted">{{ Str::limit($seminar->deskripsi, 50) }}</small>
                        </td>
                        <td>
                            <i class="fas fa-calendar text-primary me-1"></i>
                            {{ $seminar->tanggal->format('d M Y') }}
                        </td>
                        <td>
                            <i class="fas fa-map-marker-alt text-danger me-1"></i>
                            {{ $seminar->detailSeminar->lokasi }}
                        </td>
                        <td>
                            <i class="fas fa-user-tie text-info me-1"></i>
                            {{ $seminar->detailSeminar->pembicara }}
                        </td>
                        <td>
                            <span class="fw-bold text-success">Rp {{ number_format($seminar->harga, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                <i class="fas fa-users me-1"></i>
                                {{ number_format($seminar->detailSeminar->kuota_peserta, 0, ',', '.') }}
                            </span>
                        </td>
                        <td>
                            @php
                                $levelColors = [
                                    'Beginner' => 'bg-success',
                                    'Intermediate' => 'bg-warning text-dark',
                                    'Advanced' => 'bg-danger'
                                ];
                            @endphp
                            <span class="badge {{ $levelColors[$seminar->detailSeminar->level] ?? 'bg-secondary' }}">
                                {{ $seminar->detailSeminar->level }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('item-seminar.show', $seminar->id) }}" 
                                   class="btn btn-info" 
                                   data-bs-toggle="tooltip" 
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('item-seminar.edit', $seminar->id) }}" 
                                   class="btn btn-warning" 
                                   data-bs-toggle="tooltip" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('item-seminar.destroy', $seminar->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger" 
                                            data-bs-toggle="tooltip" 
                                            title="Hapus"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus seminar ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-inbox fa-3x mb-3"></i>
                                <h5>Belum ada seminar</h5>
                                <p>Mulai dengan menambahkan seminar pertama Anda.</p>
                                <a href="{{ route('item-seminar.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Seminar
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($seminars->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    Menampilkan {{ $seminars->firstItem() }} - {{ $seminars->lastItem() }} dari {{ $seminars->total() }} seminar
                </div>
                <nav>
                    {{ $seminars->links() }}
                </nav>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endpush