@extends('admin.layouts.master')
@section('title', 'Data Transfer Pricing')

@section('content')
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Transfer Pricing</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <a href="{{ route('admin.transfer.create') }}" class="btn btn-primary float-start float-lg-end">
                <i class="bi bi-plus"></i>
                Tambah Transfer Baru
            </a>
        </div>
    </div>
</div>

{{-- Alert sukses --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Daftar Transfer</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Benefit</th>
                        <th scope="col" width="180px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transfers as $transfer)
                        <tr>
                            <td>{{ $transfer->judul }}</td>
                            <td>Rp {{ number_format($transfer->harga, 0, ',', '.') }}</td>
                            <td>{{ $transfer->detail->first()->deskripsi ?? '-' }}</td>
                            <td>
                                @php
                                    $benefits = json_decode($transfer->detail->first()->benefit ?? '[]', true);
                                @endphp
                                @if (!empty($benefits))
                                    <ul class="mb-0 ps-3">
                                        @foreach ($benefits as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.transfer.edit', $transfer->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{ route('admin.transfer.destroy', $transfer->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data transfer.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
