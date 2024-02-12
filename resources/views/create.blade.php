@extends('layouts.main')
@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Mobil</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/home" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="1">
            @csrf
            <div class="mb-3">
                <label for="merk" class="form-label">Merek Mobil</label>
                <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk"
                    required autofocus value="{{ old('merk') }}">
                @error('merk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model Mobil</label>
                <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                    name="model" required autofocus value="{{ old('model') }}">
                @error('model')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="plat_nomor" class="form-label">Plat Nomor Mobil</label>
                <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="plat_nomor"
                    name="plat_nomor" required autofocus value="{{ old('plat_nomor') }}">
                @error('plat_nomor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tarif_sewa" class="form-label">Tarif per Hari</label>
                <input type="number" class="form-control @error('tarif_sewa') is-invalid @enderror" id="tarif_sewa"
                    name="tarif_sewa" required autofocus value="{{ old('tarif_sewa') }}">
                @error('tarif_sewa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        <h3>Daftar Mobil {{ auth()->user()->nama }}</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Plat Nomor</th>
                    <th>Tarif per Hari</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($produk as $p)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $p->merk }}</td>
                        <td>
                            {{ $p->model }}
                        </td>
                        <td>
                            {{ $p->plat_nomor }}
                        </td>
                        <td>
                            {{ $p->tarif_sewa }}
                        </td>
                        <td>
                            @if (!$p->sewa)
                                <div class="d-flex">
                                    <div>
                                        <p class="text-success">Ready</p>
                                    </div>
                                    <div class="ms-2">
                                        <form action="/home/{{ $p->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id_produk" value="{{ $p->id }}">
                                            <button class="badge bg-transparent border-0 shadow-sm"
                                                onclick="return confirm('are you sure?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            @elseif ($p->sewa == 1)
                                <div class="d-flex">
                                    <div>
                                        <p class="text-danger">Disewa</p>
                                    </div>
                                    <div class="ms-2">
                                        <form action="/selesai" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $p->id }}" name="id_produk">
                                            <button type="submit"
                                                class="badge text-bg-success border-0">Selesaikan</button>
                                        </form>
                                    </div>

                                </div>
                            @else
                                <div class="d-flex">
                                    <div>
                                        <p class="text-primary">Selesai</p>
                                    </div>
                                    <div class="ms-2">
                                        <form action="/home/{{ $p->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id_produk" value="{{ $p->id }}">
                                            <button class="badge bg-transparent border-0 shadow-sm"
                                                onclick="return confirm('are you sure?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <div style="padding: 6rem"></div>
@endsection
