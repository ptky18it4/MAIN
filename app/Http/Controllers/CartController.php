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
        public function checkout() {
        //         $_token = $request->_token;
        //         $productId = $request->product_id;
        //         // echo $_token;
        //         // echo $productId;
        //         $all_menu = DB::table('tbl_menu')->get();
        //         $all_product = DB::table('tbl_product')->where('id',$productId)->get();
        //         $infor_user = DB::table('tbl_user')->get();
        //         $all_category = DB::table('tbl_category')->get();
        //         return view('pages.cart')
        //                 ->with('all_menu', $all_menu)
        //                 ->with('infor_user', $infor_user)
        //                 ->with('all_category', $all_category)
        //                 ->with('all_product', $all_product);
        
        }
}
