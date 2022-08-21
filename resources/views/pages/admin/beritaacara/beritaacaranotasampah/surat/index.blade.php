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
        {{-- <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>12345</td>
                    <td>BA NOTA KAPAL</td>
                    <td>Diproses</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>21345</td>
                    <td>BA NOTA SAMPAH KAPAL</td>
                    <td>Ditolak</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>32145</td>
                    <td>BA PENGHAPUSAN PPKB</td>
                    <td>Berhasil</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>12345</td>
                    <td>BA NOTA KAPAL</td>
                    <td>Diproses</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>21345</td>
                    <td>BA NOTA SAMPAH KAPAL</td>
                    <td>Ditolak</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>32145</td>
                    <td>BA PENGHAPUSAN PPKB</td>
                    <td>Berhasil</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>12345</td>
                    <td>BA NOTA KAPAL</td>
                    <td>Diproses</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>21345</td>
                    <td>BA NOTA SAMPAH KAPAL</td>
                    <td>Ditolak</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>32145</td>
                    <td>BA PENGHAPUSAN PPKB</td>
                    <td>Berhasil</td>
                    <td></td>
                </tr>
            </tbody> --}}
    </table>
@endsection
