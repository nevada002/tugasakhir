@extends('layout.adminlayout')
@section('title', 'Buat Surat Berita Acara Nota Kapal')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    
    <a href="{{ route('admin.nota-kapal.berita-acara.index') }}" class="btn btn-danger mb-3">
        Kembali
    </a>

    <form action="{{ route('admin.nota-kapal.berita-acara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 row">
            {{-- <label class="col-sm-2 col-form-label" for="nomor_surat">Nomor Surat</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
            </div> --}}
            <label class="col-sm-2 col-form-label" for="nomor_nota_kapal">Nomor Nota Kapal</label>
            <div class="col-sm-4">
                <select class="form-select" name="nota_id" required>
                    <option selected disabled value="">-- Pilih --</option>
                    @foreach ($notaKapal as $datas)
                        <option value="{{ $datas->id }}">{{ $datas->namakapal }}</option>
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
            <label class="col-sm-2 col-form-label" for="no_surat_perusahaan">No Surat Perusahaan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_surat_perusahaan" name="no_surat_perusahaan"
                    placeholder="No Surat Perusahaan" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="tanggal_surat">Tanggal Surat</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
                    placeholder="Tanggal Surat" required>
            </div>
            <label class="col-sm-2 col-form-label" for="perihal">Perihal</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            {{-- <label class="col-sm-2 col-form-label" for="nomor_nota_kapal">Nomor Nota Kapal</label>
            <div class="col-sm-4">
                <select class="form-select" name="nota_id">
                    <option name="">Pilih nota kapal</option>
                    @foreach ($notaKapal as $datas)
                        <option id="{{ $datas->id }}" value="{{ $datas->id }}" name="nota_id">
                            {{ $datas->namakapal }}</option>
                    @endforeach
                </select>
            </div> --}}
            <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="lampiranpendukung" name="lampiranpendukung" laceholder="Lampiran Pendukung" accept=".pdf" required>
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
            <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="2" required></textarea>
            </div>
        </div>
        {{-- <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="lampiranpendukung">Lampiran Pendukung</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="lampiranpendukung" name="lampiranpendukung" laceholder="Lampiran Pendukung" accept=".pdf">
            </div>
        </div> --}}
        <div class="row justify-content-end">
            <div class="col-1">
                <button class="btn btn-primary w-100" type="submit">Kirim</button>
            </div>
        </div>
    </form>
@endsection
