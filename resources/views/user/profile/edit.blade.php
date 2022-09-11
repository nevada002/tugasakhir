@extends('layout.mainlayout')
@section('title', 'Daftar')
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <div class="card border-0">
                <div class="card-body px-5 pb-5">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <h1 class="card-title text-center my-5">Edit Profil</h1>
                        <div class="col mt-auto mb-3">
                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap"
                                value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control" placeholder="E-mail" value="{{ auth()->user()->email }}" disabled>
                        </div>
                        <div class="col mt-auto mb-3">
                            <input name="alamat" type="text" class="form-control" placeholder="Alamat"
                                value="{{ auth()->user()->alamat }}" required>
                        </div>

                        <p class="text-center form-text border-bottom pb-2 mt-4">
                            Kosongkan jika tidak ingin mengubah kata sandi.
                        </p>
                        <div class="col mb-3">
                            <input name="old_password" type="password" class="form-control" placeholder="Kata Sandi Lama">
                        </div>
                        <div class="col mb-3">
                            <input name="new_password" type="password" class="form-control" placeholder="Kata Sandi Baru">
                        </div>
                        <div class="col mb-4">
                            <input name="new_password_confirmation" type="password" class="form-control"
                                placeholder="Ulangi Kata Sandi Baru">
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
