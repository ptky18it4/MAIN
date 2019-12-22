@extends('layout')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('public/frontend/img/shop01.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                        <h3>{{trans('home.Laptop')}}<br>{{trans('home.Collection')}}</h3>
                            <a href="{{URL::to( 'store')}}" class="cta-btn">{{trans('home.Shop now')}} <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('public/frontend/img/shop03.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{trans('home.Accessories')}}<br>{{trans('home.Collection')}}</h3>
                            <a href="{{URL::to('store')}}" class="cta-btn">{{trans('home.Shop now')}} <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
                
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('public/frontend/img/shop02.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{trans('home.Cameras')}}<br>{{trans('home.Collection')}}</h3>
                            <a href="{{URL::to('store')}}" class="cta-btn">{{trans('home.Shop now')}} <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                    <h3 class="title">{{trans('home.New Products')}}</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">{{trans('home.Laptop')}}</a></li>
                                <li><a data-toggle="tab" href="#tab1">{{trans('home.Smartphones')}}</a></li>
                                <li><a data-toggle="tab" href="#tab1">{{trans('home.Cameras')}}</a></li>
                                <li><a data-toggle="tab" href="#tab1">{{trans('home.Accessories')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick --> 
            <form action="{{URL::to('save-cart')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                    <div class="row">
                        
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach($all_product as $key => $pro)
                                    <div class="product">
                                    <input class="form-control" type="hidden" name="product_id" value="{{$pro->id}}">
                                        <a href="{{URL::to( 'product-'.$pro->id)}}">
                                                <div class="product-img">
                                                    <img name='image' src="{{asset('public/uploads/product/more_image/'.$pro->image)}}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale" name='sale'>-{{$pro->vat}}%</span>
                                                        <span class="new">{{trans('home.NEW')}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                <p class="product-category" name='category'>{{$pro->category_name}}</p>
                                                <h3 class="product-name" name="$pro->id" ><a href="{{URL::to( 'product-'.$pro->id)}}">{{$pro->name}}</a></h3>
                                                <h4 class="product-price">${{number_format($pro->price - ($pro->price*($pro->vat/100)),2, ',', '.')}} <del class="product-old-price">${{number_format($pro->price)}}</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">{{trans('home.add to wishlist')}}</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">{{trans('home.add to compare')}}</span></button>
                                                    <button class="quick-view" name="$pro->id"><a href="{{URL::to( 'product-'.$pro->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">{{trans('home.quick view')}}</span></a></button>
                                                </div>
                                            </div>
                                        <div   data-id="{{$pro->id}}" data-name="{{$pro->name}}" data-image="{{asset('public/uploads/product/more_image/'.$pro->image)}}" data-price="{{$pro->price}}" class="add-to-cart">
                                                    <button type="submit" class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>{{trans('home.add to cart')}}</button>
                                                </div>
                                            </div>
                                    <!-- /product -->
                                    @endforeach
                                    
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
        </form>  
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section" >
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row" >
                <div class="col-md-12">
                    <div class="hot-deal" >
                        <ul class="hot-deal-countdown"id="timeout" >
                            {{-- Here is the place JavaScript at content . File javascript is timeout.js --}}
                        </ul>
                        <h2 class="text-uppercase">{{trans('home.hot deal this year')}}</h2>
                        <p>{{trans('home.New Collection Up to 50% OFF')}}</p>
                        <h5></h5>
                        <a class="primary-btn cta-btn" href="{{URL::to( 'store')}}">{{trans('home.Shop now')}}</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">{{trans('home.Top selling')}}</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">{{trans('home.Laptop')}}</a></li>
                                <li><a data-toggle="tab" href="#tab2">{{trans('home.Smartphones')}}</a></li>
                                <li><a data-toggle="tab" href="#tab2">{{trans('home.Cameras')}}</a></li>
                                <li><a data-toggle="tab" href="#tab2">{{trans('home.Accessories')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach($top_selling as $key => $selling)
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('public/uploads/product/'.$selling->image)}}" alt="">
                                                <div class="product-label">
                                                    <span class="sale">{{$selling->promotion_price}}%</span>
                                                    <span class="new">{{trans('home.NEW')}}</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$selling->category_name}}</p>
                                                <h3 class="product-name"><a href="#">{{$selling->name}}</a></h3>> 
                                                <h4 class="product-price">${{money_format($selling->price,2, '.', ',')}} <del class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">{{trans('home.add to wishlist')}}</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">{{trans('home.add to compare')}}</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">{{trans('home.quick view')}}</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn "><i class="fa fa-shopping-cart"></i>{{trans('home.add to cart')}}</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">{{trans('home.Top selling')}}</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product07.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product08.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product09.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product01.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product02.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product03.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">{{trans('home.Top selling')}}</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="public/frontend//img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product05.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product06.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product07.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product08.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product09.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">{{trans('home.Top selling')}}</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product01.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product02.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product03.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product04.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product05.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('public/frontend/img/product06.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection