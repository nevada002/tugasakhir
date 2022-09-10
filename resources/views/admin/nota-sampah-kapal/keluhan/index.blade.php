@extends('layout.adminlayout')
@section('title', 'Keluhan Nota Sampah Kapal')
@section('content')
    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th>Nama Kapal</th>
                <th>Tanggal</th>
                <th>Nomor Nota</th>
                <th>Deskripsi Keluhan</th>
                <th>Lampiran Pendukung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaSampahs as $data)
                <tr>
                    <th>{{ $data->namakapal }}</th>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->nomornota }}</td>
                    <td>{{ $data->deskripsi }}</td>
                    <td>
                        @if ($data->lampiranpendukung != null)
                            <a 
                                class="btn btn-secondary" 
                                style="text-decoration: none"
                                href="{{ asset('storage/filelampiranpendukung/' . $data->lampiranpendukung) }}"
                                target="_blank"
                            >
                                Download
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <button 
                            onclick="approval(this)" 
                            class="btn btn-secondary ms-1"
                            data-id="{{ $data->id }}"
                        >
                            <i class="bi bi-check-circle"></i>
                        </button>
                    </td>
                </tr>
            @empty
            @endforelse
    </table>
@endsection


@push('scripts')
    <script>
        function approval(e) {
            const { id } = $(e).data()

            Swal.fire({
                title: 'Pilih Aksi',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Terima',
                cancelButtonText: 'Tolak',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then(res => {
                if (res.isConfirmed) {
                    doApproval(id, 3)
                    return
                }

                if (!res.isConfirmed && res.dismiss == 'cancel') {
                    Swal.fire({
                        title: 'Keterangan',
                        input: 'text',
                        confirmButtonText: 'Konfirmasi',
                        showCancelButton: true,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            doApproval(id, 2)
                        }
                    })
                }
            })
        }

        function doApproval(id, status) {
            let role = {{ auth()->user()->role }};

            $.ajax({
                url: "{{ url('admin/nota-sampah-kapal/keluhan/') }}/" + id,
                data: { status, role },
                type: 'POST',
            }).done(res => {
                Swal.fire('Sukses', '', 'success').then(res => {
                    window.location.reload();
                })
            }).fail(err => {
                Swal.fire('Gagal', err.responseJSON.message, 'error')
            })
        }
    </script>
@endpush

