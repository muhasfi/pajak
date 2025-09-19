@extends('admin.layouts.master')

@section('title', 'Kelola Artikel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Artikel</h2>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Artikel
    </a>
</div>

<div class="card">
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $artikel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($artikel->img)
                                <img src="{{ asset('storage/' . $artikel->img) }}" alt="{{ $artikel->nama }}" width="50" height="50" class="rounded">
                            @else
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $artikel->nama }}</td>
                        <td>{{ $artikel->deskripsi }}</td>
                        <td>Rp {{ number_format($artikel->harga, 0, ',', '.') }}</td>
                        <td>
                            @if($artikel->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data artikel.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection.