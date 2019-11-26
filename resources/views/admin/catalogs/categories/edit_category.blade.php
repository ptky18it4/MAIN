@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                EDIT CATEGORY PRODUCT
            </header>
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
            <div class="panel-body">
                @foreach($edit_category as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('admin/catalogs/update-category/'.$edit_value->category_id)}}" method="post">
                        {{(csrf_field())}}
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Parent ID</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                <select name="category_parent_id" class="form-control input-sm m-bot15">
                                @foreach($parent_id as $key => $parent_id)
                                $if($parent_id->parent_name == "P - Series")
                                <option value="{{$parent_id->parent_name}}">{{$parent_id->parent_name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Name</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" value="{{$edit_value->category_name}}" placeholder="category name">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Meta Tag Description</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="category_meta_tag_description" class="form-control" category_id="exampleInputEmail1" value="{{$edit_value->category_meta_tag_description}}" placeholder="description">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Meta Tag Title</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="category_meta_tag_title" class="form-control" id="exampleInputEmail1" value="{{$edit_value->category_meta_tag_title}}" placeholder="meta tag title">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Meta Tag Keywords</label>
                            <strong style="color: red;">*</strong></div>
                                <div class="col-sm-10">
                                <input type="text" name="category_meta_tag_keywords" class="form-control" id="exampleInputEmail1" value="{{$edit_value->category_meta_tag_keywords}}" placeholder="meta tag keywords">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-groups">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Status</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-10">
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Unactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Display Order</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                                <input type="text" name="category_display_order" class="form-control" id="exampleInputEmail1" value="{{$edit_value->category_display_order}}" placeholder="display order">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Sort order</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                                <input type="text" name="category_sort_order" class="form-control" id="exampleInputEmail1" value="{{$edit_value->category_sort_order}}" placeholder="sort order">
                            </div>
                            <br>
                            <hr>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">Description</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-10">
                                <textarea style="resize:none" rows="6" class="form-control" name="category_description" id="exampleInputPassword1"  placeholde="meta tag description">{{$edit_value->category_description}}</textarea>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <button type="submit" name="update_category" class="btn btn-info">SAVE</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection