@extends('layout.mainlayout')
@section('content')
    <div class="container h-100 mb-5">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card border-0 mt-5" style="max-width:auto;">
                    <div class="card-body">
                        <h1 class="card-title text-center mt-5 ">Masuk</h1>
                        <div class="row">
                            <form action="homeuser.php">
                                <div class="col mt-5 mb-3 ">
                                    <input type="email" class="form-control border-0" id="email" placeholder="E-mail">
                                </div>
                                <div class="col mb-3">
                                    <input type="password" class="form-control border-0" id="password"
                                        placeholder="Kata Sandi">
                                </div>
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col-auto mt-4">Belum memiliki akun?<a href="regist.php">Daftar</a></div>
                                    <div class="col-auto mt-3 ">
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
