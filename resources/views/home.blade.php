@extends('layouts.main')
@section('isi')
    <div class="mt-3">
        <h1>Selamat Datang {{ $user->nama }}</h1>
        <h4 class="mt-5">Data Diri</h4>
        <p>Nama: {{ $user->nama }}</p>
        <p>Username: {{ $user->username }}</p>
        <p>Alamat: {{ $user->alamat }}</p>
        <p>Nomor Handphone: {{ $user->no_telp }}</p>
        <p>Nomor SIM: {{ $user->no_sim }}</p>

    </div>

    <form action="/logout" method="POST" class="mt-5">
        @csrf
        <button type="submit" class="badge text-bg-danger border-0">Logout</button>
    </form>
    </div>
@endsection
