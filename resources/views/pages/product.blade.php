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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Headphones</a></li>
                    <li class="active">Product name goes here</li>
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
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    @foreach($more_image as $key => $img)
                    <div class="product-preview">
                        <img src="{{asset('/public/uploads/product/more_image/'.$img->image)}}" alt="{{$img->image}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    @foreach($more_image as $key => $img)
                    <div class="product-preview">
                        <img src="{{asset('/public/uploads/product/more_image/'.$img->image)}}" alt="{{$img->image}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            @foreach($all_product as $key => $pro)
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$pro->name}}</h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price">${{number_format($pro->price - ($pro->price*($pro->vat/100)),2, ',', '.')}} <del class="product-old-price">${{number_format($pro->price,2, ',', '.')}}</del></h3>
                        <span class="product-available">
                            @if($pro->status == 1)
                            IN STOCK
                            @else
                            NO IN STOCK
                            @endif
                        </span>
                    </div>
                    <?php
                        function mysubstr($str, $limit = 200)
                        {
                            if (strlen($str) <= $limit) return $str;
                            return mb_substr($str, 0, $limit - 3, 'UTF-8') . '...';
                        }
                    ?>
                    <p>{{mysubstr($pro->description)}}</p>
                    <button style=" position: relative; left: 25%;" type="button" data-toggle="modal" data-target="#configModal" class="btn">Configuration information</button>
                    <!-- Configuration -->
                    <div class="modal fade" id="configModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center">Configuration information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($infor_config_product as $key => $infor_config)
                                    <ul class="parameter list-unstyled">
                                        <div class="lable-ts">Bộ xử lý</div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="lable-ts">Công nghệ CPU</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_technology}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">Loại CPU</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_types}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">Tốc độ CPU</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_speed}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">Bộ nhớ đệm CPU</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_caching}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">Tốc độ tối đa Turbo</span>
                                                <div class="giatri-ts">{{$infor_config->Maximum_speed_Turbo}}</div>
                                            </li>
                                        </ul>
                                        </li>
                                            <div class="lable-ts">RAM, Ổ cứng</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Bộ nhớ RAM</span>
                                                    <div class="giatri-ts">{{$infor_config->RAM_memory}} </div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Loại RAM</span>
                                                    <div class="giatri-ts">{{$infor_config->RAM_types}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Tốc độ Bus</span>
                                                    <div class="giatri-ts">{{$infor_config->Speed​_Bus}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Ổ cứng</span>
                                                    <div class="giatri-ts">{{$infor_config->Hard_Drive}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">Màn hình</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Kích thước màn hình</span>
                                                    <div class="giatri-ts">{{$infor_config->Size_Screen}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Độ phân giải (W x H)</span>
                                                    <div class="giatri-ts">{{$infor_config->Resolution_W_x_H}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Công nghệ MH</span>
                                                    <div class="giatri-ts">{{$infor_config->Technology_MH}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Màn hình cảm ứng</span>
                                                    <div class="giatri-ts">{{$infor_config->Touch_screen}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">Đồ họa và Âm thanh</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Card đồ họa</span>
                                                    <div class="giatri-ts">{{$infor_config->Graphics_card}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Bộ nhớ đồ họa</span>
                                                    <div class="giatri-ts">{{$infor_config->Card_memory}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Thiết kế card</span>
                                                    <div class="giatri-ts">{{$infor_config->Card_design}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Công nghệ Audio</span>
                                                    <div class="giatri-ts">{{$infor_config->Technology_Audio}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">PIN/Battery</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Thông tin Pin</span>
                                                    <div class="giatri-ts">{{$infor_config->Pin_battery}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Thời gian sử dụng thường</span>
                                                    <div class="giatri-ts">{{$infor_config->Time_used_often}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Bộ sạc</span>
                                                    <div class="giatri-ts">{{$infor_config->Charger}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">Hệ điều hành</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Hệ điều hành</span>
                                                    <div class="giatri-ts">{{$infor_config->Operating_system}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">Kích thước &amp; trọng lượng</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Kích thước</span>
                                                    <div class="giatri-ts">{{$infor_config->Size_Screen}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Trọng lượng (kg)</span>
                                                    <div class="giatri-ts">{{$infor_config->Weight}}(kg)</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">Khác</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">Cổng giao tiếp</span>
                                                    <div class="giatri-ts">{{$infor_config->Gateway}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">Độ phân giải WC</span>
                                                    <div class="giatri-ts">{{$infor_config->Resolution_webcam}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class=" product-options">
                        <label>
                            Size :
                            <select class="form-control input-select ">
                                <option value="0">14 inch</option>
                                <option value="0">15.6 inch</option>
                                <option value="0">17 inch</option>
                            </select>
                            
                        </label>
                        <label>
                            Color :
                            <select class="form-control input-select">
                                <option value="0">Black</option>
                                <option value="0">White</option>
                            </select>
                        </label> 
                        <label data-id="{{$pro->id}}" data-name="{{$pro->name}}" data-image="{{asset('public/uploads/product/more_image/'.$pro->image)}}" data-price="{{$pro->price}}" class="add-to-cart">
                        Qty:
                            <div class="input-number" style="width: 100px;">
                                <input type="number" value="1" min="1" max="100">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </label> 
                    </div>

                     <div data-id="{{$pro->id}}" data-name="{{$pro->name}}" data-image="{{asset('public/uploads/product/more_image/'.$pro->image)}}" data-price="{{$pro->price}}" class="add-to-cart">
                            <button type="#" style=" position: relative; left: 27%;" class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>add to cart</button>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">Headphones</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="https://www.facebook.com/groups/ibmthinkpad/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/hashtag/thinkpad?lang=vi"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="mailto:phamtrungly19032000@gmail.xom"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            @endforeach
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        @foreach($all_product as $key => $pro)
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$pro->category_description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                        
                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$pro->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>4.5</span>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 80%;"></div>
                                                </div>
                                                <span class="sum">3</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 60%;"></div>
                                                </div>
                                                <span class="sum">2</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form" action="{{URL::to('contact')}}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" type="text" >
                                            <input class="input" name="name" type="text" placeholder="Your Name" required>
                                            <input class="input" name="email" type="email" placeholder="Your Email" required>
                                            <input class="input" name="phone" type="text" placeholder="Your Phone" required>
                                            <textarea name="content" class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>                                              
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{asset('public/frontend/img/product01.png')}}" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{asset('public/frontend/img/product02.png')}}" alt="">
                        <div class="product-label">
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{asset('public/frontend/img/product03.png')}}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{asset('public/frontend/img/product04.png')}}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
@endsection