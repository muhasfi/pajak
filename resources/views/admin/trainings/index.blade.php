@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar In House Training</h2>
    <a href="{{ route('trainings.create') }}" class="btn btn-primary">Tambah Training</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>Instruktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $training)
            <tr>
                <td>
                    @if($training->gambar)
                        <img src="{{ asset('storage/' . $training->gambar) }}" width="50" height="50" class="rounded">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $training->judul }}</td>
                <td>{{ $training->tanggal->format('Y-m-d') }}</td>
                <td>Rp {{ number_format($training->harga, 0, ',', '.') }}</td>
                <td>{{ $training->detail->instruktur }}</td>
                <td>
                    
                    <a href="{{ route('trainings.edit', $training->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $trainings->links() }}
</div>
@endsection