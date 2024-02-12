@extends('layouts.main')
@section('isi')
    <h1>Riwayat Sewa</h1>
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
                    @if ($p->sewa == 1)
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
                                <p class="text-danger">Disewa</p>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>

    </div>

    <h1 style="margin-top: 300px">Riwayat Selesai</h1>
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
                    @if ($p->sewa == 2)
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
                                <p class="text-success">Selesai</p>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
