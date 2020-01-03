@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{trans('add_category.ADD CATEGORYS')}}
            </header>

            <div class="panel-body">
                <form action="{{URL::to('admin/catalogs/categories/all-category')}}">
                    <button type="submit" name="all_category" class="btn btn-info">{{trans('add_category.Show all category product')}}</button>
                </form>
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

                <div class="position-center">

                    <form role="form" action="{{URL::to('admin/catalogs/categories/save-category')}}" method="post">
                        {{(csrf_field())}}
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Parent ID')}}</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                <select name="category_parent_id" class="form-control input-sm m-bot15">
                                @foreach($parent_id as $key => $parent_id)
                                    <option value="{{$parent_id->parent_id}}">{{$parent_id->parent_name}}</option>
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
                                <label for="exampleInputEmail1">{{trans('add_category.Name')}}</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="category name">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">{{trans('add_category.Meta Tag Description')}}</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="category_meta_tag_description" class="form-control" id="exampleInputEmail1" placeholder="description">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Meta Tag Title')}}</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="category_meta_tag_title" class="form-control" id="exampleInputEmail1" placeholder="meta tag title">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Meta Tag Keywords')}}</label>
                            <strong style="color: red;">*</strong></div>
                                <div class="col-sm-10">
                                <input type="text" name="category_meta_tag_keywords" class="form-control" id="exampleInputEmail1" placeholder="meta tag keywords">
                            </div>
                            <br>
                            <hr>
                        </div>

                        <div class="form-groups">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Status')}}</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">{{trans('add_category.Unactive')}}</option>
                                    <option value="1">{{trans('add_category.Active')}}</option>
                                </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Display Order')}}</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                                <input type="text" name="category_display_order" class="form-control" id="exampleInputEmail1" placeholder="display order">
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Sort order')}}</label>
                            <strong style="color: red;">*</strong></div>
                            <div class="col-sm-10">
                                <input type="text" name="category_sort_order" class="form-control" id="exampleInputEmail1" placeholder="sort order">
                            </div>
                            <br>
                            <hr>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">{{trans('add_category.Description')}}</label>
                            <strong style="color: red;">*</strong>
                            </div>
                            <div class="col-sm-10">
                                <textarea style="resize:none" rows="6" class="form-control" name="category_description" id="exampleInputPassword1" placeholde="meta tag description"></textarea>
                            </div>
                        </div>
                        <br>
                        <hr>

                        <button type="submit" name="add_category" class="btn btn-info">{{trans('add_category.ADD CATEGORY')}}</button>

                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
