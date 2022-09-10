@extends('layout.adminlayout')
@section('title', 'Hasil')
@section('content')
  <table class="table table-striped datatable">
    <thead class="thead">
        <tr>
            <th>Nomor Surat</th>
            <th>Tanggal</th>
            <th>Jenis Berita Acara</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
          <tr>
            <td>{{ $report->no_berita_acara }}</td>
            <td>{{ $report->created_at->format('d/m/Y') }}</td>
            <td>{{ $report->jenis_berita_acara }}</td>
            <td>{{ \App\Enum\Status::from($report->status)->label() }}</td>
          </tr>
        @endforeach
  </table>
@endsection