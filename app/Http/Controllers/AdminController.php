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
        if(isset($_POST['saveInfor'])) {
            setcookie('email',$admin_email,time()+3600,'/','',0,0);
            setcookie('pass',$admin_password,time()+3600,'/','',0,0);
        }
        if ($result) {
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id);
            $users = DB::table('tbl_user')->count();

            //=======================================ALL - PRODUCTS ==========================================

            $product = DB::table('tbl_product')->sum('quantity');
            $count = DB::table('tbl_checkout')->sum('count');
            $price = DB::table('tbl_checkout')->sum('price');

            //================================= ALL RPODUCTS & MONEY / DAILY =================================

            $to = date("Y-m-d 23:59:59");
            $from = date("Y-m-d 00:00:00",strtotime("-0 days"));
            $created_from_Day =$from;
            $created_to_Day =$to;
            $countOfDay = DB::table('tbl_checkout')->whereBetween('created_at',[$from,$to])->sum('count');
            $priceOfDay = DB::table('tbl_checkout')->whereBetween('created_at',[$from,$to])->sum('price');
            //================================= ALL PRODUCTS & MONEY / MONTH =================================

            $fromMonth = date('Y-m-1');
            $toMonth = date('Y-m-30');
            $created_from_Month =$fromMonth;
            $created_to_Month =$toMonth;
            $countOfMonth = DB::table('tbl_checkout')->whereBetween('created_at',[$fromMonth,$toMonth])->sum('count');
            $priceOfMonth = DB::table('tbl_checkout')->whereBetween('created_at',[$fromMonth,$toMonth])->sum('price');

            //================================= ALL PRODUCTS & MONEY / MONTH =================================

            $fromMonthNew = date('Y-m-1 00:00:00',strtotime("-1 months"));
            $toMonthNew = date('Y-m-1 00:00:00');
            $created_from_Month_New =$fromMonthNew;
            $created_to_Month_New =$toMonthNew;
            $countOfMonth_New = DB::table('tbl_checkout')->whereBetween('created_at',[$fromMonthNew,$toMonthNew])->sum('count');
            $priceOfMonth_New = DB::table('tbl_checkout')->whereBetween('created_at',[$fromMonthNew,$toMonthNew])->sum('price');

            //========================================== RETURN =============-================================

            $getIpClient = DB::table('ip_client')->count('address');

            //========================================== GET IP CLIENT =======================================
            return view('admin.dashboard',
                            [
                                'count' => $count,
                                'users'=> $users,
                                'product' =>$product,
                                'price' =>$price,
                                'countOfDay' =>$countOfDay,
                                'priceOfDay' =>$priceOfDay,
                                'created_from_Day' => $created_from_Day,
                                'created_to_Day' => $created_to_Day,
                                'countOfMonth' =>$countOfMonth,
                                'priceOfMonth' =>$priceOfMonth,
                                'created_from_Month' => $created_from_Month,
                                'created_to_Month' => $created_to_Month,
                                'countOfMonth_New' =>$countOfMonth_New,
                                'priceOfMonth_New' =>$priceOfMonth_New,
                                'created_from_Month_New' => $created_from_Month_New,
                                'created_to_Month_New' => $created_to_Month_New,
                                'getIpClient'   => $getIpClient,

                            ]);
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
        setcookie('email','',time()-3600,'/','',0,0);
        setcookie('pass','',time()-3600,'/','',0,0);
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
        //Insert
        DB::table('tbl_admin')->insert($data);
        Session::put('message', 'Đăng kí tài khoản quản trị viên thành công !');
        return Redirect::to('admin');
    }

}
