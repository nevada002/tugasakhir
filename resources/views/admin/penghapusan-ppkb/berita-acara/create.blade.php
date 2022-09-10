@extends('layout.adminlayout')
@section('title', 'Buat Surat Berita Acara Penghapusan PPKB')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    
    <a href="{{ route('admin.penghapusan-ppkb.berita-acara.index') }}" class="btn btn-danger mb-3">
        Kembali
    </a>

    <form action="{{ route('admin.penghapusan-ppkb.berita-acara.store') }}" method="POST" enctype="multipart/form-data">
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
            <label class="col-sm-2 col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                    placeholder="Nama Perusahaan" required>
            </div>
            <label class="col-sm-2 col-form-label" for="nama_kapal">Nama Kapal</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" placeholder="Nama Kapal" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="noppkb">No.PPKB / Ke</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="noppkb" name="noppkb" placeholder="No.PPKB / Ke" required>
            </div>
            <label class="col-sm-2 col-form-label" for="service_code">Service Code</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="service_code" name="service_code" placeholder="Service Code" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="noukk">No. UKK</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="noukk" name="noukk" placeholder="No. UKK" required>
            </div>
            <label class="col-sm-2 col-form-label" for="agen">Agen</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="agen" name="agen" placeholder="Agen" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" required>
            </div>
            <label class="col-sm-2 col-form-label" for="tujuan">Tujuan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="lampiranpendukung" name="lampiranpendukung"
                    placeholder="Lampiran Pendukung" accept=".pdf" required>
            </div>
            <label class="col-sm-2 col-form-label" for="dibuatoleh">Di Buat Oleh</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh"
                    placeholder="Di Buat Oleh" required>
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
            <label class="col-sm-2 col-form-label" for="alasan">Alasan Penghapusan</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="alasan" name="alasan" placeholder="Alasan Penghapusan required"
                    rows="2"></textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-1">
                <button class="btn btn-primary w-100" type="submit">Kirim</button>
            </div>
        </div>
    </form>
@endsection
