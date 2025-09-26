@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Daftar Webinar</h2>
    <a href="{{ route('webinars.create') }}" class="btn btn-primary mb-3">+ Tambah Webinar</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($webinars as $w)
            <tr>
                <td>
                    @if($w->gambar)
                    <img src="{{ asset('storage/'.$w->gambar) }}" width="100">

                    @endif
                </td>
                <td>{{ $w->judul }}</td>
                <td>{{ $w->tanggal }}</td>
                <td>Rp {{ number_format($w->harga,0,',','.') }}</td>
                <td>
                    {{-- <a href="{{ route('webinars.show', $w) }}" class="btn btn-info btn-sm">Detail</a> --}}
                    <a href="{{ route('webinars.edit', $w) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('webinars.destroy', $w) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $webinars->links() }}
</div>
@endsection
