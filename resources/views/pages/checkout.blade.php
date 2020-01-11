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
						<h3 class="breadcrumb-header">{{__('checkout.Checkout')}}</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">{{__('checkout.Home')}}</a></li>
							<li class="active">{{__('checkout.Checkout')}}</li>
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
								<h3 class="title">{{__('checkout.Billing address')}}</h3>
							</div>
							@foreach($infor_user as $key => $infor)
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
								<input class="input"  type="hidden" name="user_id" value="{{$infor->id}}" required>
								<input class="input"  type="text" name="first_name" placeholder="First Name" value="{{$infor->username}}" required>
								</div>
								<div class="form-group">
									<input class="input"  type="text" name="last_name" placeholder="Last Name" required>
								</div>
								<div class="form-group">
								<input class="input"  type="email" name="email" placeholder="Email" value="{{$infor->email}}" required>
								</div>
								<div class="form-group">
								<input class="input"  type="text" name="address" placeholder="Address" value="{{$infor->address}}" required>
								</div>
								<div class="form-group">
									<input class="input"  type="text" name="city" placeholder="City" required>
								</div>
								<div class="form-group">
									<input class="input"  type="text" name="country" placeholder="Country" required>
								</div>
								<div class="form-group">
									<input class="input"  type="text" name="zip_code" placeholder="ZIP Code" required>
								</div>
								<div class="form-group">
								<input class="input"  type="tel" name="tel" placeholder="Telephone" value="{{$infor->phone}}" required>
								</div>
							@endforeach
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										{{__('checkout.Create Account?')}}
									</label>
									<div class="caption">
										<p>Tính năng đang được nâng cấp. Vui lòng quay lại sau.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">{{__('checkout.Shiping address')}}</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" name="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									{{__('checkout.Ship to a diffrent address?')}}
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
										<input class="input" type="text" name="address_diff" placeholder="Address">
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
							<textarea class="input" name="note" style="resize: none;" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					{{-- <form action="" id="form-content-cart" name="form-content-cart" method="post"> --}}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="cart-content" id="cart-content">

						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">{{__('checkout.Your Order')}}</h3>
							</div>
							<div class="order-summary">
									<div class="order-col">
										<div><strong>{{__('checkout.PRODUCT')}}</strong></div>
										<div><strong>{{__('checkout.TOTAL')}}</strong></div>
									</div>
									<div class="order-products show-cart">
											{{-- content code of javascript --}}
										</div>

										<div class="order-col">
											<div>{{__('checkout.Shipping')}}</div>
											<div><strong>{{__('checkout.FREE')}}</strong></div>
										</div>
										<div class="order-col ">
											<div ><strong>{{__('checkout.TOTAL')}}</strong></div>
											<div><strong style="color:#D10024; font-size: 24px !important;"></strong><strong class="order-total total-cart"></strong><strong style="color: #D10024; font-size: 24px;">&nbsp;VND</strong></div>
										</div>
									</div>
								<div class="payment-method">
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-1" required>
										<label for="payment-1">
											<span></span>
											{{__('checkout.Direct Bank Transfer')}}
										</label>
										<div class="caption">
											<p>Tính nang đang được nâng cấp.</p>
										</div>
									</div>
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-2" required>
										<label for="payment-2">
											<span></span>
											{{__('checkout.Cheque Payment')}}
										</label>
										<div class="caption">
                                            <p>Tính nang đang được nâng cấp.</p>

										</div>
									</div>
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-3" required>
										<label for="payment-3">
											<span></span>
											{{__('checkout.Paypal System')}}
										</label>
										<div class="caption">
                                            <p>Tính nang đang được nâng cấp.</p>

										</div>
									</div>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="terms" required>
									<label for="terms">
										<span></span>
									{{__("checkout.I've read and accept the")}} <a href="#">{{__('checkout.terms & conditions')}}</a>
									</label>
								</div>
								<button type="submit" class="primary-btn order-submit" onclick="submitFormCheckout();" >{{__('checkout.Place order')}}</button>

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
