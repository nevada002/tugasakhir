@extends('layout.adminlayout')
@section('title', 'Edit Surat Berita Acara Nota Sampah Kapal')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <a href="{{ route('admin.nota-sampah-kapal.berita-acara.index') }}" class="btn btn-danger mb-3">
        Kembali
    </a>

    <form action="{{ route('admin.nota-sampah-kapal.berita-acara.update', $beritaAcara->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label">Nomor Nota</label>
            <div class="col-sm-4">
                <select class="form-select" name="nota_id" required>
                    <option selected disabled value="{{ $beritaAcara->nota_id }}">{{ $beritaAcara->nota->namakapal }}
                    </option>
                    @foreach ($nota as $n)
                        <option value="{{ $n->id }}">{{ $n->namakapal }}</option>
                    @endforeach
                </select>
            </div>
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" value="{{ $beritaAcara->tanggal->format('Y-m-d') }}"
                    name="tanggal" placeholder="Tanggal" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label">Tanggal Nota</label>
            <div class="col-sm-4">
                <input type="date" class="form-control"
                    value="{{ $beritaAcara->tanggalnotasampahkapal->format('Y-m-d') }}" name="tanggalnotasampahkapal"
                    placeholder="tanggalnotasampahkapal" required>
            </div>
            <label class="col-sm-2 col-form-label">Di Buat Oleh</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="{{ $beritaAcara->dibuatoleh }}" name="dibuatoleh"
                    placeholder="Di Buat Oleh" required>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label">Penanda Tangan</label>
            <div class="col-sm-4">
                <select class="form-select" name="penanda_tangan_id" required>
                    @foreach ($penandaTangan as $d)
                        <option value="{{ $d->id }}" @if ($beritaAcara->penanda_tangan_id == $d->id) selected @endif>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label class="col-sm-2 col-form-label">Pihak Verifikasi</label>
            <div class="col-sm-4">
                <select class="form-select" name="pihak_verifikasi_id" required>
                    @foreach ($pihakVerifikasi as $d)
                        <option value="{{ $d->id }}" @if ($beritaAcara->pihak_verifikasi_id == $d->id) selected @endif>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="alasan">PIC</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="pic" placeholder="PIC"
                    value="{{ $beritaAcara->pic }}">
            </div>
            <label class="col-sm-2 col-form-label">Lampiran Pendukung</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" value="{{ $beritaAcara->lampiranpendukung }}"
                    name="lampiranpendukung" placeholder="Lampiran Pendukung" accept=".pdf">
                <div class="form-text">Kosongkan jika tidak ingin mengubah.</div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-1">
                <button class="btn btn-primary w-100" type="submit">Kirim</button>
            </div>
        </div>
    </form>
@endsection
