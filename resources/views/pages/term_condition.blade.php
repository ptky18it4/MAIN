<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Thinkpad - Hệ thống bán lẻ laptop nhập khẩu giá rẻ toàn quốc</title>
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
    <?php
    $fp = "./resources/views/accessWebsite.txt";
    $fo = fopen($fp,'r');
    $fr = fread($fo, filesize($fp));
    $fr++;
    $fc = fclose($fo);
    $fo = fopen($fp,'w');
    $fw = fwrite($fo, $fr);
    $fc = fclose($fo);
    ?>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel: 0326895190"><i class="fa fa-phone"></i> +84 090 909 9900</a></li>
                    <li><a href="mailto:phamtrungky19032000@gmail.com"><i class="fa fa-envelope-o"></i> thinkpad@gmail.com</a></li>
                <li><a href="#" data-toggle="modal" data-target="#mapModal"><i class="fa fa-map-marker"></i>{{trans('layout.09 - Ngu Hanh Son - Danang - Vietnam')}}</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="/en"><img src="{{asset('public/frontend/img/usa-flag-language-icon.png')}}"  id="language" alt="">USA</a></li>
                    <li><a href="/vi"><img src="{{asset('public/frontend/img/vn-flag-language-icon.png')}}" id="language" alt="">VN</a></li>
                    <!-- Selected language -->

                    <!-- End Selected language  -->
                <li><a href="#"><i class="fa fa-dollar"></i>{{trans('layout.USD')}}</a></li>
                    <!-- Xử lý một số tác vụ khi truy cập website -->


                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#loginModal" class="text-white">
                        <i class="fas fa-sign-in-alt mr-2 text-red"></i>{{trans('layout.Log in')}}</a>
                    </li>

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
                        <h5 class="modal-title text-center">{{trans('layout.Location')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            {{trans('layout.Hello')}},
                            <strong style="color: red; text-transform: uppercase;">

                            </strong>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="user_id" value="$infor->id">
                                <div class="form-group" >
                                <img id="blah" class="user-image" style="width: 111px; height: 111px;" src="" title="image" data-placeholder="" /></a>
                                <div>
                                    <input type="file" id="edit_image" class="file"  name="product_image"  title="change image" onchange="readURL(this);" /></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('layout.Email')}}</label>
                                    <input type="email" class="form-control" id="name" value="" name="user_email" required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('layout.Password')}}</label>
                                    <input type="password" class="form-control" value=" " id="password" name="user_password" required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('layout.Address')}}</label>
                                    <input type="text" class="form-control" value="" name="user_address" required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('layout.Phone number')}}</label>
                                    <input type="text" class="form-control" value="" name="user_phone" required="">
                                </div>
                                <div class="right-w3l">
                                    <input type="submit" class="form-control btn btn-danger" value="Update">
                                </div>
                                <hr>
                            <a href="{{URL::to('logout')}}" name="delInfor" class="form-group" style="text-align: center;"><i class="fa fa-sign-out"></i>{{trans('layout.Log out')}}</a>
                            </form>
                    </div>

                </div>

            </div>
        </div>
        <!-- Help -->
        <div class="modal fade" id="Help" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">
                            Thông tin liên hệ
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="card" style="width: auto;">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                <i>Qúy khách vui lòng gọi/ gửi thông tin đến bộ phận hỗ trợ để được tư vấn và giải đáp thắc mắc . Xin chân thành cảm ơn </i>
                            </div>
                          <p class="card-text ">Số điện thoại :<a href="tel:+84 326895190">090 909 9900</a></p>
                          <p class="card-text">Email: <a href="mailto:phamtrungky012345@mail.com">phamtrungky19032000@gmail.com</a></p>

                        </div>
                      </div>

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
                        <h5 class="modal-title text-center">{{trans('layout.Log in')}}</h5>
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

                        <form action="{{URL::to(  'login')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-form-label">{{trans('layout.Email')}}</label>
                                <input type="email" class="form-control" placeholder="email" name="user_email" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{trans('layout.Password')}}</label>
                                <input type="password" class="form-control" placeholder="pasword " name="user_password" required="">
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control" value="{{trans('layout.Log in')}}">
                            </div>
                            {{-- CUSTOMIZE LOGIN --}}
                            <div class="customize-login">
                                <a href="{{URL::to('login/facebook')}}" class="fb btn">
                                  <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                </a>
                                <a href="#" class="twitter btn">
                                  <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                                </a>
                                <a href="#" class="google btn"><i class="fa fa-google fa-fw">
                                  </i> Login with Google+
                                </a>
                            </div>
                            {{-- END CUSTOMIZE LOGIN --}}
                            <div class="sub-w3l">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="saveInfor">
                                    <label class="custom-control-label" for="customControlAutosizing">{{trans('layout.Remember me?')}}</label>
                                </div>
                            </div>
                            <p class="text-center dont-do mt-3">{{trans("layout.Don't have an account?")}}
                                <a href="#" data-toggle="modal" data-target="#registerModal" aria-label="Close">
                                    {{trans('layout.Register Now')}}</a>
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
                        <h5 class="modal-title">{{trans('layout.Register')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{URL::to(  'register')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-form-label">{{trans('layout.Your Name')}}</label>
                                <input type="text" class="form-control" placeholder="your name" name="user_name" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{trans('layout.Email')}}</label>
                                <input type="email" class="form-control" placeholder="email " name="user_email" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{trans('layout.Password')}}</label>
                                <input type="password" class="form-control" placeholder="password " name="user_password" id="password1" required="" onkeyup='check();'>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{trans('layout.Confirm password')}}</label>
                                <input type="password" class="form-control" placeholder="confirm password " name="confirm_password" id="password2" required="" onkeyup='check();'>
                                <span id="message"></span>
                            </div>
                            <div class="right-w3l">
                            <input type="submit" class="form-control" value="{{trans('layout.Register')}}">
                            </div>
                            <div class="sub-w3l">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                    <label class="custom-control-label" for="customControlAutosizing2">{{trans('layout.I Accept to the Terms & Conditions')}}</label>
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
                            <a href="{{URL::to(  '')}}" class="logo">
                                <img src="{{asset('public/frontend/img/logo.png')}}" style="max-width: 200px; max-height: 70px;" alt="">
                                {{-- <img src="https://www.lenovo.com/medias/thinkpad-logo-white.png?context=bWFzdGVyfHJvb3R8MzA3MHxpbWFnZS9wbmd8aDFiL2g4NC85NjM4ODE5ODIzNjQ2LnBuZ3xmNTM0Y2U2NjgzYWI4YjU2ZGNkNzg1ODRmOWUwZDhhMzhmYzU2MWRlYjVjODAyZjljN2YzMDk0MWViNzQ1N2Mz" style="max-width: 200px; max-height: 70px;" alt=""> --}}
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="{{URL::to(  'search')}}" method="GET">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}";> --}}
                                <select class="input-select">
                                <option value="0">{{trans('layout.All Category')}}</option>

                                    <option value=""></option>

                                </select>
                                <input class="input" placeholder="{{trans('Search')}}" name="keywords" type="text">
                            <button type="submit" class="search-btn">{{trans('layout.Search')}}</button>
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
                                    <span>{{trans('layout.Your Wishlist')}}</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>{{trans('layout.Your Cart')}}</span>
                                        <div class="qty total-count"></div>
                                    </a>
                                    <div class="cart-dropdown " >
                                       <div class="cart-list show-cart">
                                                {{-- Here is place to show content of function javascript --}}
                                        </div>

                                        <span class="py-5 total-count"></span>
                                        <small>{{trans('layout.Item(s) selected')}}</small>
                                        <div class="cart-summary">
                                        <strong>{{trans('layout.TOTAL PRICE')}}</strong><strong>({{trans('layout.$')}})</strong>
                                            <i style='color: red;' class="total-cart" ></i>
                                        </div>

                                        <div class="cart-btns">
                                            <a href="#">{{trans('layout.View Cart')}}</a>
                                            <a href="#" class="clear-cart">{{trans('layout.Clear Cart')}}</a>
                                            <a type="button" href="{{URL::to('checkout')}}">{{trans('layout.Checkout')}} <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>{{trans('layout.Menu')}}</span>
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
                <li class="active" id="home"><a href="{{URL::to(  'home')}}">{{trans('layout.Home')}}</a></li>
                    {{-- @foreach($all_menu as $key => $menu) --}}
                    {{-- <li><a href="{{URL::to(  'hot+deals')}}">{{trans('layout.Hot Deals')}}</a></li> --}}
                    <li><a href="{{URL::to(  'store')}}">{{trans('layout.Store')}}</a></li>
                    <li><a href="{{URL::to(  'history')}}">{{trans('layout.History')}}</a></li>
                    <li><a href="{{URL::to(  'slide')}}">{{trans('layout.presentation')}}</a></li>
                    {{-- @endforeach --}}
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
    <div class="content-middle">
        <div class="container">
            <div class="content-middle-bottom">
                <div class="left_content">
                    <div class="tintucdetail-title">
                        <h1 style="padding-top: 3rem;"> Chính sách đổi trả sản phẩm tại Thinkpad</h1>
                    </div>
                    <div class="content-baiviet ck-content">
                        <p><strong>Thinkpad đã có chính sách đổi trả sản phẩm đối với tất cả các sản phẩm được mua tại cửa hàng.</strong></p>
                        <p>
     Có rất nhiều lý do dẫn đến việc Quý Khách Hàng muốn đổi trả sản phẩm
    sau khi mua . Vì vậy, Thinkpad đã có Chính Sách Đổi Trả Sản Phẩm rõ
    ràng, rất mong quý khách đọc kỹ khi mua bất kỳ sản phẩm nào tại cửa hàng
     của chúng tôi. Những sản phẩm đổi trả bắt buộc phải đủ <a href="https://www.Thinkpad.vn/chinh-sach-chung/chinh-sach-bao-hanh-tai-Thinkpad-nd497703.html"><strong>Điều Kiện Bảo Hành tại Thinkpad</strong></a>.</p>
    <h1>
     I. Trường hợp các sản phẩm được cung cấp bởi Thinkpad không có lỗi, hoặc lỗi không phải do NSX</h1>
    <h2>
     <span style="font-size:14px;"><strong>1. Đối với các sản phẩm cũ, sản phẩm đã qua sử dụng</strong></span></h2>
    <p>
     <span style="font-size:14px;">Thinkpad cung cấp dịch vụ với 15 ngày đầu
     dùng thử sản phẩm. Trong thời gian này, nếu quý khách hàng cảm thấy
    chiếc Laptop của mình thực sự chưa đáp ứng được nhu cầu sử dụng, hoặc
    cảm thấy sản phẩm không phù hợp với bản thân, thì quý khách có thể đổi
    sang bất kỳ sản phẩm nào mà Thinkpad đang sẵn hàng hoàn toàn miễn phí.</span></p>
    <h2>
     <span style="font-size: 14px;">2. Đối với sản phẩm mới, sản phẩm chưa qua sử dụng</span></h2>
    <p>
     Thinkpad cung cấp dịch vụ với 15 ngày đầu dùng thử. Trong thời gian
    này, nếu quý khách muốn đổi trả sản phẩm, chúng tôi sẽ tính phí theo
    phần trăm giá trị sản phẩm. Mức phí đổi trả sản phẩm sẽ được tính theo
    bảng sau:</p>
    <p>
     &nbsp;</p>
    <table style="width:732px;" width="0" cellspacing="0" cellpadding="0" border="1" align="center">
     <tbody>
      <tr>
       <td style="width:94px;height:41px;">
        <p align="center">
         <strong>Sản phẩm</strong></p>
       </td>
       <td style="width:194px;height:41px;">
        <p align="center">
         <strong>Tình trạng sản phẩm tại thời điểm đổi, trả</strong></p>
       </td>
       <td style="width:142px;height:41px;">
        <p align="center">
         <strong>Thời gian đổi sản phẩm</strong></p>
       </td>
       <td style="width:142px;height:41px;">
        <p align="center">
         <strong>Phí đổi sản phẩm</strong></p>
       </td>
       <td style="width:160px;height:41px;">
        <p align="center">
         <strong>Phí trả sản phẩm</strong></p>
       </td>
      </tr>
      <tr>
       <td rowspan="3" style="width:94px;height:37px;">
        <p align="center">
         <strong>Sản phẩm mới</strong></p>
       </td>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm lỗi do nhà SX</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         15 Ngày</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         Miễn phí</p>
       </td>
       <td style="width:160px;height:37px;">
        <p align="center">
         15% giá trị sản phẩm</p>
       </td>
      </tr>
      <tr>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm không lỗi</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         15 Ngày</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         15% giá trị sản phẩm</p>
       </td>
       <td style="width:160px;height:37px;">
        <p align="center">
         25% giá trị sản phẩm</p>
       </td>
      </tr>
      <tr>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm lỗi do người sử dụng</p>
       </td>
       <td colspan="3" style="width:444px;height:37px;">
        <p align="center">
         Hỗ trợ sửa chữa, thay thế linh kiện có tính phí</p>
       </td>
      </tr>
      <tr>
       <td rowspan="3" style="width:94px;height:37px;">
        <p align="center">
         <strong>Sản phẩm đã qua sử dụng</strong></p>
       </td>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm lỗi do nhà SX</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         15 Ngày</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         Miễn phí</p>
       </td>
       <td style="width:160px;height:37px;">
        <p align="center">
         Miễn phí (*)</p>
       </td>
      </tr>
      <tr>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm không lỗi</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         15 Ngày</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         Miễn phí</p>
       </td>
       <td style="width:160px;height:37px;">
        <p align="center">
         15% giá trị sản phẩm</p>
       </td>
      </tr>
      <tr>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm lỗi do người sử dụng</p>
       </td>
       <td colspan="3" style="width:444px;height:37px;">
        <p align="center">
         Hỗ trợ sửa chữa, thay thế linh kiện có tính phí</p>
       </td>
      </tr>
      <tr>
       <td rowspan="3" style="width:94px;height:37px;">
        <p align="center">
         <strong>Linh kiện, phụ kiện</strong></p>
       </td>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm lỗi do nhà SX</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         15 Ngày</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         Miễn phí</p>
       </td>
       <td style="width:160px;height:37px;">
        <p align="center">
         Miễn phí (*)</p>
       </td>
      </tr>
      <tr>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm không lỗi</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         Không hỗ trợ</p>
       </td>
       <td style="width:142px;height:37px;">
        <p align="center">
         Không hỗ trợ</p>
       </td>
       <td style="width:160px;height:37px;">
        <p align="center">
         20% giá trị sản phẩm</p>
       </td>
      </tr>
      <tr>
       <td style="width:194px;height:37px;">
        <p align="center">
         Sản phẩm lỗi do người sử dụng</p>
       </td>
       <td colspan="3" style="width:444px;height:37px;">
        <p align="center">
         Hỗ trợ sửa chữa, thay thế linh kiện có tính phí</p>
       </td>
      </tr>
     </tbody>
    </table>
    <div style="clear:both;">
     <strong>***CHÚ Ý:</strong></div>
    <ul>
     <li style="clear: both;">
      <u>Giá sản phẩm được tính theo giá trị trên hóa đơn thanh toán khi mua hàng</u></li>
     <li style="clear: both;">
      Những sản phẩm đã qua 30 ngày sử dụng, Thinkpad sẽ không hỗ trợ nhập
    lại. Hoặc khách hàng có thể trao đổi trực tiếp với bộ phận bán hàng, tùy
     theo tình trạng hàng hóa, cũng như giá thành sản phẩm tại thời điểm đó,
     chúng tôi mới quyết định có hỗ trợ nhập lại hay không.</li>
     <li style="clear: both;">
      Phụ lục (*) Thinkpad chỉ miễn phí trả sản phẩm, và hoàn lại 100% số
    tiền ghi trên hóa đơn trong trường hợp cửa hàng không có sản phẩm để
    đổi.</li>
    </ul>
    <h1 style="clear: both;">
     II. Trong trường hợp sản phẩm do Thinkpad cung cấp có lỗi do nhà sản xuất</h1>
    <p>
     <strong>1. Đối với các sản phẩm cũ, sản phẩm đã qua sử dụng</strong></p>
    <p>
     Trong 15 ngày đầu tiên sau khi mua máy, nếu sản phẩm do Thinkpad bán ra
     có lỗi về linh kiện phần cứng, Quý Khách Hàng sẽ được thay thế linh
    kiện bị lỗi hoặc đổi ngay một máy tương đương, trong trường hợp Thinkpad
     hết hàng, Quý Khách Hàng sẽ được hoàn tiền 100% giá trị sản phẩm được
    in trên hóa đơn. Trường hợp máy xảy ra lỗi, nếu quý khách yêu cầu hoàn
    lại tiền, chúng tôi sẽ tính phí theo số phần trăm giá trị sản phẩm được
    ghi trên bảng phía trên.</p>
    <h2>
     <span style="font-size: 14px;">2. Đối với sản phẩm mới, sản phẩm chưa qua sử dụng</span></h2>
    <p>
     <span style="font-size:14px;">Trong 15 ngày đầu tiên sau khi mua máy,
    nếu sản phẩm do Thinkpad bán ra có lỗi do nhà sản xuất, Quý khách hàng
    sẽ được đổi ngày một máy khác tương đương, </span>trong trường hợp
    Thinkpad hết hàng, Quý Khách Hàng sẽ được hoàn tiền 100% giá trị sản
    phẩm được in trên hóa đơn. Trường hợp máy xảy ra lỗi, nếu quý khách yêu
    cầu hoàn lại tiền, chúng tôi sẽ tính phí theo số phần trăm giá trị sản
    phẩm được ghi trên bảng phía trên.</p>
    <h1>
     III. Trường hợp xảy ra lỗi đối với các linh kiện, phụ kiện do Thinkpad cung cấp</h1>
    <p>
     Đối với các linh kiện, phụ kiện được cung cấp bởi Thinkpad xảy ra lỗi,
    cửa hàng sẽ 1 đổi 1 cho quý khách trong toàn bộ thời gian bảo hành (trừ
    trường hợp đối với Mainboard). Trường hợp hết hàng, Thinkpad sẽ hoàn lại
     100% giá trị sản phẩm cho quý khách. Nếu khách hàng không còn nhu cầu
    muốn trả lại, Thinkpad sẽ tính phí theo bảng phía trên.</p>
                    </div>
                </div>
                <div class="right_content sidebar mt-xs-20">
                    <div class="block block-newfeature">



        </div>
    </div>            </div>
            </div>
        </div>
    </div>
    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>{{trans('layout.Sign Up for the')}} <strong>{{trans('layout.NEWSLETTER')}}</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i>{{trans('layout.Subscribe')}} </button>
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
                            <h3 class="footer-title">{{trans('layout.About Us')}}</h3>
                            <img src="https://www.lenovo.com/medias/thinkpad-logo-white.png?context=bWFzdGVyfHJvb3R8MzA3MHxpbWFnZS9wbmd8aDFiL2g4NC85NjM4ODE5ODIzNjQ2LnBuZ3xmNTM0Y2U2NjgzYWI4YjU2ZGNkNzg1ODRmOWUwZDhhMzhmYzU2MWRlYjVjODAyZjljN2YzMDk0MWViNzQ1N2Mz" style="max-width: 200px; max-height: 70px;" alt="">
                            <ul class="footer-links">
                                <li><a href="#" data-toggle="modal" data-target="#mapModal"><i class="fa fa-map-marker"></i>{{trans('layout.09 - Ngu Hanh Son - Danang - Vietnam')}}</a></li>
                                <li><a href="tel: 0326895190"><i class="fa fa-phone"></i>+84 090 909 9900</a></li>
                                <li><a href="mailto:phamtrungky19032000@gmail.com"><i class="fa fa-envelope-o"></i>thinkpad@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{trans('layout.Categories')}}</h3>
                            <ul class="footer-links">
                                <li><a href="#">{{trans('layout.Hot Deals')}}</a></li>
                                <li><a href="#">{{trans('layout.Laptops')}}</a></li>
                                <li><a href="#">{{trans('layout.Accessories')}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{trans('layout.Information')}}</h3>
                            <ul class="footer-links">
                                <li><a href="http://trungky.tk">{{trans('layout.About Us')}}</a></li>
                                <li><a href="#">{{trans('layout.Contact Us')}}</a></li>
                                <li><a href="#">{{trans('layout.Privacy Policy')}}</a></li>
                                <li><a href="#">{{trans('layout.Orders and Returns')}}</a></li>
                                <li><a href="#">{{trans('layout.Terms & Conditions')}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{trans('layout.Service')}}</h3>
                            <ul class="footer-links">
                                <li><a href="" data-toggle="modal" data-target="#myAccountModal">{{trans('layout.My Account')}}</a></li>
                                <li><a href="#">{{trans('layout.View Cart')}}</a></li>
                                <li><a href="#">{{trans('layout.Wishlist')}}</a></li>
                                <li><a href="#">{{trans('layout.Track My Order')}}</a></li>
                                <li><a href="" data-toggle="modal" data-target="#Help" >{{trans('layout.Help')}}</a></li>
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
                            {{trans('layout.Copyright')}} &copy;<script>
                                document.write(new Date().getFullYear());
                            </script>{{trans('layout.All rights reserved | This template is made with')}} <i class="fa fa-heart-o" aria-hidden="true"></i>{{trans('layout.by')}} <a href="https://www.instagram.com/trungky1402/?hl=vi" target="_blank" style="color: #D10024">{{trans('layout.Trung Ky')}}</a>
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
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/nouislider.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/home.js')}}"></script>
    <script src="{{asset('public/frontend/js/cart.js')}}"></script>
    <script src="{{asset('public/frontend/js/countdown.js')}}"></script>
    <script src="{{asset('public/frontend/js/backtop.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom-file-input.js')}}"></script>
</body>

</html>