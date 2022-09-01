@extends('layout.adminlayout')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Keluhan Nota Sampah Kapal</li>
    </ol>
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nama Kapal</th>
                <th class="text-center" scope="col">Tanggal</th>
                <th class="text-center" scope="col">Nomor Nota</th>
                <th class="text-center" scope="col">Deskripsi Keluhan</th>
                <th class="text-center" scope="col">Lampiran Pendukung</th>
                <th class="text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaSampahs as $datas)
                <tr>
                    <th class="text-center" scope="row">{{ $datas->namakapal }}</th>
                    <td class="text-center">{{ $datas->tanggal }}</td>
                    <td class="text-center">{{ $datas->nomornota }}</td>
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
