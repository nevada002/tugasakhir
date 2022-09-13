@extends('layout.mainlayout')
@section('title', 'Daftar')
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <div class="card border-0">
                <div class="card-body px-5 pb-5">
                    <h1 class="card-title text-center my-5">Daftar</h1>

                    <div>
                        <h5>Role</h5>
    
                        <div class="row mt-2">
                            {{-- Agen --}}
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="agen" id="agen" @if (old('role') == 1) checked @endif>
                                    <label class="form-check-label text-dark" for="agen">Agen</label>
                                </div>
                            </div>
    
                            {{-- Customer Service --}}
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="cs" id="cs" @if (old('role') == 2) checked @endif>
                                    <label class="form-check-label text-dark" for="cs">Customer Service</label>
                                </div>
                            </div>
                        </div>
    
                        <div class="row mt-1">
                            {{-- Penanda Tangan --}}
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="pt" id="pt" @if (old('role') == 3) checked @endif>
                                    <label class="form-check-label text-dark" for="pt">Penanda Tangan</label>
                                </div>
                            </div>
    
                            {{-- Pihak Verifikasi --}}
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="pv" id="pv" @if (old('role') == 4) checked @endif>
                                    <label class="form-check-label text-dark" for="pv">Pihak Verifikasi</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form Agen --}}
                    <form method="POST" action="{{ route('register') }}" id="form-agen" class="form" style="display: none;">
                        @csrf
                        <hr>
                        <input type="hidden" name="role" value="1">
                        <div class="col mt-auto mb-3 ">
                            <input name="name" type="text" class="form-control" placeholder="Nama Agen" value="{{ old('name') }}" required>
                        </div>
                        <div class="col mt-auto mb-3 ">
                            <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}" required>
                        </div>
                        <div class="col mb-3 ">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                        </div>
                        <div class="col mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Kata Sandi" required>
                        </div>
                        <div class="col mb-5">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi Kata Sandi" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <div class="my-auto">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></div>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- Form Customer Service --}}
                    <form method="POST" action="{{ route('register') }}" id="form-cs" class="form" style="display: none;">
                        @csrf
                        <hr>
                        <input type="hidden" name="role" value="2">
                        <div class="col mt-auto mb-3 ">
                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        </div>
                        <div class="col mt-auto mb-3 ">
                            <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}" required>
                        </div>
                        <div class="col mb-3 ">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                        </div>
                        <div class="col mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Kata Sandi" required>
                        </div>
                        <div class="col mb-5">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi Kata Sandi" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <div class="my-auto">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></div>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- Form Penanda Tangan --}}
                    <form method="POST" action="{{ route('register') }}" id="form-pt" class="form" style="display: none;">
                        @csrf
                        <hr>
                        <input type="hidden" name="role" value="3">
                        <div class="col mt-auto mb-3 ">
                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        </div>
                        <div class="col mb-3 ">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                        </div>
                        <div class="col mb-3">
                            <select name="jabatan" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>-- Pilih --</option>

                                @foreach (\App\Enum\Jabatan::cases() as $jabatan)
                                    <option value="{{ $jabatan->value }}">{{ $jabatan->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Kata Sandi" required>
                        </div>
                        <div class="col mb-5">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi Kata Sandi" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <div class="my-auto">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></div>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- Form Pihak Verifikasi --}}
                    <form  method="POST" action="{{ route('register') }}" id="form-pv" class="form" style="display: none;">
                        @csrf
                        <hr>
                        <input type="hidden" name="role" value="4">
                        <div class="col mt-auto mb-3 ">
                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        </div>
                        <div class="col mb-3 ">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                        </div>
                        <div class="col mb-3">
                            <select name="jabatan" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>-- Pilih --</option>
                                
                                @foreach (\App\Enum\Jabatan::cases() as $jabatan)
                                    <option value="{{ $jabatan->value }}">{{ $jabatan->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Kata Sandi" required>
                        </div>
                        <div class="col mb-5">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi Kata Sandi" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <div class="my-auto">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></div>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('[name=role]').change(function() {
                let val = $(this).val();
                $('.form').hide();
                $('#form-' + val).show()
            });

            $('[name=role]:checked').trigger('change');
        });
    </script>    
@endpush
