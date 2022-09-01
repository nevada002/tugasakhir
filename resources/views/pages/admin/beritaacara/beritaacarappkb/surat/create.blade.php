@extends('layout.adminlayout')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: #fff">Buat Surat Berita Acara Penghapusan PPKB
        </li>
    </ol>
@endsection
@section('content')
    <button type="button" class="btn btn-danger mb-3"><a href="/suratpenghapusanppkb"
            style="color:#fff; text-decoration: none">Kembali</a></button>
    <form action="{{ route('storeBeritaAcaraPPKB') }}" method="POST" enctype="multipart/form-data">
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
            <label class="col-sm-2 col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                    placeholder="Nama Perusahaan">
            </div>
            <label class="col-sm-2 col-form-label" for="nama_kapal">Nama Kapal</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" placeholder="Nama Kapal">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="noppkb">No.PPKB / Ke</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="noppkb" name="noppkb" placeholder="No.PPKB / Ke">
            </div>
            <label class="col-sm-2 col-form-label" for="service_code">Service Code</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="service_code" name="service_code" placeholder="Service Code">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="noukk">No. UKK</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="noukk" name="noukk" placeholder="No. UKK">
            </div>
            <label class="col-sm-2 col-form-label" for="agen">Agen</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="agen" name="agen" placeholder="Agen">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
            </div>
            <label class="col-sm-2 col-form-label" for="tujuan">Tujuan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh"
                    placeholder="Di Buat Oleh">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="alasan">Alasan Penghapusan</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="alasan" name="alasan" placeholder="Alasan Penghapusan"
                    rows="2"></textarea>
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
