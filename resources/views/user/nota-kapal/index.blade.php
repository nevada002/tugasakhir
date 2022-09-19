@extends('layout.mainlayout')
@section('title', 'Keluhan Nota Kapal')
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-12 col-md-9">
            @if (session()->has('success'))
                <div class="mb-5">
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5">
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                </div>
            @endif

            <h1 class="text-center mb-5">Form Keluhan Nota Kapal</h1>
            <form action="{{ route('keluhan.nota-kapal.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="namakapal" class="col-12 col-md-3 col-form-label fw-bold">Nama Kapal</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="namakapal" class="form-control" value="{{ old('namakapal') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal" class="col-12 col-md-3 col-form-label fw-bold">Tanggal</label>
                    <div class="col-12 col-md-9">
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="deskripsi" class="col-12 col-md-3 col-form-label fw-bold">Deskripsi</label>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="lampiranpendukung" class="col-12 col-md-3 col-form-label fw-bold">Lampiran Pendukung</label>
                    <div class="col-12 col-md-9">
                        <input class="form-control" name="lampiranpendukung" class="form-control-file" type="file"
                            accept=".pdf" required>
                    </div>
                </div>

                <div class="mb-3 row justify-content-end px-2">
                    <div class="col-1">
                        <button class="btn btn-primary btn-block" type="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
