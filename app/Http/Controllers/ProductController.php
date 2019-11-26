<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  // trả về trang j đó (khi thành công hoặc thất bại)
session_start();
class ProductController extends Controller
{
    private $pathViewControllerProduct = 'admin.catalogs.products.';
    private $RedirectProduct = 'admin/catalogs/products/';
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
    public function add_product()
    {
        $this->AuthenticLogin();
        $category = DB::table('tbl_category')->orderby('category_name','asc')->get(); // Lấy dữ liệu trong bảng tbl_category
        return view($this->pathViewControllerProduct.'add_product')->with('category_name',$category);
        return view($this->pathViewControllerProduct.'all_product')->with('category_name',$category);
    }

    public function all_product()
    {
        $this->AuthenticLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.cate_id') // Lấy ra tên danh mục sản phâ
        ->orderby('tbl_product.id','desc')->get();
        $manager_product = view($this->pathViewControllerProduct.'all_product')->with('all_product', $all_product);
        return view('admin_layout')->with($this->pathViewControllerProduct.'all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthenticLogin();
        $data = array();
        $data['name'] = $request->product_name;
        $data['cate_id'] = $request->product_category;
        $data['description'] = $request->product_description;
        $data['image'] = $request->product_image;
        $data['show_on_home'] = $request->show_on_home;
        $data['price'] = $request->product_price;
        // $data['promotion_price'] = $request->product_promotion_price;
        $data['vat'] = $request->product_vat;
        $data['quantity'] = $request->product_quantity;
        $data['content'] = $request->product_meta_tag_title;
        $data['meta_tag_title'] = $request->product_meta_tag_title;
        $data['meta_tag_description'] = $request->product_meta_tag_description;
        $data['meta_tag_keywords'] = $request->product_meta_tag_keywords;
        $data['status'] = $request->product_status;
        $data['tags'] = $request->product_tags;
        $get_image= $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //Lấy tên ảnh + phần mở rộng
            // echo $get_name_image;
            $name_image = current(explode('.',$get_name_image)); // chỉ lấy tên ảnh ( bắt bỏ phần đuôi)
            // echo $name_image;
            $new_image ='thum-'.$name_image.'-'.rand(0,99).'-'.date("Ymd").'.'.$get_image->getClientOriginalExtension(); // Lấy lên file + phần random + phần đuôi mở rộng
            // echo $new_image;
            $get_image->move('public/uploads/product/more_image/',$new_image);  
            $data['image'] = $new_image;
        }
        // /**
        //  * categogy_name : tên của một trong cở sở dữ liệu
        //  * categogy_product_name : tên của phần name bên add_categogy_product.blade.php
        //  * Tương tự các $data['....'] nhé
        //  * Rồi, bây giờ in ra để xem đã lấy được từ bên form qua chưa nè
        //  */


        //Lưu dữ liệu tag 1
        DB::table('tbl_product')->insert($data);

        // Lấy ra id của sản phẩm vừa được tạo ra để tiếp tục thêm thông tin chi tiết của sản phẩm ấy vào 
        $get_id = DB::table('tbl_product')->where('id', DB::raw("(select max(`id`) from tbl_product)"))->get();
        $result_id = $get_id[0]->id;
        echo $result_id;
        $infor_config = array();
        //  PRICESSER
        $infor_config['id_infor_config_product'] = $result_id;
        $infor_config['CPU_technology'] = $request->cpu_technology;
        $infor_config['CPU_types'] = $request->cpu_types;
        $infor_config['CPU_speed'] = $request->cpu_speed;
        $infor_config['CPU_caching'] = $request->cpu_caching;
        $infor_config['Maximum_speed_Turbo'] = $request->maximum_speed_turbo;

        // RAM , HARD RIVE
        $infor_config['RAM_memory'] = $request->ram_memory;
        $infor_config['RAM_types'] = $request->ram_types;
        $infor_config['Speed​_Bus'] = $request->speed_bus;
        $infor_config['Hard_Drive'] = $request->hard_drive;

        // SCREEN
        $infor_config['Size_Screen'] = $request->size_screen;
        $infor_config['Resolution_W_x_H'] = $request->resolution_w_h;
        $infor_config['Technology_MH'] = $request->technology_mh;
        $infor_config['Touch_screen'] = $request->touch_screen;
        // GRAPHICS CARD
        $infor_config['Graphics_card'] = $request->graphics_card;
        $infor_config['Card_memory'] = $request->card_memory;
        $infor_config['Card_design'] = $request->card_design;
        $infor_config['Technology_Audio'] = $request->technology_audio;
        //PIN / BATTERY
        $infor_config['Pin_battery'] = $request->pin_battery;
        $infor_config['Time_used_often'] = $request->time_used_often;
        $infor_config['Charger'] = $request->charger;
        $infor_config['Dimensions_L_W_H'] = $request->dimensions;
        $infor_config['Weight'] = $request->weight;
        //OTHER
        $infor_config['Gateway'] = $request->gateway;
        $infor_config['Resolution_webcam'] = $request->resolution_webcam;
        DB::table('tbl_infor_config_product')->insert($infor_config);
        // ========================================================================
        $img = array();
        for($i = 0; $i<5; ++$i){
        $image[$i] = $request->file('product_detail'.$i);
        $img['item'] = $request->item.$i;
        $img['product_id'] = $result_id;


        $get_input[$i] = $image[$i]->getClientOriginalName();
        $get_name[$i] = current(explode('.',$get_input[$i]));
        $create_name[$i] = 'thumb-thinkpad-'.$get_name[$i].'-'.date("Ymd").'.'.$image[$i]->getClientOriginalExtension();
        $image[$i]->move('public/uploads/product/more_image',$create_name[$i]);
        
        $img['image'] = $create_name[$i];
        // echo '<pre>';
        // // print_r($img);
        // echo var_dump($img);
        // echo '</pre>';
        DB::table('tbl_more_image')->insert($img);
    }
        return Redirect::to($this->RedirectProduct.'all-product');
    }

    public function active_product($product_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_product')->where('id', $product_id)->update(['status' => 0]);
        Session::put('message', 'Unactive success !');
        return Redirect::to($this->RedirectProduct.'all-product');
    }
    public function unactive_product($product_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_product')->where('id', $product_id)->update(['status' => 1]);
        Session::put('message', 'Active success ! ');
        return Redirect::to($this->RedirectProduct.'all-product');
    }
    public function active_show($product_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_product')->where('id', $product_id)->update(['show_on_home' => 0]);
        Session::put('message', 'Unactive success !');
        return Redirect::to($this->RedirectProduct.'all-product');
    }
    public function unactive_show($product_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_product')->where('id', $product_id)->update(['show_on_home' => 1]);
        Session::put('message', 'Active success ! ');
        return Redirect::to($this->RedirectProduct.'all-product');
    }
    public function edit_product($product_id)
    {
        $this->AuthenticLogin();
        $cate_pro = DB::table('tbl_category')->orderby('tbl_category.category_id','desc')->get() ;
        $edit_product = DB::table('tbl_product')->where('id',$product_id)->get();
        $edit_config = DB::table('tbl_infor_config_product')->where('id_infor_config_product',$product_id)->get();
        $edit_image = DB::table('tbl_more_image')->where('product_id',$product_id)->get();
        $manager_product = view($this->pathViewControllerProduct.'edit_product')
        ->with('cate_pro',$cate_pro)
        ->with('edit_product', $edit_product)
        ->with('edit_config',$edit_config)
        ->with('edit_image',$edit_image);
        return view('admin_layout')->with($this->pathViewControllerProduct.'edit_product', $manager_product);
}

    public function delete_product($product_id)
    {
        $this->AuthenticLogin();
        DB::table('tbl_product')->where('id',$product_id)->delete();
        DB::table('tbl_infor_config_product')->where('id_infor_config_product',$product_id)->delete();
        DB::table('tbl_more_image')->where('product_id',$product_id)->delete();
        Session::put('message','Delete product success !');
        return Redirect::to($this->RedirectProduct.'all-product');   
     }

     public function update_product(Request $request, $product_id)
     {
         $this->AuthenticLogin();
         $data = array();
         $data['name'] = $request->product_name;
         $data['cate_id'] = $request->product_category;
         $data['description'] = $request->product_description;
         $data['image'] = $request->product_image;
         $data['show_on_home'] = $request->show_on_home;
         $data['price'] = $request->product_price;
        //  $data['promotion_price'] = $request->product_promotion_price;
         $data['vat'] = $request->product_vat;
         $data['quantity'] = $request->product_quantity;
         $data['content'] = $request->product_meta_tag_title;
         $data['meta_tag_title'] = $request->product_meta_tag_title;
         $data['meta_tag_description'] = $request->product_meta_tag_description;
         $data['meta_tag_keywords'] = $request->product_meta_tag_keywords;
         $data['status'] = $request->product_status;
         $data['tags'] = $request->product_tags;
         $get_image= $request->file('product_image');
         if($get_image){
             $get_name_image = $get_image->getClientOriginalName(); //Lấy tên ảnh + phần mở rộng
             // echo $get_name_image;
             $name_image = current(explode('.',$get_name_image)); // chỉ lấy tên ảnh ( bắt bỏ phần đuôi)
             // echo $name_image;
             $new_image ='thum-'.$name_image.'-'.rand(0,99).'-'.date("Ymd").'.'.$get_image->getClientOriginalExtension(); // Lấy lên file + phần random + phần đuôi mở rộng
             // echo $new_image;
             $get_image->move('public/uploads/product/more_image/',$new_image);
             $data['image'] = $new_image;
         }
         // /**
         //  * categogy_name : tên của một trong cở sở dữ liệu
         //  * categogy_product_name : tên của phần name bên add_categogy_product.blade.php
         //  * Tương tự các $data['....'] nhé
         //  * Rồi, bây giờ in ra để xem đã lấy được từ bên form qua chưa nè
         //  */
 
 
         //Lưu dữ liệu tag 1
         DB::table('tbl_product')->where('id',$product_id)->update($data);

          // ================================UPDATE CONFIGURE ========================================

         // Lấy ra id của sản phẩm vừa được tạo ra để tiếp tục thêm thông tin chi tiết của sản phẩm ấy vào 
        //  $get_id = DB::table('tbl_product')->where('id', DB::raw("(select max(`id`) from tbl_product)"))->get();
        //  $result_id = $get_id[0]->id;
        //  echo $result_id;
         $infor_config = array();
         //  PRICESSER
         $infor_config['id_infor_config_product'] = $product_id;
         $infor_config['CPU_technology'] = $request->cpu_technology;
         $infor_config['CPU_types'] = $request->cpu_types;
         $infor_config['CPU_speed'] = $request->cpu_speed;
         $infor_config['CPU_caching'] = $request->cpu_caching;
         $infor_config['Maximum_speed_Turbo'] = $request->maximum_speed_turbo;
 
         // RAM , HARD RIVE
         $infor_config['RAM_memory'] = $request->ram_memory;
         $infor_config['RAM_types'] = $request->ram_types;
         $infor_config['Speed​_Bus'] = $request->speed_bus;
         $infor_config['Hard_Drive'] = $request->hard_drive;
 
         // SCREEN
         $infor_config['Size_Screen'] = $request->size_screen;
         $infor_config['Resolution_W_x_H'] = $request->resolution_w_h;
         $infor_config['Technology_MH'] = $request->technology_mh;
         $infor_config['Touch_screen'] = $request->touch_screen;
         // GRAPHICS CARD
         $infor_config['Graphics_card'] = $request->graphics_card;
         $infor_config['Card_memory'] = $request->card_memory;
         $infor_config['Card_design'] = $request->card_design;
         $infor_config['Technology_Audio'] = $request->technology_audio;
         //PIN / BATTERY
         $infor_config['Pin_battery'] = $request->pin_battery;
         $infor_config['Time_used_often'] = $request->time_used_often;
         $infor_config['Charger'] = $request->charger;
         $infor_config['Dimensions_L_W_H'] = $request->dimensions;
         $infor_config['Weight'] = $request->weight;
         //OTHER
         $infor_config['Gateway'] = $request->gateway;
         $infor_config['Resolution_webcam'] = $request->resolution_webcam;
         DB::table('tbl_infor_config_product')->where('id_infor_config_product',$product_id)->update($infor_config);

         // ================================UPDATE IMAGE========================================
         $img = array();
         for($i = 0; $i < 5; ++$i)
         {
            $img['product_id'] = $product_id;
            $img['item'] = $request->item.$i;
            $image[$i] = $request->file('product_detail'.$i);    
            $get_input[$i] = $image[$i]->getClientOriginalName();
            $get_name[$i] = current(explode('.',$get_input[$i]));
            $create_name[$i] = 'thumb-thinkpad-'.$get_name[$i].'-'.date("Ymd").'.'.$image[$i]->getClientOriginalExtension();
            $image[$i]->move('public/uploads/product/more_image',$create_name[$i]);
            
            $img['image'] = $create_name[$i];
            
            echo '<pre>';
            print_r('Hinh '.$i.': '.$img['image']);
            echo '</pre>';
            DB::table('tbl_more_image')
            ->where([
                ['product_id', '=', $product_id],
                ['item', '=', $i],
                ])
                ->orderby('id','desc')
                ->update($img); 
            }
            return Redirect::to($this->RedirectProduct.'all-product');
    }
}