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
        public function checkout(Request $request) {
            $name = $request->name;
            echo '<pre>';
            print_r($name);
            echo '</pre>';    
        }
}
