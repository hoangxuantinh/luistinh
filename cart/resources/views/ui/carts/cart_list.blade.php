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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
        .first-row img {
            width: 80px;
            height: 70px;
        }

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="change_cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><i class="ti-save" id="saveAll" data-url="{{ route('updateall_cart') }}"></i>All</th>
                                    <th><i class="ti-close" ></i></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (session('cart') != null)
                                    @foreach (session()->get('cart')->products as $productItem)
                                        <tr>
                                            <td class="cart-pic first-row"><img
                                                    src="{{ $productItem['productIfor']->feature_image_path }}"
                                                    alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $productItem['productIfor']->name }}</h5>
                                            </td>
                                            <td class="p-price first-row">
                                                {{ number_format($productItem['productIfor']->price) }}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" id="quantity" data-id="{{ $productItem['productIfor']->id }}"
                                                            value="{{ $productItem['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">
                                                {{ number_format($productItem['price']) }} </td>
                                            <td class="close-td first-row">
                                                <i class="ti-save"
                                                    data-url="{{ route('update_cart', ['id' => $productItem['productIfor']->id]) }}"
                                                    id="update_cart">
                                                </i>
                                            </td>
                                            <td class="close-td first-row"><i
                                                    data-url="{{ route('delete_cart', ['id' => $productItem['productIfor']->id]) }}"
                                                    id="delete_cart" class="ti-close"></i></td>

                                        </tr>

                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal
                                        <span>{{ number_format(session('cart')->totalQuantity) }}</span></li>
                                    <li class="cart-total">Total
                                        <span>{{ number_format(session('cart')->totalPrice) }}</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
<script>
    function delete_cart() {
        let urlDelete = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: urlDelete,
            success: function(data) {
                $('#change_cart').empty();
                $('#change_cart').html(data);
                var proQty = $('.pro-qty');
                proQty.prepend('<span class="dec qtybtn">-</span>');
                proQty.append('<span class="inc qtybtn">+</span>');
                proQty.on('click', '.qtybtn', function() {
                    var $button = $(this);
                    var oldValue = $button.parent().find('input').val();
                    if ($button.hasClass('inc')) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 0) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 0;
                        }
                    }
                    $button.parent().find('input').val(newVal);
                });
            }
        })
    }

    function updateCart() {
        let url = $(this).data('url');
        let quantity = $(this).parents('tbody').find('#quantity').val();
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                quantity: quantity
            },
            success: function(data) {
                $('#change_cart').empty();
                $('#change_cart').html(data);
                var proQty = $('.pro-qty');
                proQty.prepend('<span class="dec qtybtn">-</span>');
                proQty.append('<span class="inc qtybtn">+</span>');
                proQty.on('click', '.qtybtn', function() {
                    var $button = $(this);
                    var oldValue = $button.parent().find('input').val();
                    if ($button.hasClass('inc')) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 0) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 0;
                        }
                    }
                    $button.parent().find('input').val(newVal);
                });
                alert('cập nhật thành công');

            }
        })
    }
    function saveAll(){
        var list = [];
        $('table tbody tr td').each(function() {
            $(this).find('input#quantity').each(function() {
                var element = {id: $(this).data('id'), value: $(this).val()};
                list.push(element);
            })
            
        })
        $.ajax({
            type: 'POST',
            url: $(this).attr('data-url'),
            data: {
                "_token" : "{{ csrf_token() }}",
                list: list
            },
            success:function(data) {
                $('#change_cart').empty();
                $('#change_cart').html(data);
                var proQty = $('.pro-qty');
                proQty.prepend('<span class="dec qtybtn">-</span>');
                proQty.append('<span class="inc qtybtn">+</span>');
                proQty.on('click', '.qtybtn', function() {
                    var $button = $(this);
                    var oldValue = $button.parent().find('input').val();
                    if ($button.hasClass('inc')) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 0) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 0;
                        }
                    }
                    $button.parent().find('input').val(newVal);
                });
                alert('cập nhật thành công');
            }

        })
    }
    $(function() {
        $(document).on('click', '#delete_cart', delete_cart);
        $(document).on('click', '#update_cart', updateCart)
        $(document).on('click','#saveAll',saveAll)
    })

</script>


</html>
