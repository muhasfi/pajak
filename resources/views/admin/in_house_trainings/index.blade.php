@extends('admin.layouts.master')

@section('title', 'Daftar In House Training')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Daftar In House Training</h3>
  <a href="{{ route('in_house_trainings.create') }}" class="btn btn-primary">Tambah Baru</a>
</div>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Judul</th>
      <th>deskripsi</th>
      <th>Tanggal</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($trainings as $t)
    <tr>
      <td>{{ $loop->iteration + ($trainings->currentPage()-1) * $trainings->perPage() }}</td>
      <td style="width:120px">
        @if($t->gambar)
          <img src="{{ asset('storage/' . $t->gambar) }}" alt="gambar" class="img-fluid" style="max-height:70px;">
        @else
          <span class="text-muted">No image</span>
        @endif
      </td>
      <td>{{ $t->judul }}</td>
      <td>{{ $t->deskripsi }}</td>
      <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d M Y') }}</td>
      <td>Rp {{ number_format($t->harga,0,',','.') }}</td>
      <td style="width:200px">
        {{-- <a href="{{ route('in_house_trainings.show', $t) }}" class="btn btn-sm btn-info">Lihat</a> --}}
        <a href="{{ route('in_house_trainings.edit', $t) }}" class="btn btn-sm btn-warning">Edit</a>

        <form action="{{ route('in_house_trainings.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $trainings->links() }}
@endsection
