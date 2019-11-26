@extends('admin_layout')
@section('admin_content')
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-product" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a title="cancel" href="http://localhost/LARAVEL/MAIN" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Products</h1>
            <ul class="breadcrumb">
                <li><a href="#">Catalog</a></li>
                <li><a href="#">Products</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{URL::to('admin/catalogs/products/all-product')}}">
                    <button class="btn btn-primary" type="submit">SHOW ALL PRODUCT</button>
                </form>
                <h3 class="panel-body"><i class="fa fa-pencil"></i> Information product</h3>
            </div>
            <div class="panel-body">
                <form action="{{URL::to('admin/catalogs/products/save-product')}}" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#tab-general" data-toggle="tab" aria-expanded="false">General</a></li>
                        <li class=""><a href="#tab-data" data-toggle="tab" aria-expanded="false">Data Config</a></li>
                        <li class=""><a href="#tab-image" data-toggle="tab" aria-expanded="false">Image</a></li>
                    </ul>
                    <div class="tab-content">
                                    <div class="tab-pane active " id="tab-general">
                                        <ul class="nav nav-tabs" id="language">
                                            <li class="active">
                                                <a href="#language1" data-toggle="tab" aria-expanded="false"><img width="50" height="50" src="www.thinkpad.com.vn/public/backend/images/thinkpad-logo.jpg" title="English">...</a>
                                            </li>
                                        </ul>
                                        <!-- Add product -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <section class="panel">

                                                    <div class="panel-body">
                                                        <?php
                                                        $message = Session::get('message');
                                                        /**
                                                         * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
                                                         * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
                                                         */
                                                        if ($message) {
                                                            // echo $message;
                                                            echo '<span class="text-alert">' . $message . '</span>';
                                                            Session::put('message', null);
                                                        }
                                                        ?>

                                                        <div class="position-right">

                                                            <br>
                                                            <hr>
                                                        </div>
                                                        <div class="position-center">
                                                           
                                                            <form role="form" action="{{URL::to('admin-update-product')}}" method="post" enctype="multipart/form-data">
                                                                {{(csrf_field())}}
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Product name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="product name" >
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">*</strong>Category product</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="product_category" class="form-control input-sm m-bot15">
                                                                            @foreach($category_name as $key => $cate_name)
                                                                            <option value="{{$cate_name->category_id}}">{{$cate_name->category_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <hr>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea style="resize:none" rows="4" class="form-control" name="product_description" id="exampleInputPassword1" placeholde="description"></textarea>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Price</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="price"   >
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Vat</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="product_vat" class="form-control" id="exampleInputEmail1" placeholder="vat" >
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Quantity</label>
                                                                    <div class="col-sm-10">
                                                                        <input style="resize:none" rows="3" class="form-control" name="product_quantity" id="exampleInputPassword1" placeholder="quantity" >
                                                                    </div>
                                                                    <br>
                                                                    <hr>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">*</strong>Status</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <select name="product_status" class="form-control input-sm m-bot15">
                                                                                    <option value="1" selected>Active</option>
                                                                                    <option value="0">Unactive</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Show on home</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <select name="show_on_home" class="form-control input-sm m-bot15">
                                                                                    <option value="1" selected>Show</option>
                                                                                    <option value="0">Not show</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Meta tag title</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="product_meta_tag_title" class="form-control" id="exampleInputEmail1" placeholder="meta tag title" >
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Meta tag description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea style="resize:none" row="4" type="text" name="product_meta_tag_description" class="form-control" id="exampleInputEmail1" placeholder="meta tag description"   ></textarea>
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Meta tag keywords</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="product_meta_tag_keywords" class="form-control" id="exampleInputEmail1" placeholder="meta tag keywords"  >
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Tags</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="product_tags" class="form-control" id="exampleInputEmail1" placeholder="tags"  >
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </section>

                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="tab-pane" id="tab-data">
                                        <hr>
                                        <strong style="color: red;">PROCESSER</strong>
                                        <hr>
                                        <div class="form-group  ">
                                            <label class="col-sm-2 control-label" for="input-model">CPU technology</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="cpu_technology" placeholder="Model" id="cpu-technology" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-sku"><span data-toggle="tooltip" title="" data-original-title="Stock Keeping Unit">CPU types</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="cpu_types" id="cpu_types" class="form-control" placeholder="cpu types" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-upc"><span data-toggle="tooltip" title="" data-original-title="Universal Product Code">CPU speed</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="cpu_speed" id="cpu_speed" class="form-control" placeholder="cpu speed" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-ean"><span data-toggle="tooltip" title="" data-original-title="European Article Number">CPU caching</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="cpu_caching" id="cpu_caching" class="form-control" placeholder="cpu caching">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-jan"><span data-toggle="tooltip" title="" data-original-title="Japanese Article Number">Maximum speed Turbo</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="maximum_speed_turbo" id="maximum_speed_turbo" class="form-control" placeholder="maximum_speed_turbo" >
                                            </div>
                                        </div>
                                        <hr>
                                        <strong style="color: red;">RAM , HARD DRIVE</strong>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-isbn"><span data-toggle="tooltip" title="" data-original-title="International Standard Book Number">RAM memory</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="ram_memory" id="ram_memory" class="form-control" placeholder="ram memory">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-mpn"><span data-toggle="tooltip" title="" data-original-title="Manufacturer Part Number">RAM types</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="ram_types" id="ram-types" class="form-control" placeholder="ram types">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-mpn"><span data-toggle="tooltip" title="" data-original-title="Manufacturer Part Number">Speed Bus</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="speed_bus" id="speed-bus" class="form-control" placeholder="speed bus">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-tax-class">Hard Drive</label>
                                            <div class="col-sm-10">
                                                <select name="hard_drive" id="hard-drive" class="form-control">
                                                    <option value="null" selected> --- None --- </option>
                                                    <option value="HDD" selected>HDD</option>
                                                    <option value="SSD">SSD</option>
                                                    <option value="HDD + SSD">HDD + SSD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <strong style="color: red;">SCREEN</strong>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-tax-class">Size Screen</label>
                                            <div class="col-sm-10">
                                                <select name="size_screen" id="size-screen" class="form-control">
                                                    <option value="0"> --- None --- </option>
                                                    <option value="14 inch" selected>14 inch</option>
                                                    <option value="15.6 inch">15.6 inch</option>
                                                    <option value="17 inch">17 inch</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-tax-class">Resolution (W x H)</label>
                                            <div class="col-sm-10">
                                                <select name="resolution_w_h" id="resolution-w-h" class="form-control">
                                                    <option value="0" selected> --- None --- </option>
                                                    <option value="FHD (1920 x 1080)" selected> FHD IPS (1920 x 1080) </option>
                                                    <option value="4K UHD (3840 x 2160) ">4K UHD IPS (3840 x 2160)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-minimum"><span data-toggle="tooltip" title="" data-original-title="Force a minimum ordered amount">Technology MH</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="technology_mh" id="technology-mh" class="form-control" placeholder="Technology MH" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-subtract">Touch screen</label>
                                            <div class="col-sm-10">
                                                <select name="touch_screen" id="touch-screen" class="form-control">
                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <strong style="color: red;">GRAPHICS AND SOUND</strong>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Graphics card</span></label>
                                            <div class="col-sm-10">
                                                <select name="graphics_card" id="graphics-card" class="form-control">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="Intel UHD Graphics 620">Intel UHD Graphics 620</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Card memory</span></label>
                                            <div class="col-sm-10">
                                                <select name="card_memory" id="card-memory" class="form-control">
                                                    <option value="1GB" >1GB</option>
                                                    <option value="2GB" selected >2GB</option>
                                                    <option value="4GB">4GB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Card design</span></label>
                                            <div class="col-sm-10">
                                                <select name="card_design" id="card-design" class="form-control">
                                                    <option value="0">Onboard</option>
                                                    <option value="1" selected="selected">No Onboard</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Technology Audio</span></label>
                                            <div class="col-sm-10">
                                                <select name="technology_audio" id="technology-audio" class="form-control">
                                                    <option value="Dolby Audio™ Premium" selected>Dolby Audio™ Premium</option>
                                                    <option value="Wave MaxxAudio">Wave MaxxAudio</option>
                                                    <option value="Sonic Master">Sonic Master</option>
                                                    <option value="Acer TrueHarmony">Acer TrueHarmony</option>
                                                    <option value="Dobly Atmos Premium">Dobly Atmos Premium</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <strong style="color: red;">PIN/BATTERY</strong>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Pin/ Battery</span></label>
                                            <div class="col-sm-10">
                                                <select name="pin_battery" id="pin-battery" class="form-control">
                                                    <option value="3Cell, 57WHr" selected>3Cell, 57WHr</option>
                                                    <option value="6Cell, 75WHr">6Cell, 90WHr</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Time used often</label>
                                            <div class="col-sm-10">
                                                <label class="radio-inline"> <input type="radio" name="time_used_often" value="3h ~ 4h"> 3h ~ 4h </label>
                                                <label class="radio-inline"> <input type="radio" name="time_used_often" value="6h ~ 8h"> 6h ~ 8h </label>
                                                <label class="radio-inline"> <input type="radio" name="time_used_often" value="8h ~ 12h"> 8h ~ 12h </label>
                                                <label class="radio-inline"> <input type="radio" name="time_used_often" value="13h ~ 21h"> 13h ~ 21h </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-location">Charger</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <input type="text" name="charger" id="charger" class="form-control" placeholder="65W AC, Lenovo AC Adapter">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <strong style="color: red;">OPERATING SYSTEM</strong>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Operating system</span></label>
                                            <div class="col-sm-10">
                                                <select name="operating_system" id="operating-system" class="form-control">
                                                    <option value="Windows 10" selected>Windows 10</option>
                                                    <option value="Windows 10 Pro">Windows 10 Pro</option>
                                                    <option value="MacOS">MacOS</option>
                                                    <option value="Linux - Ubuntu">Linux - Ubuntu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-length">Dimensions (L x W x H)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <input type="text" name="dimensions"  placeholder="Length" id="input-length" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-weight">Weight (kg)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="weight" id="input-weight" class="form-control" placeholder="Weight (kg)" >
                                            </div>
                                        </div>
                                        <hr>
                                        <strong style="color: red;">OTHER</strong>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="exampleInputEmail1"><strong style="color : red;">* </strong>Gateway
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea style="resize:none" rows="4" class="form-control" name="gateway" id="gateway" placeholde="meta tag description"></textarea>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Resolution Webcam</span></label>
                                            <div class="col-sm-10">
                                                <select name="resolution_webcam" id="resolution-swebcam" class="form-control">
                                                    <option value="HD 720" selected>HD 720</option>
                                                    <option value="4K">4K</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-image">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <td class="text-left">Image</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left">
                                                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
                                                                <img id="blah" style="width:111px; height:111px;" src="http://www.thinkpad.com.vn/public/uploads/product/more_image/thinkpad-logo-white.jpg" title="http://www.thinkpad.com.vn/public/uploads/product/more_image/thinkpad-logo-white.jpg" data-placeholder="http://localhost/LARAVEL/MAIN/public/uploads/product/more_image/thinkpad-logo-white.jpg" /></a>
                                                            <input type="file" class="file" name="product_image" onchange="readURL(this);" />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-left"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img width="50" height="50" src="http://www.thinkpad.com.vn/public/uploads/product/more_image/thinkpad-logo-white.jpg" id="input-image" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="images" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    </tr>
                                                    <td class="text-left">Additional Images</td>
                                                    <td class="text-right">Sort Order</td>
                                                    <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Additional Images and Sort Order -->
                                                </tbody>

                                                <tfoot>
                                                    {{-- <tr>
                                                        <td colspan="2"></td>
                                                        <td class="text-left"><button type="button" onclick="addImage();" data-toggle="tooltip" title="Add Image" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                                                    </tr> --}}

                                                    @for($i = 0; $i < 5; ++$i)
                                                    <tr>
                                                        <td class="form-group">
                                                        <label>Image Product Detail</label>
                                                        <input type="file"   name="product_detail{{$i}}" title="product_detail{{$i}}"  />
                                                        <input type="hidden" name="item{{$i}}" title="item{{$i}}">
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

            </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- tag config product -->
</div>

@endsection