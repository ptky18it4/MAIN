<!-- File home.blade.php sẽ extends file layout.blade.php  -->
@extends('layout')
<!-- Phần section này sẽ được gọi ở phía layout.blade.php  -->
@section('content')
<form action="{{URL::to('checkout')}}" id="form-content-cart" name="form-content-cart" method="post">
	<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">{{trans('checkout.Checkout')}}</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">{{trans('checkout.Home')}}</a></li>
							<li class="active">{{trans('checkout.Checkout')}}</li>
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

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">{{trans('checkout.Billing address')}}</h3>
							</div>
							@foreach($infor_user as $key => $infor)
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
								<input class="input" required type="hidden" name="user_id" value="{{$infor->id}}">
								<input class="input" required type="text" name="first_name" placeholder="First Name" value="{{$infor->username}}">
								</div>
								<div class="form-group">
									<input class="input" required type="text" name="last_name" placeholder="Last Name">
								</div>
								<div class="form-group">
								<input class="input" required type="email" name="email" placeholder="Email" value="{{$infor->email}}">
								</div>
								<div class="form-group">
								<input class="input" required type="text" name="address" placeholder="Address" value="{{$infor->address}}">
								</div>
								<div class="form-group">
									<input class="input" required type="text" name="city" placeholder="City">
								</div>
								<div class="form-group">
									<input class="input" required type="text" name="country" placeholder="Country">
								</div>
								<div class="form-group">
									<input class="input" required type="text" name="zip_code" placeholder="ZIP Code">
								</div>
								<div class="form-group">
								<input class="input" required type="tel" name="tel" placeholder="Telephone" value="{{$infor->phone}}">
								</div>
							@endforeach
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										{{trans('checkout.Create Account?')}}
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
								<h3 class="title">{{trans('checkout.Shiping address')}}</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									{{trans('checkout.Ship to a diffrent address?')}}
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first_name_diff" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last_name_diff" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email_diff" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address-_diff" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city_diff" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country_diff" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip_code_diff" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel_diff" placeholder="Telephone">
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
					{{-- <form action="" id="form-content-cart" name="form-content-cart" method="post"> --}}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="cart-content" id="cart-content">
					
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">{{trans('checkout.Your Order')}}</h3>
							</div>
							<div class="order-summary">
									<div class="order-col">
										<div><strong>{{trans('checkout.PRODUCT')}}</strong></div>
										<div><strong>{{trans('checkout.TOTAL')}}</strong></div>
									</div>
									<div class="order-products show-cart">
											{{-- content code of javascript --}}
										</div>
										
										<div class="order-col">
											<div>{{trans('checkout.Shipping')}}</div>
											<div><strong>{{trans('checkout.FREE')}}</strong></div>
										</div>
										<div class="order-col ">
											<div ><strong>{{trans('checkout.TOTAL')}}</strong></div>
											<div><strong style="color:#D10024; font-size: 24px !important;">$&nbsp;</strong><strong class="order-total total-cart"></strong></div>
										</div>
									</div>
								<div class="payment-method">
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-1">
										<label for="payment-1">
											<span></span>
											{{trans('checkout.Direct Bank Transfer')}}
										</label>
										<div class="caption">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-2">
										<label for="payment-2">
											<span></span>
											{{trans('checkout.Cheque Payment')}}
										</label>
										<div class="caption">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-3">
										<label for="payment-3">
											<span></span>
											{{trans('checkout.Paypal System')}}
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
									{{trans("checkout.I've read and accept the")}} <a href="#">{{trans('checkout.terms & conditions')}}</a>
									</label>
								</div>
								<button type="button" class="primary-btn order-submit" onclick="submitFormCheckout();" >{{trans('checkout.Place order')}}</button>

							</div>
							<!-- /Order Details -->
						</div>
					{{-- </form> --}}

				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</form>
		<!-- /SECTION -->
@endsection