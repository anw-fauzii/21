@extends('layouts.app')
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
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="forms-sample" id="profileForm" method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('put')
            <div class="card">
              <div class="card-header card-header-warning">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                  <h4 class="card-title">Halaman Edit Profil</h4>

                  <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('home') }}">
                      <i class="link-icon" data-feather="chevron-left" width="18" height="18"></i> <span>Kembali</span>
                    </a>
                  </div>

                </div>
                <!--/Card image-->
              </div>
              
              <div class="card-body">
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
                <fieldset>
                  <div class="form-group">
                    <label for="nama">Nama Penanggung Jawab</label>
                    <input id="name-profile" class="form-control" maxlength="50" name="name" type="text" value="{{ auth()->user()->name }}">
                    @if ($errors->has('nama'))
                      <div id="nama-error" class="error text-danger pt-1" for="nama" style="display: block;">
                        <strong>{{ $errors->first('nama') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input id="telp-profile" class="form-control" maxlength="13" name="telp" type="text" value="{{ auth()->user()->telp }}">
                    @if ($errors->has('telp'))
                      <div id="telp-error" class="error text-danger pt-1" for="telp" style="display: block;">
                        <strong>{{ $errors->first('telp') }}</strong>
                      </div>
                    @endif
                  </div>

                  
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" maxlength="100" class="form-control" id="alamat-profile" rows="8">{{ auth()->user()->alamat }}</textarea>
                    @if ($errors->has('alamat'))
                      <div id="alamat-error" class="error text-danger pt-1" for="alamat" style="display: block;">
                        <strong>{{ $errors->first('alamat') }}</strong>
                      </div>
                    @endif
                  </div>   
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input id="jabatan-profile" class="form-control" name="jabatan" maxlength="30" type="text" value="{{ auth()->user()->jabatan }}">
                    @if ($errors->has('jabatan'))
                      <div id="jabatan-error" class="error text-danger pt-1" for="jabatan" style="display: block;">
                        <strong>{{ $errors->first('jabatan') }}</strong>
                      </div>
                    @endif
                  </div>                  
                </fieldset>                
              </div>
              <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
            </div>

          </form>
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