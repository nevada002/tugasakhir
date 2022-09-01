@extends('layout.adminlayout')
@section('title', 'Surat Berita Acara Nota Sampah Kapal')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Surat Berita Acara Nota Sampah Kapal</li>
    </ol>
@endsection
@section('content')
    <button type="button" class="btn btn-primary mb-3"><a href="buatsuratnotasampahkapal"
            style="color:#fff; text-decoration: none">Buat
            Surat</a></button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="row">No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Tanggal Nota Sampah Kapal</th>
                <th>Di Buat Oleh</th>
                <th>Lampiran Pendukung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaSampahs as $datas)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $datas->nomor_surat }}</td>
                    <td>{{ $datas->tanggal }}</td>
                    <td>{{ $datas->tanggalnotasampahkapal }}</td>
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
                        <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <a href="#" class="btn btn-success ms-1"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-secondary ms-1"><i class="bi bi-check-circle"></i></a>
                        <a href="#" class="btn btn-info ms-1"><i class="bi bi-list-check"></i></a>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
