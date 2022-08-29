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
        <tbody>
            @forelse ($notaKapals as $datas)
                <tr>
                    <th scope="row">{{ $datas->namakapal }}</th>
                    <td>{{ $datas->tanggal }}</td>
                    <td>{{ $datas->deskripsi }}</td>
                    <td>{{ $datas->lampiranpendukung }}</td>
                    <td>
                        <a href="/keluhannotakapal/{{ $datas->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/keluhannotakapal/{{ $datas->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
    </table>
@endsection
