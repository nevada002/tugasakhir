<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: #F7AD1A">
            <div class="container ">
                <a class="navbar-brand" href="homeuser.php">
                    <img src="assets/img/logopelindo.png" alt="" width="108.8" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-7 justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="homeuser.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Keluhan
                            </a>
                            <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item text-light" href="formnotakapal.php">Form Keluhan Nota
                                        Kapal</a></li>
                                <li><a class="dropdown-item text-light" href="formnotasampah.php">Form Keluhan Nota
                                        Sampah Kapal</a></li>
                                <li><a class="dropdown-item text-light" href="formppkb.php">Form Keluhan Penghapusan
                                        PPKB</a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hasil.php">Hasil</a>
                        </li>
                        <div class="col-5"> </div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Selamat Datang
                            </a>
                            <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item text-light" href="edit.php">Edit Profil</a></li>
                                <li><a class="dropdown-item text-light" href="index.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
