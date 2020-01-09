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
                        <h3>{{__('home.Laptop')}}<br>{{__('home.Collection')}}</h3>
                            <a href="{{URL::to( 'store')}}" class="cta-btn">{{__('home.Shop now')}} <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('public/frontend/img/Layer 2.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{__('home.Accessories')}}<br>{{__('home.Collection')}}</h3>
                            <a href="{{URL::to('store')}}" class="cta-btn">{{__('home.Shop now')}} <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('public/frontend/img/sale.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{__('home.Cameras')}}<br>{{__('home.Collection')}}</h3>
                            <a href="{{URL::to('store')}}" class="cta-btn">{{__('home.Shop now')}} <i class="fa fa-arrow-circle-right"></i></a>
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
                    <h3 class="title">{{__('home.New Products')}}</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">{{__('home.Laptop')}}</a></li>
                                <li><a data-toggle="tab" href="#tab1">{{__('home.Accessories')}}</a></li>
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
                                            <a href="{{URL::to('product-'.$pro->id)}}">
                                                <div class="product-img">
                                                    <img name='image' src="{{asset('public/uploads/product/more_image/'.$pro->image)}}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale" name='sale'>-{{$pro->vat}}%</span>
                                                        <span class="new">{{__('home.NEW')}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                <p class="product-category" name='category'>{{$pro->category_name}}</p>
                                                <h3 class="product-name" name="$pro->id" ><a href="{{URL::to( 'product-'.$pro->id)}}">{{$pro->name}}</a></h3>
                                                <h4 class="product-price">{{number_format($pro->price - ($pro->price*($pro->vat/100)),3, ',', '.')}} VND <del class="product-old-price"><br>{{number_format($pro->price ,3, ',', '.')}} VND</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">{{__('home.add to wishlist')}}</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">{{__('home.add to compare')}}</span></button>
                                                    <button class="quick-view" name="$pro->id"><a href="{{URL::to( 'product-'.$pro->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">{{__('home.quick view')}}</span></a></button>
                                                </div>
                                            </div>
                                        <div   data-id="{{$pro->id}}" data-name="{{$pro->name}}" data-image="{{asset('public/uploads/product/more_image/'.$pro->image)}}" data-price="{{$pro->price}}" class="add-to-cart">
                                                    <button type="submit" class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>{{__('home.add to cart')}}</button>
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
                        <ul class="hot-deal-countdown" id="timeout" >
                            {{-- Here is the place JavaScript at content . File javascript is timeout.js --}}
                        </ul>
                        <h2 class="text-uppercase">{{__('home.hot deal this year')}}</h2>
                        <p>{{__('home.New Collection Up to 50% OFF')}}</p>
                        <h5></h5>
                        <a class="primary-btn cta-btn" href="{{URL::to( 'store')}}">{{__('home.Shop now')}}</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section" style="section: padding: 0px !important;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <div class="section-nav">
                        <ul class="section-tab-nav">
                            @foreach($tagParent as $key => $item)
                            <li class="tag-between"><a data-toggle="tab" href="#tab2">{{$item->parent_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section" style="background-color: #1E1F29;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                        <div id="myCanvasContainer">
                            <canvas width="390" height="390" style="border: 2px solid while; padding: 10px; border-radius: 9999px; background-color:  #FFFFFF;" id="myCanvas">
                                @foreach($top_selling as $key => $item)
                                <div id="tags">
                                    <ul style="color: #393B3B;">
                                        <li><a href="{{asset("/product-$item->id")}}" ><img width="60px;" height="60px;" src="{{asset('public/uploads/product/more_image/'.$item->image)}}"></a></li>
                                    </ul>
                                </div>
                                @endforeach
                            </canvas>
                        </div>
                </div>
                <div class="col-md-2 col-xs-2">

                </div>
                <div class="col-md-6 col-xs-4">
                    <div class="card-body">
                        <link
                          href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic'
                          rel='stylesheet' type='text/css'>

                        <!-- The Timeline -->

                        <ul class="timeline">
                          <!-- Item 1 -->
                          <li class="zoomInLeft">
                            <div class="direction-r">
                              <div class="flag-wrapper">
                                <span class="flag">DANH MỤC.</span>
                                <span class="time-wrapper"><span class="time">nổi bậc</span></span>
                              </div>
                              @foreach($tagCategory as $key => $item)
                                <div class="desc">{{$item->category_name}}</div>
                              @endforeach
                            </div>
                          </li>

                          <!-- Item 2 -->
                          <li class="zoomInRight">
                            <div class="direction-l">
                              <div class="flag-wrapper">
                                <span class="flag">GIÁ.</span>
                                <span class="time-wrapper"><span class="time">giá ưu đãi</span></span>
                              </div>
                              @foreach($tagPrice as $key => $item)
                              <div class="desc">{{$item->price}}</div>
                              @endforeach
                            </div>
                          </li>

                          <!-- Item 3 -->
                          <li class="zoomInLeft_0">
                            <div class="direction-r">
                              <div class="flag-wrapper">
                                <span class="flag">KHUYẾN MẠI</span>
                                <span class="time-wrapper"><span class="time">2020-....</span></span>
                              </div>
                              <div class="desc">Mã giảm giá sẽ xuất hiện sau :</div>
                            </div>
                            </div>
                          </li>

                        </ul>

                      </div>
                </div>
            </div>
        </div>
            <!-- /row -->
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
