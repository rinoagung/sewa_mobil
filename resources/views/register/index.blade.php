@extends('layouts.main')

@section('isi')
    <div class="row justify-content-center">
        <div class="col-lg-5">


            <main class="form-registration">
                <form action="/register" method="POST">
                    @csrf
                    <div class="row justify-content-center w-100 m-0">
                        <i class="bi bi-person-lines-fill text-center text-primary p-0" style="font-size: 5rem;"></i>
                    </div>
                    <h1 class="h3 mb-3 fw-normal text-center">Create an account</h1>

                    <div class="form-floating">
                        <input type="text" name="nama"
                            class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama"
                            placeholder="nama" required value={{ old('nama') }}>
                        <label for="nama">Name</label>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" required value={{ old('username') }}>
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat" placeholder="alamat" required value={{ old('alamat') }}>
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                            id="no_telp" placeholder="name@example.com" required value={{ old('no_telp') }}>
                        <label for="no_telp">Nomor Telepon</label>
                        @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="number" name="no_sim" class="form-control @error('no_sim') is-invalid @enderror"
                            id="no_sim" placeholder="name@example.com" required value={{ old('no_sim') }}>
                        <label for="no_sim">Nomor SIM</label>
                        @error('no_sim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Create</button>
                </form>
                <small class="d-block mt-3 text-end"><a href="/" class="text-decoration-none"><i
                            class="bi bi-box-arrow-in-right"></i> Already have an account?</a>.</small>
            </main>
        </div>
    </div>

    <div style="padding-bottom: 6rem"></div>
@endsection
