@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Item Bimbel</h2>
    <a href="/admin/bimbel/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Item
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Video</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td> <div class="mb-3">
                        <label for="video" class="form-label">Video Pembelajaran</label>
                        <input type="file" class="form-control" id="video" name="video" accept="video/*">
                        <div class="form-text">Maksimal 50MB, format MP4, MOV, atau AVI. Biarkan kosong jika tidak ingin mengubah video.</div>
                        
                        @if($itemBimbel->video)
                            <div class="current-file">
                                <i class="bi bi-play-btn-fill text-primary"></i>
                                Video saat ini: {{ basename($itemBimbel->video) }}
                                <div class="mt-2">
                                    <video class="video-preview" controls>
                                        <source src="{{ Storage::url($itemBimbel->video) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                </div>
                            </div>
                        @endif
                        
                        <video id="videoPreview" class="video-preview" controls style="display: none;"></video>
                        @error('video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div></td>
                        <td>
                            <span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">
                                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('item-bimbel.show', $item->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('item-bimbel.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('item-bimbel.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection