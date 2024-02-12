@extends('layouts.main')

@section('isi')
    @if (session()->has('success'))
        <div class="d-flex align-items-center alert alert-success alert-dismissible fade show p-2" style="margin-top: 100px"
            role="alert">
            <i class="bi bi-check2-square fs-3"></i>
            &ensp;{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    @if (session()->has('loginError'))
        <div class="d-flex align-items-center alert alert-danger alert-dismissible fade show p-2" style="margin-top: 100px"
            role="alert">
            <i class="bi bi-exclamation-circle fs-3"></i>
            &ensp;{{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center" style="margin-top: 200px">
        <div class="col-md-5">
            <main class="form-signin">
                <form action="/login" method="POST">
                    @csrf
                    <div class="row justify-content-center w-100 m-0">
                        <i class="bi bi-person-fill text-center text-primary p-0" style="font-size: 5rem;"></i>
                    </div>
                    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            autofocus required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
                <small class="d-block mt-3 text-end"><a href="/register" class="text-decoration-none"><i
                            class="bi bi-pencil-square"></i> Create an account</a>.</small>
            </main>
        </div>
    </div>
@endsection
