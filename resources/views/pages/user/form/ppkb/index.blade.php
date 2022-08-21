@extends('layout.mainlayout')
@section('content')
    <h1 class="d-flex justify-content-center align-items-center mb-3">Form Penghapusan PPKB</h1>
    <div class="mb-3 row">
        <label for="namakapal" class="col-sm-2 col-form-label"><strong>Nama Kapal</strong></label>
        <div class="col-sm-1">
            :
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="namakapal">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="negara" class="col-sm-2 col-form-label"><strong>Negara</strong></label>
        <div class="col-sm-1">
            :
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="negara">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="noppkb" class="col-sm-2 col-form-label"><strong>No. PPKB / Ke</strong></label>
        <div class="col-sm-1">
            :
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="noppkb">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="service" class="col-sm-2 col-form-label"><strong>Service Code</strong></label>
        <div class="col-sm-1">
            :
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="service">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="agen" class="col-sm-2 col-form-label"><strong>Agen / Kode Agen</strong></label>
        <div class="col-sm-1">
            :
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="agen">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alasan" class="col-sm-2 col-form-label"><strong>Alasan Penghapusan</strong></label>
        <div class="col-sm-1">
            :
        </div>
        <div class="col-sm-9">
            <textarea class="form-control" id="alasan" rows="5"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-11"></div>
        <div class="col-sm-1">
            <button class="btn btn-primary" type="submit">Kirim</button>
        </div>
    </div>
@endsection
