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

				@foreach($infor_user as $key => $infor)
				<form action="{{URL::to('order')}}" method="post">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<input class="input" type="text" name="first_name" placeholder="First Name" value="{{$infor->username}}">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="last_name" placeholder="Last Name">
								</div>
								<div class="form-group">
									<input class="input" type="email" name="email" placeholder="Email" value="{{$infor->email}}">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Address" value="{{$infor->address}}">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="city" placeholder="City">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="country" placeholder="Country">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="zip_code" placeholder="ZIP Code">
								</div>
								<div class="form-group">
									<input class="input" type="tel" name="tel" placeholder="Telephone" value="{{$infor->phone}}">
								</div>
							
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Create Account?
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->
						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" name="check_box" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first_name_new" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last_name_new" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email_new" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address_new" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city_new" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country_new" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip_code_new" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel_new" placeholder="Telephone">
									</div>
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" style="resize: none;" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							{{-- <form action="" method="post"> --}}
									<div class="order-products show-cart ">
												{{-- Here is destination content of javascript  --}}
									</div>
							{{-- </form> --}}
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div style="font-style: Montserrat, sans-serif; font-size: 24px; color: #D50024;"><strong>$</strong><strong class="order-total total-cart"></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque Payment
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<button style="position: relative; top: 10px; width: 80%; margin: 0 auto;" type="submit" class="primary-btn order-submit">Place order</button>
					</div>
					<!-- /Order Details -->
				</div>
				
				</form>
				@endforeach
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<script>
			document.ready(function() {
				$('p').click(function(){
					var arr=[];
					arr=$('.huy1');
					arr.each(function(){
						var e=$(this),
						href = e.prop('href');
						name = e.prop('innerHTML');
						$.get("test.php",{'name':name,'href':href},function(data){
							alert(data);
						});
					})
				})
			})
		</script>
		<h1>HOPE</h1>
		<p class="huy1" hr></p>
        @endsection