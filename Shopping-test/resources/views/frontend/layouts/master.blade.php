<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
    @yield('css')
</head>

<body>
    
    
   @include('frontend.partials.header')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    @yield('content')

   


    @include('frontend.partials.footer')

    <!-- Js Plugins -->
    @yield('js')
    <script src="{{ ('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ ('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ ('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ ('frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ ('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ ('frontend/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ ('frontend/js/jquery.dd.min.js') }}"></script>
    <script src="{{ ('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ ('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ ('frontend/js/main.js') }}"></script>

</body>

</html>