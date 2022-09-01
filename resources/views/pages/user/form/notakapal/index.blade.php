@extends('layout.mainlayout')
@section('title', 'Keluhan Nota Kapal')
@section('content')
    <h1 class="d-flex justify-content-center align-items-center mb-3">Form Keluhan Nota Kapal</h1>
    <form action="{{ route('storeNotaKapal') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 row">
            <label for="namakapal" class="col-sm-2 col-form-label"><strong>Nama Kapal</strong></label>
            <div class="col-sm-1">
                :
            </div>
            <div class="col-sm-9">
                <input type="text" name="namakapal" class="form-control" id="namakapal">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label"><strong>Tanggal</strong></label>
            <div class="col-sm-1">
                :
            </div>
            <div class="col-sm-9">
                <input type="date" name="tanggal" class="form-control" id="tanggal">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label"><strong>Deskripsi</strong></label>
            <div class="col-sm-1">
                :
            </div>
            <div class="col-sm-9">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group mb-3 row">
            <label for="lampiranpendukung" class="col-sm-2 col-form-label">
                <strong>
                    Lampiran Pendukung
                </strong>
            </label>
            <div class="col-sm-1">
                :
            </div>
            <div class="col-sm-9">
                <input class="form-control" name="lampiranpendukung" class="form-control-file" type="file"
                    id="lampiranpendukung" accept=".pdf">
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </div>
    </form>
@endsection
