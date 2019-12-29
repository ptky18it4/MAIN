@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong class="title">{{trans('all_category.ALL CATEGORY PRODUCT')}}</strong>
    </div>
    <div class="row w3-res-tb">
      <form action="">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">{{trans('all_category.Desc')}}</option>
            <option value="1">{{trans('all_category.Asc')}}</option>
          </select>
        <button class="btn btn-sm btn-default">{{trans('all_category.Apply')}}</button>
      </div>
      </form>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <!-- <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
          <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div> -->
        <form action="{{URL::to('admin/catalogs/categories/add-category')}}">
        <button class="btn btn-sm btn-success title" type="submit">Thêm mới</button>
        </form>
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      /**
       * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
       * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
       */
      if ($message) {
        // echo $message;
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th class="title">{{trans('all_category.CATEGORY NAME')}}</th>
            {{-- <th>SORT ORDER</th> --}}
            <th class="title">{{trans('all_category.STATUS')}}</th>
            <th class="title">{{trans('all_category.ACTION')}}</th>
            <!-- <th>Ngày thêm</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category as $key => $category_value)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $category_value->category_name }}</td>
            {{-- <td>{{ $category_value->category_sort_order }}</td> --}}
            <td><span class="text-ellipsis">
                <?php if ($category_value->category_status == 0) { ?>
                  <a href="{{URL::to('/admin/catalogs/categories/unactive-category/'.$category_value->category_id)}}"><span class="fa fa-eye-slash"></span></a>
                <?php
                } else {
                  ?>
                  <a href="{{URL::to('/admin/catalogs/categories/active-category/'.$category_value->category_id)}}"><span class="fa fa-eye"></span></a>
                <?php
                }
                ?>
              </span></td>
            <!-- <td><span class="text-ellipsis">Ngày thêm</span></td> -->
            <td>
              <!-- edit -->
                <a href="{{URL::to('/admin/catalogs/categories/edit-category/'.$category_value->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-active"></i>
                </a>
                <!-- delete -->
                <a href="{{URL::to('/admin/catalogs/categories/delete-category/'.$category_value->category_id)}}" class="active styling-delete" ui-toggle-class="">
                <i class="fa fa-trash text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">{{trans('all_category.showing 20-30 of 50 items')}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection