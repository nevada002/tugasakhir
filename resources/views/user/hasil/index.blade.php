@extends('layout.mainlayout')
@section('title', 'Hasil')
@section('content')
  <table class="table table-striped datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor Keluhan</th>
        <th>Nomor Berita Acara</th>
        <th>Jenis Berita Acara</th>
        <th>PIC</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($hasils as $data)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>
            <a 
              class="text-bold" 
              href="#" 
              onclick="showModal(this)"

              @if ($data->nota_type === 'App\Models\NotaKapal')
                data-type="nota-kapal"
                data-namakapal="{{ $data->nota->namakapal }}"
                data-tanggal="{{ $data->nota->tanggal->locale('id')->isoFormat('DD MMMM YYYY') }}"
                data-deskripsi="{{ $data->nota->deskripsi }}"
                data-lampiranpendukung="{{ asset('storage/filelampiranpendukung/' . $data->nota->lampiranpendukung) }}"
              @elseif ($data->nota_type === 'App\Models\NotaSampah')
                data-type="nota-sampah-kapal"
                data-namakapal="{{ $data->nota->namakapal }}"
                data-tanggal="{{ $data->nota->tanggal->locale('id')->isoFormat('DD MMMM YYYY') }}"
                data-nomornota="{{ $data->nota->nomornota }}"
                data-deskripsi="{{ $data->nota->deskripsi }}"
                data-lampiranpendukung="{{ asset('storage/filelampiranpendukung/' . $data->nota->lampiranpendukung) }}"
              @else
                data-type="penghapusan-ppkb"
                data-namakapal="{{ $data->nota->namakapal }}"
                data-negara="{{ $data->nota->negara }}"
                data-noppkb="{{ $data->nota->noppkb }}"
                data-service="{{ $data->nota->service }}"
                data-agen="{{ $data->nota->agen }}"
                data-alasan="{{ $data->nota->alasan }}"
              @endif

              data-name-pt="{{ @$data->berita_acara->penanda_tangan->name ?? '-' }}"
              data-time-pt="{{ @$data->berita_acara->penanda_tangan_time ? $data->berita_acara->penanda_tangan_time->format('d/m/Y H:i') : '-' }}"
              data-status-pt="{{ @$data->berita_acara->penanda_tangan_status ? \App\Enum\Status::from($data->berita_acara->penanda_tangan_status)->label() : '-' }}"
              data-name-pv="{{ @$data->berita_acara->pihak_verifikasi->name ?? '-' }}"
              data-time-pv="{{ @$data->berita_acara->pihak_verifikasi_time ? $data->berita_acara->pihak_verifikasi_time->format('d/m/Y H:i') : '-' }}"
              data-status-pv="{{ @$data->berita_acara->pihak_verifikasi_status ? \App\Enum\Status::from($data->berita_acara->pihak_verifikasi_status)->label() : '-'  }}"
            >
              {{ $data->no_keluhan }}
            </a>
          </td>
          <td>{{ $data->no_berita_acara }}</td>
          <td>{{ $data->jenis_berita_acara }}</td>
          <td>{{ @$data->berita_acara->pic ?? '-' }}</td>
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

  <div class="modal fade" tabindex="-1" id="modalDetail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          {{-- nota kapal --}}
          <div class="keluhan" id="nota-kapal">
            <div class="mb-3 row">
              <label for="namakapal" class="col-12 col-sm-4 col-form-label">Nama Kapal</label>
              <div class="col-12 col-sm-8">
                <input type="text" id="namakapal" class="form-control" disabled>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="tanggal" class="col-12 col-sm-4 col-form-label">Tanggal</label>
              <div class="col-12 col-sm-8">
                <input type="text" id="tanggal" class="form-control" disabled>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="deskripsi" class="col-12 col-sm-4 col-form-label">Deskripsi</label>
              <div class="col-12 col-sm-8">
                <textarea class="form-control" id="deskripsi" rows="5" disabled></textarea>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="lampiranpendukung" class="col-12 col-sm-4 col-form-label">Lampiran Pendukung</label>
              <div class="col-12 col-sm-8">
                <a href="#" id="lampiranpendukung" class="form-control" target="_blank">Download</a>
              </div>
            </div>
          </div>

          {{-- nota sampah --}}
          <div class="keluhan" id="nota-sampah-kapal">
            <div class="mb-3 row">
              <label for="namakapal" class="col-12 col-sm-4 col-form-label">Nama Kapal</label>
                  <div class="col-12 col-sm-8">
                      <input type="text" id="namakapal" class="form-control" disabled>
                  </div>
              </div>

              <div class="mb-3 row">
                  <label for="tanggal" class="col-12 col-sm-4 col-form-label">Tanggal</label>
                  <div class="col-12 col-sm-8">
                      <input type="text" id="tanggal" class="form-control" disabled>
                  </div>
              </div>

              <div class="mb-3 row">
                  <label for="nomornota" class="col-12 col-sm-4 col-form-label">Nomor Nota</label>
                  <div class="col-12 col-sm-8">
                      <input type="text" id="nomornota" class="form-control" disabled>
                  </div>
              </div>
              
              <div class="mb-3 row">
                  <label for="deskripsi" class="col-12 col-sm-4 col-form-label">Deskripsi</label>
                  <div class="col-12 col-sm-8">
                      <textarea class="form-control" id="deskripsi" rows="5" disabled></textarea>
                  </div>
              </div>

              <div class="mb-3 row">
                  <label for="lampiranpendukung" class="col-12 col-sm-4 col-form-label">Lampiran Pendukung</label>
                  <div class="col-12 col-sm-8">
                    <a href="#" id="lampiranpendukung" class="form-control" target="_blank">Download</a>
                  </div>
              </div>
          </div>

          {{-- penghapusan ppkb --}}
          <div class="keluhan" id="penghapusan-ppkb">
            <div class="mb-3 row">
                <label for="namakapal" class="col-12 col-sm-4 col-form-label">Nama Kapal</label>
                <div class="col-12 col-sm-8">
                    <input type="text" id="namakapal" class="form-control" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="negara" class="col-12 col-sm-4 col-form-label">Negara</label>
                <div class="col-12 col-sm-8">
                    <input type="text" id="negara" class="form-control" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="noppkb" class="col-12 col-sm-4 col-form-label">No. PPKB / Ke</label>
                <div class="col-12 col-sm-8">
                    <input type="text" id="noppkb" class="form-control" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="service" class="col-12 col-sm-4 col-form-label">Service Code</label>
                <div class="col-12 col-sm-8">
                    <input type="text" id="service" class="form-control" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="agen" class="col-12 col-sm-4 col-form-label">Agen / Kode Agen</label>
                <div class="col-12 col-sm-8">
                    <input type="text" id="agen" class="form-control" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alasan" class="col-12 col-sm-4 col-form-label">Alasan Penghapusan</label>
                <div class="col-12 col-sm-8">
                    <textarea class="form-control" id="alasan" rows="5" disabled></textarea>
                </div>
            </div>
          </div>

          <hr>

          <h5 class="mt-3">Riwayat Persetujuan</h5>
          <h6 class="mt-4">Pihak Verifikasi</h6>
          <div class="row mb-3">
              <label class="col-12 col-sm-4 col-form-label">Admin</label>
              <div class="col-12 col-sm-8">
                  <input type="text" class="form-control" id="namePv" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-12 col-sm-4 col-form-label">Status</label>
              <div class="col-12 col-sm-8">
                  <input type="text" class="form-control" id="statusPv" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-12 col-sm-4 col-form-label">Waktu</label>
              <div class="col-12 col-sm-8">
                  <input type="text" class="form-control" id="timePv" disabled>
              </div>
          </div>

          <h6 class="mt-3">Penanda Tangan</h6>
          <div class="row mb-3">
              <label class="col-12 col-sm-4 col-form-label">Admin</label>
              <div class="col-12 col-sm-8">
                  <input type="text" class="form-control" id="namePt" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-12 col-sm-4 col-form-label">Status</label>
              <div class="col-12 col-sm-8">
                  <input type="text" class="form-control" id="statusPt" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-12 col-sm-4 col-form-label">Waktu</label>
              <div class="col-12 col-sm-8">
                  <input type="text" class="form-control" id="timePt" disabled>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    const modalDetail = new bootstrap.Modal(document.getElementById('modalDetail'), {
      keyboard: false
    })

    function showModal(e) {
      const data = $(e).data();

      if (data.type === 'nota-kapal') {
        $('#nota-kapal #namakapal').val(data.namakapal)
        $('#nota-kapal #tanggal').val(data.tanggal)
        $('#nota-kapal #deskripsi').val(data.deskripsi)
        $('#nota-kapal #lampiranpendukung').attr('href', data.lampiranpendukung)
      } else if (data.type === 'nota-sampah-kapal') {
        $('#nota-sampah-kapal #namakapal').val(data.namakapal)
        $('#nota-sampah-kapal #tanggal').val(data.tanggal)
        $('#nota-sampah-kapal #nomornota').val(data.nomornota)
        $('#nota-sampah-kapal #deskripsi').val(data.deskripsi)
        $('#nota-sampah-kapal #lampiranpendukung').attr('href', data.lampiranpendukung)
      } else {
        $('#penghapusan-ppkb #namakapal').val(data.namakapal)
        $('#penghapusan-ppkb #negara').val(data.negara)
        $('#penghapusan-ppkb #noppkb').val(data.noppkb)
        $('#penghapusan-ppkb #service').val(data.service)
        $('#penghapusan-ppkb #agen').val(data.agen)
        $('#penghapusan-ppkb #alasan').val(data.alasan)
      }

      $('#namePt').val(data.namePt);
      $('#namePv').val(data.namePv);
      $('#statusPt').val(data.statusPt);
      $('#statusPv').val(data.statusPv);
      $('#timePt').val(data.timePt);
      $('#timePv').val(data.timePv);

      $('.keluhan').hide();
      $(`#${data.type}`).show();
      modalDetail.show()
    }
  </script>
@endpush