@extends('layouts.app', ['activePage' => 'email', 'titlePage' => __('Detail Tanggapan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="get" action="{{ route('review.sendemail', $review->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('get')
          <div class="card">
            <div class="card-header card-header-info">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                    <h4 class="card-title ">Detail Pelaporan HIMAGRIB</h4>

                    <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('review.index') }}">
                        <i class="material-icons">keyboard_backspace</i> {{ __('Kembali') }}
                    </a>
                    </div>

                </div>
                <!--/Card image-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $review->id }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pelapor</td>
                        <td>{{ $review->nama }}</td>
                    </tr>
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td>{{ $review->nama_perusahaan }}</td>                    
                    </tr>
                    <tr>
                        <td>Bidang Usaha</td>
                        <td>{{ $review->bidang_usaha }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Pelaporan</td>
                        <td>{{ $review->jenis }}</td>
                    </tr>
                    <tr>
                        <td>Dokumen Pelaporan</td>
                        <td>{{ $review->review_dok_1 }}</td>                      
                    </tr>
                    <tr>
                        <td>Dokumen Izin</td>
                        <td>{{ $review->review_dok_2 }}</td>                      
                    </tr>
                    <tr>
                        <td>Dokumen Hasil Uji Lab</td>
                        <td>{{ $review->review_dok_3 }}</td>                      
                    </tr>
                    <tr>
                        <td>Kesimpulan</td>
                        <td>{{ $review->kesimpulan }}</td>
                    </tr>
                    </tbody>
                </table>
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