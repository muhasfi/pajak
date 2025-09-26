@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Daftar Item Books</h1>
                    <a href="{{ route('item-books.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Item Book
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Price</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemBooks as $itemBook)
                            <tr>
                                {{-- <td>{{ ++$i }}</td> --}}
                                <td>{{ $itemBook->nama }}</td>
                                <td>{{ Str::limit($itemBook->deskripsi, 50) }}</td>
                                <td>Rp {{ number_format($itemBook->price, 2) }}</td>
                                <td>
                                    @if($itemBook->img)
                                        <img src="{{ asset('images/'.$itemBook->img) }}" width="50" height="50" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    @if($itemBook->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('item-books.destroy', $itemBook->id) }}" method="POST">
                                        {{-- <a class="btn btn-info btn-sm" href="{{ route('item-books.show', $itemBook->id) }}">
                                            <i class="bi bi-eye"></i> Show
                                        </a> --}}
                                        <a class="btn btn-primary btn-sm" href="{{ route('item-books.edit', $itemBook->id) }}">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="bi bi-trash"></i> Delete
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
    </div>
@endsection