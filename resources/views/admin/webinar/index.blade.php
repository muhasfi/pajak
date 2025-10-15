@extends('admin.layouts.master')

@section('title', 'Data Webinar')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Webinar</h5>
        <a href="{{ route('admin.webinar.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Webinar
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul Webinar</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Pembicara</th>
                        <th>Harga</th>
                        <th>Materi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($webinars as $webinar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($webinar->gambar)
                                <img src="{{ asset('storage/' . $webinar->gambar) }}" 
                                     alt="{{ $webinar->judul }}" 
                                     width="60" 
                                     class="img-thumbnail">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $webinar->judul }}</strong><br>
                            <small class="text-muted">{{ Str::limit($webinar->deskripsi, 50) }}</small>
                        </td>
                        <td>
                            <i class="fas fa-calendar text-primary me-1"></i>
                            {{ \Carbon\Carbon::parse($webinar->tanggal)->format('d/m/Y') }}
                        </td>

                        @php
                            $detail = $webinar->details->first();
                        @endphp

                        <td>
                            @if($detail)
                                <i class="fas fa-clock text-info me-1"></i>
                                {{ \Carbon\Carbon::parse($detail->waktu_mulai)->format('H:i') }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td>
                            @if($detail)
                                <i class="fas fa-clock text-warning me-1"></i>
                                {{ \Carbon\Carbon::parse($detail->waktu_selesai)->format('H:i') }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td>
                            @if($detail)
                                <i class="fas fa-user-tie text-info me-1"></i>
                                {{ $detail->pembicara }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td>Rp {{ number_format($webinar->harga, 0, ',', '.') }}</td>

                        <td>
                            @if($detail && $detail->materi)
                                {{ $detail->materi }}
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.webinar.edit', $webinar->id) }}" 
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Ubah
                            </a>

                            <form action="{{ route('admin.webinar.destroy', $webinar->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger delete-btn">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($webinars->hasPages())
        <div class="mt-3">
            {{ $webinars->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/admin/static/js/pages/simple-datatables.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
