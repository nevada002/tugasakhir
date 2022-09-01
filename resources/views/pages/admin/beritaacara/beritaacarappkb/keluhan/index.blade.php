@extends('layout.adminlayout')
@section('title', 'Keluhan Penghapusan PPKB')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Keluhan Penghapusan PPKB</li>
    </ol>
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nama Kapal</th>
                <th class="text-center" scope="col">Negara</th>
                <th class="text-center" scope="col">No. PPKB / Ke</th>
                <th class="text-center" scope="col">Service Code</th>
                <th class="text-center" scope="col">Agen / Kode Agen</th>
                <th class="text-center" scope="col">Alasan Penghapusan</th>
                <th class="text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaPPKBs as $datas)
                <tr>
                    <th class="text-center" scope="row">{{ $datas->namakapal }}</th>
                    <td class="text-center">{{ $datas->negara }}</td>
                    <td class="text-center">{{ $datas->noppkb }}</td>
                    <td class="text-center">{{ $datas->service }}</td>
                    <td class="text-center">{{ $datas->agen }}</td>
                    <td>{{ $datas->alasan }}</td>
                    <td class="justify-content-center" style="text-align: center">
                        <input class="text-center mb-1" disabled id="Proses" type="text"
                            style="text-decoration: transparent; border: none;">
                        <select class="form-select" onchange="onClickSelect(event)">
                            @forelse ($status as $statuses)
                                <option class="text-center" id="{{ $statuses->id }}">{{ $statuses->name }}</option>
                            @empty
                                -
                            @endforelse
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
