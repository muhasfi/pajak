@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Transfer</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('transfers.create') }}"> Tambah Transfer Baru</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            {{-- <th>No</th> --}}
            <th>Judul</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Benefit</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($transfers as $transfer)
        <tr>
            {{-- <td>{{ ++$i }}</td> --}}
            <td>{{ $transfer->judul }}</td>
            <td>Rp {{ number_format($transfer->harga, 0, ',', '.') }}</td>
            <td>{{ $transfer->details->first()->deskripsi ?? '-' }}</td>
            <td>
                <ul>
                @foreach(json_decode($transfer->details->first()->benefit ?? '[]') as $item)
                    <li>{{ $item }}</li>
                @endforeach
                </ul>
            </td>
            <td>
                <form action="{{ route('transfers.destroy', $transfer->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('transfers.edit', $transfer->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $transfers->links() !!}
@endsection