<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta Http-Equiv="Cache-Control" Content="no-cache">
  <meta Http-Equiv="Pragma" Content="no-cache">
  <meta Http-Equiv="Expires" Content="0"> 
  
  <title>Sugar Regulatory Administration</title>

  <link rel="shortcut icon" href="{{ asset('template/images/logos/favicon.ico') }}"/>
  <link type="text/css" rel="stylesheet" href="{{ asset('template/icons/fuse-icon-font/style.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/animate.css/animate.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/pnotify/pnotify.custom.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/nvd3/build/nv.d3.min.css') }}"/>
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/fuse-html/fuse-html.min.css') }}"/>
  <link type="text/css" rel="stylesheet" href="{{ asset('template/css/main.css') }}">
  
  <!-- DATEPICKER -->
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/jquery/dist/bootstrap-datepicker.min.css') }}">

  <!-- RICH TEXT -->
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/summernote/summernote-bs4.css') }}">

  <!-- SELECT SEARCH -->
  <link type="text/css" rel="stylesheet" href="{{ asset('template/vendor/select2/select2.min.css') }}">

  <!-- CUSTOM CSS -->
  <link type="text/css" rel="stylesheet" href="{{ asset('template/css/custom.css') }}">  

</head>

  <body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
    <div id="wrapper"> 
    @include('layout.admin-sidenav')
      <div class="content-wrapper">
        @include('layout.admin-topnav') 
          <div class="content">  
            @yield('content')
          </div>
      </div>
  </body>

  <script type="text/javascript" src="{{ asset('template/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/mobile-detect/mobile-detect.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/popper.js/index.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/bootstrap/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/d3/d3.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/nvd3/build/nv.d3.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/datatables-responsive/js/dataTables.responsive.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/pnotify/pnotify.custom.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/fuse-html/fuse-html.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/js/main.js') }}"></script>
  
  <!-- DATEPICKER -->
  <script type="text/javascript" src="{{ asset('template/vendor/jquery/dist/jquery.datepair.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('template/vendor/jquery/dist/bootstrap-datepicker.min.js') }}"></script>

  <!-- RICH TEXT -->
  <script type="text/javascript" src="{{ asset('template/vendor/summernote/summernote-bs4.min.js') }}"></script>

  <!-- CUSTOM JS -->
  <script type="text/javascript" src="{{ asset('template/js/custom.js') }}"></script>

  <!-- SELECT SEARCH -->
  <script type="text/javascript" src="{{ asset('template/vendor/select2/select2.min.js') }}"></script>

  <!-- PRICE FORMAT -->
  <script type="text/javascript" src="{{ asset('template/vendor/price-format/jquery.priceformat.min.js') }}"></script>

   
  @yield('modals')
  @yield('scripts')

</html>