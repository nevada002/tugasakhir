@extends('layout.adminlayout')
@section('title', 'Detail Surat Berita Acara Penghapusan PPKB')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <a href="{{ route('admin.penghapusan-ppkb.berita-acara.index') }}" class="btn btn-danger mb-3">
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
            <input type="date" class="form-control" value="{{ $beritaAcara->tanggal->format('Y-m-d') }}" name="tanggal"
                placeholder="Tanggal" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->nama_perusahaan }}" name="nama_perusahaan"
                placeholder="Nama Perusahaan" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="nama_kapal">Nama Kapal</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->nama_kapal }}" name="nama_kapal"
                placeholder="Nama Kapal" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="noppkb">No.PPKB / Ke</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->noppkb }}" name="noppkb"
                placeholder="No.PPKB / Ke" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="service_code">Service Code</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->service_code }}" name="service_code"
                placeholder="Service Code" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="noukk">No. UKK</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->noukk }}" name="noukk"
                placeholder="No. UKK" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="agen">Agen</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->agen }}" name="agen" placeholder="Agen"
                disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->lokasi }}" name="lokasi"
                placeholder="Lokasi" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="tujuan">Tujuan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->tujuan }}" name="tujuan"
                placeholder="Tujuan" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" value="{{ $beritaAcara->lampiranpendukung }}"
                name="lampiranpendukung" placeholder="Lampiran Pendukung" accept=".pdf" disabled>
            <div class="form-text">Kosongkan jika tidak ingin mengubah.</div>
        </div>
        <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->dibuatoleh }}" name="dibuatoleh"
                placeholder="Di Buat Oleh" disabled>
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
        <label class="col-sm-2 col-form-label" for="alasan">Alasan Penghapusan</label>
        <div class="col-sm-4">
            <textarea type="text" class="form-control" name="alasan" placeholder="Alasan Penghapusan disabled"
                rows="2" disabled>{{ $beritaAcara->alasan }}</textarea>
        </div>
    </div>
@endsection
