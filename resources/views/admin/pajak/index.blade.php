@extends('admin.layouts.master')
@section('title', 'Daftar Layanan Perpajakan')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layanan Perpajakan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('admin.pajak.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah Layanan
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

                @if($pajaks->isEmpty())
                    <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">
                                    Belum ada data layanan.
                                </div>
                            </td>
                        </tr>
                @else
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Layanan</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Benefit</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pajaks as $index => $pajak)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pajak->judul }}</td>
                            <td>Rp {{ number_format($pajak->harga, 0, ',', '.') }}</td>
                            <td>{{ Str::limit($pajak->detail->deskripsi ?? 'Tidak ada deskripsi', 50) }}</td>
                            <td>
                                @if($pajak->detail && !empty($pajak->detail->benefit))
                                    <ul class="mb-0 ps-3">
                                        @foreach(array_slice($pajak->detail->benefit, 0, 3) as $benefit)
                                            <li>{{ Str::limit($benefit, 40) }}</li>
                                        @endforeach
                                        @if(count($pajak->detail->benefit) > 3)
                                            <small class="text-muted">+{{ count($pajak->detail->benefit) - 3 }} benefit lainnya...</small>
                                        @endif
                                    </ul>
                                @else
                                    <span class="badge bg-secondary">Tidak ada benefit</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.pajak.show', $pajak->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                <a href="{{ route('admin.pajak.edit', $pajak->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{ route('admin.pajak.destroy', $pajak->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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
                text: "Data layanan ini akan dihapus permanen!",
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
