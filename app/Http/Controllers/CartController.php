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
            $user_order['user_id']  = $request->user_id;
            $user_order['first_name'] = $request->first_name;
            $user_order['last_name'] = $request->last_name;
            $user_order['email'] = $request->email;
            $user_order['address'] = $request->address;
            $user_order['city'] = $request->city;
            $user_order['country'] = $request->country;
            $user_order['zip-code'] = $request->zip_code;
            $user_order['tel'] = $request->tel;

            if($request->checkbox) {
                $user_order = array();
                $user_order['user_id'] = NULL;
                $user_order['first_name'] = $request->first_name_diff;
                $user_order['last_name'] = $request->last_name_diff;
                $user_order['email'] = $request->email_diff;
                $user_order['address'] = $request->address_diff;
                $user_order['city'] = $request->city_diff;
                $user_order['country'] = $request->country_diff;
                $user_order['zip-code'] = $request->zip_code_diff;
                $user_order['tel'] = $request->tel_diff;
            }
            //===========================================GET INFORMATION FROM DATABASE==========================================

            $all_menu = DB::table('tbl_menu')->get();
            $infor_user = DB::table('tbl_user')->get();
            $all_category = DB::table('tbl_category')->get();
            $contact = DB::table('tbl_contact')->get();

            if(isset($_POST['cart-content']))
            {
            //================================== GET String from URL, passing from checkout.blade.php=======================

                $data = $_POST['cart-content'];

            //=========================================== Count character "}" ===============================================

                $countChar = substr_count($data, "}");
                echo $countChar;
            //=========================================== Set total ========================================================

                $user_order['total'] = 0;

            //=========================================== Random ==========================================================

                $randomString = '';

                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    for ($i = 0; $i < 10; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $user_order['code_order'] = $randomString;

            //=========================================== Parse Json ======================================================

                $json = json_decode($data);
            //============================================ Handling =======================================================
                $user_order['total'] = 0;

                for ($i = 0; $i < $countChar; $i++) {

                    $data = array();
                    $data['name']   = $json[$i]->name;
                    $data['ProductID']   = $json[$i]->id;
                    $data['count']  = $json[$i]->count;
                    $data['user_id'] = $user_order['user_id'];
                    $data['code_order']  = $randomString;

                    $user_order['name_product'] = $data['name'];
                    $user_order['count_product'] = $data['count'];
                    $user_order['created_at'] = date("F j, Y, g:i a");

                    DB::table('tbl_checkout')->insert($data);
                    $productCount = DB::table('tbl_product')->select('quantity','price','name','image')->where('id',$data['ProductID'])->get();
                    $newQuantity = $productCount[0]->quantity; // output : id : number
                    $newQuantity = $newQuantity - 1;            // handing: id - 1
                    $price = $productCount[0]->price;
                    $name = $productCount[0]->name;

                    DB::table('tbl_product')->where('id',$data['ProductID'])->update(['quantity' => $newQuantity]);

                    $user_order['total'] += $price;
                    DB::table('tbl_checkout')->where('ProductID',$data['ProductID'])->update(['price'=> $price]);


                    Mail::send('mails.notification', $user_order, function ($message) {
                        $message->from('phamtrungky19032000@gmail.com','Trung Kỳ');
                        $message->sender('phamtrungky19032000@gmail.com','Trung Kỳ');
                        $message->to('phamtrungky012345@gmail.com','Kenneth');
                        $message->replyTo('phamtrungky19032000@gmail.com', 'replyTo');
                        $message->subject('Đặt hàng thành công'.'');
                        $message->priority(3);
                    });
                }
                return Redirect::to('/history');
            }

        }
        /**
         * Function show history product order user
         */
        public function history()
        {
            if(Session::put('message')){
                Session::put('message', 'Đặt hàng thành công !');
            }
            else {
                Session::put('message', 'Lịch sử đặt hàng ! ');
            }
            $user_id = Session::get('user_id');
            $all_menu = DB::table('tbl_menu')->get();
            $infor_user = DB::table('tbl_user')->where('id',$user_id)->get();
            $all_category = DB::table('tbl_category')->get();
            $contact = DB::table('tbl_contact')->get();
            $order_product = DB::table('tbl_checkout')->where('user_id',$user_id)->get();
            return view('pages.history')
                     ->with('all_menu', $all_menu)
                     ->with('infor_user', $infor_user)
                     ->with('contact', $contact)
                     ->with('order_product', $order_product)
                     ->with('all_category', $all_category);
        }
}
