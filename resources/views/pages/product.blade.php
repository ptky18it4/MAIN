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
                <li><a href="#">{{__('product.Home')}}</a></li>
                    <li><a href="#">{{__('product.All Categories')}}</a></li>
                    <li><a href="#">{{__('product.Accessories')}}</a></li>
                    <li><a href="#">{{__('product.Headphones')}}</a></li>
                    <li class="active">{{__('product.Product name goes here')}}</li>
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
                        <a class="review-link" href="#">{{__('product.10 Review(s) | Add your review')}}</a>
                    </div>
                    <div>
                        <h3 class="product-price">{{number_format($pro->price - ($pro->price*($pro->vat/100)),3, ',', '.')}} VND <del class="product-old-price">{{number_format($pro->price,3, ',', '.')}}<strong> VND</strong></del></h3>
                        <span class="product-available">
                            @if($pro->status == 1)
                            {{__('product.IN STOCK')}}
                            @else
                            {{__('product.NO IN STOCK')}}
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
                    <button style=" position: relative; left: 25%; background-color: whitesmoke;border-style: outset; border-width: 7px; border-color: #D10024; " type="button" data-toggle="modal" data-target="#configModal" class="btn">{{__('product.Configuration information')}}</button>
                    <!-- Configuration -->
                    <div class="modal fade" id="configModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" style="color: red;">{{__('product.Configuration information')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($infor_config_product as $key => $infor_config)
                                    <ul class="parameter list-unstyled">
                                        <div class="lable-ts">{{__('product.Processor')}}</div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="lable-ts">{{__('product.CPU technology')}}</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_technology}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">{{__('product.CPUs')}}</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_types}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">{{__('product.CPU speed')}}</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_speed}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">{{__('product.CPU caching')}}</span>
                                                <div class="giatri-ts">{{$infor_config->CPU_caching}}</div>
                                            </li>
                                            <li>
                                                <span class="lable-ts">{{__('product.Maximum speed Turbo')}}</span>
                                                <div class="giatri-ts">{{$infor_config->Maximum_speed_Turbo}}</div>
                                            </li>
                                        </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.RAM, Hard Drive')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.RAM ( memory )')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->RAM_memory}} </div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.RAMs')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->RAM_types}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Speed ​​Bus')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Speed​_Bus}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Hard drive')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Hard_Drive}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.Screen')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.Screen Size')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Size_Screen}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Resolution (W x H)')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Resolution_W_x_H}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Technology MH')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Technology_MH}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Touch screen')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Touch_screen}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.Graphics and Sound')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.Graphics card')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Graphics_card}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Graphics memory')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Card_memory}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Card design')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Card_design}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Technology Audio')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Technology_Audio}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.PIN / Battery')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.Information Pin')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Pin_battery}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Time used often')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Time_used_often}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Charger')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Charger}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.Operating system')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.Operating system')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Operating_system}}</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.Size')}} &amp; {{__('product.Weight')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.Size Screen')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Size_Screen}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Weight')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Weight}}(kg)</div>
                                                </li>
                                            </ul>
                                        </li>
                                            <div class="lable-ts">{{__('product.Other')}}</div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="lable-ts">{{__('product.Gateway')}}</span>
                                                    <div class="giatri-ts">{{$infor_config->Gateway}}</div>
                                                </li>
                                                <li>
                                                    <span class="lable-ts">{{__('product.Resolution WC')}}</span>
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
                    <div class=" product-options" style=" position: relative; left: 10%;">
                        <label>
                            {{__('product.Size')}} :
                            <select class="form-control input-select ">
                                <option value="14 inch">14 inch</option>
                                <option value="15.6 inch">15.6 inch</option>
                                <option value="17 inch">17 inch</option>
                            </select>

                        </label>
                        <label>
                            {{__('product.Color')}} :
                            <select class="form-control input-select">
                                <option value="black">{{__('product.Black')}}</option>
                                <option value="white">{{__('product.White')}}</option>
                            </select>
                        </label>
                        <label data-id="{{$pro->id}}" data-name="{{$pro->name}}" data-image="{{asset('public/uploads/product/more_image/'.$pro->image)}}" data-price="{{$pro->price}}">
                            {{__('product.Qty')}}:
                            <div class="input-number" style="width: 100px;">
                                <input type="number" value="1" min="1" max="100">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </label>
                    </div>

                     <div data-id="{{$pro->id}}" data-name="{{$pro->name}}" data-image="{{asset('public/uploads/product/more_image/'.$pro->image)}}" data-price="{{$pro->price}}" class="add-to-cart">
                            <button type="#" style=" position: relative; left: 21%;" class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>{{__('product.add to cart')}}</button>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i>{{__('product.add to wishlist')}} </a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i>{{__('product.add to compare')}} </a></li>
                    </ul>

                    <ul class="product-links">
                        <li>{{__('product.Category')}}:</li>
                        <li><a href="#">{{__('product.Headphones')}}</a></li>
                        <li><a href="#">{{__('product.Accessories')}}</a></li>
                    </ul>

                    <ul class="product-links">
                        {{-- <li>{{__('product.Share')}}:</li> --}}
                        {{-- <li><a href="https://www.facebook.com/groups/ibmthinkpad/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/hashtag/thinkpad?lang=vi"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
                        <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div>
                        <div class="zalo-follow-only-button" style="position: relative; top: 18px !important;" data-oaid="579745863508352884"></div>
                        {{-- <li><a href="mailto:phamtrungly19032000@gmail.xom"><i class="fa fa-envelope"></i></a></li> --}}
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
                        <li class="active"><a data-toggle="tab" href="#tab1">{{__('product.Description')}}</a></li>
                        <li><a data-toggle="tab" href="#tab2">{{__('product.Details')}}</a></li>
                        <li><a data-toggle="tab" href="#tab3">{{__('product.Reviews')}} (<?php echo $totalFeedback; ?>)</a></li>
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
                                    <style>
                                        .video {
                                            position: relative;
                                            top : 300px !important;
                                            max-width: 500px !important;
                                            max-height: 500px !important;
                                            left: 50% !important;
                                        }
                                    </style>
                                </div>
                                <div class="video">
                                       <video  playsinline="playsinline" class="video"   autoplay="autoplay" muted="muted" loop="loop">
                                        <source src="{{asset('public/frontend/video/'.$pro->video)}}" type="video/mp4">
                                        <!--Link video online :  https://f6-group-zf.zdn.vn/ebae2adc0406e858b117/9128246392226996966 -->
                                        </video>
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
                                            @foreach($feedback as $key => $item)
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">{{$item->name}}</h5>
                                                    <p class="date">{{$item->created_at}}</p>
                                                    <div class="review-rating">
                                                            <?php switch($item->rating):
                                                            case 1: ?>
                                                            <div>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php break; ?>
                                                            <?php case 2: ?>
                                                            <div>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php break; ?>
                                                            <?php case 3: ?>
                                                            <div>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php break; ?>
                                                            <?php case 4: ?>
                                                            <div>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php break; ?>
                                                            <?php case 5: ?>
                                                            <div>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <?php break; ?>
                                                            <?php endswitch; ?>
                                                </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>{{$item->content}}</p>
                                                </div>
                                            </li>
                                            @endforeach
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
                                            <textarea style="resize:none" name="content" class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>{{__('product.Your Rating')}}: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">{{__('product.Submit')}}</button>
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
            <hr style="padding-top: 1rem;">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <hr style="padding-top: 10px;">
                    <h3 class="title">{{__('product.Related Products')}}</h3>
                </div>
            </div>
            <!-- product -->
            @foreach($related_product as $key => $item)
            <div class="col-md-3 col-xs-6">
                <div class="product">
                <input class="form-control" type="hidden" name="product_id" value="{{$item->id}}">
                    <a href="{{URL::to( 'product-'.$item->id)}}">
                            <div class="product-img">
                                <img name='image' src="{{asset('public/uploads/product/more_image/'.$item->image)}}" alt="">
                                <div class="product-label">
                                    <span class="sale" name='sale'>-{{$item->vat}}%</span>
                                    <span class="new">{{__('home.NEW')}}</span>
                                </div>
                            </div>
                        </a>
                        <div class="product-body">
                            <p class="product-category" name='category'>{{$item->category_name}}</p>
                            <h3 class="product-name" name="$item->id" ><a href="{{URL::to( 'product-'.$item->id)}}">{{$item->name}}</a></h3>
                            <h4 class="product-price">{{number_format($item->price - ($item->price*($item->vat/100)),3, ',', '.')}}VND <del class="product-old-price">{{number_format($item->price)}}VND</del></h4>
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
                                <button class="quick-view" name="$item->id"><a href="{{URL::to( 'product-'.$item->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">{{__('home.quick view')}}</span></a></button>
                            </div>
                        </div>
                        <div   data-id="{{$item->id}}" data-name="{{$item->name}}" data-image="{{asset('public/uploads/product/more_image/'.$item->image)}}" data-price="{{$pro->price}}" class="add-to-cart">
                                <button type="submit" class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>{{__('home.add to cart')}}</button>
                        </div>
                    </div>
                    <!-- /product -->
                </div>
                @endforeach
            <!-- /product -->
            <div class="clearfix visible-sm visible-xs"></div>
            <!-- /product -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
@endsection
