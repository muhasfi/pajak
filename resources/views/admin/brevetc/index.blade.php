@extends('admin.layouts.master')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h2>Daftar Brevet C</h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-success" href="{{ route('brevetc.create') }}">Tambah Data Baru</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                {{-- <th>No</th> --}}
                <th>Gambar</th>
                <th>Judul</th>
                <th>Hari</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Harga</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brevetCs as $brevetC)
            <tr>
                {{-- <td>{{ ++$id }}</td> --}}
                <td>
                    @if($brevetC->gambar)
                        <img src="{{ asset('storage/brevet-ab/' . $brevetC->gambar) }}" 
                             alt="" 
                             class="img-thumbnail" 
                             style="width: 80px; height: 60px; object-fit: cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                {{-- <td>{{ $brevetC->gambar }}</td> <!-- Nantinya bisa diubah menjadi tag <img> --> --}}
                <td>{{ $brevetC->judul }}</td>
                <td>{{ $brevetC->hari }}</td>
                <td>{{ $brevetC->tanggal_mulai }}</td>
                <td>{{ $brevetC->tanggal_selesai }}</td>
                <td>Rp {{ number_format($brevetC->harga, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('brevetc.destroy', $brevetC->id) }}" method="POST">
                        {{-- <a class="btn btn-info btn-sm" href="{{ route('brevetc.show', $brevetC->id) }}">Detail</a> --}}
                        <a class="btn btn-primary btn-sm" href="{{ route('brevetc.edit', $brevetC->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Tampilkan link pagination -->
    {!! $brevetCs->links() !!}
@endsection