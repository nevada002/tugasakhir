@extends('layout.adminlayout')
@section('title', 'Surat Berita Acara Penghapusan PPKB')
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
                <th scope="row">No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Nama Perusahaan</th>
                <th>Nama Kapal</th>
                <th>No.PPKB / Ke</th>
                <th>Service Code</th>
                <th>No. UKK</th>
                <th>Agen</th>
                <th>Lokasi</th>
                <th>Tujuan</th>
                <th>Alasan Penghapusan</th>
                <th>Di Buat Oleh</th>
                <th>Lampiran Pendukung</th>
                <th>Aksi</th>
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
                    <td>
                        @if ($datas->lampiranpendukung != null)
                            <a class="btn btn-secondary" style="text-decoration: none"
                                href="{{ asset('storage/public/filelampiranpendukung' . $datas->lampiranpendukung) }}"
                                target="_blank">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="d-flex justify-content-space-between">
                        <a href="#" class="btn btn-primary"><i
                                class="bi bi-eye"></i></a>
                        <a href="#" class="btn btn-success ms-1"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-secondary ms-1"><i
                                class="bi bi-check-circle"></i></a>
                        <a href="#" class="btn btn-info ms-1"><i
                                class="bi bi-list-check"></i></a>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
