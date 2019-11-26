<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  // trả về trang j đó (khi thành công hoặc thất bại)
session_start();
class CatalogController extends Controller
{
    private $pathViewControllerCategories = 'admin.catalogs.categories.';
    private $RedirectCategories = 'admin/catalogs/categories/';

    public function AuthenticLogin()
    {
        $admin_id = Session::get('admin_id');  //admin_id ở đâu mà có : admin_id này tồn tại khi đăng nhập thành công ( xem ở funciton dashboard)
        if($admin_id)
        {
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin')->send();;
        }
    }
    //
    public function add_category()
    {
        $this->AuthenticLogin();
        $parent_id = DB::table('tbl_parent_id')->orderby('parent_id','desc')->get();
        return view($this->pathViewControllerCategories.'add_category')->with('parent_id',$parent_id);
    }
    public function all_category()
    {
        $this->AuthenticLogin();
        $all_category = DB::table('tbl_category')->get();
        $manager_category = view($this->pathViewControllerCategories.'all_category')->with('all_category', $all_category);
        return view('admin_layout')->with($this->pathViewControllerCategories.'all_category', $manager_category);

        // echo '<pre>';
        // print_r($all_category);
        // echo '</pre>';
    }
    public function save_category(Request $request)
    {
        $this->AuthenticLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_meta_tag_title'] = $request->category_meta_tag_title;
        $data['category_meta_tag_description'] = $request->category_meta_tag_description;
        $data['category_meta_tag_keywords'] = $request->category_meta_tag_keywords;
        $data['category_parent_id'] = $request->category_parent_id;
        $data['category_display_order'] = $request->category_display_order;
        $data['category_sort_order'] = $request->category_sort_order;
        $data['category_status'] = $request->category_product_status;
        /**
         * categogy_name : tên của một trong cở sở dữ liệu
         * categogy_product_name : tên của phần name bên add_categogy_product.blade.php
         * Tương tự các $data['....'] nhé
         * Rồi, bây giờ in ra để xem đã lấy được từ bên form qua chưa nè
         */
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        //Insert
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Add category success !');
        return Redirect::to($this->RedirectCategories.'all-category');
    }
    public function active_category($category_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 0]);
        Session::put('message', 'Unactive success !');
        return Redirect::to($this->RedirectCategories.'all-category');
    }
    public function unactive_category($category_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 1]);
        Session::put('message', 'Active success');
        return Redirect::to($this->RedirectCategories.'all-category');
    }
    public function edit_category($category_id)
    {
        $this->AuthenticLogin();
        $parent_id = DB::table('tbl_parent_id')->get(); // Lấy hết
        $edit_category = DB::table('tbl_category')->where('category_id', $category_id)->get(); // không cần dùng first()
        $manager_category = view($this->pathViewControllerCategories.'edit_category')->with('parent_id', $parent_id)->with('edit_category', $edit_category);
        return view('admin_layout')->with($this->pathViewControllerCategories.'edit_category', $manager_category);
    }
    public function update_category(Request $request, $category_id)
    {
        $this->AuthenticLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_meta_tag_title'] = $request->category_meta_tag_title;
        $data['category_meta_tag_description'] = $request->category_meta_tag_description;
        $data['category_meta_tag_keywords'] = $request->category_meta_tag_keywords;
        $data['category_parent_id'] = $request->category_parent_id;
        $data['category_display_order'] = $request->category_display_order;
        $data['category_sort_order'] = $request->category_sort_order;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Update category success !');
        return Redirect::to($this->RedirectCategories.'all-category');
    }
    public function delete_category($category_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::put('message', 'Delete category success !');
        return Redirect::to($this->RedirectCategories.'all-category');
    }
    /** DB::table('tên bảng')->where('tên cột trong cơ sở dữ liệu', tham so truyen tu view qua)->delete(); */
}
