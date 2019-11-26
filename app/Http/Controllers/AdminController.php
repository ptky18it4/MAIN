<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  // trả về trang j đó (khi thành công hoặc thất bại)
session_start();
class AdminController extends Controller
{
    
    //Bảo mật admin
    public function AuthenticLogin()
    {
        $admin_id = Session::get('admin_id');  //admin_id ở đâu mà có : admin_id này tồn tại khi đăng nhập thành công ( xem ở funciton dashboard)
        if($admin_id)
        {
            return Redirect::to('admin/dashboard');
        }
        else
        {
            return Redirect::to('admin')->send();;
        }
    }

    public function login()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthenticLogin();
        return view('admin.dashboard');
    }

    public function processor_admin_login(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('email', $admin_email)->where('password', $admin_password)->first();
        //  echo '<pre>';
        //  print_r ($result);
        //  echo '</pre>';
        // return view('admin.dashboard');
        if ($result) {
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id);
            return Redirect::to('admin/dashboard');
        } else {
            Session::put('message', 'Email hoặc mật khẩu bị sai, Vui lòng đăng nhập lại !');
            return Redirect::to('admin');
        }
    }
    
    public function log_out()
    {
        $this->AuthenticLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function admin_register()
    {
        return view('admin_register');
    }
    
    public function processor_register(Request $request)
    {
        $data = array();
        $data['name'] = $request->admin_name;
        $data['password'] = md5($request->admin_password);
        $data['email'] = $request->admin_email;
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
        DB::table('tbl_admin')->insert($data);
        Session::put('message', 'Đăng kí tài khoản quản trị viên thành công !');
        return Redirect::to('admin');
    }
}
