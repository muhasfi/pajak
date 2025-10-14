<!-- resources/views/accounting-services/index.blade.php -->
@extends('admin.layouts.master')
@section('title', 'Daftar Jasa Akuntansi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Jasa Akuntansi</h2>
            <a href="{{ route('accounting-services.create') }}" class="btn btn-primary">Tambah Jasa</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Benefit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->judul }}</td>
                        <td>Rp {{ number_format($service->harga, 0, ',', '.') }}</td>
                        <td>{{ Str::limit($service->details->deskripsi ?? '', 100) }}</td>
                        <td>
                            @if($service->details && $service->details->benefit)
                                <ul class="list-unstyled mb-0">
                                    @foreach($service->details->benefit as $benefit)
                                        <li class="mb-1">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            {{ $benefit }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                {{-- <a href="{{ route('accounting-services.show', $service->id) }}" class="btn btn-info btn-sm">Lihat</a> --}}
                                <a href="{{ route('accounting-services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('accounting-services.destroy', $service->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data jasa akuntansi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection