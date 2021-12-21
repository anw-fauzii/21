@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title font-weight-bold">Data Pengguna</h4>
        </div>
        <div class="table-responsive">
          <table id="dataTableUsers" class="table" style="width: 100%; text-align:center;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tanggal Pendaftaran</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">              
              <h5 class="modal-title">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan <a class="text-danger">menghapus</a> data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-danger">OK</button>
            <button type="button" class="btn btn-sm" data-dismiss="modal">Batal</button>
          </div>
      </div>
  </div>
</div>
<div id="confirmModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">              
              <h5 class="modal-title">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan <a class="text-success">mengaktifkan</a> data ini?</h5>
              
                <input class="getinfo" value="aktif" hidden>
              
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button1" id="ok_button1" class="btn btn-sm btn-danger">OK</button>
            <button type="button" class="btn btn-sm" data-dismiss="modal">Batal</button>
          </div>
      </div>
  </div>
</div>
<div id="confirmModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">              
              <h5 class="modal-title">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan <a class="text-success">menonaktifkan</a> data ini?</h5>
              
                <input class="menunggu" id value="menunggu" hidden>
              
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button2" id="ok_button2" class="btn btn-sm btn-danger">OK</button>
            <button type="button" class="btn btn-sm" data-dismiss="modal">Batal</button>
          </div>
      </div>
  </div>
</div>
@endsection
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush
@push('js')
<script>
  $(document).ready(function() {

    var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
    var user_id;
    var user_id1;
    var user_id2;

    $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
    });

    $(document).on('click', '.aktivasi', function(){
      user_id1 = $(this).attr('id');
      $('#confirmModal1').modal('show');
    });

    $(document).on('click', '.deaktivasi', function(){
      user_id2 = $(this).attr('id');
      $('#confirmModal2').modal('show');
    });

    $('#ok_button').click(function(){


      $.ajax({
      url:"user/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Menghapus data...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#ok_button').text('OK');
        $('#dataTableUsers').DataTable().ajax.reload();
        swal.fire('Berhasil','Data berhasil dihapus!', 'success');
        }, 2000);
      }
      })
    });

    $('#ok_button1').click(function(){
      $.ajax({
      url:"user/aktivasi/"+user_id1,
      method:"POST",  
      data: {
        _token: CSRF_TOKEN, 
        status: $(".getinfo").val()
      },
      beforeSend:function(){
        $('#ok_button1').text('Mengaktifkan data...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal1').modal('hide');
        $('#ok_button1').text('OK');
        $('#dataTableUsers').DataTable().ajax.reload();
        swal.fire('Berhasil','Data berhasil diaktifkan!', 'success');
        }, 2000);
      }
      })
    });

    $('#ok_button2').click(function(){
      $.ajax({
      url:"user/deaktivasi/"+user_id2,
      method:"POST",  
      data: {
        _token: CSRF_TOKEN, 
        status: $(".menunggu").val()
      },
      beforeSend:function(){
        $('#ok_button2').text('Menonaktfikan data...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal2').modal('hide');
        $('#ok_button2').text('OK');
        $('#dataTableUsers').DataTable().ajax.reload();
        swal.fire('Berhasil','Data berhasil dinokaktifkan!', 'success');
        }, 2000);
      }
      })
    });

  });
</script>
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush