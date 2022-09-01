@extends('layout.mainlayout')
@section('title', 'Hasil')
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
            @forelse ($hasils as $datas)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $datas->nomor_berita_acara }}</td>
                    <td>{{ $datas->jenis_berita_acara }}</td>
                    <td>{{ $datas->status }}</td>
                    <td class="d-flex justify-content-space-between">
                        <a href="{{ route('beritaacaranotasampahkapal.show', $datas->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('beritaacaranotasampahkapal.edit', $datas->id) }}" class="btn btn-success ms-1"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('beritaacaranotasampahkapal.destroy', $datas->id) }}" class="btn btn-secondary ms-1"><i class="bi bi-check-circle"></i></a>
                        <a href="{{ route('beritaacaranotasampahkapal.show', $datas->id) }}" class="btn btn-info ms-1"><i class="bi bi-list-check"></i></a>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
