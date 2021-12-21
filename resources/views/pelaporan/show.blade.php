@extends('layouts.app', ['activePage' => 'pelaporan', 'titlePage' => __('Detail Pelaporan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                <h4 class="card-title ">Detail Pelaporan {{ $pelaporan->nama_perusahaan }}</h4>

                <div>
                <a class="btn btn-sm btn-danger" href="{{ route('pelaporan.index') }}">
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
                    <td colspan="3" class="text-right">Dibuat pada {{ $pelaporan->created_at->format('d F Y') }}, pukul {{ $pelaporan->created_at->format('H:i:s') }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Nama Pelapor</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->nama }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Telepon</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->telp }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Nama Perusahaan</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->nama_perusahaan }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Bidang Usaha</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->bidang_usaha }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Alamat</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->alamat }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Jenis Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->jenis }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">
                      @if ($pelaporan->jenis == 'Lingkungan')
                          Periode/Semester
                      @elseif ($pelaporan->jenis == 'Udara')
                          Periode/Semester
                      @else
                          Periode/Triwulan
                      @endif
                    </td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->periode }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Tahun</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->tahun }}</td>
                  </tr>
                  <tr>
                    <th colspan="3">Dokumen</th>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumentasi Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dokumentasi) }}" target="_blank">Download</a></td>
                  </tr>
                  @if ($pelaporan->jenis == 'Air')
                  <tr>
                    <td style="width: 180px">Dokumen Gambaran Pengelolaan Air</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Sertifikat Uji Lab</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_2) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Izin Ipalasa</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_3) }}" target="_blank">Download</a></td>
                  </tr>
                  @elseif ($pelaporan->jenis == 'Udara')
                  <tr>
                    <td style="width: 180px">Dokumen Deskripsi Pengelolaan Pencemaran Udara</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Udara Ambien (Hasil Uji Lab)</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_2) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Udara Emisi (Hasil Uji Lab)</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_3) }}" target="_blank">Download</a></td>
                  </tr>
                  @elseif ($pelaporan->jenis == 'LimbahB3')
                  <tr>
                    <td style="width: 180px">Dokumen Deskripsi Pengelolaan Limbah B3</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Bukti Manifest</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_2) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen MOU Pengelolaan Limbah B3</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_3) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Izin TPS Limbah B3</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_4) }}" target="_blank">Download</a></td>
                  </tr>
                  @elseif ($pelaporan->jenis == 'Lingkungan')
                  <tr>
                    <td style="width: 180px">Dokumen Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                  </tr>
                  @else
                      
                  @endif
                </tbody>
              </table>
            </div>
        </div>
        @if ($pelaporan->status == 'Reviewed')
        <div class="card mt-3">
          <div class="card-header my-auto">
                <h4 class="card-title ">Hasil Review</h4>
          </div>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  @foreach ($pelaporan->review as $p)
                  <tr>
                    <td colspan="3" class="text-right">Ditanggapi pada {{ $p->created_at->format('d F Y') }}, pukul {{ $pelaporan->created_at->format('H:i:s') }}</td>
                  </tr>
                  <tr>
                    <td style="width: 250px">Tanggapan Dokumen Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $p->review_dok_1 }}</td>
                  </tr>
                  <tr>
                    <td style="width: 250px">Tanggapan Dokumen Izin</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $p->review_dok_2 }}</td>
                  </tr>
                  <tr>
                    <td style="width: 250px">Tanggapan Dokumen Hasil Uji Lab</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $p->review_dok_3 }}</td>
                  </tr>
                  <tr>
                    <td style="width: 250px">Kesimpulan</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $p->kesimpulan }}</td>
                  </tr>
                  <tr>
                    <td style="width: 250px">PDF Hasil Review</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$p->pdf) }}" target="_blank">Download</a></td>
                  </tr>     
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>    
        @endif
        
      </div>
    </div>
    <!--
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">
                  <h4 class="card-title ">Matriks Pengelolaan dan Pemantauan Lingkungan</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $pelaporan->id }}</td>
                    </tr>
                    <tr>
                      <td>Nama Pelapor</td>
                      <td>{{ $pelaporan->nama }}</td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td>{{ $pelaporan->telp }}</td>
                    </tr>
                    <tr>
                      <td>Nama Perusahaan</td>
                      <td>{{ $pelaporan->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                      <td>Bidang Usaha</td>
                      <td>{{ $pelaporan->bidang_usaha }}</td>
                    </tr>
                    <tr>
                      <td>Periode Semester</td>
                      <td>1</td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td>Laporan Himagrib selama 6 bulan.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    -->
  </div>
</div>
@endsection