<div class="container">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">
        <div class="container ">
            <a class="navbar-brand" href="/">
                <img src="assets/img/pelindo.png" alt="" width="250" height="54.72">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-7 justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Keluhan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background: #0475BD;">
                            <li><a class="dropdown-item text-light" href="/formnotakapal">Form Keluhan Berita Acara Nota
                                    Kapal</a></li>
                            <li><a class="dropdown-item text-light" href="/formnotasampah">Form Keluhan Nota
                                    Sampah Kapal</a></li>
                            <li><a class="dropdown-item text-light" href="/formnotappkb">Form Keluhan Penghapusan
                                    PPKB</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hasil">Hasil</a>
                    </li>
                    <div class="col-5"> </div>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat Datang
                        </a>
                        <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light" href="edit.php">Edit Profil</a></li>
                            <li><a class="dropdown-item text-light" href="index.php">Logout</a></li>
                        </ul>
                    </li> --}}
                    <li class="nav-item">

                        <a class="nav-link" href="/login">Masuk</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="#">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="regist.php">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
