@extends('layouts.app', ['activePage' => 'pelaporan', 'titlePage' => __('Edit Pengguna')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                  <h4 class="card-title ">Edit Pengguna</h4>

                  <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('user.index') }}">
                      <i class="material-icons">keyboard_backspace</i> {{ __('Kembali') }}
                    </a>
                  </div>

                </div>
                <!--/Card image-->
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('email') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('email') }}" value="{{ old('email', $user->email) }}" required="true" aria-required="true"/>
                        @if ($errors->has('email'))
                          <span id="name-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('telp') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('telp') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" id="input-telp" type="text" placeholder="{{ __('telp') }}" value="{{ old('telp', $user->telp) }}" required="true" aria-required="true"/>
                        @if ($errors->has('telp'))
                          <span id="name-error" class="error text-danger" for="input-telp">{{ $errors->first('telp') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('nama_perusahaan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" name="nama_perusahaan" id="input-nama_perusahaan" type="text" placeholder="{{ __('nama_perusahaan') }}" value="{{ old('nama_perusahaan', $user->nama_perusahaan) }}" required="true" aria-required="true"/>
                        @if ($errors->has('nama_perusahaan'))
                          <span id="name-error" class="error text-danger" for="input-nama_perusahaan">{{ $errors->first('nama_perusahaan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('jabatan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('jabatan') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" id="input-jabatan" type="text" placeholder="{{ __('jabatan') }}" value="{{ old('jabatan', $user->jabatan) }}" required="true" aria-required="true"/>
                        @if ($errors->has('jabatan'))
                          <span id="name-error" class="error text-danger" for="input-jabatan">{{ $errors->first('jabatan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('status') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status" type="text" placeholder="{{ __('status') }}" value="{{ old('status', $user->status) }}" required="true" aria-required="true"/>
                        @if ($errors->has('status'))
                          <span id="name-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
              </div>
              
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection