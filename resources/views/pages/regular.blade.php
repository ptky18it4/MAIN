@extends('layout')
@section('content')
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							{{-- <li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li> --}}
							<li>Results search of : <u style="color: red;">{{$keywords}}</u></li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

<<<<<<< HEAD

=======
>>>>>>> master
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							@foreach($related_product as $key => $item)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset('public/uploads/product/more_image/'.$item->image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{$item->category_name}}</p>
									<h3 class="product-name"><a href="{{asset("/product-$item->id")}}">{{$item->name}}</a></h3>
									<h4 class="product-price">${{number_format($item->price - ($item->price*($item->vat/100)),2, ',', '.')}} <del class="product-old-price">${{number_format($item->price)}}</del></h4>
								</div>
							</div>
							@endforeach
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class=" store-filter clearfix">
							<div class="store-sort">
								<label>
										Sort By:
										<form action="sort-by" method="get">
												<select class="input-select">
														<option value="asc">A-Z</option>
														<option value="desc">Z-A</option>
												</select>
										</form>
								</label>
								<label>
										Show:
										<form action="" method="get">
											<select class="input-select">
											<option value="0">20</option>
											<option value="1">50</option>
											</select>
										</form>
										
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							@foreach($result_search as $key => $item)
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
								<a href="{{URL::to('product-'.$item->id)}}">
									<div class="product-img">
									<img src="{{asset('public/uploads/product/more_image/'.$item->image)}}" alt="">
										<div class="product-label">
											<span class="sale">-{{$item->vat}}%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									</a>
									<div class="product-body">
										<p class="product-category">{{$item->category_name}}</p>
										<h3 class="product-name"><a href="{{asset("/product-$item->id")}}">{{$item->name}}</a></h3>
										<h4 class="product-price">${{number_format($item->price - ($item->price*($item->vat/100)),2, ',', '.')}} <del class="product-old-price">$990.00</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view"><a href="{{asset("/product-$item->id")}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
										</div>
									</div>
									<div class="add-to-cart" data-name="{{$item->name}}" data-price="{{number_format($item->price - ($item->price*($item->vat/100)),2, ',', '.')}}">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
							<!-- /product -->
							@endforeach
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection