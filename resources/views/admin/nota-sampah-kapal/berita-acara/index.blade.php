@extends('layout.adminlayout')
@section('title', 'Surat Berita Acara Nota Sampah Kapal')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    @if (auth()->user()->isCustomerService())
        <a href="{{ route('admin.nota-sampah-kapal.berita-acara.create') }}" class="btn btn-primary mb-3">
            Buat Surat
        </a>
    @endif

    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th scope="row">No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Tanggal Nota Sampah Kapal</th>
                <th>Di Buat Oleh</th>
                <th>PIC</th>
                <th>Lampiran Pendukung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritaAcaras as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nomor_surat }}</td>
                    <td>{{ $data->tanggal->locale('id')->isoFormat('DD MMMM YYYY') }}</td>
                    <td>{{ $data->tanggalnotasampahkapal->locale('id')->isoFormat('DD MMMM YYYY') }}</td>
                    <td>{{ $data->dibuatoleh }}</td>
                    <td>{{ $data->pic }}</td>
                    <td>
                        @if ($data->lampiranpendukung != null)
                            <a class="btn btn-secondary" style="text-decoration: none"
                                href="{{ asset('storage/filelampiranpendukung/' . $data->lampiranpendukung) }}"
                                target="_blank">
                                Download
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.nota-sampah-kapal.berita-acara.show', ['id' => $data->id]) }}"
                            class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>

                        @if (auth()->user()->isCustomerService())
                            <a href="{{ route('admin.nota-sampah-kapal.berita-acara.edit', ['id' => $data->id]) }}"
                                class="btn btn-success ms-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        @endif

                        @if ((auth()->user()->isSigner() &&
                            !$data->penanda_tangan_time) ||
                            (auth()->user()->isVerificator() &&
                                !$data->pihak_verifikasi_time))
                            <button onclick="approval(this)" class="btn btn-secondary ms-1"
                                data-url="{{ route('admin.nota-sampah-kapal.berita-acara.approval', $data->id) }}"
                                data-role="{{ auth()->user()->role }}">
                                <i class="bi bi-check-circle"></i>
                            </button>
                        @endif

                        <button class="btn btn-info ms-1" onclick="showLog(this)" data-id="{{ $data->id }}"
                            data-name-pt="{{ $data->penanda_tangan->name }}"
                            data-time-pt="{{ $data->penanda_tangan_time ? $data->penanda_tangan_time->format('d/m/Y H:i') : '-' }}"
                            data-status-pt="{{ $data->penanda_tangan_status ? \App\Enum\Status::from($data->penanda_tangan_status)->label() : '-' }}"
                            data-note-pt="{{ $data->penanda_tangan_keterangan ?? '-' }}"
                            data-name-pv="{{ $data->pihak_verifikasi->name }}"
                            data-time-pv="{{ $data->pihak_verifikasi_time ? $data->pihak_verifikasi_time->format('d/m/Y H:i') : '-' }}"
                            data-status-pv="{{ $data->pihak_verifikasi_status ? \App\Enum\Status::from($data->pihak_verifikasi_status)->label() : '-' }}"
                            data-note-pv="{{ $data->pihak_verifikasi_keterangan ?? '-' }}">
                            <i class="bi bi-list-check"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-modal-log />
@endsection
