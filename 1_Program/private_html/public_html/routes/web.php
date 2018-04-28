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

Route::get('/A', function () {
    return view('welcome');
});


// Route::get('/index', function () {
//     return "<center><h1> Hello </h1></center>";
// });

//Main Login
// Route::get('/LL', function(){
//     $members=member::all();
//     return $members;
// });

route::get('/LL', function(){
  $result=DB::select("select * from members ");
  return $result;
});

//main Login
Route::get('/','MemberController@MemberLogin');
Route::get('/login','MemberController@MemberLogin');


//register
route::get('/register','MemberController@register');
route::post('/register2','MemberController@register2');
//register

//route::get('/home','MemberController@Home');
//user
route::get('/home/{username}','MemberController@Home');


//Login
route::post('/login2','MemberController@login2');
//Login

//logout
route::get('/logout','MemberController@logout');
//logout

//order view
Route::get('order/view/{id}','AdminOrderController@view');
//order view

//user
Route::get('home/{username}/price_date','PriceDateController@Price');



/////////////////////////////////////////////////////////////////////////////

//admin
Route::get('admin','AdminController@index');
Route::post('admin/login','AdminController@login');
Route::get('admin/home','AdminController@home');

//รับซื้อ
Route::get('admin/buy','AdminBuyController@index');
Route::get('admin/addbill/type1','AdminBuyController@type1');
Route::get('admin/basket_insert/{id}','AdminProductController@basketInsert');

Route::get('admin/basket','AdminProductController@basket');
Route::post('admin/basket_cal','AdminProductController@basketCal');

Route::post('admin/order/insert','AdminProductController@orderInsert');



//รายการใบสั่งซื้อ
Route::get('admin/order','AdminOrderController@order_view'); //รายการใบสั่งซื้อ
Route::get('admin/order/view/{id}','AdminOrderController@view'); //แสดง ใบสั่งซื้อ
Route::get('admin/order/delete/{id}','AdminOrderController@delete'); //ลบ ใบสั่งซื้อ

//สินค้า
Route::get('admin/product','AdminProductController@index'); // แสดงสินค้า
Route::get('admin/product/update/{id}','AdminProductController@update'); // update สินค้า
Route::post('admin/product/update2','AdminProductController@update2');
Route::get('admin/product/delete/{id}','AdminProductController@delete');

//แก้ไข,ลบ ประเภทสินค้า
Route::get('admin/type','AdminTypeController@type');
Route::get('admin/type/update/{id}','AdminTypeController@update');
Route::post('admin/type/update2','AdminTypeController@update2');
Route::get('admin/type/delete/{id}','AdmintypeController@delete');

//เพิ่มประเภท สินค้า
Route::get('admin/type/insert','AdmintypeController@insert');
Route::post('admin/type/insert2','AdmintypeController@insert2');

//เพิ่มสินค้า
Route::get('admin/product/insert','AdminProductController@insert');
Route::post('admin/product/insert2','AdminProductController@insert2');




//admin Logout
route::get('admin/logout','AdminController@logout');
