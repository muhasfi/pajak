@extends('admin.layouts.master')
@section('title', 'Daftar Paper')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Paper</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('admin.paper.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah Paper
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
                <form method="GET" action="{{ route('admin.paper.index') }}" class="mb-3 row g-2 align-items-end">
    <div class="col-auto">
        <label for="category_id" class="form-label">Filter Kategori</label>
        <select name="category_id" class="form-select">
            <option value="">-- Semua Kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Filter</button>
    </div>
</form>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Paper</th>
                            <th>Deskripsi</th>
                            <th>Kebutuhan</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($papers as $paper)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ Str::startsWith($paper->img, ['http://', 'https://']) 
                                            ? $paper->img 
                                            : asset('storage/' . $paper->img) }}"
                                    width="60"
                                    class="img-fluid rounded-top"
                                    alt="Gambar {{ $paper->name }}"
                                    onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';">
                            </td>
                            <td>{{ $paper->name }}</td>
                            <td>{{ Str::limit($paper->description, 15) }}</td>
                            <td>{{ $paper->kebutuhan }}</td>
                            <td>{{ 'Rp'. number_format($paper->price, 0, ',','.') }}</td>
                            <td>
                                <span class="">
                                    {{ $paper->categoryPaper->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $paper->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $paper->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.paper.edit', $paper->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{ route('admin.paper.destroy', $paper->id) }}" method="POST" class="d-inline delete-form">
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
