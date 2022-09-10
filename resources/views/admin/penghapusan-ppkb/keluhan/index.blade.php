@extends('layout.adminlayout')
@section('title', 'Keluhan Penghapusan PPKB')
@section('content')
    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th>Nama Kapal</th>
                <th>Negara</th>
                <th>No. PPKB / Ke</th>
                <th>Service Code</th>
                <th>Agen / Kode Agen</th>
                <th>Alasan Penghapusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notaPPKBs as $data)
                <tr>
                    <th>{{ $data->namakapal }}</th>
                    <td>{{ $data->negara }}</td>
                    <td>{{ $data->noppkb }}</td>
                    <td>{{ $data->service }}</td>
                    <td>{{ $data->agen }}</td>
                    <td>{{ $data->alasan }}</td>
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
                url: "{{ url('admin/penghapusan-ppkb/keluhan/') }}/" + id,
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
