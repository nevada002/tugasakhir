@extends('layout.mainlayout')
@section('content')
    <h1 class="d-flex justify-content-center align-items-center form-group mb-3">Form Keluhan Nota Sampah Kapal</h1>
    <form action="{{ route('storeNotaSampah') }}" method="post" enctype="multipart/form-data">
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
            <label for="nomornota" class="col-sm-2 col-form-label"><strong>Nomor Nota</strong></label>
            <div class="col-sm-1">
                :
            </div>
            <div class="col-sm-9">
                <input type="text" name="nomornota" class="form-control" id="nomornota">
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
                <input class="form-control" name="lampiranpendukung" type="file" id="lampiranpendukung">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </div>
    </form>
@endsection
