@extends('layouts.app2')


@section('content')  
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 mx-auto" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
      <div class="card card-login card-hidden mb-3">
          
        <div class="card-body">
          <p class="card-description text-center mt-5">{{ __('Terimakasih telah mendaftar!') }}</p>
          <p class="card-description text-center mt-1">{{ __('Akun Anda sedang dalam tahap') }} <strong>verifikasi.</strong> {{ __(' Silahkan tunggu dalam waktu ') }}<strong>2x24jam.</strong> </p>
        
        </div>
        <div class="card-footer text-center">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" type="button" class="btn btn-info btn-sm ">{{ __('Kembali') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection