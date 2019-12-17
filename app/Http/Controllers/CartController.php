<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  // trả về trang j đó (khi thành công hoặc thất bại)
session_start();
class CartController extends Controller
{       
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
        public function submitFormCheckout() 
        {

            $this->AuthenticLogin();

            $all_menu = DB::table('tbl_menu')->get();
            $infor_user = DB::table('tbl_user')->get();
            $all_category = DB::table('tbl_category')->get();

            if(isset($_POST['cart-content']))
            {
                //=================== GET String from URL, passing from checkout.balde.php
                $data = $_POST['cart-content'];
                //===================Count character "}"
                $countChar = substr_count($data, "}");
                // echo $countChar;

                // echo '<pre>';
                $json = json_decode($data);
                // echo '</pre>';
                
                for ($i = 0; $i < $countChar; $i++) { 
                    $data = array();
                    // $data['id']     = $json[$i]->id;
                    $data['name']   = $json[$i]->name;
                    $data['price']  = $json[$i]->price;
                    $data['count']  = $json[$i]->count;
                    //insert into mysql table
                    DB::table('tbl_checkout')->insert($data);
                    Session::put('message', 'Add product to TBL_CHECKOUT success !');
                }
                // return view('pages.cart')
                //      ->with('all_menu', $all_menu)
                //      ->with('infor_user', $infor_user)
                //      ->with('all_category', $all_category);
                return Redirect::to('/');
            }
                  
        }
}
