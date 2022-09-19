@extends('layout.mainlayout')
@section('title', 'Masuk')
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            @if (session('resent'))
                <div class="alert alert-success">Link verifikasi terbaru berhasil dikirimkan.</div>
            @endif

            <div class="card border-0">
                <div class="card-body px-5 pb-5">
                    <h1 class="card-title text-center my-5">Verifikasi Email</h1>
                    <div class="row">
                        <p>Silahkan verifikasi email terlebih dahulu untuk menggunakan aplikasi.</p>

                        @if (Route::has('verification.resend'))
                            <form action="{{ route('verification.resend') }}" method="post">
                                @csrf
                                <p>
                                    Klik
                                    <a href="javascript:;" onclick="this.parentNode.parentNode.submit()">di sini</a>
                                    untuk mengirimkan email verifikasi terbaru.
                                </p>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
