@extends('layout.adminlayout')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Keluhan Penghapusan PPKB</li>
    </ol>
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nama Kapal</th>
                <th scope="col">Negara</th>
                <th scope="col">No. PPKB / Ke</th>
                <th scope="col">Service Code</th>
                <th scope="col">Agen / Kode Agen</th>
                <th scope="col">Alasan Penghapusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaPPKBs as $datas)
                <tr>
                    <th scope="row">{{ $datas->namakapal }}</th>
                    <td>{{ $datas->negara }}</td>
                    <td>{{ $datas->noppkb }}</td>
                    <td>{{ $datas->service }}</td>
                    <td>{{ $datas->agen }}</td>
                    <td>{{ $datas->alasan }}</td>
                    <td>
                        <a href="/keluhanpenghapusanppkb/{{ $datas->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/keluhanpenghapusanppkb/{{ $datas->id }}" method="POST">
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
