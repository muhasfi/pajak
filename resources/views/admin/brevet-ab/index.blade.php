@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Data Brevet AB</h1>
    <a href="{{ route('brevet-ab.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brevetAB as $item)
                    <tr>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/brevet-ab/' . $item->gambar) }}" 
                                     alt="" 
                                     class="img-thumbnail" 
                                     style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>
                            {{ $item->tanggal_mulai->format('d M Y') }} - 
                            {{ $item->tanggal_selesai->format('d M Y') }}
                        </td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('brevet-ab.edit', $item->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('brevet-ab.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE') <!-- Ini yang sering terlewat -->
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection