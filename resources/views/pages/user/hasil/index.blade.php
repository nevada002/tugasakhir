@extends('layout.mainlayout')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Berita Acara</th>
                <th scope="col">Jenis Berita Acara</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @forelse ($datas as $data) --}}
                <tr>
                    <th scope="row">1</th>
                    <td>12345</td>
                    <td>BA NOTA KAPAL</td>
                    <td>Diproses</td>
                    <td></td>
                </tr>
            {{-- @empty --}}
                {{-- <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr> --}}
            {{-- @endforelse --}}
        </tbody>
    </table>
@endsection
