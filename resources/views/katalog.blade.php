@extends('layouts.main')
@section('isi')
    <div class="mt-3">

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
                        <td id="tarifSewa">
                            Rp{{ $p->tarif_sewa }}
                        </td>
                        <td>

                            @if ($p->sewa == 1)
                                <p class="text-danger">Disewa</p>
                            @else
                                <form method="POST" action="/pinjam" class="d-flex" role="Sewa" style="width: 200px">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $p->id }}">
                                    <input id="hari" class="form-control me-2" type="number" placeholder="hari"
                                        onchange="updateHarga()" name="hari" aria-label="Sewa">
                                    <button class="btn btn-outline-success" type="submit">Sewa</button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
