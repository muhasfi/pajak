@extends('admin.layouts.master')

@section('title', 'Daftar Item Seminar')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Item Seminar</h5>
        <a href="{{ route('item-seminars.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Item
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        {{-- <th>Aktif</th> --}}
                        {{-- <th>Gambar</th> --}}
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($seminars as $s)
            <tr>
                {{-- <td>{{ $s->nama }}</td> --}}
                <td>
                    @if($s->img)
                        <img src="{{ asset('storage/'.$s->img) }}" width="100">
                    @endif
                </td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->tanggal }}</td>
                <td>Rp {{ number_format($s->harga, 0, ',', '.') }}</td>
             
                </td>
                <td>{{ $s->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                <td>
                    <a href="{{ route('item-seminars.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('item-seminars.destroy', $s->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
            @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-group .btn,
    .d-flex.gap-2 .btn,
    .d-flex.gap-2 form {
        margin: 0 2px;
    }
    
    /* Tambahan styling untuk membuat tombol konsisten */
    .d-flex.gap-2 .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.2rem;
        min-width: 65px;
        justify-content: center;
    }
    
    /* Tooltip styling */
    .tooltip {
        font-size: 0.8rem;
    }
</style>

<script>
    // Inisialisasi tooltip Bootstrap
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection