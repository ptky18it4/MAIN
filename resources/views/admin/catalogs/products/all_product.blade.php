@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong>ALL PRODUCT</strong>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <!-- <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
          <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div> -->
        <form method="get" action="{{URL::to('admin/catalogs/products/add-product')}}">
          <button class="btn btn-sm btn-primary fa fa-plus" type="submit">&emsp;<strong>Add new</strong></button>
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
        Session::put('message', null);
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
            <th>IMAGE</th>
            <th>CATEGORY</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>VAT</th>
            <th>QUANTITY</th>
            <!-- <th>DESCRIPTION</th> -->
            <th>STATUS</th>
            <th>SHOW ON HOME</th>
            <th>VIEW COUNT</th>
            <th>OPTION</th>
            <!-- <th>Ngày thêm</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><img src="/public/uploads/product/more_image/{{$pro->image }}" height="100" width="100" title="/public/uploads/product/.{{$pro->image }}"></td>
            <td>{{ $pro->category_name}}</td>
            <td>{{ $pro->name }}</td>
            <td>{{ $pro->price }}</td>
            <td>{{ $pro->vat }}</td>
            <td>{{ $pro->quantity }}</td>
            <!-- <td>{{ $pro->description}}</td> -->
            <td><span class="text-ellipsis">
                <?php if ($pro->status == 0) { ?>
                  <a href="{{URL::to('/admin/catalogs/products/unactive-product/'.$pro->id)}}"><span class="fa fa-eye-slash"></span></a>
                <?php
                } else {
                  ?>
                  <a href="{{URL::to('/admin/catalogs/products/active-product/'.$pro->id)}}"><span class="fa fa-eye"></span></a>
                <?php
                }
                ?>
              </span>
            </td>

              <td><span class="text-ellipsis">
                <?php if ($pro->show_on_home == 0) { ?>
                  <a href="{{URL::to('/admin/catalogs/products/unactive-show/'.$pro->id)}}"><span class="fa fa-eye-slash"></span></a>
                <?php
                } else {
                  ?>
                  <a href="{{URL::to('/admin/catalogs/products/active-show/'.$pro->id)}}"><span class="fa fa-eye"></span></a>
                <?php
                }
                ?>
              </span>
            </td>
            <td>{{ $pro->view_count}}</td>

            <!-- <td><span class="text-ellipsis">Ngày thêm</span></td> -->
            <td>
              <!-- edit -->
              <a href="{{URL::to('/admin/catalogs/products/edit-product/'.$pro->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-active"></i>
              </a>
              <!-- delete -->
              <a href="{{URL::to('/admin/catalogs/products/delete-product/'.$pro->id)}}" class="active styling-delete" ui-toggle-class="">
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
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