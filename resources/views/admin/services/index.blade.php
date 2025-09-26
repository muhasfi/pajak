@extends('admin.layouts.master')


@section('content')
<div class="container">
    <h2>Daftar Layanan</h2>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Harga</th>
                {{-- <th>Deskripsi</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>
                    @if($service->gambar)
                        <img src="{{ asset('storage/'.$service->gambar) }}" width="80">
                    @endif
                </td>
                <td>{{ $service->judul }}</td>
                <td>
                    @php
                    $deskripsi = is_array($service->deskripsi) ? $service->deskripsi : json_decode($service->deskripsi, true);
                @endphp
                
                <ul>
                    @foreach($deskripsi as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
                
                </td>
                <td>{{ $service->category->nama_kategori }}</td>
                <td>Rp {{ number_format($service->harga, 0, ',', '.') }}</td>
                
                <td>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $services->links() }}
</div>
@endsection
