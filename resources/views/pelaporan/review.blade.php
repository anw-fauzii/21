@extends('layouts.app', ['activePage' => 'pelaporan', 'titlePage' => __('Detail Pelaporan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('pelaporan.review') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card">
              <div class="card-header card-header-info">
                  <!--Card image-->
                  <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                      <h4 class="card-title ">Detail Pelaporan HIMAGRIB</h4>

                      <div>
                      <a class="btn btn-icon-text btn-danger" href="{{ route('pelaporan.index') }}">
                        <i class="btn-icon-prepend" data-feather="chevron-left" width="18" height="18"></i> <span>Kembali</span>
                      </a>
                      </div>

                  </div>
                  <!--/Card image-->
              </div>
              <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td style="width: 180px">ID</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->id }}</td>
                        <td><input type="text" value="{{ $pelaporan->id }}" name="pelaporan_id" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Nama Pelapor</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->nama }}</td>
                        <td><input type="text" value="{{ $pelaporan->nama }}" name="nama_pelapor" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Telepon</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->telp }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Email</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->email }}</td>
                        <td><input type="text" value="{{ $pelaporan->email }}" name="email" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Nama Perusahaan</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->nama_perusahaan }}</td>
                        <td><input type="text" value="{{ $pelaporan->nama_perusahaan }}" name="nama_perusahaan" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Bidang Usaha</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->bidang_usaha }}</td>
                        <td><input type="text" value="{{ $pelaporan->bidang_usaha }}" name="bidang_usaha" hidden></td>
                    </tr>
                    <tr>
                      <td style="width: 180px">Alamat</td>
                      <td style="width: 1px">:</td>
                      <td>{{ $pelaporan->alamat }}</td>
                      <td><input type="text" value="{{ $pelaporan->alamat }}" name="alamat" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Jenis Pelaporan</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->jenis }}</td>
                        <td><input type="text" value="{{ $pelaporan->jenis }}" name="jenis" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">
                          @if ($pelaporan->jenis == 'Lingkungan')
                              Periode/Semester
                          @else
                              Periode/Triwulan
                          @endif
                        </td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->periode }}</td>
                        <td><input type="text" value="{{ $pelaporan->periode }}" name="periode" hidden></td>
                    </tr>
                    <tr>
                      <td style="width: 180px">Tahun</td>
                      <td style="width: 1px">:</td>
                      <td>{{ $pelaporan->tahun }}</td>
                      <td><input type="text" value="{{ $pelaporan->tahun }}" name="tahun" hidden></td>
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
                      <td>
                          <div class="form-group">
                              <input class="form-control" name="review_dok_1" type="text" placeholder="{{ __('Tanggapi Dokumen Gambaran Pengelolaan Air') }}" required="true" aria-required="true" value="{{old('review_dok_1')}}"/>
                          </div> 
                            @if ($errors->has('review_dok_1'))
                                <div id="review_dok_1-error" class="error text-danger pt-1" for="review_dok_1" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_1') }}</strong>
                                </div>
                            @endif
                      </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Sertifikat Uji Lab</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_2) }}" target="_blank">Download</a></td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="review_dok_2" type="text" placeholder="{{ __('Tanggapi Dokumen Sertifikat Uji Lab') }}" required="true" aria-required="true" value="{{old('review_dok_2')}}"/>
                            </div>
                            @if ($errors->has('review_dok_2'))
                                <div id="review_dok_2-error" class="error text-danger pt-1" for="review_dok_2" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_2') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Izin Ipalasa</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_3) }}" target="_blank">Download</a></td>
                        <td style="width: 600px">
                            <div class="form-group">
                                <input class="form-control" name="review_dok_3" type="text" placeholder="{{ __('Tanggapi Dokumen Izin Ipalasa') }}" required="true" aria-required="true" value="{{old('review_dok_3')}}"/>
                            </div>
                            @if ($errors->has('review_dok_3'))
                                <div id="review_dok_3-error" class="error text-danger pt-1" for="review_dok_3" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_3') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @elseif ($pelaporan->jenis == 'Udara')
                    <tr>
                      <td style="width: 180px">Dokumen Deskripsi Pengelolaan Pencemaran Udara</td>
                      <td style="width: 1px">:</td>
                      <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                      <td>
                          <div class="form-group">
                              <input class="form-control" name="review_dok_1" type="text" placeholder="{{ __('Tanggapi Dokumen Deskripsi Pengelolaan Pencemaran Udara') }}" required="true" aria-required="true" value="{{old('review_dok_1')}}"/>
                          </div> 
                            @if ($errors->has('review_dok_1'))
                                <div id="review_dok_1-error" class="error text-danger pt-1" for="review_dok_1" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_1') }}</strong>
                                </div>
                            @endif
                      </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Udara Ambien (Hasil Uji Lab)</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_2) }}" target="_blank">Download</a></td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="review_dok_2" type="text" placeholder="{{ __('Tanggapi Dokumen Udara Ambien (Hasil Uji Lab)') }}" required="true" aria-required="true" value="{{old('review_dok_2')}}"/>
                            </div>
                            @if ($errors->has('review_dok_2'))
                                <div id="review_dok_2-error" class="error text-danger pt-1" for="review_dok_2" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_2') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Udara Emisi (Hasil Uji Lab)</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_3) }}" target="_blank">Download</a></td>
                        <td style="width: 600px">
                            <div class="form-group">
                                <input class="form-control" name="review_dok_3" type="text" placeholder="{{ __('Tanggapi Dokumen Udara Emisi (Hasil Uji Lab)') }}" required="true" aria-required="true" value="{{old('review_dok_3')}}"/>
                            </div>
                            @if ($errors->has('review_dok_3'))
                                <div id="review_dok_3-error" class="error text-danger pt-1" for="review_dok_3" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_3') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr> 
                    @elseif ($pelaporan->jenis == 'LimbahB3')
                    <tr>
                      <td style="width: 180px">Dokumen Deskripsi Pengelolaan Limbah B3</td>
                      <td style="width: 1px">:</td>
                      <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                      <td>
                          <div class="form-group">
                              <input class="form-control" name="review_dok_1" type="text" placeholder="{{ __('Tanggapi Dokumen Deskripsi Pengelolaan Limbah B3') }}" required="true" aria-required="true" value="{{old('review_dok_1')}}"/>
                          </div> 
                            @if ($errors->has('review_dok_1'))
                                <div id="review_dok_1-error" class="error text-danger pt-1" for="review_dok_1" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_1') }}</strong>
                                </div>
                            @endif
                      </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Bukti Manifest</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_2) }}" target="_blank">Download</a></td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="review_dok_2" type="text" placeholder="{{ __('Tanggapi Dokumen Bukti Manifest') }}" required="true" aria-required="true" value="{{old('review_dok_2')}}"/>
                            </div>
                            @if ($errors->has('review_dok_2'))
                                <div id="review_dok_2-error" class="error text-danger pt-1" for="review_dok_2" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_2') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen MOU Pengelolaan Limbah B3</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_3) }}" target="_blank">Download</a></td>
                        <td style="width: 600px">
                            <div class="form-group">
                                <input class="form-control" name="review_dok_3" type="text" placeholder="{{ __('Tanggapi Dokumen MOU Pengelolaan Limbah B3') }}" required="true" aria-required="true" value="{{old('review_dok_3')}}"/>
                            </div>
                            @if ($errors->has('review_dok_3'))
                                <div id="review_dok_3-error" class="error text-danger pt-1" for="review_dok_3" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_3') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr> 
                    <tr>
                      <td style="width: 180px">Dokumen Izin TPS Limbah B3</td>
                      <td style="width: 1px">:</td>
                      <td><a href="{{ asset('storage/'.$pelaporan->dok_4) }}" target="_blank">Download</a></td>
                      <td style="width: 600px">
                          <div class="form-group">
                              <input class="form-control" name="review_dok_4" type="text" placeholder="{{ __('Tanggapi Dokumen Izin TPS Limbah B3') }}" required="true" aria-required="true" value="{{old('review_dok_4')}}"/>
                          </div>
                            @if ($errors->has('review_dok_4'))
                                <div id="review_dok_4-error" class="error text-danger pt-1" for="review_dok_4" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_4') }}</strong>
                                </div>
                            @endif
                      </td>
                    </tr> 
                    @elseif ($pelaporan->jenis == 'Lingkungan')
                    <tr>
                      <td style="width: 180px">Dokumen Pelaporan</td>
                      <td style="width: 1px">:</td>
                      <td><a href="{{ asset('storage/'.$pelaporan->dok_1) }}" target="_blank">Download</a></td>
                      <td>
                          <div class="form-group">
                            <input class="form-control" name="review_dok_1" type="text" placeholder="{{ __('Tanggapi Dokumen Pelaporan') }}" required="true" aria-required="true" value="{{old('review_dok_1')}}"/>
                          </div> 
                            @if ($errors->has('review_dok_1'))
                                <div id="review_dok_1-error" class="error text-danger pt-1" for="review_dok_1" style="display: block;">
                                    <strong>{{ $errors->first('review_dok_1') }}</strong>
                                </div>
                            @endif
                      </td>
                    </tr>
                    @else
                      
                    @endif
                    <tr>
                        <td style="width: 180px">Kesimpulan</td>
                        <td style="width: 1px">:</td>
                        <td colspan="2">
                          <div class="form-group">
                            <div class="form-check form-check-inline mt-4">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kesimpulan" id="Taat" value="Taat">
                                Taat
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kesimpulan" id="Taat dengan Perbaikan" value="Taat dengan Perbaikan">
                                Taat dengan Perbaikan
                              </label>
                            </div>                            
                          </div>
                            @if ($errors->has('kesimpulan'))
                                <div id="kesimpulan-error" class="error text-danger pt-1" for="kesimpulan" style="display: block;">
                                    <strong>{{ $errors->first('kesimpulan') }}</strong>
                                </div>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
              </div>   
                  <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                   
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection