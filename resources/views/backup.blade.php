@extends('layouts.main')
@section('isi')
    <div class="mt-3">
        <h1>{{ $h1 }}</h1>
        <form method="POST" enctype="multipart/form-data" action="/home">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="produk">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="formFile" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="mt-3">

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($produk as $p)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $p->nama }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $p->gambar) }}" alt=""
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <div class="d-flex">
                                <form action="/home/{{ $p->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-transparent text-danger border-0">Hapus</button>
                                </form>
                                <a href="home/{{ $p->id }}/edit">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
