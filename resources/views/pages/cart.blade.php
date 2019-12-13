<!-- File home.blade.php sẽ extends file layout.blade.php  -->
@extends('layout')
<!-- Phần section này sẽ được gọi ở phía layout.blade.php  -->
@section('content')
<form action="" method="POST">
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

					<div class="col-md-7">
						<!-- Billing Details -->
						{{-- <div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							@foreach($infor_user as $key => $infor)
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
							@endforeach
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
						</div> --}}
						<!-- /Billing Details -->
						@foreach($all_product as $key => $pro)
                        <div class='product-widget form'> 
                                <div class='product-img'> 
								<img src="{{asset('public/uploads/product/more_image/'.$pro->image)}}" alt=''>
                                </div>
                                <div class='product-body'>
								<h3 class='product-name'>{{$pro->name}}<a href='#'></a></h3>
								<h4 class='product-price'><span class='qty'>qty</span>${{$pro->price}}</h4>
                                <div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=''>-</button>
                                <button class='plus-item btn btn-primary input-group-addon' data-name=''>+</button></button></div></<div>
                                </div> 
                                <button class='delete' data-name=''><i class='fa fa-close' ></i></button>
                                </div>  
                                <div class='cart-summary'> 
                                </div> 
                                <div class='cart-btn'> 
						</div>
						@endforeach

					
					</div>

					<!-- Order Details -->
					{{-- <form action="{{URL::to('checkout/ajax')}}" method="post"> --}}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Your Order</h3>
							</div>
								<div class="order-summary">
									<div class="order-col">
										<div><strong>PRODUCT</strong></div>
										<div><strong>TOTAL</strong></div>
									</div>
									<div class="order-products show-cart ">
											{{-- Here is place to show content of file javascript --}}
									</div>
									<div class="order-col">
										<div>Shiping</div>
										<div><strong>FREE</strong></div>
									</div>
									<div class="order-col">
										<div><strong>TOTAL</strong></div>
										<div><strong style="color:#D10024; font-size: 24px !important;">$&nbsp;</strong><strong class="order-total total-cart"></strong></div>
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
								{{-- <a href="#" type="submit" class="primary-btn order-submit">Place order</a> --}}
								<button type="button" id="btnOrder" class="primary-btn order-submit">Place order</button>
						</div>
					{{-- </form> --}}
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</form>
		<!-- /SECTION -->
        @endsection