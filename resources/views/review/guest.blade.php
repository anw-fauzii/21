@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'pengaduan', 'titlePage' => __('Tambah Pengaduan')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="#">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Form Pengaduan') }}</strong></h4>
          </div>
          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Nama Pengadu...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Alamat...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('telp') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="number" name="telp" class="form-control" placeholder="{{ __('NIK...') }}" value="{{ old('telepon') }}" required>
              </div>
              @if ($errors->has('telp'))
                <div id="telp-error" class="error text-danger pl-3" for="telp" style="display: block;">
                  <strong>{{ $errors->first('telp') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">location_city</i>
                  </span>
                </div>
                <input type="text" name="nama_perusahaan" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('nama_perusahaan') }}" required>
              </div>
              @if ($errors->has('nama_perusahaan'))
                <div id="nama_perusahaan-error" class="error text-danger pl-3" for="nama_perusahaan" style="display: block;">
                  <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('jabatan') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">work</i>
                  </span>
                </div>
                <input type="text" name="jabatan" class="form-control" placeholder="{{ __('Deskripsi Pengaduan...') }}" value="{{ old('jabatan') }}" required>
              </div>
              @if ($errors->has('jabatan'))
                <div id="jabatan-error" class="error text-danger pl-3" for="jabatan" style="display: block;">
                  <strong>{{ $errors->first('jabatan') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <span class="input-group-text" id="inputGroupFileAddon01">Unggah Foto</span>
                  </span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Pilih Berkas</label>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Kirim Pengaduan') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
