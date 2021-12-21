@extends('layouts.app', ['activePage' => 'show', 'titlePage' => __('Detail Tanggapan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
            @csrf
            @method('put')
          <div class="card">
            <div class="card-header card-header-info">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                    <h4 class="card-title ">Detail Tanggapan Pelaporan {{ $review->nama_perusahaan }}</h4>

                    <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('review.index') }}">
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
                          <td colspan="3" class="text-right">Dibuat pada {{ $review->created_at }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">ID</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->id }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">ID Verifikasi</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->id_verifikasi }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Nama Penanggap</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->nama }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Nama Pelapor</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->nama_pelapor }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Email</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->email }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Nama Perusahaan</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Bidang Usaha</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->bidang_usaha }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Alamat</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->alamat }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Jenis Pelaporan</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->jenis }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">
                            @if ($review->jenis == 'Lingkungan')
                                Periode/Semester
                            @elseif ($review->jenis == 'Udara')
                                Periode/Semester
                            @else
                                Periode/Triwulan
                            @endif
                          </td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->periode }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tahun</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->tahun }}</td>
                        </tr>
                        @if ($review->jenis == 'Air')
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Gambaran Pengelolaan Air</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_1 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Sertifikat Uji Lab</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_2 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Izin Ipalasa</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_3 }}</td>
                        </tr>
                        @elseif ($review->jenis == 'Udara')
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Deskripsi Pengelolaan Pencemaran Udara</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_1 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Udara Ambien (Hasil Uji Lab)</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_2 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Udara Emisi (Hasil Uji Lab)</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_3 }}</td>
                        </tr>
                        @elseif ($review->jenis == 'LimbahB3')
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Deskripsi Pengelolaan Limbah B3</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_1 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Bukti Manifest</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_2 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen MOU Pengelolaan Limbah B3</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_3 }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Izin TPS Limbah B3</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_4 }}</td>
                        </tr>
                        @elseif ($review->jenis == 'Lingkungan')
                        <tr>
                          <td style="width: 250px">Tanggapan Dokumen Pelaporan</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->review_dok_1 }}</td>
                        </tr>
                        @else
                            
                        @endif
                        
                        <tr>
                          <td style="width: 250px">Kesimpulan</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $review->kesimpulan }}</td>
                        </tr>
                        <tr>
                          <td style="width: 250px">PDF Pelaporan</td>
                          <td style="width: 1px">:</td>
                          <td><a href="{{ asset('storage/'.$review->pdf) }}" target="_blank">Download</a></td>
                        </tr>
                      </tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection