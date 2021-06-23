<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}">
  <!-- Icons -->
  <link rel="icon" href="{{ asset('assets/img/brand/favicon.png" type="image/png') }}">

  <link rel="stylesheet" href="{{ asset('adminlte/assets/css/argon.css?v=1.2.0" type="text/css')}}">
  <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css') }}">


  @yield('css')

</head>

<body>
  <!-- Sidenav -->
  @include('partisals.navbars')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('partisals.top_nav')
    <!-- Header -->
   
    
    <!-- Page content -->
    @yield('content')

 
  <!-- Argon Scripts -->
  <!-- Core -->

  <script src="{{ asset('adminlte/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('adminlte/assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{ asset('adminlte/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{ asset('adminlte/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('adminlte/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{ asset('adminlte/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('adminlte/assets/js/argon.js?v=1.2.0')}}"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



  @yield('js')

</body>

</html>
