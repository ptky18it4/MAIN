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
						<h3 class="breadcrumb-header">{{trans('history.history')}}</h3>
						<ul class="breadcrumb-tree">
							<li><a href="www.thinkpad.com.vn">{{trans('history.home')}}</a></li>
							<li class="active">{{trans('history.checkout')}}</li>
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
					<style>
					.items-alert{
						background-color: #ffffff;
						padding: 10px;
						border-radius: 99px;
						position: relative;
						}
					.items-alert q {
						font-weight: 600 !important;
					}
					.items-alert b {
						left: 72%;
						font-weight: 600 !important;
					}	
					</style>
					
					<?php
						$message = Session::get('message');
						/**
						 * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
						 * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
						 */
						if ($message) {
							// echo $message;
							echo '<div class="alert alert-success items-alert" role="alert"><q> '
									.$message.'</q><a href="http://www.thinkpad.com.vn/" style="color: #D10024"><b class="fa fa-arrow-left items-alert">&emsp;Quay lại trang chủ</b></a>
								</div>';
							Session::put('message',null);
						}
						?>
					<table class="table table-striped table-dark">
						<thead>
						  <tr>
							<th scope="col">STT</th>
							<th scope="col">{{trans('history.name')}}</th>
							<th scope="col">{{trans('history.count')}}</th>
							<th scope="col">{{trans('history.price')}}</th>
							<th scope="col">{{trans('history.Order time')}}</th>
						  </tr>
						</thead>
						@foreach($order_product as $key => $item)
						<tbody>
							<tr>
							<th scope="row"></th>
							<td>{{$item->name}}</td>
							<td>{{$item->count}}</td>
							<td>{{$item->price}}</td>
							<td>{{$item->created_at}}</td>
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