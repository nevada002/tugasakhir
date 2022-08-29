@extends('layout.adminlayout')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Surat Berita Acara Penghapusan PPKB</li>
    </ol>
@endsection
@section('content')
    <button type="button" class="btn btn-primary mb-3"><a href="buatsuratpenghapusanppkb"
            style="color:#fff; text-decoration: none">Buat
            Surat</a></button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Nama Kapal</th>
                <th scope="col">No.PPKB / Ke</th>
                <th scope="col">Service Code</th>
                <th scope="col">No. UKK</th>
                <th scope="col">Agen</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Alasan Penghapusan</th>
                <th scope="col">Di Buat Oleh</th>
                <th scope="col">Lampiran Pendukung</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaPPKBs as $datas)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $datas->nomor_surat }}</td>
                    <td>{{ $datas->tanggal }}</td>
                    <td>{{ $datas->nama_perusahaan }}</td>
                    <td>{{ $datas->nama_kapal }}</td>
                    <td>{{ $datas->noppkb }}</td>
                    <td>{{ $datas->service_code }}</td>
                    <td>{{ $datas->noukk }}</td>
                    <td>{{ $datas->agen }}</td>
                    <td>{{ $datas->lokasi }}</td>
                    <td>{{ $datas->tujuan }}</td>
                    <td>{{ $datas->alasan }}</td>
                    <td>{{ $datas->dibuatoleh }}</td>
                    <td>{{ $datas->lampiranpendukung }}</td>
                    <td>
                        <a href="/suratpenghapusanppkb/{{ $datas->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/suratpenghapusanppkb/{{ $datas->id }}" method="POST">
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
