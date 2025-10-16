@extends('admin.layouts.master')
@section('title', 'Daftar Layanan Privasi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Layanan Privasi awdaw</h2>
            <a href="{{ route('layanan-privasi.create') }}" class="btn btn-primary">Tambah Layanan</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Waktu</th>
                        <th>Benefit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layanan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            @if($item->privasiDetails->first())
                                {{ $item->privasiDetails->first()->waktu_menit }} menit
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($item->privasiDetails->first() && $item->privasiDetails->first()->benefit)
                                <ul class="mb-0">
                                    @foreach(array_slice($item->privasiDetails->first()->benefit, 0, 2) as $benefit)
                                        <li>{{ $benefit }}</li>
                                    @endforeach
                                    @if(count($item->privasiDetails->first()->benefit) > 2)
                                        <li>... dan {{ count($item->privasiDetails->first()->benefit) - 2 }} benefit lainnya</li>
                                    @endif
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                {{-- <a href="{{ route('layanan-privasi.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a> --}}
                                <a href="{{ route('layanan-privasi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('layanan-privasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection