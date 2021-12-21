@extends('layouts.app2')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-12 col-xl-8 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-2 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://htmlcolors.com/gradients-images/53-light-purple-gradient.jpg') }})">

            </div>
          </div>
          <div class="col-md-10 pl-md-0">
            <div class="mt-3 mr-3 text-right">
              <a class="btn btn-danger btn-icon-text" href="{{ url('/home') }}"><i class="btn-icon-append" data-feather="chevron-left"></i>Kembalii</a> 
            </div> 
            <div class="auth-form-wrapper px-4 pt-3 pb-2">
              <a href="#" class="noble-ui-logo d-block mb-2">Desa Mekarwangi</span></a>
              <h5 class="text-muted font-weight-normal mb-4">Formulir Pengajuan Masyarakat.</h5>
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
              <form class="forms-sample" id="pengaduanForm" method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="credit-card" height="20px"></i><label for="nik">NIK</label>
                  <input class="form-control" maxlength="16" name="nik" id="nik" type="text" placeholder="Masukkan NIK" value="{{ old('nik') }}">
                  @if ($errors->has('nik'))
                    <div id="nik-error" class="error text-danger pt-1" for="nik" style="display: block;">
                      <strong>{{ $errors->first('nik') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>Unggah KTP</label>
                  <input type="file" name="img4" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="file" id="myDropify3" class="border" name="img4"/>
                  </div>
                  @if ($errors->has('img4'))
                    <div id="img4-error" class="error text-danger pt-1" for="img4" style="display: block;">
                      <strong>{{ $errors->first('img4') }}</strong>
                    </div>
                  @endif  
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="user" height="20px"></i><label for="nama">Nama Pengaju</label>
                  <input class="form-control" maxlength="50" name="nama" id="nama" type="text" placeholder="Masukkan Nama" value="{{ Auth::user()->name }}">
                  @if ($errors->has('nama'))
                    <div id="nama-error" class="error text-danger pt-1" for="nama" style="display: block;">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="phone" height="20px"></i><label for="nama">Telepon</label>
                  <input type="text" name="telp" class="form-control" id="telp" placeholder="Telepon" value="{{Auth::user()->nama_perusahaan}}"  maxlength="13">
                  @if ($errors->has('telp'))
                    <div id="telp-error" class="error text-danger pt-1" for="telp" style="display: block;">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="mail" height="20px"></i><label for="email">Email</label>
                  <input id="email" class="form-control" name="email" type="email" placeholder="Email" value="{{Auth::user()->email}}">
                  @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pt-1" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
                
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="alert-triangle" height="20px"></i><label for="jenis">Jenis Pengajuan</label>
                  <select class="form-control js-example-basic-single js-states" style="width: 100%" id="jenis" name="jenis" required>
                    <option disabled selected>Pilih Jenis Pengajuan</option>
                    <option {{ old('jenis')  == "Surat Pindah" ? "selected" : ""}} value="Surat Pindah">Surat Pindah</option>
                    <option {{ old('jenis')  == "SKTM" ? "selected" : ""}} value="SKTM">SKTM</option>
                    <option {{ old('jenis')  == "Domisili" ? "selected" : ""}} value="Domisili">Domisili</option>
                    <option {{ old('jenis')  == "Keterangan Jandda/Duda" ? "selected" : ""}} value="Keterangan Jandda/Duda">Keterangan Jandda/Duda</option>
                    <option {{ old('jenis')  == "Keterangan Ahli Waris" ? "selected" : ""}} value="Keterangan Ahli Waris">Keterangan Ahli Waris</option>  
                    <option {{ old('jenis')  == "Keterangan Penguburan" ? "selected" : ""}} value="Keterangan Penguburan">Keterangan Penguburan</option>
                    <option {{ old('jenis')  == "Pengantar SKCK" ? "selected" : ""}} value="Pengantar SKCK">Pengantar SKCK</option>
                    <option {{ old('jenis')  == "Pengantar SKCK Desa" ? "selected" : ""}} value="Pengantar SKCK Desa">Pengantar SKCK Desa</option>
                    <option {{ old('jenis')  == "SKU" ? "selected" : ""}} value="SKU">SKU</option>
                    <option {{ old('jenis')  == "Surat Kuasa" ? "selected" : ""}} value="Surat Kuasa">Surat Kuasa</option>
                    <option {{ old('jenis')  == "Reg Penduduk Baru" ? "selected" : ""}} value="Reg Penduduk Baru">Reg Penduduk Baru</option>
                  </select>
                  @if ($errors->has('jenis'))
                    <div id="jenis-error" class="error text-danger pt-1" for="jenis" style="display: block;">
                      <strong>{{ $errors->first('jenis') }}</strong>
                    </div>
                  @endif
                </div>   
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="clipboard" height="20px"></i><label for="">Deskripsi Pengajuan</label>
                  
                    <p>Pengajuan Surat Pindah : KK+KTP</p> 
                    Pengajuan SKTM : KK+KTP <p>
                    Pengajuan Domisili : KK+KTP <p>
                    Pengajuan Janda/Duda : KK+KTP+Akta Kematian/Cerai <p>
                    Pengajuan Keteranan Ahli Waris : KK+KTP Ahli Waris&yang Meninggal <p>
                    Pengajuan Keteranan Penguburan : Biodata <p>
                    Pengajuan Pengantar SKCK : KK/KTP <p>
                    Pengajuan Pengantar SKCK Desa : KK/KTP <p>
                    Pengajuan SKU : KK/Keterangan Jenis Usaha <p>
                    Pengajuan Surat Kuasa : KK/KTP Pihak 1+2 <p>
                    Pengjuan Reg Penduduk Baru : KK+KTP+Buku Nikah
                 
                  
                </div>  
                
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>KK</label>
                  <input type="file" name="img1" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="file" id="myDropify" class="border" name="img1"/>
                  </div>
                  @if ($errors->has('img1'))
                    <div id="img1-error" class="error text-danger pt-1" for="img1" style="display: block;">
                      <strong>{{ $errors->first('img1') }}</strong>
                    </div>
                  @endif  
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>Akta Kelahiran/Mati/Cerai</label>
                  <input type="file" name="img2" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="file" id="myDropify1" class="border" name="img2"/>
                  </div>
                  @if ($errors->has('img2'))
                    <div id="img2-error" class="error text-danger pt-1" for="img2" style="display: block;">
                      <strong>{{ $errors->first('img2') }}</strong>
                    </div>
                  @endif  
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>Biodata/Buku Nikah/Keterangan Jenis Usaha</label>
                  <input type="file" name="img3" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="file" id="myDropify2" class="border" name="img3"/>
                  </div>
                  @if ($errors->has('img3'))
                    <div id="img3-error" class="error text-danger pt-1" for="img3" style="display: block;">
                      <strong>{{ $errors->first('img3') }}</strong>
                    </div>
                  @endif  
                </div>
                
                <div class="form-group">
                  <div class="g-recaptcha-response d-flex justify-content-center">
                    <span>
                      {!! NoCaptcha::display() !!}                    
                      {!! NoCaptcha::renderJs() !!}
                    </span>
                  </div>
                  @if ($errors->has('g-recaptcha-response'))
                    <div id="g-recaptcha-response-error" class="error text-danger pt-1" for="g-recaptcha-response" style="display: block;">
                      <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </div>
                  @endif
                </div>           
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2 mb-3 mb-md-3 w-100">Kirim Pengajuan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>  
@endsection
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush

@push('js')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('assets/js/dropify.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/timepicker.js') }}"></script>
  
@endpush