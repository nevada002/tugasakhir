{{-- Make Sidebar with Bootstrap --}}
<div class="sidebar">
    <div class="menu">
        <ul class="text-center justify-content-start ps-0" style="list-style-type: none ">
            <hr class="mt-0">
            <li class="py-3">
                <a style="color:#00225A; text-decoration: none" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <hr>

            {{-- Berita Acara Nota Kapal --}}
            <li class="py-3">
                <div class="row">
                    <div class="col-10 pe-0">
                        <a style="color:#00225A; text-decoration: none" data-bs-toggle="collapse" href="#notkap"
                            role="button" aria-expanded="false" aria-controls="notkap">
                            Berita Acara Nota Kapal
                        </a>
                    </div>
                    <div class="col-2 ps-0">
                        <i class="bi bi-chevron-down" data-bs-toggle="collapse" href="#notkap" role="button"
                            aria-expanded="false" aria-controls="notkap">
                        </i>
                    </div>
                </div>
            </li>
            <div class="collapse" id="notkap">
                <hr>
                <div class="card card-body border-0 pt-0" style="background: transparent">
                    @if (auth()->user()->isCustomerService())
                    <li>
                        <a href="{{ route('admin.nota-kapal.keluhan.index') }}" style="color:#00225A; text-decoration: none">
                            Keluhan Berita Acara Nota Kapal
                        </a>
                    </li>
                    <hr>
                    @endif
                    <li>
                        <a href="{{ route('admin.nota-kapal.berita-acara.index') }}" style="color:#00225A; text-decoration: none">
                            Membuat Berita Acara Nota Kapal
                        </a>
                    </li>
                </div>
            </div>
            <hr>

            {{-- Berita Acara Nota Sampah Kapal --}}
            <li class="py-3">
                <div class="row">
                    <div class="col-10 pe-0">
                        <a style="color:#00225A; text-decoration: none" data-bs-toggle="collapse" href="#notsamkap"
                            role="button" aria-expanded="false" aria-controls="notsamkap">
                            Berita Acara Nota Sampah Kapal
                        </a>
                    </div>
                    <div class="col-2 ps-0">
                        <i class="bi bi-chevron-down" data-bs-toggle="collapse" href="#notsamkap" role="button"
                            aria-expanded="false" aria-controls="notsamkap">
                        </i>
                    </div>
                </div>
            </li>
            <div class="collapse" id="notsamkap">
                <hr>
                <div class="card card-body border-0 pt-0" style="background: transparent">
                    @if (auth()->user()->isCustomerService())
                    <li>
                        <a href="{{ route('admin.nota-sampah-kapal.keluhan.index') }}" style="color:#00225A; text-decoration: none">
                            Keluhan Berita Acara Nota Sampah Kapal
                        </a>
                    </li>
                    <hr>
                    @endif
                    <li>
                        <a href="{{ route('admin.nota-sampah-kapal.berita-acara.index') }}" style="color:#00225A; text-decoration: none">
                            Membuat Berita Acara Nota Sampah Kapal
                        </a>
                    </li>
                </div>
            </div>
            <hr>

            {{-- Berita Acara Penghapusan PPKB --}}
            </li>
            <li class="py-3">
                <div class="row">
                    <div class="col-10 pe-0">
                        <a style="color:#00225A; text-decoration: none" data-bs-toggle="collapse" href="#pengppkb"
                            role="button" aria-expanded="false" aria-controls="pengppkb">
                            Berita Acara Penghapusan PPKB
                        </a>
                    </div>
                    <div class="col-2 ps-0">
                        <i class="bi bi-chevron-down" data-bs-toggle="collapse" href="#pengppkb" role="button"
                            aria-expanded="false" aria-controls="pengppkb">
                        </i>
                    </div>
                </div>
            </li>
            <div class="collapse" id="pengppkb">
                <hr>
                <div class="card card-body border-0 pt-0" style="background: transparent">
                    @if (auth()->user()->isCustomerService())
                    <li>
                        <a href="{{ route('admin.penghapusan-ppkb.keluhan.index') }}" style="color:#00225A; text-decoration: none">
                            Keluhan Berita Acara Pengahapusan PPKB
                        </a>
                    </li>
                    <hr>
                    @endif
                    <li>
                        <a href="{{ route('admin.penghapusan-ppkb.berita-acara.index') }}" style="color:#00225A; text-decoration: none">
                            Membuat Berita Acara Penghapusan PPKB
                        </a>
                    </li>
                </div>
            </div>
            <hr>
            <li class="py-3">
                <a style="color:#00225A; text-decoration: none" href="{{ route('admin.report') }}">Hasil</a>
            </li>
            <hr>
        </ul>
    </div>
</div>
