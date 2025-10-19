@extends('admin.layouts.master')
@section('title', 'Daftar Seminar')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Seminar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('admin.seminar.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i> Tambah Seminar
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul Seminar</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Pembicara</th>
                            <th>Harga</th>
                            <th>Kuota</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminars as $seminar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($seminar->gambar)
                                    <img src="{{ asset('storage/' . $seminar->gambar) }}"
                                        width="60"
                                        class="img-fluid rounded"
                                        alt="{{ $seminar->judul }}">
                                @else
                                    <img src="{{ asset('images/default.png') }}"
                                        width="60"
                                        class="img-fluid rounded"
                                        alt="No Image">
                                @endif
                            </td>
                            <td>{{ $seminar->judul }}</td>
                            <td>{{ Str::limit($seminar->deskripsi, 30) }}</td>
                            <td>{{ $seminar->tanggal ? \Carbon\Carbon::parse($seminar->tanggal)->format('d M Y') : '-' }}</td>
                            <td>{{ $seminar->waktu_pelaksanaan ? \Carbon\Carbon::parse($seminar->waktu_pelaksanaan)->format('H:i') : '-' }}</td>
                            <td>{{ $seminar->detailSeminar->lokasi ?? '-' }}</td>
                            <td>{{ $seminar->detailSeminar->pembicara ?? '-' }}</td>
                            <td>Rp{{ number_format($seminar->harga, 0, ',', '.') }}</td>
                            <td>{{ $seminar->detailSeminar->kuota_peserta ?? '-' }}</td>
                            <td>
                                <span class="badge 
                                    @if(($seminar->detailSeminar->level ?? '') == 'Beginner') bg-success
                                    @elseif(($seminar->detailSeminar->level ?? '') == 'Intermediate') bg-warning text-dark
                                    @elseif(($seminar->detailSeminar->level ?? '') == 'Advanced') bg-danger
                                    @else bg-secondary
                                    @endif">
                                    {{ $seminar->detailSeminar->level ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.seminar.edit', $seminar->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{ route('admin.seminar.destroy', $seminar->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
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
