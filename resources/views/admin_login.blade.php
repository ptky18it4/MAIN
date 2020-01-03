
<!DOCTYPE html>
<head>
<title>Admin - Thinkpad - Hệ thống bán lẻ laptop nhập khẩu giá rẻ toàn quốc</title>
 <!-- Logo title -->
 <link rel="shortcut icon" type="image/png" href="https://js1cdn.clubstatic.lenovo.com.cn/thinkpc/images/favicon.ico?version=8eebb34009b45c51691c30f8f94fd5f7"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
	<?php
		$message = Session::get('message');
		/**
		 * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
		 * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
		 */
		if($message){
			echo $message;
			// echo '<span class="text-alert">'.$message.'</span>';
			Session::put('message',null);
		}
	?>
		<form action="{{URL::to('admin/proc-admin-login')}}" method="post">
		 	{{ csrf_field() }}
			<input type="email" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
			<span><input name="saveInfor" type="checkbox" />Nhớ đăng nhập</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" style="font-weight: 600;" name="login">
		</form>
 <!-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> -->
</div></div>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
