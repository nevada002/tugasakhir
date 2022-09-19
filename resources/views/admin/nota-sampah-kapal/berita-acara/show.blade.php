@extends('layout.adminlayout')
@section('title', 'Detail Surat Berita Acara Nota Sampah Kapal')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <a href="{{ route('admin.nota-sampah-kapal.berita-acara.index') }}" class="btn btn-danger mb-3">
        Kembali
    </a>

    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="nomor_surat">Nomor Nota</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->nota->namakapal }}" placeholder="Nomor Nota"
                disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" value="{{ $beritaAcara->tanggal->format('Y-m-d') }}"
                placeholder="Tanggal" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="tanggalnotasampahkapal">Tanggal Nota</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" value="{{ $beritaAcara->tanggalnotasampahkapal->format('Y-m-d') }}"
                placeholder="tanggalnotasampahkapal" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->dibuatoleh }}" placeholder="Di Buat Oleh"
                disabled>
        </div>
    </div>

    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label">Penanda Tangan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->penanda_tangan->name }}" disabled>
        </div>
        <label class="col-sm-2 col-form-label">Pihak Verifikasi</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->pihak_verifikasi->name }}" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="alasan">PIC</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->pic }}" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" value="{{ $beritaAcara->lampiranpendukung }}"
                placeholder="Lampiran Pendukung" accept=".pdf" disabled>
        </div>
    </div>
@endsection
