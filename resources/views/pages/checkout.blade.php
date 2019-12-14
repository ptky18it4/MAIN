<!-- File home.blade.php sẽ extends file layout.blade.php  -->
@extends('layout')
<!-- Phần section này sẽ được gọi ở phía layout.blade.php  -->
@section('content')
{{-- <form action="{{URL::to('checkout')}}" method="POST"> --}}
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
						<div class="billing-details">
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
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
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
					<form action="{{URL::to('checkout')}}" id="form-content-cart" method="get">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="content" id="cart-content">
					{{-- </form> --}}
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Your Order</h3>
							</div>
							<div class="order-summary">
									<div class="order-col">
										<div><strong>PRODUCT</strong></div>
										<div><strong>TOTAL</strong></div>
									</div>
<<<<<<< HEAD
									<div class="order-products ">
												<div class='product-widget'>
												<div class="product-img">
													<img src='public/frontend/img/product02.png' alt=''>
												</div>
												<div class="product-body">
													<div class="show-name"></div>
													<div >Price : <strong class="show-price"></strong></div>
													<div >Quantity : <strong class="show-count"></strong></div>
												</div>	
												</div>
									</div>
									<div class="order-col">
										<div>Shiping</div>
										<div><strong>FREE</strong></div>
									</div>
									<div class="order-col ">
										<div ><strong>TOTAL</strong></div>
										<div><strong style="color:#D10024; font-size: 24px !important;">$&nbsp;</strong><strong class="order-total total-cart"></strong></div>
=======
									<div class="order-products show-cart">
											{{-- content code of javascript --}}
										</div>
										
										<div class="order-col">
											<div>Shiping</div>
											<div><strong>FREE</strong></div>
										</div>
										<div class="order-col ">
											<div ><strong>TOTAL</strong></div>
											<div><strong style="color:#D10024; font-size: 24px !important;">$&nbsp;</strong><strong class="order-total total-cart"></strong></div>
										</div>
>>>>>>> new-function
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
								<button type="button" class="primary-btn order-submit" onclick="submitFormCheckout();">Place order</button>

							</div>
							<!-- /Order Details -->
						</div>
					</form>

				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	{{-- </form> --}}
	<script>
		  // ************************************************
  // Shopping Cart API
  // ************************************************
  var cartArray = [];
  // -1
  function removeItemFromCartArray(name)
  {
	  console.log("remove item from cart array ");
	  for(var item in cartArray)
	  {
		  if (cartArray[item].name === name)
		  {
			cartArray[item].count = cartArray[item].count - 1;	  
		  }
	  }
  }
  // +1
  function addToCartArray(name)
  {
	  console.log("add to cart");
	  for(var item in cartArray)
	  {
		  if(cartArray[item].name === name)
		  {
			cartArray[item].count = cartArray[item].count + 1;
		  }
	  }
  }

  var shoppingCart = (function () {
      // =============================
      // Private methods and propeties
      // =============================
      cart = [];

      // Constructor
      function Item(name, price, count) {
          this.name = name;
          this.price = price;
          this.count = count;
      }

      // Save cart
      function saveCart() {
          sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
      }
      // Load cart  
      function loadCart() {
          cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
      }
        if (sessionStorage.getItem("shoppingCart") != null) {
            loadCart();
        }

      // =============================
      // Public methods and propeties
      // =============================
      var obj = {};

      // Add to cart
      obj.addItemToCart = function (name, price, count) {
          for (var item in cart) {
              if (cart[item].name === name) {
                  cart[item].count++;
				  saveCart();
                  return;
              }
		  }
          var item = new Item(name, price, count);
          cart.push(item);
          saveCart();
      }
      // Set count from item
      obj.setCountForItem = function (name, count) {
          for (var i in cart) {
              if (cart[i].name === name) {
                  cart[i].count = count;
                  break;
              }
          }
      };
      // Remove item from cart
      obj.removeItemFromCart = function (name) {
          for (var item in cart) {
              if (cart[item].name === name) {
                  cart[item].count--;
                  if (cart[item].count === 0) {
                      cart.splice(item, 1);
                  }
                  break;
              }
          }
          saveCart();
      }

      // Remove all items from cart
      obj.removeItemFromCartAll = function (name) {
          for (var item in cart) {
              if (cart[item].name === name) {
                  cart.splice(item, 1);
                  break;
              }
          }
          saveCart();
      }

      // Clear cart
      obj.clearCart = function () {
          cart = [];
          saveCart();
      }

      // Count cart 
      obj.totalCount = function () {
          var totalCount = 0;
          for (var item in cart) {
              totalCount += cart[item].count;
          }
          return totalCount;
      }

      // Total cart
      obj.totalCart = function () {
          var totalCart = 0;
          for (var item in cart) {
              totalCart += cart[item].price * cart[item].count;
          }
          // return Number(totalCart.toFixed(2));
          var set = Number(totalCart.toFixed(2));
          return isNaN(set) ? "" : set.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      // List cart
      obj.listCart = function () {
          var cartCopy = [];
          for (i in cart) {
              item = cart[i];
              itemCopy = {};
              for (p in item) {
                  itemCopy[p] = item[p];
              }
              itemCopy.total = Number(item.price * item.count).toFixed(2);
              cartCopy.push(itemCopy)
          }
          return cartCopy;
      }

      // cart : Array
      // Item : Object/Class
      // addItemToCart : Function
      // removeItemFromCart : Function
      // removeItemFromCartAll : Function
      // clearCart : Function
      // countCart : Function
      // totalCart : Function
      // listCart : Function
      // saveCart : Function
      // loadCart : Function
      return obj;
  })();


  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item
  $('.add-to-cart').click(function (event) {
      event.preventDefault();
      var name = $(this).data('name');
      var price = Number($(this).data('price'));
      shoppingCart.addItemToCart(name, price, 1);
      displayCart();
  });

  // Clear items
  $('.clear-cart').click(function () {
      shoppingCart.clearCart();
      displayCart();
  });

function displayCart() {
   cartArray = shoppingCart.listCart();
    // cartArray.price = isNaN(cartArray.price)?"":cartArray.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    var output = "";
    for (var i in cartArray) {
        // format price
        cartArray[i].price = isNaN(cartArray[i].price) ? "" : cartArray[i].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        
        output +=
            "<div class='product-widget'>" +
            "<div class='product-img'>" +
            "<img src='public/frontend/img/product02.png' alt=''>" +
            "</div>" +
            "<div class='product-body'>" +
            "<h3 class='product-name' name='name'><a href='#'>" + cartArray[i].name + "</a></h3>" +
            "<h4 class='product-price'><span class='qty'>" + cartArray[i].count + " x " + "</span>$" + cartArray[i].price + "</h4>" +
            "<div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name='" + cartArray[i].name + "'>-</button>" +
            "<button class='plus-item btn btn-primary input-group-addon' data-name='" + cartArray[i].name + "'>+</button></div></<div>" +
            "</div>" +
            "<button class='delete' data-name='" + cartArray[i].name + "'><i class='fa fa-close' ></i></button>" +
            "</div> " +
            "<div class='cart-summary'>" +
            "</div>" +
            "<div class='cart-btn'>" +
            "</div>";
        }
        
        $('.show-cart').html(output);
        $('.total-cart').html(shoppingCart.totalCart());
        $('.total-count').html(shoppingCart.totalCount());
        }

  
  // Delete item button
  
  $('.show-cart').on("click", ".delete", function (event) {
      var name = $(this).data('name')
      shoppingCart.removeItemFromCartAll(name);
      displayCart();
    })
    
    
    // -1
    $('.show-cart').on("click", ".minus-item", function (event) {
		var name = $(this).data('name')
		removeItemFromCartArray(name);
        shoppingCart.removeItemFromCart(name);
        displayCart();
    })
    // +1
    $('.show-cart').on("click", ".plus-item", function (event) {
		var name = $(this).data('name')
		addToCartArray(name);
		shoppingCart.addItemToCart(name);
		
        displayCart();
    })
    
    // Item count input   // Item count input
    $('.show-cart').on("change", ".item-count", function (event) {
        var name = $(this).data('name');
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
	});
	function submitFormCheckout()
		{
			console.log(cartArray);
			$('#cart-content').val(cartArray[0].name.toString());
			$("#form-content-cart").submit();
		}
    displayCart();
	</script>
		<!-- /SECTION -->
@endsection