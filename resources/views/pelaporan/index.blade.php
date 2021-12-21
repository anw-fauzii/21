@extends('layouts.app')

@can('isAdmin')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title font-weight-bold">Data Pelaporan</h4>
        </div>
        @if (session('status'))
          <div class="row">
            <div class="col-sm-12">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="link-icons" data-feather="x"></i>
                </button>
                <span>{{ session('status') }}</span>
              </div>
            </div>
          </div>
        @endif
        <div class="table-responsive">
          <table id="dataTablePelaporan" class="table datatable" style="width: 100%; text-align:center;">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pelaporan</th>
                <th>Nama Pelapor</th>
                <th>Telepon</th>
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
              <h5 class="modal-title">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan mengapus data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-success">OK</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
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
        $('#dataTablePelaporan').DataTable().ajax.reload();
        swal('Berhasil','Data berhasil dihapus!', 'success');
        }, 2000);
      }
      })
    });
  });
</script>
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
@elsecan('isUser')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title font-weight-bold">Data Pelaporan</h4>
        </div>
        <div class="table-responsive">
          <table id="dataTablePelaporanUsers" class="table" style="width: 100%; text-align:center;">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pelaporan</th>
                <th>Nama Pelapor</th>
                <th>Telepon</th>
                <th>Nama Perusahaan</th>
                <th>Periode</th>
                <th>Tahun</th>
                <th>Jenis Pelaporan</th>
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
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan mengapus data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-success">OK</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
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
        $('#dataTablePelaporanUsers').DataTable().ajax.reload();
        swal.fire('Berhasil','Data berhasil dihapus!', 'success');
        }, 2000);
      }
      })
    });
  });
</script>
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
@endcan