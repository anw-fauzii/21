@extends('layouts.app', ['activePage' => 'create', 'titlePage' => __('Tambah Pengguna')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                  <h4 class="card-title ">Tambah Pengguna</h4>

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
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-10">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" required="true" aria-required="true"/>
                        @if ($errors->has('email'))
                          <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                    <div class="col-sm-10">
                      <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Password') }}" required="true" aria-required="true"/>
                        @if ($errors->has('password'))
                          <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Konfirmasi Katasandi Baru') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Konfirmasi Katasandi Baru') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection