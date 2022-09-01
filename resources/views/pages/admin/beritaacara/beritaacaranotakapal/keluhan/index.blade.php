@extends('layout.adminlayout')
@section('title', 'Keluhan Nota Kapal')
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
                            style="text-decoration: transparent; border: none;" name="{{ $datas->id }}">
                        <select class="form-select" name="status_id" onchange="onChangeSelect(event)"
                            onclick="onClick(event)">
                            @forelse ($status as $statuses)
                                <a href="/keluhannotakapal/store/{{ $datas->id }}/{{ $statuses->id }}"></a>
                                <option class="text-center" name="status_id" id="{{ $statuses->id }}" value="{{ $statuses->id }}">
                                    {{ $statuses->name }}</option>
                                </a>
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
    function onChangeSelect(e) {
        document.getElementById("Proses").value = e.target.value
    }

    function onClick(e) {
        var id = document.getElementById("Proses").name
        var status_id = document.getElementById("Proses").value
        var url = "/keluhannotakapal/store/" + id + "/" + status_id
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                console.log(response)
            }
        })
    }
</script>
