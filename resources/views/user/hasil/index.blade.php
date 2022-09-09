@extends('layout.mainlayout')
@section('title', 'Hasil')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Keluhan</th>
                <th>Nomor Berita Acara</th>
                <th>Jenis Berita Acara</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hasils as $data)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $data->no_keluhan }}</td>
                    <td>{{ $data->no_berita_acara }}</td>
                    <td>{{ $data->jenis_berita_acara }}</td>
                    <td>{{ \App\Enum\Status::from($data->status)->label() }}</td>
                    <td>
                        @if ($data->status == \App\Enum\Status::APPROVED->value)
                            <a 
                                href="{{ route('hasil.pdf', $data->id) }}" 
                                class="btn btn-secondary"
                                target="_blank"
                            >
                                Download Pdf
                            </a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
