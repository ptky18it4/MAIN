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
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
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
					<table class="table table-striped table-inverse table-responsive">
						<thead class="thead-inverse">
							<tr>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td scope="row"></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td scope="row"></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
					</table>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        @endsection