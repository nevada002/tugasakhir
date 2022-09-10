@extends('layout.adminlayout')
@section('title', 'Detail Surat Berita Acara Nota Kapal')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <a href="{{ route('admin.nota-kapal.berita-acara.index') }}" class="btn btn-danger mb-3">
        Kembali
    </a>


    <div class="form-group mb-3 row">
        {{-- <label class="col-sm-2 col-form-label" for="nomor_surat">Nomor Surat</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
        </div> --}}
        <label class="col-sm-2 col-form-label" for="nomor_nota_kapal">Nomor Nota Kapal</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $beritaAcara->nota->namakapal }}" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal" name="tanggal" 
                placeholder="Tanggal" value="{{ $beritaAcara->tanggal->format('Y-m-d') }}" @disabled(true)>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                placeholder="Nama Perusahaan" value="{{ $beritaAcara->nama_perusahaan }}" @disabled(true)>
        </div>
        <label class="col-sm-2 col-form-label" for="no_surat_perusahaan">No Surat Perusahaan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="no_surat_perusahaan" name="no_surat_perusahaan"
                placeholder="No Surat Perusahaan" value="{{ $beritaAcara->no_surat_perusahaan }}" @disabled(true)>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <label class="col-sm-2 col-form-label" for="tanggal_surat">Tanggal Surat</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
                placeholder="Tanggal Surat" value="{{ $beritaAcara->tanggal_surat->format('Y-m-d') }}" @disabled(true)>
        </div>
        <label class="col-sm-2 col-form-label" for="perihal">Perihal</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="perihal" name="perihal" 
                placeholder="Perihal" value="{{ $beritaAcara->perihal }}" @disabled(true)>
        </div>
    </div>
    <div class="form-group mb-3 row">
        {{-- <label class="col-sm-2 col-form-label" for="nomor_nota_kapal">Nomor Nota Kapal</label>
        <div class="col-sm-4">
            <select class="form-select" name="nota_id">
                <option name="">Pilih nota kapal</option>
                @foreach ($notaKapal as $d)
                    <option id="{{ $d->id }}" value="{{ $d->id }}" name="nota_id">
                        {{ $d->namakapal }}</option>
                @endforeach
            </select>
        </div> --}}
        <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" id="lampiranpendukung" name="lampiranpendukung" 
                laceholder="Lampiran Pendukung" accept=".pdf" disabled>
        </div>
        <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh" 
                placeholder="Di Buat Oleh" value="{{ $beritaAcara->dibuatoleh }}" @disabled(true)>
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
        <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="keterangan" name="keterangan" 
                placeholder="Keterangan" rows="2" @disabled(true)>{{ $beritaAcara->keterangan }}</textarea>
        </div>
    </div>
@endsection
