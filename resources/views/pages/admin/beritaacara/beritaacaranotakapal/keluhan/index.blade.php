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
                <th scope="col" class="text-center">Nama Kapal</th>
                <th scope="col" class="text-center">Tanggal</th>
                <th scope="col" class="text-center">Deskripsi Keluhan</th>
                <th scope="col" class="text-center">Lampiran Pendukung</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaKapals as $datas)
                <tr>
                    <th class="text-center" scope="row">{{ $datas->namakapal }}</th>
                    <td class="text-center">{{ $datas->tanggal }}</td>
                    <td>{{ $datas->deskripsi }}</td>
                    <td class="text-center">
                        @if ($datas->lampiranpendukung != null)
                            <a class="btn btn-secondary" style="text-decoration: none"
                                href="{{ asset('storage/public/filelampiranpendukung' . $datas->lampiranpendukung) }}"
                                target="_blank">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="justify-content-center" style="text-align: center">
                        <input class="text-center mb-1" disabled id="Proses" type="text"
                            style="text-decoration: transparent; border: none;">
                        <select class="form-select" onchange="onClickSelect(event)">
                            <option class="text-center" value="Proses">Proses</option>
                            <option class="text-center" value="Ditolak">Ditolak</option>
                            <option class="text-center" value="Berhasil">Berhasil</option>
                        </select>
                    </td>
                </tr>
            @empty
            @endforelse
    </table>
@endsection
<script>
    function onClickSelect(e) {
        document.getElementById("Proses").value = e.target.value
    }
</script>
