@extends('layout.adminlayout')
@section('title', 'Keluhan Nota Sampah Kapal')
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
            @forelse ($notaSampahs as $nota)
                <tr>
                    <th class="text-center" scope="row">{{ $nota->namakapal }}</th>
                    <td class="text-center">{{ $nota->tanggal }}</td>
                    <td class="text-center">{{ $nota->nomornota }}</td>
                    <td>{{ $nota->deskripsi }}</td>
                    <td class="text-center">
                        @if ($nota->lampiranpendukung != null)
                            <a 
                                class="btn btn-secondary" 
                                style="text-decoration: none"
                                href="{{ asset('storage/filelampiranpendukung/' . $nota->lampiranpendukung) }}"
                                target="_blank"
                            >
                                Download
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="justify-content-center" style="text-align: center">
                        <select class="form-select" name="status" onchange="handleChangeStatus(event)">
                            @foreach ($status as $s)
                                <option value="{{ $s->value }}" data-id="{{ $nota->id }}">{{ $s->label() }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @empty
            @endforelse
    </table>
@endsection


@push('scripts')
    <script>
        function handleChangeStatus(e) {
            let id = $(e.target).find(':selected').data('id');
            let status = e.target.value;
           
            $.ajax({
                url: "{{ url('admin/nota-sampah-kapal/keluhan/') }}/" + id,
                data: { status },
                type: 'POST',
                success: function() {
                    alert('success');
                    window.location.reload();
                }
            })
        }
    </script>
@endpush

