<!DOCTYPE html>
<html>
<head>
    <title>Smart Shop a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home ::
        w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="{{url('/')}}/asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- pignose css -->
    <link href="{{url('/')}}/asset/css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all"/>


    <!-- //pignose css -->
    <link href="{{url('/')}}/asset/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{url('/')}}/asset/css/custom.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script type="text/javascript" src="{{url('/')}}/asset/js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- cart -->
<!--	<script src="{{url('/')}}/asset/js/simpleCart.min.js"></script>-->
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{url('/')}}/asset/js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
          rel='stylesheet' type='text/css'>
    <script src="{{url('/')}}/asset/js/jquery.easing.min.js"></script>
    <style>
        .new_arrivals {
            background: #fff;
        }

        .product-easy {
            background: #fff;
        }

        .footer {
            background: #fff;
        }

        .single {
            background: #fff;
        }

        .pdt-image img {
            width: 50px;
        }

        .single-cart-item {
            position: relative;
            background: #FDA30E;
            width: 239px;
            height: 70px;
            display: inline-block;
            z-index: 9999;
        }

        .pdt-image {
            position: absolute;
        }

        .single-cart-item h4 {
            padding-left: 65px;
            font-size: 10px;
            color: #fff;
            padding-right: 15px;

        }

        span.qntity {
            color: #fff;
            font-weight: 700;
            padding-top: 10px;
            padding-bottom: 20px;

        }

        .cart-product-item {
            position: absolute;
            width: 100%;
            background: #FDA30E;
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            right: 0;
        }

        .cart.box_1 {
            position: relative;
        }

        .cart.box_1:hover .cart-product-item {
            opacity: 1;
            visibility: visible;
            top: 56px;
        }

        .close-btn {
            position: absolute;
            left: auto;
            right: 0;
            font-size: 13px;
            color: #fff;
            cursor: pointer;
        }
        .existing_address_box{
            padding: 10px;
            background: #CCC;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin: 10px;
        }
        .active.existing_address_box{
            background: #000;
            color: #fff;
        }
        .existing_address_box:hover{
            background: #aaa;
        }
        .congrats {
            background: #fff;
            padding: 50px;
        }

        .congrats  h3 {
            padding-bottom: 50px;
        }
        a.btn.btn-link {
            color: #FDA30E;
        }
        .related-product {
            background: #fff;
            padding: 50px;
        }
        .electronics{
            background: #fff;
        }
        .add-review input[type="text"], .add-review input[type="email"], .add-review textarea {
            outline: none;
            padding: 10px;
            border: 1px solid #D2D2D2;
            width: 48.35%;
            font-size: 15px;
            color: #FDA30E;
            margin: 0 5px;
        }
        .title h4 {color: #FDA30E;padding-bottom: 50px;}
        .contact{
            background: #fff;
        }
    </style>
</head>
<body>
<!-- header -->
<div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders
            </li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example
                    .com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->

<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{url('/')}}"><img src="{{url('/')}}/asset/images/logo3.jpg"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form id="src-from" method="POST" action="{{route('search.product')}}">
                {{csrf_field()}}
                <div class="search">
                    <input type="search"  name="stext" required="">
                </div>
                <div class="section_room">
                    <select name="category" class="frm-field required">
                        <option value="0">All categories</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach;
                    </select>
                </div>
                <div class="sear-sub">
                    <input type="submit" placeholder="Search Product" value="" name="submit" id="src-submit" >
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                @if(Auth::check() != true)
                    <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
                    @endif
                </li>
                <li><a class="fb" target="_blank" href="{{$social_link->facebook}}"></a></li>
                <li><a class="twi" target="_blank" href="{{$social_link->twitter}}"></a></li>
                <li><a class="insta" target="_blank" href="{{$social_link->instagram}}"></a></li>
                <li><a class="you" target="_blank" href="{{$social_link->youtube}}"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="{{url('/')}}">Home
                                    <span class="sr-only">(current)</span></a></li>
                            @foreach($allmenu as $menu)
                            <li class=" menu__item"><a class="menu__link" href="{{route('category.product',['cid'=>$menu->catid,'any'=>Replace($menu->cname)])}}">{{$menu->cname}}</a></li>
                            @endforeach
                            <li class=" menu__item"><a class="menu__link" href="{{url('/')}}/contact">contact</a></li>
                            @if(Auth::check())
                                <li class=" menu__item">
                                    <a class="menu__link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        @php
            $pdtid = Session::get('pdtid');
            $totalprice = Session::get('totalprice');
            $title = Session::get('stitle');
            $picture = Session::get('spicture');
            $quantity = Session::get('qtyid');
            $sprice = Session::get('sprice');
            if($pdtid){
                $countpdt = count($pdtid);
            }else{
                $countpdt= 0;
                $totalprice = 0;
            }
        @endphp
        <div class="top_nav_right">
            <div class="cart box_1">
                <a href="{{url('/')}}/checkout">
                    <h3>
                        <div class="total">
                            <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            ৳<span id="totalAmount" class="simpleCart_total">{{$totalprice}}</span> (<span
                                    id="simpleCart_quantity" class="simpleCart_quantity">{{$countpdt}}</span> items)
                        </div>
                    </h3>
                </a>
                <div class="cart-product-item">
                    @php
                        if($pdtid){
                            foreach($pdtid as $pid){

                            $i = array_search($pid, $pdtid);

                                echo "<div class='single-cart-item'>
                                        <div class='pdt-image'>
                                      <img src='".url('/')."/images/product/{$picture[$i]}'/>
                                      </div>
                                       <div class='pdt-text'><h4>{$title[$i]}</h4></div>
                                       <span id='qty-{$pdtid[$i]}' class='qntity'>{$quantity[$i]}</span> X
                                       <span class='qntity'>{$sprice[$i]}</span>
                                       <i id='item-close{$pdtid[$i]}' class='glyphicon glyphicon-remove pull-right close-btn'></i>
                                        </div>";

                            }
                        }
                    @endphp
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- banner -->
@yield("content")
<!-- //product-nav -->

    <div class="coupons">
        <div class="container">
            <div class="coupons-grids text-center">
                <div class="col-md-3 coupons-gd">
                    <h3>Buy your product in a simple way</h3>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <h4>LOGIN TO YOUR ACCOUNT</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, consectetur.</p>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <h4>SELECT YOUR ITEM</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, consectetur.</p>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                    <h4>MAKE PAYMENT</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, consectetur.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="col-md-3 footer-left">
                <h2><a href="{{url('/')}}"><img src="{{url('/')}}/asset/images/logo3.jpg" alt=" "/></a></h2>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                    sit amet, consectetur, adipisci velit, sed quia non
                    numquam eius modi tempora incidunt ut labore
                    et dolore magnam aliquam quaerat voluptatem.</p>
            </div>
            <div class="col-md-9 footer-right">
                <div class="col-sm-6 newsleft">
                    <h3>SIGN UP FOR NEWSLETTER !</h3>
                </div>
                <div class="col-sm-6 newsright">
                    <form>
                        <input type="text" value="Email" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Email';}" required="">
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="clearfix"></div>
                <div class="sign-grds">
                    <div class="col-md-4 sign-gd">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/')}}/contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 sign-gd-two">
                        <h4>Store Information</h4>
                        <ul>
                            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"> </i>Address : {{$storeinfo->address}}</li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a
                                        href="mailto:{{$storeinfo->email}}">{{$storeinfo->email}}</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : {{$storeinfo->phone}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 sign-gd flickr-post">
                        <h4>Flickr Posts</h4>
                        <ul>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b15.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b16.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b17.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b18.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b15.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b16.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b17.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b18.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                            <li><a href="single.html"><img src="{{url('/')}}/asset/images/b15.jpg" alt=" "
                                                           class="img-responsive"/></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <p class="copy-right">&copy 2016 Smart Shop. All rights reserved |
        </div>
    </div>
    <!-- //footer -->
    <!-- login -->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <div class="login-grids">
                        <div class="login">
                            <div class="login-bottom">
                                <h3>Sign up for free</h3>
                                <form method="POST" action="{{ route('register') }}">
                                {{csrf_field()}}
                                    <div class="sign-up">
                                        <h4>Name :</h4>
                                        <input type="text" name="name" value="{{ old('name') }}" required="">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="sign-up">
                                        <h4>Email :</h4>
                                        <input type="text" name="email" value="{{ old('email') }}" required="">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="sign-up">
                                        <h4>Password :</h4>
                                        <input type="password" name="password" required="">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="sign-up">
                                        <h4>Re-type Password :</h4>
                                        <input type="password" name="password_confirmation"  required="">

                                    </div>
                                    <div class="sign-up">
                                        <input type="submit" value="REGISTER NOW">
                                    </div>

                                </form>
                            </div>
                            <div class="login-right">
                                <h3>Sign in with your account</h3>
                                <form method="POST" action="{{ route('login') }}">
                                {{csrf_field()}}
                                    <div class="sign-in">
                                        <h4>Email :</h4>
                                        <input type="text" name="email" value="{{ old('email') }}" />
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="sign-in">
                                        <h4>Password :</h4>
                                        <input type="password" name="password"  required="">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="single-bottom">
                                        <input type="checkbox" id="brand" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="brand"><span></span>Remember Me.</label>
                                    </div>
                                    <div class="sign-in">
                                        <input type="submit" value="SIGNIN">
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy
                                Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- //login -->



</body>
</html>
