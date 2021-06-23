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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <style>
        .feature_image_path {
            width: 200px;
            height: 300px;

        }

        .add-cart {
            cursor: pointer;
        }

        .img-card {
            width: 100px;
            height: 50px;
        }

    </style>
    @yield('css')
</head>

<body>
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.{{ getConfigKeySetting('gmail') }}
                    </div>



                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +{{ getConfigKeySetting('phone_number') }}
                    </div>
                </div>
                <div class="ht-right">
                    @if (auth()->check())
                        <a href="#" class="login-panel"><i class="fa fa-user"></i>Hi-{{ auth()->user()->name }}</a>
                    @else
                        <a href="{{ route('logout') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif
                    <a href="{{ route('logout') }}" style="width:100px;" class="login-panel">Logout</a>



                    <div class="top-social">
                        <a href="{{ getConfigKeySetting('facebook') }}"><i class="ti-facebook"></i></a>
                        <a href="{{ getConfigKeySetting('twitter') }}"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    @if (session('cart') != null)
                                        <span id="quantity-show">{{ session()->get('cart')->totalQuantity }}</span>
                                    @else
                                        <span id="quantity-show">0</span>
                                    @endif
                                </a>
                                <div class="cart-hover">
                                    <div id="change_item">
                                        @if (session('cart') != null)

                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        @foreach (session()->get('cart')->products as $cart)


                                                            <tr>
                                                                <td class="si-pic"><img
                                                                        src="{{ $cart['productInfor']->feature_image_path }}"
                                                                        class="img-card"></td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>{{ $cart['quantity'] }}
                                                                            *
                                                                            {{ number_format($cart['productInfor']->price) }}
                                                                        </p>
                                                                        <h6>{{ $cart['productInfor']->name }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="ti-close delete-cart"
                                                                        data-url="{{ route('delete-cart', ['id' => $cart['productInfor']->id]) }}"></i>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>total:</span>

                                                   
                                                        <h5>{{ number_format(session()->get('cart')->totalPrice) }}</h5>
                                                        @if(session('cart') === null)
                                                            <h5>0</h5>
                                                        @endif
                                                <input type="number" hidden id="quantity_global">

                                            </div>
                                        @endif
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{ route('trangchu') }}">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Collection</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Pages</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>

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
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img class="feature_image_path" src="{{ $product->feature_image_path }}"
                                                alt="">
                                            <div class="sale pp-sale">Sale</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                                                </li>
                                                <li class="quick-view">
                                                    <a data-url="{{ route('add-cart', ['id' => $product->id]) }}"
                                                        data-id="{{ $product->id }}" class="add-cart">+Add Cart</a>
                                                </li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Towel</div>
                                            <a href="#">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                ₫{{ number_format($product->price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Shop Section End -->




    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://www.facebook.com/thuy.huynhvan"
                                target="_blank">Huynh Van Thuy</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @yield('js')
    <script src="{{ 'frontend/js/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'frontend/js/bootstrap.min.js' }}"></script>
    <script src="{{ 'frontend/js/jquery-ui.min.js' }}"></script>
    <script src="{{ 'frontend/js/jquery.countdown.min.js' }}"></script>
    <script src="{{ 'frontend/js/jquery.nice-select.min.js' }}"></script>
    <script src="{{ 'frontend/js/jquery.zoom.min.js' }}"></script>
    <script src="{{ 'frontend/js/jquery.dd.min.js' }}"></script>
    <script src="{{ 'frontend/js/jquery.slicknav.js' }}"></script>
    <script src="{{ 'frontend/js/owl.carousel.min.js' }}"></script>
    <script src="{{ 'frontend/js/main.js' }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        function actionAddCart() {
            let url = $(this).attr('data-url');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#change_item').empty();
                    $('#change_item').html(data);
                    alertify.success('Thêm thành công');
                    $('#quantity-show').text($('#quantity_global').val());

                }
            })
        }

        function actionDeleteCart() {
            let urlDelete = $(this).attr('data-url');
            $.ajax({
                type: 'GET',
                url: urlDelete,
                success: function(data) {
                    $('#change_item').empty();
                    $('#change_item').html(data);
                    $('#quantity-show').text($('#quantity_global').val());

                }
            })

        }

        $(function() {
            $(document).on('click', '.add-cart', actionAddCart)
            $(document).on('click', '.delete-cart', actionDeleteCart)
        })
    </script>

</body>

</html>
