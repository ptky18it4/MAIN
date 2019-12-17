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
        public function submitFormCheckout() {

            if(isset($_POST['cart-content']))
            {
                $data = $_POST['cart-content'];

                echo '<pre>'; 
                print_r(explode('-',$data));
                print_r('</br>');  
                echo '</pre>';
                $result = [];

                foreach (explode('|', $data) as $item) {
                    list($k,$v) = explode('=', $item);
                    $result[$k] = trim($v, '"'); 
                }

                $result = (object) $result;  
                echo '<pre>';
                print_r($result->price0);
                echo '</pre>';
            }
               
        }
}
