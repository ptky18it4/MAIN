<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Prefix User manager
$prefix_user  = config('thinkpad.url.prefix.user');
$prefix_homeCtrl = 'HomeController@';
Route::group(['prefix' => $prefix_user], function () use($prefix_homeCtrl) {
    //Front - end
    Route::get('/', $prefix_homeCtrl.'index');
    Route::get('home', $prefix_homeCtrl.'index');
    Route::get('checkout', $prefix_homeCtrl.'checkout');
    Route::get('store', $prefix_homeCtrl.'store');
    Route::get('product-{id}', $prefix_homeCtrl.'product');
    Route::get('regular', $prefix_homeCtrl.'regular');
    Route::get('category', $prefix_homeCtrl.'category');
    Route::post('update-infor-user/{user_id}', $prefix_homeCtrl.'update_infor_user');

    Route::post('login',$prefix_homeCtrl.'login');
    Route::post('register',$prefix_homeCtrl.'register');
    Route::get('logout', $prefix_homeCtrl.'log_out');

    //Search
    Route::get('search', $prefix_homeCtrl.'search','update_infor_user');
});

// Admin manager 
$prefix_admin = config('thinkpad.url.prefix_admin');

Route::group(['prefix' => $prefix_admin], function () {
    Route::get('/', 'AdminController@login');
    Route::post('proc-admin-login', 'AdminController@processor_admin_login');
    Route::get('dashboard', 'AdminController@show_dashboard');
    Route::get('register', 'AdminController@admin_register');
    Route::post('proc-register', 'AdminController@processor_register');
    Route::get('logout', 'AdminController@log_out');
});



$prefix_categories = config('thinkpad.url.prefix_categories');
Route::group(['prefix' => $prefix_categories], function () {
    //Add
    Route::get('category', 'CatalogController@all_category'); // quy luật đặt trên function( hàm ) chỉ được dùng dấu _
    Route::get('add-category', 'CatalogController@add_category'); // quy luật đặt trên function( hàm ) chỉ được dùng dấu _
    //Edit
    Route::get('edit-category/{category_id}', 'CatalogController@edit_category');
    //Delete
    Route::get('delete-category/{category_id}', 'CatalogController@delete_category');
    //Update
    Route::post('update-category/{category_id}', 'CatalogController@update_category');
    //All
    Route::get('all-category', 'CatalogController@all_category');
    
    Route::get('active-category/{category_id}', 'CatalogController@active_category');
    Route::get('unactive-category/{category_id}', 'CatalogController@unactive_category');
    
    Route::post('save-category', 'CatalogController@save_category');
});


//Product
$prefix_products = config('thinkpad.url.prefix_products');
Route::group(['prefix' => $prefix_products], function () {
    Route::get('product', 'ProductController@all_product'); // quy luật đặt trên function( hàm ) chỉ được dùng dấu _
    //Product
    Route::get('add-product', 'ProductController@add_product');
    //Edit product
    Route::get('edit-product/{product_id}', 'ProductController@edit_product');
    //Delete
    Route::get('delete-product/{product_id}', 'ProductController@delete_product');
    //Update
    Route::post('update-product/{product_id}', 'ProductController@update_product');
    //All
    Route::get('all-product', 'ProductController@all_product');
    //Active and Unactive
    Route::get('active-product/{product_id}', 'ProductController@active_product');
    Route::get('unactive-product/{product_id}', 'ProductController@unactive_product');
    Route::get('active-show/{product_id}', 'ProductController@active_show');
    Route::get('unactive-show/{product_id}', 'ProductController@unactive_show');
    Route::post('save-product', 'ProductController@save_product');
});

Route::get('contact', 'HomeController@get_contact');
Route::post('contact', 'HomeController@post_contact');
// Route::post('checkout/ajax', 'HomeController@ajax');
// Route::post('save-cart', 'CartController@save_cart');