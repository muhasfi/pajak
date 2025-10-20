@extends('admin.layouts.master')
@section('title', 'Tambah Menu')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Menu</h3>
            <p class="text-subtitle text-muted">Silahkan isi data menu yang ingin ditambahkan</p>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="form" action="{{ route('admin.book.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- ITEM -->
                        <div class="form-group">
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Menu" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" name="img" required>
                        </div>

                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked" name="is_active" value="1" checked>
                                <label for="flexSwitchCheckChecked">Aktif/Tidak Aktif</label>
                            </div>
                        </div>

                        <hr>
                        <h5>Detail Item</h5>

                        <!-- ITEM DETAILS -->
                        <div class="mb-3">
                            <label class="form-label">E-Book</label>
                            <div class="input-group">
                                <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                                    <option value="upload">Upload</option>
                                    <option value="link">Link</option>
                                </select>

                                <input type="file" name="file_upload" class="form-control" accept=".pdf,.doc,.docx">
                                <input type="text" name="file_link" class="form-control d-none" placeholder="https://drive.google.com/...">
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('admin.book.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
@endsection

<script>
    function toggleFileInput(select) {
    let fileInput = select.closest('.input-group').querySelector('[name="file_upload"]');
    let linkInput = select.closest('.input-group').querySelector('[name="file_link"]');
    
    if (select.value === 'upload') {
        fileInput.classList.remove('d-none');
        linkInput.classList.add('d-none');
    } else {
        fileInput.classList.add('d-none');
        linkInput.classList.remove('d-none');
    }
}

</script>