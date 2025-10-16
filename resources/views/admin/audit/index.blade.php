<!-- resources/views/audits/index.blade.php -->
@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 text-gray-800">
                        <i class="bi bi-clipboard-check me-2"></i>Daftar Audit
                    </h1>
                    <p class="text-muted">Kelola data audit dan detailnya</p>
                </div>
                <a class="btn btn-primary" href="{{ route('audits.create') }}">
                    <i class="bi bi-plus-circle me-1"></i> Buat Audit Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Success -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Sukses!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                <i class="bi bi-list-ul me-2"></i>Data Audit
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50" class="text-center">#</th>
                            <th width="200">Judul Audit</th>
                            <th width="120">Harga</th>
                            <th>Deskripsi</th>
                            <th>Benefit</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($audits as $audit)
                        @php
                            $auditDetail = $audit->auditDetails->first();
                            $benefits = $auditDetail ? json_decode($auditDetail->benefit) : [];
                            // Limit deskripsi dan benefit untuk tampilan
                            $shortDescription = $auditDetail ? Str::limit($auditDetail->deskripsi, 100) : '-';
                            $limitedBenefits = array_slice($benefits, 0, 3); // Max 3 benefit ditampilkan
                        @endphp
                        <tr>
                            <td class="text-center align-middle">
                                {{-- <strong>{{ ++$i }}</strong> --}}
                            </td>
                            <td class="align-middle">
                                <div class="fw-semibold text-primary">{{ $audit->judul }}</div>
                                <small class="text-muted">ID: {{ $audit->id }}</small>
                            </td>
                            <td class="align-middle">
                                <span class="badge bg-success fs-6">
                                    Rp {{ number_format($audit->harga, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="align-middle">
                                @if($auditDetail && $auditDetail->deskripsi)
                                    <div class="audit-description">
                                        {{ $shortDescription }}
                                        @if(strlen($auditDetail->deskripsi) > 100)
                                            <a href="javascript:void(0)" 
                                               class="text-primary text-decoration-none small"
                                               data-bs-toggle="tooltip" 
                                               title="{{ $auditDetail->deskripsi }}">
                                                selengkapnya
                                            </a>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted fst-italic">Tidak ada deskripsi</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if(count($benefits) > 0)
                                    <div class="benefit-list">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($limitedBenefits as $benefit)
                                                <li class="small text-truncate">
                                                    <i class="bi bi-check-circle text-success me-1"></i>
                                                    {{ $benefit }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        @if(count($benefits) > 3)
                                            <small class="text-muted">
                                                +{{ count($benefits) - 3 }} benefit lainnya
                                            </small>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted fst-italic">Tidak ada benefit</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a class="btn btn-outline-info" 
                                       href="{{ route('audits.show', $audit->id) }}"
                                       data-bs-toggle="tooltip" title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" 
                                       href="{{ route('audits.edit', $audit->id) }}"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('audits.destroy', $audit->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger"
                                                onclick="return confirm('Apakah Anda yakin menghapus audit {{ $audit->judul }}?')"
                                                data-bs-toggle="tooltip" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                      
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<style>
.audit-description {
    line-height: 1.4;
    font-size: 0.9rem;
}

.benefit-list ul li {
    padding: 2px 0;
    font-size: 0.85rem;
}

.table td {
    vertical-align: middle !important;
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.btn-group .btn {
    border-radius: 4px !important;
}

.badge {
    font-size: 0.75rem !important;
}
</style>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>
@endsection