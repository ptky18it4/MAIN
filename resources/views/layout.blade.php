<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - Lenovo authorized unit in Vietnam</title>
    <!-- Logo title -->
    <link rel="shortcut icon" type="image/png" href="https://js1cdn.clubstatic.lenovo.com.cn/thinkpc/images/favicon.ico?version=8eebb34009b45c51691c30f8f94fd5f7"/>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js" integrity="sha256-36hEPcG8mKookfvUVvEqRkpdYV1unP6wvxIqbgdeVhk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/home.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('public/frontend/css/backtop.css')}}" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> 
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- remove this if you use Modernizr -->
    <script>
        (function(e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);
    </script>


</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel: 0326895190"><i class="fa fa-phone"></i> +84 090 909 9900</a></li>
                    <li><a href="mailto:phamtrungky19032000@gmail.com"><i class="fa fa-envelope-o"></i> thinkpad@gmail.com</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#mapModal"><i class="fa fa-map-marker"></i> 09 Ngu Hanh Son - Danang - VN</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i>USD</a></li>

                    <!-- Xử lý một số tác vụ khi truy cập website -->           
                    <!-- Mở hộp thoại đăng nhập khi mới vào website  -->
                    @if($user_id = Session::get('user_id'))

                    <li><a href="{{URL::to('infor')}}" data-toggle="modal" data-target="#myAccountModal"><i class="fa fa-user-o"></i>
                            <?php
                            $name = Session::get('user_name');
                            /**
                             * 1. Nếu name tồn tại thì in ra bên dưới, còn không thì thôi
                             */
                            if ($name) {
                                echo $name;
                            }
                            ?>
                        </a></li>
                    <!-- <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out"></i> Log out</a></li> -->
                    @else

                    <script>
                        $(window).load(function() {
                            $('#loginModal').modal('show');
                        });
                    </script>
                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#loginModal" class="text-white">
                            <i class="fas fa-sign-in-alt mr-2 text-red"></i> Log in </a>
                    </li>
                    <li class="text-center text-white">
                        <a href="#" data-toggle="modal" data-target="#registerModal" class="text-white">
                            <i class="fas fa-sign-out-alt mr-2 text-red"></i> Register </a>
                    </li>

                    @endif

                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->
        <!-- Test -->

        <!-- modals -->
        <!-- Map -->
        <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <a href="https://goo.gl/maps/PeBCxZMmt6K5jPQu5" target="_blank">Click để xem địa điểm !</a> -->
                        <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: auto">
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3835.758104908929!2d108.2495662!3d15.9740038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108878ee1dbf%3A0xb466fcf06b910a38!2zS2hvYSBDw7RuZyBuZ2jhu4cgdGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIC0gxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1572847144343!5m2!1svi!2s" width="570" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                        <!--Google Maps-->
                    </div>
                </div>
            </div>
        </div>

        <!-- My Account -->
        <div class="modal fade" id="myAccountModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">
                            Hello,
                            <strong style="color: red; text-transform: uppercase;">
                                <?php
                                $name = Session::get('user_name');
                                /**
                                 * 1. Nếu name tồn tại thì in ra bên dưới, còn không thì thôi
                                 */
                                if ($name) {
                                    echo $name;
                                }
                                ?>
                            </strong>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if(Session::get('user_id'))
                        @foreach($infor_user as $key => $infor)
                        <form action="{{URL::to('update-infor-user/'.$infor->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group" >
                            <img id="blah" class="user-image" style="width: 111px; height: 111px;" src="{{asset('public/uploads/users/'.$infor->image)}}" title="" data-placeholder="{{asset('public/uploads/users/'.$infor->image)}}" /></a>
                             <input type="file" id="edit_image" class="file"  name="product_image" onchange="readURL(this);" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="name" value="{{$infor->email}}" name="user_email" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" value="{{$infor->passdefault}} " id="password" name="user_password" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Address</label>
                                <input type="text" class="form-control" value="{{$infor->address}} " name="user_address" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Phone</label>
                                <input type="text" class="form-control" value="{{$infor->phone}} " name="user_phone" required="">
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control btn btn-danger" value="Update">
                            </div>
                            <hr>
                            <a href="{{URL::to('logout')}}" class="form-group" style="text-align: center;"><i class="fa fa-sign-out"></i> Log out</a>
                        </form>
                        @endforeach
                        @endif
                    </div>

                </div>

            </div>
        </div>
        <!-- Alert Register -->
        <div class="modal fade" id="alertRegisterModalSuccess" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Login Success !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="public/frontend/img/Ok-sticker-Lettering-animation-joan-quiros.gif" width="580" height="auto" alt="OK" srcset="">
                    </div>
                </div>
            </div>
        </div>

        <!-- log in -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title text-center">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php
                        $message = Session::get('message');
                        /**
                         * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
                         * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
                         */
                        if ($message) {
                            // echo $message;
                            echo '<div class="modal-body">';
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<p class="mb-0">';
                            echo $message;
                            echo '</p>';
                            echo '</div>';
                            echo '</div>';
                            // echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message', null);
                        }
                        ?>

                        <form action="{{URL::to('login')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email" name="user_email" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" placeholder="pasword " name="user_password" required="">
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control" value="Log in">
                            </div>
                            <div class="sub-w3l">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                                </div>
                            </div>
                            <p class="text-center dont-do mt-3">Don't have an account?
                                <a href="#" data-toggle="modal" data-target="#registerModal" aria-label="Close">
                                    Register Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- register -->
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Register</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{('register')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-form-label">Your Name</label>
                                <input type="text" class="form-control" placeholder="your name" name="user_name" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email " name="user_email" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" placeholder="password " name="user_password" id="password1" required="" onkeyup='check();'>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="confirm password " name="confirm_password" id="password2" required="" onkeyup='check();'>
                                <span id="message"></span>
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control" value="Register">
                            </div>
                            <div class="sub-w3l">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                    <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //modal -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{URL::to('/')}}" class="logo">
                                <!-- <img src="{{asset('public/frontend/img/logo.png')}}" alt=""> -->
                                <img src="https://www.lenovo.com/medias/thinkpad-logo-white.png?context=bWFzdGVyfHJvb3R8MzA3MHxpbWFnZS9wbmd8aDFiL2g4NC85NjM4ODE5ODIzNjQ2LnBuZ3xmNTM0Y2U2NjgzYWI4YjU2ZGNkNzg1ODRmOWUwZDhhMzhmYzU2MWRlYjVjODAyZjljN2YzMDk0MWViNzQ1N2Mz" style="max-width: 200px; max-height: 70px;" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="search" method="GET">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}";> --}}
                                <select class="input-select">
                                    <option value="0">All Category</option>
                                    @foreach($all_category as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                                <input class="input" placeholder="Search here" name="keywords" type="text">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty total-count"></div>
                                    </a>
                                    <div class="cart-dropdown " >
                                       <div class="cart-list show-cart">
                                                {{-- Here is place to show content of function javascript --}}
                                        </div>
                                       
                                        <span class="py-5 total-count"></span>
                                        <small>Item(s) selected</small>
                                        <div class="cart-summary">
                                            <strong>TOTAL PRICE :$</strong>
                                            <i style='color: red;' class="total-cart" ></i>
                                        </div>
                                        
                                        <div class="cart-btns">
                                            <a href="#">View Cart</a>
                                            <a href="#" class="clear-cart">Clear Cart</a>
                                            <a href="{{URL::to('checkout')}}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                        {{-- <button class=" my-5 clear-cart btn btn-danger">Clear Cart</button> --}}

                                    </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active" id="home"><a href="{{URL::to('home')}}">Home</a></li>
                    @foreach($all_menu as $key => $menu)
                    <li><a href="{{$menu->link}}">{{$menu->name}}</a></li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
    @yield('content')
    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#" data-toggle="modal" data-target="#mapModal"><i class="fa fa-map-marker"></i>09 Ngu Hanh Son - Danang - VN</a></li>
                                <li><a href="tel: 0326895190"><i class="fa fa-phone"></i>+84 090 909 9900</a></li>
                                <li><a href="mailto:phamtrungky19032000@gmail.com"><i class="fa fa-envelope-o"></i>thinkpad@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- test -->
        <a id="button" title="Back - Top"></a>
        <!-- /test -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><img src="public/frontend/img/icons8-visa-48.png"></a></li>
                            <li><a href="#"><img src="public/frontend/img/icons8-mastercard-credit-card-48.png"></a></li>
                            <li><a href="#"><img src="public/frontend/img/icons8-discover-48.png"></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.instagram.com/trungky1402/?hl=vi" target="_blank" style="color: #D10024">Kenneth</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->
    <!-- jQuery Plugins -->
    <script src="{{asset('public/frontend/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/home.js')}}"></script>
    <script src="{{asset('public/frontend/js/cart.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/nouislider.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/countdown.js')}}"></script>
    <script src="{{asset('public/frontend/js/backtop.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom-file-input.js')}}"></script>
</body>

</html>