$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#logout').click(function() {
    $.ajax({
      method: 'post',
      url: '/logout',
      data: {}
    }).then(res => {
      window.location.href = '/login'
    })
  });

  $('.datatable').DataTable();
});

const modalLog = new bootstrap.Modal(document.getElementById('modalLog'), {
  keyboard: false
})

function approval(e) {
  const { url, role } = $(e).data()

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
      doApproval(url, {role, status: 3})
      return
    }

    if (!res.isConfirmed && res.dismiss == 'cancel') {
      Swal.fire({
        title: 'Keterangan',
        input: 'text',
        confirmButtonText: 'Konfirmasi',
        showCancelButton: true,
        allowOutsideClick: false,
        inputValidator: v => !v && 'Keterangan wajib diisi.',
      }).then(res2 => {
        if (res2.isConfirmed) {
          doApproval(url, {role, status: 2, keterangan: res2.value})
        }
      })
    }
  })
}

function doApproval(url, data) {
  $.ajax({
      url,
      data,
      type: 'POST',
      success: function(res) {
        Swal.fire('Sukses', res.message, 'success').then(res => {
            window.location.reload();
        })
      },
      error: function(err) {
        Swal.fire('Gagal', err.responseJSON.message || '', 'error')
      }
  })
}

function showLog(e) {
  const { namePt, namePv, statusPt, statusPv, timePt, timePv, notePt, notePv } = $(e).data()
  $('#namePt').val(namePt);
  $('#namePv').val(namePv);
  $('#statusPt').val(statusPt);
  $('#statusPv').val(statusPv);
  $('#timePt').val(timePt);
  $('#timePv').val(timePv);
  $('#notePt').val(notePt);
  $('#notePv').val(notePv);
  modalLog.show();
}