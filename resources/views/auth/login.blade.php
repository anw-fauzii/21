@extends('layouts.app2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-2 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://htmlcolors.com/gradients-images/53-light-purple-gradient.jpg') }})">

            </div>
          </div>
          <div class="col-md-10 pl-md-0">
            <div class="auth-form-wrapper px-4 pt-5 pb-3">
              <a href="#" class="noble-ui-logo d-block mb-2">Desa Mekarwangi</span></a>
              <h5 class="text-muted font-weight-normal mb-4">Selamat datang! Masuk ke akun Anda.</h5>
              <form class="forms-sample" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pt-1" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kata sandi</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" >
                  @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2 mb-3 mb-md-3">Masuk</button>
                </div>
                <div class="mt-3">
                 Belum terdaftar?<a href="{{ url('/register') }}"> Daftar</a> 
                </div>   
                <div>
                  <a href="{{ url('/password/reset') }}"></a> 
                 </div> 
              </form>
            </div>

            <div class="mb-3 mr-3 text-right">
              <a class="btn btn-danger btn-icon-text" href="{{ url('/') }}"><i class="btn-icon-append" data-feather="chevron-left"></i>Kembali</a> 
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection