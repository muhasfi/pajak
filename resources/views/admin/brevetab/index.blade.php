<!-- resources/views/brevetab/index.blade.php -->
@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Brevet AB</h2>
    <a href="{{ route('brevetab.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Data
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brevetabs as $brevetab)
                    <tr>
                        <td>
                            @if($brevetab->gambar)
                                <img src="{{ asset('storage/' . $brevetab->gambar) }}" alt="{{ $brevetab->judul }}" width="60" height="60" class="rounded">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $brevetab->judul }}</td>
                        <td>{{ $brevetab->tanggal_mulai->format('d M Y') }} - {{ $brevetab->tanggal_selesai->format('d M Y') }}</td>
                        <td>Rp {{ number_format($brevetab->harga, 0, ',', '.') }}</td>
                        <td>{{ $brevetab->detail->lokasi ?? '-' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('brevetab.show', $brevetab) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('brevetab.edit', $brevetab) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('brevetab.destroy', $brevetab) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data brevet AB.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection