$(function() {
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