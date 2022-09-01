@extends('layout.adminlayout')
@section('title', 'Buat Surat Berita Acara Nota Sampah Kapal')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: #fff">Buat Surat Berita Acara Nota Sampah Kapal
        </li>
    </ol>
@endsection
@section('content')
    <button type="button" class="btn btn-danger mb-3"><a href="/suratnotasampahkapal"
            style="color:#fff; text-decoration: none">Kembali</a></button>
    <form action="{{ route('storeBeritaAcaraNotaSampah') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="nomor_surat">Nomor Surat</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
            </div>
            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="tanggalnotasampahkapal">Tanggal Nota Sampah Kapal</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggalnotasampahkapal" name="tanggalnotasampahkapal"
                    placeholder="tanggalnotasampahkapal">
            </div>
            <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh" placeholder="Di Buat Oleh">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="lampiranpendukung" name="lampiranpendukung"
                    placeholder="Lampiran Pendukung" accept=".pdf">
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
