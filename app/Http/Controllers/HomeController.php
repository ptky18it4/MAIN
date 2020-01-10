<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Mail;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  // trả về trang j đó (khi thành công hoặc thất bại)
session_start();
class HomeController extends Controller
{

    //Bảo mật admin
    public function AuthenticLogin()
    {
        $user_id = Session::get('user_id');  //user_id ở đâu mà có : user_id này tồn tại khi đăng nhập thành công ( xem ở funciton dashboard)
        if ($user_id) {
            return Redirect::to('/');
        } else {
            return Redirect::to('/')->send();;
        }
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords;
        $user_id = Session::get('user_id');
        $all_menu = DB::table('tbl_menu')->get();
        $infor_user = DB::table('tbl_user')->where('id',$user_id)->get();
        $all_category = DB::table('tbl_category')->get();
        $result = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where([
                            ['name', 'like' , '%'.$keywords.'%'],
                            ['show_on_home', '=' , '1'],
                        ])
                ->orWhere([
                                ['category_name', 'like' , '%'.$keywords.'%'],
                                ['show_on_home', '=' , '1']
                          ])
                ->orWhere('description', 'like' , '%'.$keywords.'%')
                ->orWhere('meta_tag_title', 'like' , '%'.$keywords.'%')
                ->paginate(8);
        $related_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where([
                            ['name', 'like' , '%'.$keywords.'%'],
                            ['category_name', 'like' , '%'.$keywords.'%'],
                            ['show_on_home', '=' , '1'],
                        ])
                ->orWhere('description', 'like' , '%'.$keywords.'%')
                ->orWhere('meta_tag_title', 'like' , '%'.$keywords.'%')
                ->paginate(4);

        return view('pages.regular')
                ->with('all_menu',$all_menu)
                ->with('keywords',$keywords)
                ->with('result_search',$result)
                ->with('infor_user',$infor_user)
                ->with('all_category',$all_category)
                ->with('related_product',$related_product);
    }

    public function login(Request $request)
    {
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);
        $result = DB::table('tbl_user')->where('email', $user_email)->where('password', $user_password)->first();
        if(isset($_POST['saveInfor'])) {
            setcookie('email',$user_email,time()+3600,'/','',0,0);
            setcookie('pass',$user_password,time()+3600,'/','',0,0);
        }
        if ($result) {
            Session::put('user_name', $result->username);
            Session::put('user_id', $result->id);
            return redirect()
            ->back();
        } else {
            Session::put('message', 'Email hoặc mật khẩu bị sai, Vui lòng đăng nhập lại !');
            return redirect()
            ->back();
        }
    }

    public function register(Request $request)
    {
        /**
         * Xử lý thêm phần đăng kí :
         * Nếu tên đăng nhập đã tồn tại thì bão người dùng đổi tên đăng nhập
         */
        $data = array();
        $data['username'] = $request->user_name;
        $data['passdefault'] = $request->user_password;
        $data['password'] = md5($request->user_password);
        $data['email'] = $request->user_email;
        $data['remember_token'] = $request->_token;

        /**
         * categogy_name : tên của một trong cở sở dữ liệu
         * categogy_product_name : tên của phần name bên add_categogy_product.blade.php
         * Tương tự các $data['....'] nhé
         * Rồi, bây giờ in ra để xem đã lấy được từ bên form qua chưa nè
         */
        DB::table('tbl_user')->insert($data);
        return Redirect::to('/');
    }

    public function log_out()
    {
        $this->AuthenticLogin();
        Session::put('user_name', null);
        Session::put('user_id', null);
        setcookie('email','',time()-3600,'/','',0,0);
        setcookie('pass','',time()-3600,'/','',0,0);
        return redirect()
              ->back();
    }

    public function update_infor_user(Request $request, $user_id)
    {
        $this->AuthenticLogin();
        $data = array();
        $data['email'] = $request->user_email;
        $data['password'] = md5($request->user_password);
        $data['address'] = $request->user_address;
        $data['phone'] = $request->user_phone;
        $get_image= $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //Lấy name của ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); // Lấy đuôi mở rộng
            $get_image->move('public/uploads/users',$new_image);
            $data['image'] = $new_image;
        }
        $data['remember_token'] = $request->_token;
        DB::table('tbl_user')->where('id', $user_id)->update($data);
        return Redirect::to('home');
    }

    public function index()
    {
        $arrayIP = array();
        $ip = getenv('HTTP_CLIENT_IP')?:
        getenv('HTTP_X_FORWARDED_FOR')?:
        getenv('HTTP_X_FORWARDED')?:
        getenv('HTTP_FORWARDED_FOR')?:
        getenv('HTTP_FORWARDED')?:
        getenv('REMOTE_ADDR');

        //=============================================== BLOCK THE IP Address OF THE CLIENT ===============================

        $arrayIP['address'] = $ip;
        switch ($ip) {
            case '192.168.1.24':
                return view('pages.404');
                break;
            // default:
            //     return view('pages.404_1');
            //     break;
        }

        //===================================================================================================================

        DB::table('ip_client')->where('address', '=', $ip)->delete();
        DB::table('ip_client')->insert($arrayIP);
        // Đăng nhập thành công -> tồn tại $user_id -> dùng user_id này để lấy thông tin của người dùng
            $user_id = Session::get('user_id');
            $infor_user = DB::table('tbl_user')->where('id', $user_id)->get();
            $all_category = DB::table('tbl_category')->where('category_status', '1')->get();

            $all_menu = DB::table('tbl_menu')
            ->where('show_on_home', '1')
            ->get();

            $all_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where('show_on_home','1')
                ->inRandomOrder()
                ->get();

            $top_selling = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->orderby('id', 'desc')
                ->limit(11)
                ->get();
            $tagCategory = DB::table('tbl_product')
                        ->join("tbl_category",'tbl_category.category_id','=','tbl_product.cate_id')
                        ->inRandomOrder()
                        ->paginate(4);
            $tagPrice = DB::table('tbl_product')->inRandomOrder()->paginate(4);
            $tagParent = DB::table('tbl_parent_id')->inRandomOrder()->paginate(9);
            return view('pages.home')
                ->with('all_menu', $all_menu)
                ->with('infor_user', $infor_user)
                ->with('all_category', $all_category)
                ->with('all_product', $all_product)
                ->with('tagCategory', $tagCategory)
                ->with('tagPrice', $tagPrice)
                ->with('tagParent', $tagParent)
                ->with('top_selling', $top_selling);

    }

    public function store()
    {
        // Đăng nhập thành công -> tồn tại $user_id -> dùng user_id này để lấy thông tin của người dùng
            $user_id = Session::get('user_id');
            $infor_user = DB::table('tbl_user')->where('id', $user_id)->get();
            $all_category = DB::table('tbl_category')->where('category_status', '1')->get();

            $all_menu = DB::table('tbl_menu')->where('show_on_home', '1')->get();

            $all_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where('show_on_home', '1')
                ->orderby('id', 'desc')
                ->limit(9)
                ->get();

            $top_selling = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where('top_selling', '>', '3')
                ->orderby('id', 'desc')
                // ->limit(5)
                ->get();

            return view('pages.store')
                ->with('all_menu', $all_menu)
                ->with('infor_user', $infor_user)
                ->with('all_category', $all_category)
                ->with('all_product', $all_product)
                ->with('top_selling', $top_selling);

    }

    public function product($id)
    {
        // Đăng nhập thành công -> tồn tại $user_id -> dùng user_id này để lấy thông tin của người dùng
            $user_id = Session::get('user_id');
            $infor_user = DB::table('tbl_user')
                ->where('id', $user_id)
                ->get();
            $all_category = DB::table('tbl_category')
                ->where('category_status', '1')
                ->get();

            $all_menu = DB::table('tbl_menu')
                ->where('show_on_home', '1')
                ->get();

            $all_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where('id', $id)
                ->orderby('id', 'desc')
                ->get();

            $more_image = DB::table('tbl_product')
                ->join('tbl_more_image','tbl_more_image.product_id','=','tbl_product.id')
                ->where('product_id',$id)
                ->get();

            $infor_config_product = DB::table('tbl_infor_config_product')
                ->where('id_infor_config_product',$id)
                ->orderby('id','desc')
                ->get();

            $top_selling = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where('top_selling', '>', '3')
                ->orderby('id', 'desc')
                ->get();

            $related_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->inRandomOrder()->paginate(4);

            $feedback = DB::table('tbl_feedback')
                ->where('rating', '>=', '1')
                ->orderby('rating', 'desc')
                ->limit(4)
                ->get();

            $totalFeedback = DB::table('tbl_feedback')->count();
            return view('pages.product')->with('all_menu', $all_menu)
                    ->with('infor_user', $infor_user)
                    ->with('all_category', $all_category)
                    ->with('all_product', $all_product)
                    ->with('top_selling', $top_selling)
                    ->with('more_image',$more_image)
                    ->with('feedback',$feedback)
                    ->with('totalFeedback',$totalFeedback)
                    ->with('related_product',$related_product)
                    ->with('infor_config_product',$infor_config_product);


    }

    public function checkout(Request $request)
    {
        // Đăng nhập thành công -> tồn tại $user_id -> dùng user_id này để lấy thông tin của người dùng
            $user_id = Session::get('user_id');
            $infor_user = DB::table('tbl_user')
                ->where('id', $user_id)
                ->get();

            $all_category = DB::table('tbl_category')
                ->where('category_status', '1')
                ->get();

            $all_menu = DB::table('tbl_menu')
                ->where('show_on_home', '1')
                ->get();

            $all_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.cate_id')
                ->where('show_on_home', '1')
                ->orderby('id', 'desc')
                ->get();

            return view('pages.checkout')
                ->with('all_menu', $all_menu)
                ->with('infor_user', $infor_user)
                ->with('all_category', $all_category)
                ->with('all_product', $all_product);
    }

    public function get_contact() {
        return view('mails.contact');
    }

    public function post_contact(Request $request) {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['rating'] = $request->rating;
        $data['content'] = $request->content;
        DB::table('tbl_feedback')->insert($data);
        Mail::send('mails.contact', $data, function ($message) {
            $message->from('phamtrungky19032000@gmail.com','Trung Kỳ');
            $message->sender('phamtrungky19032000@gmail.com','Trung Kỳ');
            $message->to('phamtrungky012345@gmail.com', 'Kenneth');
            $message->cc('phamtrungky19032000@gmail.com','Kenneth');
            $message->bcc('phamtrungky19032000@gmail.com','Kenneth');
            $message->replyTo('phamtrungky012345@gmail.com', 'replyTo');
            $message->subject('Feedback'.'');
            $message->priority(3);
            // $message->attach('pathToFile');
        });
        echo "<script> alert('Cảm ơn bạn đã đánh giá và phản hồi ! Chúc quý khách một ngày làm việc hiệu quả !');
        </script>";
        return redirect()->back();
    }
    public function slide()
    {
        $user_id = Session::get('user_id');
        $all_menu = DB::table('tbl_menu')->get();
        $infor_user = DB::table('tbl_user')->where('id',$user_id)->get();
        $all_category = DB::table('tbl_category')->get();

        return view('pages.presentation')
                ->with('all_menu', $all_menu)
                ->with('infor_user', $infor_user)
                ->with('all_category', $all_category);
    }

    public function terms_conditions() {
        return view('pages.term_condition');
    }
    public function security(){
        return view('pages.security');
    }
}
