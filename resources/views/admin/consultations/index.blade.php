@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Konsultasi Private</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('consultations.create') }}"> + Buat Konsultasi Baru</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <tr>
            {{-- <th>No</th> --}}
            <th>Judul</th>
            <th>Deskripsi</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($consultations as $consultation)
        <tr>
            {{-- <td>{{ ++$i }}</td> --}}
            <td>{{ $consultation->judul }}</td>
            <td>{{ Str::limit($consultation->deskripsi, 50) }}</td> <!-- Membatasi panjang deskripsi -->
            <td>
                <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('consultations.show', $consultation->id) }}">Lihat</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('consultations.edit', $consultation->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- Menampilkan Tautan Paginasi -->
    {!! $consultations->links() !!}
@endsection