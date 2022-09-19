<div class="container">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light" style="display: inline-block; float: none;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ url('assets/img/pelindo.svg') }}" alt="" width="250" height="54.72">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav ml-5"></div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Keluhan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background: #0475BD;">
                            <li><a class="dropdown-item text-light" href="{{ route('keluhan.nota-kapal.index') }}">Form
                                    Keluhan Nota Kapal</a></li>
                            <li><a class="dropdown-item text-light"
                                    href="{{ route('keluhan.nota-sampah-kapal.index') }}">Form Keluhan Nota Sampah
                                    Kapal</a></li>
                            <li><a class="dropdown-item text-light"
                                    href="{{ route('keluhan.penghapusan-ppkb.index') }}">Form Keluhan Penghapusan
                                    PPKB</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hasil">Hasil</a>
                    </li>
                </ul>

            </div>
            <div class="navbar-nav" style="margin-left: 8em;">
                @if (auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProfile" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat Datang, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile"
                            style="background: #0475BD;">
                            <li>
                                <a class="dropdown-item text-light text-end" href="{{ route('profile.edit') }}">Edit
                                    Profil</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-light text-end" href="#" id="logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif
            </div>
        </div>
    </nav>
</div>
