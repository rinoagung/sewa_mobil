@extends('layouts/main')
@section('isi')
    <div class="mt-3">
        <form action="/home/{{ $produk->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="produk"
                    value="{{ old('nama', $produk->nama) }}">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="" style="width: 50px; height: 50px">
                <input class="form-control" type="file" id="formFile" name="gambar"
                    value="{{ old('nama', $produk->gambar) }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
