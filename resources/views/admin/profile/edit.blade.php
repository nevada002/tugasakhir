@extends('layout.adminlayout')
@section('title', 'Edit Profile')
@section('content')
    <div class="row">
        <div class="col-12">
            
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <form action="{{ route('admin.profile.edit') }}" method="POST">
                @csrf
                <div class="form-group mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ auth()->user()->name }}" required>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="E-mail" value="{{ auth()->user()->email }}" disabled>
                    </div>
                </div>
                @if (auth()->user()->isCustomerService())
                    <div class="form-group mb-5 row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ auth()->user()->alamat }}" required>
                        </div>
                    </div>
                @else
                    <div class="form-group mb-5 row">
                        <label class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select name="jabatan" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>-- Pilih --</option>

                                @foreach (\App\Enum\Jabatan::cases() as $jabatan)
                                    <option 
                                        value="{{ $jabatan->value }}" 
                                        @if(auth()->user()->jabatan == $jabatan->value) 
                                        selected
                                        @endif
                                    >
                                        {{ $jabatan->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <p class="form-text">
                            Kosongkan jika tidak ingin mengubah kata sandi.
                        </p>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-3 col-form-label">Kata Sandi Lama</label>
                    <div class="col-sm-9">
                        <input name="old_password" type="password" class="form-control" placeholder="Kata Sandi Lama">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-3 col-form-label">Kata Sandi Baru</label>
                    <div class="col-sm-9">
                        <input name="new_password" type="password" class="form-control" placeholder="Kata Sandi Baru">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-3 col-form-label">Ulangi Kata Sandi Baru</label>
                    <div class="col-sm-9">
                        <input name="new_password_confirmation" type="password" class="form-control" placeholder="Ulangi Kata Sandi Baru">
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
