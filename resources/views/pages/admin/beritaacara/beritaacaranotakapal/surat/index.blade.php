@extends('layout.adminlayout')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: #fff">Surat Berita Acara Nota Kapal</li>
    </ol>
@endsection
@section('content')
    <button type="button" class="btn btn-primary mb-3"><a href="/buatsuratnotakapal"
            style="color:#fff; text-decoration: none">Buat
            Surat</a></button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">No Surat Perusahaan</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Perihal</th>
                <th scope="col">Nomor Nota Kapal</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Di Buat Oleh</th>
                <th scope="col">Lampiran Pendukung</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaKapals as $datas)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $datas->nomor_surat }}</td>
                    <td>{{ $datas->tanggal }}</td>
                    <td>{{ $datas->nama_perusahaan }}</td>
                    <td>{{ $datas->no_surat_perusahaan }}</td>
                    <td>{{ $datas->tanggal_surat }}</td>
                    <td>{{ $datas->perihal }}</td>
                    <td>{{ $datas->nomor_nota_kapal }}</td>
                    <td>{{ $datas->keterangan }}</td>
                    <td>{{ $datas->dibuatoleh }}</td>
                    <td>{{ $datas->lampiranpendukung }}</td>
                    <td>
                        <a href="/suratnotakapal/{{ $datas->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/deleteNotaKapal/{{ $datas->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
