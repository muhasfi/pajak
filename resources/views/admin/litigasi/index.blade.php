@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Layanan Litigasi</h2>
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-success" href="{{ route('litigasi.create') }}">Tambah Layanan Baru</a>
        </div>
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
            <th>No</th>
            <th>Judul Layanan</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Benefit</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($litigasi as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->judul }}</td>
            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
            <td>{{ Str::limit($item->details->first()->deskripsi ?? '-', 50) }}</td>
            <td>
                @if($item->details->first() && $item->details->first()->benefit)
                    <ul class="list-unstyled mb-0">
                        @foreach($item->details->first()->benefit as $benefit)
                            <li class="mb-1">
                                <i class="fas fa-check-circle text-success me-1"></i>
                                {{ $benefit }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
            <td>
                <form action="{{ route('litigasi.destroy', $item->id) }}" method="POST">
                    {{-- <a class="btn btn-info btn-sm" href="{{ route('litigasi.show', $item->id) }}">Show</a> --}}
                    <a class="btn btn-primary btn-sm" href="{{ route('litigasi.edit', $item->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $litigasi->links() !!}
@endsection