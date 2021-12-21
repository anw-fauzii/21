<!DOCTYPE html>
<html>
<head>
  <title>Pelayanan Surat Desa Mekarwangi</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/logo-garut.png') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  @stack('style')

</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    <div class="page-wrapper full-page">
      @yield('content')
      @include('sweetalert::alert')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&"></script>
    <script src="{{asset('js/gmaps.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('js')
</body>
</html>