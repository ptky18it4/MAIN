<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Mail;
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
        public function submitFormCheckout(Request $request) 
        {

            //===========================================GET INFORMATION OF USER ORDER==========================================
            $user_order = array();
            $user_order['first_name'] = $request->first_name;
            $user_order['last_name'] = $request->last_name;
            $user_order['email'] = $request->email;
            $user_order['address'] = $request->address;
            $user_order['city'] = $request->city;
            $user_order['country'] = $request->country;
            $user_order['zip-code'] = $request->zip_code;
            $user_order['tel'] = $request->tel;

            //===========================================GET INFORMATION FROM DATABASE==========================================

            $all_menu = DB::table('tbl_menu')->get();
            $infor_user = DB::table('tbl_user')->get();
            $all_category = DB::table('tbl_category')->get();
            $contact = DB::table('tbl_contact')->get();

            if(isset($_POST['cart-content']))
            {
            //================================== GET String from URL, passing from checkout.blade.php=======================
                $data = $_POST['cart-content'];
            //===========================================Count character "}" ===============================================
                $countChar = substr_count($data, "}");

                $json = json_decode($data);

                $user_order['total'] = 0;

                $randomString = '';

                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    for ($i = 0; $i < 10; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $user_order['code_order'] = $randomString;
                    
                for ($i = 0; $i < $countChar; $i++) { 
                    $data = array();
                    $data['name']   = $json[$i]->name;
                    $data['price']  = $json[$i]->price;
                    $data['count']  = $json[$i]->count;
                    $data['code_order']  = $randomString;
                    $user_order['name_product'] = $data['name'];
                    $user_order['price_product'] = $data['price'];
                    $user_order['count_product'] = $data['count'];
                    $user_order['created_at'] = date("F j, Y, g:i a");
                    $user_order['total'] += $data['price'];
                    DB::table('tbl_checkout')->insert($data); 
                }
                Mail::send('mails.notification', $user_order, function ($message) {
                    $message->from('phamtrungky19032000@gmail.com','Trung Kỳ');
                    $message->sender('phamtrungky19032000@gmail.com','Trung Kỳ');
                    $message->to('phamtrungky012345@gmail.com','Kenneth');
                    $message->replyTo('phamtrungky19032000@gmail.com', 'replyTo');
                    $message->subject('ĐẶT HÀNH THÀNH CÔNG'.'');
                    $message->priority(3);
                });
                return Redirect::to('/history');
            }
                  
        }
        /**
         * Function show history product order user
         */
        public function history()
        {
            $this->AuthenticLogin();
            Session::put('message', 'Order success !');
            $all_menu = DB::table('tbl_menu')->get();
            $infor_user = DB::table('tbl_user')->get();
            $all_category = DB::table('tbl_category')->get();
            $contact = DB::table('tbl_contact')->get();
            $order_product = DB::table('tbl_checkout')->get();
            return view('pages.history')
                     ->with('all_menu', $all_menu)
                     ->with('infor_user', $infor_user)
                     ->with('contact', $contact)
                     ->with('order_product', $order_product)
                     ->with('all_category', $all_category);
        }
}
