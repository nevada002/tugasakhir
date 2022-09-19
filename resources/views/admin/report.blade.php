@extends('layout.adminlayout')
@section('title', 'Hasil')
@section('content')
    <button class="btn btn-primary px-3 mb-4" data-bs-toggle="modal" data-bs-target="#modalFilter">Filter</button>
    <table class="table table-striped datatable">
        <thead class="thead">
            <tr>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Jenis Berita Acara</th>
                <th>PIC</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->no_berita_acara }}</td>
                    <td>{{ $report->created_at->format('d/m/Y') }}</td>
                    <td>{{ $report->jenis_berita_acara }}</td>
                    <td>{{ @$report->berita_acara->pic ?? '-' }}</td>
                    <td>{{ \App\Enum\Status::from($report->status)->label() }}</td>
                    <td>
                        @if ($report->berita_acara &&
                            $report->berita_acara->penanda_tangan_status &&
                            $report->berita_acara->pihak_verifikasi_status)
                            <a href="{{ route('admin.report.pdf', $report->id) }}" class="btn btn-secondary" target="_blank">
                                Download Pdf
                            </a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
    </table>

    <div class="modal" tabindex="-1" id="modalFilter" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="search">
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-4">
                                <input name="start" type="text" class="form-control" id="start"
                                    value="{{ request('start') }}">
                            </div>
                            <label class="col-sm-1 col-form-label">-</label>
                            <div class="col-sm-4">
                                <input name="end" type="text" class="form-control" id="end"
                                    value="{{ request('end') }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="search" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(function() {
            $('#start').flatpickr({
                dateFormat: "Y-m-d",
            });

            $('#start').change(function() {
                let _start = $('#start').val();
                let start = new Date(_start)
                start.setDate(start.getDate() + 1);

                let end = new Date(_start);
                end.setDate(end.getDate() + 7);

                $('#end').flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: start.toISOString().slice(0, 10),
                    maxDate: end.toISOString().slice(0, 10)
                });
            });
        })
    </script>
@endpush
