@extends('layout.adminlayout')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Keluhan Nota Kapal</li>
    </ol>
@endsection
@section('content')
    <table class="table table-striped">
        <thead class="thead">
            <tr>
                <th scope="col">Nama Kapal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Deskripsi Keluhan</th>
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
