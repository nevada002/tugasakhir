@extends('layout.mainlayout')
@section('title', 'Masuk')
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="card border-0">
                <div class="card-body px-5 pb-5">
                    <h1 class="card-title text-center mt-5">Masuk</h1>
                    <div class="row">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col mt-5 mb-3 ">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Kata Sandi" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="my-auto">Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></div>
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
