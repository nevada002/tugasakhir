@extends('layout.adminlayout')
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
                <th scope="col">No</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Tanggal Nota Sampah Kapal</th>
                <th scope="col">Di Buat Oleh</th>
                <th scope="col">Lampiran Pendukung</th>
                <th scope="col">Aksi</th>
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
                        <a href="/suratnotakapal/{{ $datas->id }}/edit" class="btn btn-primary"><i
                                class="bi bi-eye"></i></a>
                        <a href="/suratnotakapal/{{ $datas->id }}/edit" class="btn btn-success ms-1"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="/suratnotakapal/{{ $datas->id }}/edit" class="btn btn-secondary ms-1"><i
                                class="bi bi-check-circle"></i></a>
                        <a href="/suratnotakapal/{{ $datas->id }}/edit" class="btn btn-info ms-1"><i
                                class="bi bi-list-check"></i></a>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
