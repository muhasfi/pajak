@extends('admin.layouts.master')

@section('title', 'Daftar Item Seminar')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Item Seminar</h5>
        <a href="{{ route('item-seminars.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Item
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($itemSeminars as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->img)
                                <img src="{{ asset('storage/item_seminars/' . $item->img) }}" 
                                     alt="{{ $item->nama }}" width="50" height="50" class="rounded">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 50, '...') }}</td>
                        <td>Rp {{ number_format($item->harga, 2, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Show -->
                                <a href="{{ route('item-seminars.show', $item->id) }}" 
                                   class="btn btn-sm btn-info d-flex align-items-center"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                    <i class="bi bi-eye me-1"></i> Detail
                                </a>
                                
                                <!-- Tombol Edit -->
                                <a href="{{ route('item-seminars.edit', $item->id) }}" 
                                   class="btn btn-sm btn-warning d-flex align-items-center"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Item">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('item-seminars.destroy', $item->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger d-flex align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Item">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada data item seminar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-group .btn,
    .d-flex.gap-2 .btn,
    .d-flex.gap-2 form {
        margin: 0 2px;
    }
    
    /* Tambahan styling untuk membuat tombol konsisten */
    .d-flex.gap-2 .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.2rem;
        min-width: 65px;
        justify-content: center;
    }
    
    /* Tooltip styling */
    .tooltip {
        font-size: 0.8rem;
    }
</style>

<script>
    // Inisialisasi tooltip Bootstrap
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection