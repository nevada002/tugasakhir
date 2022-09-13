@extends('layout.adminlayout')
@section('title', 'Buat Surat Berita Acara Nota Sampah Kapal')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    
    <a href="{{ route('admin.nota-sampah-kapal.berita-acara.index') }}" class="btn btn-danger mb-3">
        Kembali
    </a>

    <form action="{{ route('admin.nota-sampah-kapal.berita-acara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="nomor_surat">Nomor Nota</label>
            <div class="col-sm-4">
                <select class="form-select" name="nota_id" required>
                    <option selected disabled value="">-- Pilih --</option>
                    @foreach ($nota as $n)
                        <option value="{{ $n->id }}">{{ $n->namakapal }}</option>
                    @endforeach
                </select>
            </div>
            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="tanggalnotasampahkapal">Tanggal Nota</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggalnotasampahkapal" name="tanggalnotasampahkapal"
                    placeholder="tanggalnotasampahkapal" required>
            </div>
            <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh" placeholder="Di Buat Oleh" required>
            </div>
        </div>

        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label">Penanda Tangan</label>
            <div class="col-sm-4">
                <select class="form-select" name="penanda_tangan_id" required>
                    <option disabled selected value="">-- Pilih --</option>
                    @foreach ($penandaTangan as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <label class="col-sm-2 col-form-label">Pihak Verifikasi</label>
            <div class="col-sm-4">
                <select class="form-select" name="pihak_verifikasi_id" required>
                    <option disabled selected value="">-- Pilih --</option>
                    @foreach ($pihakVerifikasi as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="alasan">PIC</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="pic" placeholder="PIC" required>
            </div>
            <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="lampiranpendukung" name="lampiranpendukung"
                    placeholder="Lampiran Pendukung" accept=".pdf" required>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-1">
                <button class="btn btn-primary w-100" type="submit">Kirim</button>
            </div>
        </div>
    </form>
@endsection
