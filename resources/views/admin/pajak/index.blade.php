@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Layanan Perpajakan</h2>
    <a href="{{ route('pajak.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Layanan
    </a>
</div>

@if($pajaks->isEmpty())
<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> Belum ada data layanan perpajakan.
</div>
@else
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th width="5%">#</th>
                <th width="20%">Judul Layanan</th>
                <th width="15%">Harga</th>
                <th width="25%">Deskripsi</th>
                <th width="25%">Benefit</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pajaks as $pajak)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>
                    <strong>{{ $pajak->judul }}</strong>
                </td>
                <td>
                    <span class="badge bg-success fs-6">Rp {{ number_format($pajak->harga, 0, ',', '.') }}</span>
                </td>
                <td>
                    <div class="small text-muted">
                        {{ Str::limit($pajak->detail->deskripsi ?? 'Tidak ada deskripsi', 80) }}
                    </div>
                </td>
                <td>
                    @if($pajak->detail && !empty($pajak->detail->benefit))
                        <div class="benefit-list">
                            @foreach(array_slice($pajak->detail->benefit, 0, 3) as $benefit)
                                <span class="badge-light mb-1 d-inline-block">
                                    <i class="fas fa-check-circle me-1"></i>{{ Str::limit($benefit, 30) }}
                                </span>
                                @if(!$loop->last)<br>@endif
                            @endforeach
                            
                            @if(count($pajak->detail->benefit) > 3)
                                <small class="text-muted d-block mt-1">
                                    +{{ count($pajak->detail->benefit) - 3 }} benefit lainnya...
                                </small>
                            @endif
                        </div>
                    @else
                        <span class="badge bg-secondary">Tidak ada benefit</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('pajak.show', $pajak->id) }}" class="btn btn-info" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('pajak.edit', $pajak->id) }}" class="btn btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pajak.destroy', $pajak->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Hapus" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus layanan {{ $pajak->judul }}?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
{{-- @if($pajaks->hasPages())
<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="text-muted">
        Menampilkan {{ $pajaks->firstItem() }} - {{ $pajaks->lastItem() }} dari {{ $pajaks->total() }} data
    </div>
    <div>
        {{ $pajaks->links() }}
    </div>
</div> --}}
{{-- @endif --}}
@endif
@endsection

@push('styles')
<style>
.benefit-list .badge {
    font-size: 0.75rem;
    font-weight: normal;
    text-align: left;
    white-space: normal;
}

.table td {
    vertical-align: middle;
}

.btn-group-sm > .btn {
    padding: 0.25rem 0.5rem;
}
</style>
@endpush