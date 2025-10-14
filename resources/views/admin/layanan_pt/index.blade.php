@extends('admin.layouts.master')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="h3">
            <i class="fas fa-list me-2"></i>Daftar Layanan Pembuatan PT
        </h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('layanan-pt.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Tambah Layanan
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($layanans->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Layanan</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Detail Langkah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($layanans as $layanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $layanan->judul }}</strong>
                            </td>
                            <td>
                                <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                    {{ $layanan->deskripsi }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success fs-6">
                                    Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                </span>
                            </td>
                            <td>
                                @if($layanan->detailLayanans->count() > 0)
                                    <span class="badge bg-info">
                                        {{ $layanan->detailLayanans->count() }} langkah
                                    </span>
                                @else
                                    <span class="badge bg-warning">Belum ada detail</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('layanan-pt.show', $layanan->id) }}" 
                                       class="btn btn-info" title="Lihat Detail">
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
                                                onclick="return confirm('Hapus layanan ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    Menampilkan {{ $layanans->firstItem() }} - {{ $layanans->lastItem() }} 
                    dari {{ $layanans->total() }} layanan
                </div>
                {{ $layanans->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h4>Belum ada layanan</h4>
                <p class="text-muted">Silakan tambah layanan pertama Anda</p>
                <a href="{{ route('layanan-pt.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Tambah Layanan Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection