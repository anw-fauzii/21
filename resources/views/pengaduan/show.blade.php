@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                <h4 class="card-title ">Detail Pengaduan</h4>

                <div>
                <a class="btn btn-sm btn-danger" href="/pengaduan">
                  <i class="link-icon" data-feather="chevron-left" width="18" height="18"></i> <span>Kembali</span>
                </a>
                </div>

            </div>
            <!--/Card image-->
          </div>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td colspan="4" class="text-right">Dibuat pada {{ $pengaduan->created_at }}</td>
                </tr>
                <tr>
                  <td style="width: 150px">NIK</td>
                  <td style="width: 1px">:</td>
                  <td>{{$pengaduan->nik}}</td>
                  <td rowspan="5" width="45%">
                    <div class="row d-flex justify-content-center mb-2">
                        <a class="text-danger">Foto KTP Pengadu</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                      <img src="{{ asset('storage/'.$pengaduan->img4) }}" class="wd-101p wd-sm-200" style="width: 90%; height:100%; border-radius:0%">               
                    </div>
                    
                  </td>
                </tr>
                <tr>
                  <td style="width: 150px">Nama Pengadu</td>
                  <td style="width: 1px">:</td>
                  <td>{{$pengaduan->nama}}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Email</td>
                  <td style="width: 1px">:</td>
                  <td>{{$pengaduan->email}}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Telepon</td>
                  <td style="width: 1px">:</td>
                  <td>{{$pengaduan->telp}}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Deskripsi Pengaduan</td>
                  <td style="width: 1px">:</td>
                  <td>{{$pengaduan->deskripsi}}</td>
                </tr>       
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                <h4 class="card-title ">Lokasi Pengaduan</h4>

            </div>
            <!--/Card image-->
          </div>
          <div class="card-body">
            <div id="map" style="width:100%;height:350px;"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                <h4 class="card-title ">Bukti Foto Pengaduan</h4>

            </div>
            <!--/Card image-->
          </div>
          <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{ asset('storage/'.$pengaduan->img1) }}" alt="Slide Pertama">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset('storage/'.$pengaduan->img2) }}" alt="Slide Kedua">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset('storage/'.$pengaduan->img3) }}" alt="Slide Ketiga">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script>
      var deskripsi = {!! json_encode($pengaduan->deskripsi) !!};
      var lat = {!! json_encode($pengaduan->lat) !!};
      var lng = {!! json_encode($pengaduan->long) !!};

      new GMaps({
        div: '#map',
        zoom: 12,
        lat: -7.2146505,
        lng: 107.8959374,
        
      }).addMarker({
        lat: lat,
        lng: lng,
        title: deskripsi,
        // icon: 'blah',
        infoWindow: {
        content: deskripsi
        }
      });
  </script>
@endpush
