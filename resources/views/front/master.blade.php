<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Unistore Pro &middot; Premium Responsive E-Commerce Template</title>

    <meta name="description" content="Bootstrap template for you store - E-Commerce Bootstrap Template">
    <meta name="keywords"
          content="unistore, e-commerce bootstrap template, premium e-commerce bootstrap template, premium bootstrap template, bootstrap template, e-commerce, bootstrap template, sunrise digital">
    <meta name="author" content="Sunrise Digital">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png">

    <!-- Bootstrap -->
    <link href="{{ asset('front/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/ionicons-2.0.1/css/ionicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

    <link href="{{ asset('front/assets/css/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<x-cart-menu />


<div class="toplinks">
    <a href="#signin" data-toggle="modal" data-target="#Modal-Registration"> <i class="ion-person"></i> Registration</a>
    <a href="#signin" data-toggle="modal" data-target="#Modal-SignIn"> <i class="ion-unlocked"></i> Sign In</a>
    <a href="./favorites/"> <i class="ion-ios-heart"></i> Favorites </a>
    <a href="tel:+80005554465" class="hidden-xs"> <i class="ion-android-call"></i> 8000 555-44-65 </a>
</div>


<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"> Unistore Pro </a>
            <a class="navbar-brand pull-right hidden-sm hidden-md hidden-lg" href="#open-cart"> <i class="ion-bag"></i>
                7 </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./">Home</a></li>
                <li><a href="./store/">Store</a></li>
                <li><a href="./blog/">Blog</a></li>
                <li><a href="./contacts/">Contacts</a></li>
                <li class="dropdown">
                    <a href="./store/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        More <i class="ion-android-arrow-dropdown"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="./store/product.html">Product</a></li>
                        <li><a href="./about/">About Us</a></li>
                        <li><a href="./checkout/">Checkout</a></li>
                        <li><a href="./faq/">FAQ</a></li>
                        <li><a href="./gallery/">Gallery</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Variations</li>
                        <li><a href="./blog/item-photo.html">Article Photo</a></li>
                        <li><a href="./blog/item-video.html">Article Video</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->


        <div class="search hidden-xs" data-style="hidden">
            <div class="input">
                <button type="button"><i class="ion-ios-search"></i></button>

                <input type="text" name="search" value="" placeholder="Type here..."/>
            </div>
        </div>
    </div><!--/.container-fluid -->
</nav>

@yield('content')

<hr class="offset-lg">
<hr class="offset-sm">
<footer>
    <div class="about">
        <div class="container">
            <div class="row">
                <hr class="offset-md">

                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-telephone-outline"></i>
                        <h1>24/7 free <br> <span>support</span></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-star-outline"></i>
                        <h1>Low price <br> <span>guarantee</span></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-gear-outline"></i>
                        <h1> Manufacturer’s <br> <span>warranty</span></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-loop"></i>
                        <h1> Full refund <br> <span>guarantee</span></h1>
                    </div>
                </div>

                <hr class="offset-md">
            </div>
        </div>
    </div>

    <div class="subscribe">
        <div class="container align-center">
            <hr class="offset-md">

            <h1 class="h3 upp">Join our newsletter</h1>
            <p>Get more information and receive special discounts for our products.</p>
            <hr class="offset-sm">

            <form action="index.php" method="post">
                <div class="input-group">
                    <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control">
                    <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"> Subscribe <i class="ion-android-send"></i> </button>
                </span>
                </div><!-- /input-group -->
            </form>
            <hr class="offset-lg">
            <hr class="offset-md">

            <div class="social">
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-googleplus-outline"></i></a>
                <a href="#"><i class="ion-social-instagram-outline"></i></a>
                <a href="#"><i class="ion-social-linkedin-outline"></i></a>
                <a href="#"><i class="ion-social-youtube-outline"></i></a>
            </div>


            <hr class="offset-md">
            <hr class="offset-md">
        </div>
    </div>


    <div class="container">
        <hr class="offset-md">

        <div class="row menu">
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Information <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i></h1>

                <div class="list-group">
                    <a href="#" class="list-group-item">About</a>
                    <a href="#" class="list-group-item">Terms</a>
                    <a href="#" class="list-group-item">How to order</a>
                    <a href="#" class="list-group-item">Delivery</a>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Products <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i></h1>

                <div class="list-group">
                    <a href="#" class="list-group-item">Laptops</a>
                    <a href="#" class="list-group-item">Tablets</a>
                    <a href="#" class="list-group-item">Servers</a>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Support <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i></h1>

                <div class="list-group">
                    <a href="#" class="list-group-item">Returns</a>
                    <a href="#" class="list-group-item">FAQ</a>
                    <a href="#" class="list-group-item">Contacts</a>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Location</h1>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Language
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#English"> <img src="{{asset('front/assets/img/flags/gb.png')}}" alt="Eng"/> English</a></li>
                        <li><a href="#Spanish"> <img src="{{asset('front/assets/img/flags/es.png')}}" alt="Spa"/> Spanish</a></li>
                        <li><a href="#Deutch"> <img src="{{asset('front/assets/img/flags/de.png')}}" alt="De"/> Deutch</a></li>
                        <li><a href="#French"> <img src="{{asset('front/assets/img/flags/fr.png')}}" alt="Fr"/> French</a></li>
                    </ul>
                </div>
                <hr class="offset-xs">

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Currency
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a href="#Euro"><i class="ion-social-euro"></i> Euro</a></li>
                        <li><a href="#Dollar"><i class="ion-social-usd"></i> Dollar</a></li>
                        <li><a href="#Yen"><i class="ion-social-yen"></i> Yen</a></li>
                        <li><a href="#Bitcoin"><i class="ion-social-bitcoin"></i> Bitcoin</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-3 col-md-3 col-md-offset-1 align-right hidden-sm hidden-xs">
                <h1 class="h4">Unistore Pro, Inc.</h1>

                <address>
                    1305 Market Street, Suite 800<br>
                    San Francisco, CA 94102<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>

                <address>
                    <strong>Support</strong><br>
                    <a href="mailto:#">sup@example.com</a>
                </address>

            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-9 payments">
                <p>Pay your order in the most convenient way</p>

                <div class="payment-icons">
                    <img src="{{asset('front/assets/img/payments/paypal.svg')}}" alt="paypal">
                    <img src="{{asset('front/assets/img/payments/visa.svg')}}" alt="visa">
                    <img src="{{asset('front/assets/img/payments/master-card.svg')}}" alt="mc">
                    <img src="{{asset('front/assets/img/payments/discover.svg')}}" alt="discover">
                    <img src="{{asset('front/assets/img/payments/american-express.svg')}}" alt="ae">
                </div>
                <br>

            </div>
            <div class="col-sm-4 col-md-3 align-right align-center-xs">
                <hr class="offset-sm hidden-sm">
                <hr class="offset-sm">
                <p>Unistore Pro © 2016 <br> Designed By <a href="http://sunrise.ru.com/" target="_blank">Sunrise
                        Digital</a></p>
                <hr class="offset-lg visible-xs">
            </div>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="Modal-SignIn" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="ion-android-close"></i></span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h2 class="modal-title text-center">Sign In</h2>
                            <br>

                            <form class="signin" action="index.php" method="post">
                                <input type="email" name="email" value="" placeholder="E-mail" required=""
                                       class="form-control"/>
                                <br>
                                <input type="password" name="password" value="" placeholder="Password" required=""
                                       class="form-control"/>
                                <br>

                                <button type="submit" class="btn btn-primary">Ok</button>
                                <a href="#forgin-password" data-action="Forgot-Password">Password recovery ></a>
                            </form>
                            <br>

                            <div class="social-login">
                                <div class="or"><p>OR</p></div>
                                <a href="#"><i class="icon" data-src="{{asset('front/assets/img/icons/facebook.svg')}}"></i></a>
                                <p>via</p>
                                <a href="#"><i class="icon" data-src="{{asset('front/assets/img/icons/google-plus.svg')}}"></i></a>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal-Registration" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="ion-android-close"></i></span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h2 class="modal-title text-center">Registration</h2>
                            <br>

                            <form class="join" action="index.php" method="post">
                                <input type="text" name="name" value="" placeholder="Name" required=""
                                       class="form-control"/>
                                <br>

                                <input type="email" name="email" value="" placeholder="E-mail" required=""
                                       class="form-control"/>
                                <br>

                                <input type="password" name="password" value="" placeholder="Password" required=""
                                       class="form-control"/>
                                <br>

                                <input type="text" name="confirm" value="" placeholder="Password again" required=""
                                       class="form-control"/>
                                <br>

                                <button type="submit" class="btn btn-primary btn-sm">Ok</button> &nbsp;&nbsp;
                                <a href="#">Terms ></a>

                                <br><br>
                                <p>
                                    By creating an account you will be able to shop faster, be up to date on an order's
                                    status, and keep track of the orders you have previously made.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal-ForgotPassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="ion-android-close"></i></span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="modal-title">Forgot Your Password?</h4>
                            <br>

                            <form class="join" action="index.php" method="post">
                                <input type="email" name="email" value="" placeholder="E-mail" required=""
                                       class="form-control"/>
                                <br>

                                <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                                <a href="#Sign-In" data-action="Sign-In">Back ></a>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <br><br>
                            <p>
                                Enter the e-mail address associated with your account. Click submit to have your
                                password e-mailed to you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal-Gallery" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="ion-android-close"></i></span></button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('front/assets/js/jquery-latest.min.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/core.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/store.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/jquery.touchSwipe.min.js')}}"></script>

<script type="text/javascript" src="{{asset('front/assets/js/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>


<script type="text/javascript" src="{{asset('front/assets/js/jquery-ui-1.11.4.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/jquery.ui.touch-punch.js')}}"></script>

<script type="text/javascript" src="{{asset('js/cart.js')}}"></script>

@yield('scripts')

</body>
</html>
