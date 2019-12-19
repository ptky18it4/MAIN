<!-- File home.blade.php sẽ extends file layout.blade.php  -->
@extends('layout')
<!-- Phần section này sẽ được gọi ở phía layout.blade.php  -->
@section('content')

	<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">History</h3>
						<ul class="breadcrumb-tree">
							<li><a href="www.thinkpad.com.vn">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
	</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php
						$message = Session::get('message');
						/**
						 * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
						 * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
						 */
						if ($message) {
							// echo $message;
							echo '<div class="alert alert-success" role="alert">'
									.$message.'<a href="http://www.thinkpad.com.vn/" style="color: #D10024"><i>Come back home</i></a>
								</div>';
							Session::put('message',null);
						}
						?>
					<table class="table table-striped table-dark">
						<thead>
						  <tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Count</th>
							<th scope="col">Price</th>
							<th scope="col">Ordertime</th>
						  </tr>
						</thead>
						@foreach($order_product as $key => $pro)
						<tbody>
						  <tr>
							<th scope="row"></th>
							<td>{{$pro->name}}</td>
							<td>{{$pro->count}}</td>
							<td>{{$pro->price}}</td>
							<td>{{$pro->created_at}}</td>
						  </tr>
						
						</tbody>
						@endforeach
					  </table>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        @endsection