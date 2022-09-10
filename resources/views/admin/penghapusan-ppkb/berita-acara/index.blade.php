@extends('layout.adminlayout')
@section('title', 'Surat Berita Acara Penghapusan PPKB')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    
    @if (auth()->user()->isCustomerService())
        <a href="{{ route('admin.penghapusan-ppkb.berita-acara.create') }}" class="btn btn-primary mb-3">
            Buat Surat
        </a>
    @endif

    <div class="table-responsive">
        <table class="table table-striped datatable">
            <thead>
                <tr>
                    <th scope="row">No</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Nama Perusahaan</th>
                    <th>Nama Kapal</th>
                    <th>No.PPKB / Ke</th>
                    <th>Service Code</th>
                    <th>No. UKK</th>
                    <th>Agen</th>
                    <th>Lokasi</th>
                    <th>Tujuan</th>
                    <th>Alasan Penghapusan</th>
                    <th>Di Buat Oleh</th>
                    <th>Lampiran Pendukung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritaAcaras as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->nomor_surat }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->nama_perusahaan }}</td>
                        <td>{{ $data->nama_kapal }}</td>
                        <td>{{ $data->noppkb }}</td>
                        <td>{{ $data->service_code }}</td>
                        <td>{{ $data->noukk }}</td>
                        <td>{{ $data->agen }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->tujuan }}</td>
                        <td>{{ $data->alasan }}</td>
                        <td>{{ $data->dibuatoleh }}</td>
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
                            <a href="{{ route('admin.penghapusan-ppkb.berita-acara.show', ['id' => $data->id]) }}" class="btn btn-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                            
                            @if (auth()->user()->isCustomerService())
                                <a href="{{ route('admin.penghapusan-ppkb.berita-acara.edit', ['id' => $data->id]) }}" class="btn btn-success ms-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            @endif
    
                            @if (
                                (auth()->user()->isSigner() && !$data->penanda_tangan_time) || 
                                (auth()->user()->isVerificator() && !$data->pihak_verifikasi_time)
                            )
                                <button 
                                    onclick="approval(this)" 
                                    class="btn btn-secondary ms-1"
                                    data-id="{{ $data->id }}"
                                >
                                    <i class="bi bi-check-circle"></i>
                                </button>
                            @endif
    
                            <button 
                                class="btn btn-info ms-1" 
                                onclick="showLog(this)"
                                data-id="{{ $data->id }}"
                                data-name-pt="{{ $data->penanda_tangan->name }}"
                                data-time-pt="{{ $data->penanda_tangan_time ?? '-' }}"
                                data-status-pt="{{ $data->penanda_tangan_status ? \App\Enum\Status::from($data->penanda_tangan_status)->label() : '-' }}"
                                data-name-pv="{{ $data->pihak_verifikasi->name }}"
                                data-time-pv="{{ $data->pihak_verifikasi_time ?? '-' }}"
                                data-status-pv="{{ $data->pihak_verifikasi_status ? \App\Enum\Status::from($data->pihak_verifikasi_status)->label() : '-' }}"
                            >
                                <i class="bi bi-list-check"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="modal" tabindex="-1" id="modalLog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Riwayat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Penanda Tangan</h5>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Admin</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="namePt" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="statusPt" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Waktu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="timePt" disabled>
                    </div>
                </div>
                <hr>
                <h5>Pihak Verifikasi</h5>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Admin</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="namePv" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="statusPv" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Waktu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="timePv" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const modalLog = new bootstrap.Modal(document.getElementById('modalLog'), {
            keyboard: false
        })

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
                url: "{{ url('admin/penghapusan-ppkb/berita-acara/approval/') }}/" + id,
                data: { status, role },
                type: 'POST',
                success: function() {
                    Swal.fire('Sukses', '', 'success').then(res => {
                        window.location.reload();
                    })
                }
            })
        }

        function showLog(e) {
            const { namePt, namePv, statusPt, statusPv, timePt, timePv } = $(e).data()
            $('#namePt').val(namePt);
            $('#namePv').val(namePv);
            $('#statusPt').val(statusPt);
            $('#statusPv').val(statusPv);
            $('#timePt').val(timePt);
            $('#timePv').val(timePv);
            modalLog.show();
        }
    </script>
@endpush