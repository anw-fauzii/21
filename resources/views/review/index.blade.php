@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title font-weight-bold">Data Riwayat Pelaporan</h4>
        </div>
        <div class="table-responsive">
          <table id="dataTableRiwayat" class="table" style="width: 100%; text-align:center;">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pelaporan</th>
                <th>Nama Penanggap</th>
                <th>Nama Pelapor</th>
                <th>Nama Perusahaan</th>
                <th>Periode</th>
                <th>Tahun</th>
                <th>Jenis Pelaporan</th>
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
              <h4 class="modal-title">Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan mengapus data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-danger">OK</button>
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
    var user_id;

    $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
      $.ajax({
      url:"pelaporan/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Menghapus data...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#ok_button').text('OK');
        $('#example').DataTable().ajax.reload();
        swal('Berhasil','Data berhasil dihapus!', 'success');
        }, 2000);
      }
      })
    });
  });
</script>
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush