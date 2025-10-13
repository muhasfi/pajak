@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Layanan Ok </h3>
    <a href="{{ route('item_layanan.create') }}" class="btn btn-primary mb-3">+ Tambah Layanan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="5%">#</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanan as $index => $item)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        {{-- Batasi deskripsi panjang agar tabel tetap rapi --}}
                        {{ Str::limit($item->deskripsi, 50) }}
                    </td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('item_layanan.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('item_layanan.destroy',$item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus layanan ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada layanan tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
