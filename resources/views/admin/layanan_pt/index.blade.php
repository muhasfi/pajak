@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Layanan PT</h1>
        <a href="{{ route('layanan-pt.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Layanan Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">No</th>
                            <th>Judul Layanan</th>
                            <th width="150">Harga</th>
                            <th>Benefit</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($layanans as $key => $layanan)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $layanan->judul }}</strong>
                                @if($layanan->detail && $layanan->detail->deskripsi)
                                    <br>
                                    <small class="text-muted">
                                        {{ Str::limit($layanan->detail->deskripsi, 80) }}
                                    </small>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-success">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                @if($layanan->detail && $layanan->detail->benefit)
                                    <!-- Versi 1: List dengan bullet points -->
                                    <ul class="list-unstyled mb-0">
                                        @foreach(array_slice($layanan->detail->benefit, 0, 3) as $benefit)
                                            <li class="mb-1">
                                                <small>
                                                    <i class="fas fa-check-circle text-success me-1"></i>
                                                    {{ $benefit }}
                                                </small>
                                            </li>
                                        @endforeach
                                        
                                        @if(count($layanan->detail->benefit) > 3)
                                            <li>
                                                <small class="text-muted">
                                                    +{{ count($layanan->detail->benefit) - 3 }} benefit lainnya...
                                                </small>
                                            </li>
                                        @endif
                                    </ul>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('layanan-pt.show', $layanan->id) }}" 
                                       class="btn btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('layanan-pt.edit', $layanan->id) }}" 
                                       class="btn btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('layanan-pt.destroy', $layanan->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                                title="Hapus" 
                                                onclick="return confirm('Hapus layanan {{ $layanan->judul }}?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-3"></i><br>
                                    Belum ada data layanan.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Menampilkan {{ $layanans->firstItem() ?? 0 }} - {{ $layanans->lastItem() ?? 0 }} 
                    dari {{ $layanans->total() }} data
                </div>
                {{ $layanans->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
.table th {
    border-top: none;
    font-weight: 600;
}
.btn-group .btn {
    border-radius: 4px !important;
    margin: 0 2px;
}
.list-unstyled li {
    line-height: 1.3;
}
</style>
@endsection