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
            @forelse ($notaPPKBs as $nota)
                <tr>
                    <th class="text-center" scope="row">{{ $nota->namakapal }}</th>
                    <td class="text-center">{{ $nota->negara }}</td>
                    <td class="text-center">{{ $nota->noppkb }}</td>
                    <td class="text-center">{{ $nota->service }}</td>
                    <td class="text-center">{{ $nota->agen }}</td>
                    <td>{{ $nota->alasan }}</td>
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
                url: "{{ url('admin/penghapusan-ppkb/keluhan/') }}/" + id,
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

