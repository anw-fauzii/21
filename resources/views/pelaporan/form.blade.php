@extends('layouts.app')

@section('content')
  <div class="content">
    <div class="container-fluid">

        <div class="row">
         <div class="col-md-12">
                <!-- Card deck -->
            <div class="card-deck">

                <!-- Card Pengajuan Air -->
                <div class="card">
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title text-danger">Petunjuk Pengisian!</h3>
                        <!--Text -->    
                        <p class="card-text text-justify">Sebelum mengajukan pelaporan, harap edit terlebih dahulu profil intansi di halaman Edit Profile.</p> 

                    </div>
            
                </div>
                <!-- Card -->
            
            </div>
            <!-- Card deck -->
         </div>
        </div> 

        <div class="row mt-3">
            <div class="col-md-12">
               <div class="card-deck">
   
                <div class="card mb-12">    
                        
                    <form action="{{ route('pelaporan.form-status')}}" method="POST">
                            @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="link-icons" data-feather="x"></i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif    
                                <div class="form-group">
                                <label for="filter">Pilih periode, tahun dan jenis pelaporan</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control" id="jenis" name="jenis" required>
                                            <option selected disabled>Pilih Jenis Pelaporan</option>
                                            <option value="Air">Pelaporan Air</option>
                                            <option value="Udara">Pelaporan Udara</option>
                                            <option value="LimbahB3">Pelaporan Limbah B3</option>
                                            <option value="Lingkungan">Pelaporan Lingkungan</option>
                                        </select>
                                        @if ($errors->has('jenis'))
                                        <div id="jenis-error" class="error text-danger pt-1" for="jenis" style="display: block;">
                                            <strong>{{ $errors->first('jenis') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" id="periode" name="periode" required>
                                            <option selected disabled>Pilih Dahulu Jenis Pelaporan</option>
                                        </select> 
                                       @if ($errors->has('periode'))
                                        <div id="periode-error" class="error text-danger pt-1" for="periode" style="display: block;">
                                            <strong>{{ $errors->first('periode') }}</strong>
                                        </div>
                                        @endif 
                                    </div>
                                    
                                    <div class="col-4">
                                        <select class="form-control" id="tahun" name="tahun" required>
                                            <option selected disabled>Pilih Tahun</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                        @if ($errors->has('tahun'))
                                        <div id="tahun-error" class="error text-danger pt-1" for="tahun" style="display: block;">
                                            <strong>{{ $errors->first('tahun') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>    
                                </div>
                                @if ($errors->has('bidang_usaha'))
                                    <div id="bidang_usaha-error" class="error text-danger pt-1" for="bidang_usaha" style="display: block;">
                                        <strong>{{ $errors->first('bidang_usaha') }}</strong>
                                    </div>
                                @endif
                                @if ($errors->has('dok_1'))
                                    <div id="dok_1-error" class="error text-danger pt-1" for="dok_1" style="display: block;">
                                        <strong>{{ $errors->first('dok_1') }}</strong>
                                    </div>
                                @endif  
                                @if ($errors->has('dok_2'))
                                    <div id="dok_2-error" class="error text-danger pt-1" for="dok_2" style="display: block;">
                                        <strong>{{ $errors->first('dok_2') }}</strong>
                                    </div>
                                @endif  
                                @if ($errors->has('dok_3'))
                                    <div id="dok_3-error" class="error text-danger pt-1" for="dok_3" style="display: block;">
                                        <strong>{{ $errors->first('dok_3') }}</strong>
                                    </div>
                                @endif 
                                @if ($errors->has('dok_4'))
                                    <div id="dok_4-error" class="error text-danger pt-1" for="dok_4" style="display: block;">
                                        <strong>{{ $errors->first('dok_4') }}</strong>
                                    </div>
                                @endif  
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Selanjutnya</button>
                        </div>
                    </form>
                </div>
                   
               </div>
            </div>
        </div> 
        
    </div>
  </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#jenis').on('change', function() {
                var jenis = $(this).val();
                    if(jenis == 'Air') {
                    $.ajax({
                        success:function() {
                            $('#periode').append('<option selected disabled>Pilih Periode</option><option value="1">Triwulan 1</option><option value="2">Triwulan 2</option><option value="3">Triwulan 3</option><option value="4">Triwulan 4</option>');
                        }
                    });
                    $('#periode').html('refresh',true);
                    } else if(jenis == 'LimbahB3') {
                    $.ajax({
                        success:function() {
                            $('#periode').append('<option selected disabled>Pilih Periode</option><option value="1">Triwulan 1</option><option value="2">Triwulan 2</option><option value="3">Triwulan 3</option><option value="4">Triwulan 4</option>');
                        }
                    });
                    $('#periode').html('refresh',true);
                    } else if(jenis == 'Udara') {
                    $.ajax({
                        success:function() {
                            $('#periode').append('<option selected disabled>Pilih Semester</option><option value="1">Semester 1</option><option value="2">Semester 2</option>');
                        }
                    });
                    $('#periode').html('refresh',true);
                    } else if(jenis == 'Lingkungan') {
                    $.ajax({
                        success:function() {
                            $('#periode').append('<option selected disabled>Pilih Semester</option><option value="1">Semester 1</option><option value="2">Semester 2</option>');
                        }
                    });
                    $('#periode').html('refresh',true);
                    } else{
                    $('#periode').empty();
                    $('#periode').html('refresh',true);
                    }

                    
            });
        });
    </script>
@endpush
