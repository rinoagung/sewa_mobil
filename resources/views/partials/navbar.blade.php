<nav class="navbar navbar-expand-lg navbar-light fixed-top" style=" background-color: #f1f2f6">
    <div class="container">
        <div class="d-flex justify-content-start">
            <a class="navbar-brand pb-2" href="/home">Sewa</a>
            <div class="vr me-3 opacity-100" style="width: 3px"></div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/home/create">Tambah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/home/katalog">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/riwayat">Riwayat</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ auth()->user()->nama }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right"></i>&ensp;Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item my-3 my-md-0">
                        <a href="/login"
                            class=" text-decoration-none border rounded-3 border-2 py-1 px-3 border-info text-center"
                            style="color: cornflowerblue"><i class="bi bi-person-circle"></i> SIGN IN</a>
                    </li>
                @endauth
            </ul>


        </div>
    </div>
</nav>

<div style="margin-bottom: 6rem"></div>
