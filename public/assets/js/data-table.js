$(function() {
  'use strict';

  $(function() {
    $('#dataTablePelaporan').DataTable({
      "language": {
        url: "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "dom": 'Bfrtip',
      "buttons": [
        'pageLength',
        {
          extend: 'csv',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          },
          action: function ( e, dt, button, config ) {
            window.location = '/pelaporan/export';
          }   
        },
        {
          extend: 'pdf',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
      ],
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "pelaporan/json",
      },
      "columns": [
          { data: 'id', name: 'id' },
          { data: 'created_at', name: 'created_at' },
          { data: 'nama', name: 'nama' },
          { data: 'telp', name: 'telp' },
          { data: 'nama_perusahaan', name: 'nama_perusahaan' },
          { data: 'periode', name: 'periode' },
          { data: 'tahun', name: 'tahun' },
          { data: 'jenis', name: 'jenis' },
          { data: 'action', name: 'action' },
      ],
      "order": [[0, 'desc']],
    });
    $('#dataTablePelaporan').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

  $(function() {
    $('#dataTablePelaporanUsers').DataTable({
      "language": {
        url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "dom": 'Bfrtip',
      "buttons": [
        'pageLength',
        {
          extend: 'csv',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          },
          action: function ( e, dt, button, config ) {
            window.location = '/pelaporan/export';
          }   
        },
        {
          extend: 'pdf',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
      ],
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "pelaporan/json",
      },
      "columns": [
          { data: 'id', name: 'id' },
          { data: 'created_at', name: 'created_at' },
          { data: 'nama', name: 'nama' },
          { data: 'telp', name: 'telp' },
          { data: 'nama_perusahaan', name: 'nama_perusahaan' },
          { data: 'periode', name: 'periode' },
          { data: 'tahun', name: 'tahun' },
          { data: 'jenis', name: 'jenis' },
          { data: 'status', name: 'status' },
          { data: 'action', name: 'action' },
      ],
      "order": [[0, 'desc']],
      "createdRow": function ( row, data, index ) {
        if ( data['status'] === 'Reviewed' ) {
          $('td', row).eq(8).html('<button class="btn btn-success">Telah ditanggapi</button>');
        } else {
          $('td', row).eq(8).html('<button class="btn btn-warning text-white">Belum ditanggapi</button>');
        }
      }    
    });
    $('#dataTablePelaporanUsers').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

  $(function() {
    $('#dataTableRiwayat').DataTable({
      "language": {
        url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "dom": 'Bfrtip',
      "buttons": [
        'pageLength',
        {
          extend: 'csv',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          },
          action: function ( e, dt, button, config ) {
            window.location = '/tanggapan/export';
          }   
        },
        {
          extend: 'pdf',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
      ],
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "tanggapan/json",
      },
      "columns": [
        { data: 'id', name: 'id' },
        { data: 'created_at', name: 'created_at' },
        { data: 'nama', name: 'nama' },
        { data: 'nama_pelapor', name: 'nama_pelapor' },
        { data: 'nama_perusahaan', name: 'nama_perusahaan' },
        { data: 'periode', name: 'periode' },
        { data: 'tahun', name: 'tahun' },
        { data: 'jenis', name: 'jenis' },
        { data: 'action', name: 'action' },
      ],
      "order": [[0, 'desc']]
    });
    $('#dataTableRiwayat').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
  
  $(function() {
    $('#dataTablePengaduan').DataTable({
      "language": {
        url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "dom": 'Bfrtip',
      "buttons": [
        'pageLength',
        {
          extend: 'csv',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          },
          action: function ( e, dt, button, config ) {
            window.location = '/pengaduan/export';
          }   
        },
        {
          extend: 'pdf',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
      ],
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "pengaduan/json",
      },
      "columns": [
        { data: 'id', name: 'id' },
        { data: 'created_at', name: 'created_at' },
        { data: 'nama', name: 'nama' },
        { data: 'telp', name: 'telp' },
        { data: 'email', name: 'email' },
        { data: 'deskripsi', name: 'deskripsi' },
        { data: 'action', name: 'action' },
      ],
      "order": [[0, 'desc']]
    });
    $('#dataTablePengaduan').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

  $(function() {
    $('#dataTableUsers').DataTable({
      "language": {
        url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "user/json",
      },
      "columns": [
        { data: 'id', name: 'id' },
        { data: 'created_at', name: 'created_at' },
        { data: 'name', name: 'name' },
        { data: 'nama_perusahaan', name: 'nama_perusahaan' },
        { data: 'email', name: 'email' },
        // { data: 'telp', name: 'telp' },
        // { data: 'bidang_usaha', name: 'bidang_usaha' },
        // { data: 'alamat', name: 'alamat' },
        // { data: 'jabatan', name: 'jabatan' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action' },
      ],
      "order": [[0, 'desc']],
      "createdRow": function ( row, data, index ) {
        if ( data['status'] === 'aktif' ) {
          $('td', row).eq(5).html('<button class="btn btn-success">Aktif</button>');
        } else {
          $('td', row).eq(5).html('<button class="btn btn-warning text-white">Menunggu</button>');
        }
        if ( data['status'] === 'menunggu' ) {
          $('td', row).eq(6).html('<a type="button" name="aktivasi" id="'+data['id']+'" class="aktivasi btn btn-warning btn-icon p-2 mr-1 text-white" role="button" title="Aktivasi"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> <a type="button" name="delete" id="'+data['id']+'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>');
    
        } else {
          $('td', row).eq(6).html('<a type="button" name="deaktivasi" id="'+data['id']+'" class="deaktivasi btn btn-warning btn-icon p-2 mr-1 text-white" role="button" title="Deaktivasi"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> <a type="button" name="delete" id="'+data['id']+'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>');

        }
      },
      
      "dom": 'Bfrtip',
      "buttons": [
        'pageLength',
        {
          extend: 'csv',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excelHtml5',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible',
          },
          action: function ( e, dt, button, config ) {
            window.location = '/user/export';
          }   
        },
        {
          extend: 'pdf',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          className: 'btn-default',
          exportOptions: {
            columns: ':visible'
          }
        },
      ],  
    });
    $('#dataTableUsers').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
});
