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
              <a class="btn btn-danger btn-icon-text" href="{{ url('/') }}"><i class="btn-icon-append" data-feather="chevron-left"></i>Kembali</a> 
            </div> 
            <div class="auth-form-wrapper px-4 pt-3 pb-2">
              <a href="#" class="noble-ui-logo d-block mb-2">Dinas Lingkungan Hidup <span>1.0</span></a>
              <h5 class="text-muted font-weight-normal mb-4">Formulir Pengaduan Masyarakat.</h5>
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
                  <i class="link-icons mr-1" data-feather="user" height="20px"></i><label for="nama">Nama Pengadu</label>
                  <input class="form-control" maxlength="50" name="nama" id="nama" type="text" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                  @if ($errors->has('nama'))
                    <div id="nama-error" class="error text-danger pt-1" for="nama" style="display: block;">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="phone" height="20px"></i><label for="nama">Telepon</label>
                  <input type="text" name="telp" class="form-control" id="telp" placeholder="Telepon" value="{{ old('telp') }}"  maxlength="13">
                  @if ($errors->has('telp'))
                    <div id="telp-error" class="error text-danger pt-1" for="telp" style="display: block;">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="mail" height="20px"></i><label for="email">Email</label>
                  <input id="email" class="form-control" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pt-1" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="map-pin" height="20px"></i><label>Titik Pengaduan</label>
                  <div id="map" style="width: 100%; height: 350px;"></div>
                </div>
                <div class="row">
                  <div class="col-6 text-center">
                    <div class="form-group">
                      <i class="link-icons mr-1" data-feather="map-pin" height="20px"></i><label for="lat">Latitude</label>
                      <input id="lat" class="form-control" name="lat" type="lat" placeholder="Latitude" value="{{ old('lat') }}" required>
                      @if ($errors->has('lat'))
                        <div id="lat-error" class="error text-danger pl-3" for="lat" style="display: block;">
                          <strong>{{ $errors->first('lat') }}</strong>
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-6 text-center">
                    <div class="form-group">
                      <i class="link-icons mr-1" data-feather="map-pin" height="20px"></i><label for="lng">Longitude</label>
                      <input id="lng" class="form-control" name="lng" type="lng" placeholder="Longitude" value="{{ old('lng') }}" required>
                      @if ($errors->has('lng'))
                        <div id="lng-error" class="error text-danger pl-3" for="lng" style="display: block;">
                          <strong>{{ $errors->first('lng') }}</strong>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="alert-triangle" height="20px"></i><label for="jenis">Jenis Pengaduan</label>
                  <select class="form-control js-example-basic-single js-states" style="width: 100%" id="jenis" name="jenis" required>
                    <option disabled selected>Pilih Jenis Pengaduan</option>
                    <option {{ old('jenis')  == "Pencemaran Air" ? "selected" : ""}} value="Pencemaran Air">Pencemaran Air</option>
                    <option {{ old('jenis')  == "Pencemaran Udara" ? "selected" : ""}} value="Pencemaran Udara">Pencemaran Udara</option>
                    <option {{ old('jenis')  == "Illegal Logging" ? "selected" : ""}} value="Illegal Logging">Illegal Logging</option>
                    <option {{ old('jenis')  == "Pembuangan Sampah" ? "selected" : ""}} value="Pembuangan Sampah">Pembuangan Sampah</option>
                    <option {{ old('jenis')  == "Dumping" ? "selected" : ""}} value="Dumping">Dumping</option>  
                    <option {{ old('jenis')  == "Lainnya" ? "selected" : ""}} value="Lainnya">Lainnya</option>
                  </select>
                  @if ($errors->has('jenis'))
                    <div id="jenis-error" class="error text-danger pt-1" for="jenis" style="display: block;">
                      <strong>{{ $errors->first('jenis') }}</strong>
                    </div>
                  @endif
                </div>   
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="clipboard" height="20px"></i><label for="deskripsi">Deskripsi Pengaduan</label>
                  <textarea name="deskripsi" maxlength="100" class="form-control" id="maxlength-textarea" placeholder="Jelaskan secara singkat rincian pengaduan saudara." rows="8"></textarea>
                  @if ($errors->has('deskripsi'))
                    <div id="deskripsi-error" class="error text-danger pt-1" for="deskripsi" style="display: block;">
                      <strong>{{ $errors->first('deskripsi') }}</strong>
                    </div>
                  @endif
                </div>  
                <div class="form-group">
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>Bukti Pengaduan 1</label>
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
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>Bukti Pengaduan 2</label>
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
                  <i class="link-icons mr-1" data-feather="image" height="20px"></i><label>Bukti Pengaduan 3</label>
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
                  <button type="submit" class="btn btn-primary mr-2 mb-3 mb-md-3 w-100">Kirim Pengaduan</button>
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
  <script>
    var map = new GMaps({
      el: '#map',
      zoom: 12,
      lat: -7.2146505,
      lng: 107.8959374,
      click: function(e) {
        // alert('click');
        var latLng = e.latLng;
        console.log(latLng);
        var lat = $('#lat');
        var long = $('#lng');

        lat.val(latLng.lat());
        long.val(latLng.lng());
        map.removeMarkers();
        map.addMarker({
            lat: latLng.lat(),
            lng: latLng.lng(),
            title: 'Create Here',
            click: function(e) {
                alert('You clicked in this marker');
            }
        });
      },
    });
  </script>
@endpush