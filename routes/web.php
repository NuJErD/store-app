<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;


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

Route::get('/', function () {
    return redirect('store');
});
Route::resource('items',ItemsController::class);
Route::resource('register',registerController::class);
Route::resource('store',StoreController::class);
Route::resource('login',LoginController::class);
Route::resource('orders',OrderController::class);
Route::resource('cart',CartController::class);
Route::resource('checkout',CheckoutController::class);
Route::resource('myorder',MyOrderController::class);
Route::resource('user',UserController::class);
Route::resource('brand',BrandController::class);
Route::resource('checkout',CheckoutController::class);




// Route::get('/edit/{id}',[ItemsController::class,'edit'])->name('edit');
Route::get('/modal/{id?}',[ItemsController::class,'ItemJS'],)->name('modal');
Route::get('/additems',[ItemsController::class,'addindex'],)->name('indexadditems');
Route::get('/resetpw',[LoginController::class,'viewresetpw'],)->name('resetpw');
Route::get('/cartget',[OrderController::class,'CartJS'],)->name('cart');
Route::post('/login/cf',[LoginController::class,'login'])->name('logincheck');
Route::put('/order/{order}',[OrderController::class,'update'])->name('orderup');
Route::put('/orderup2/{order}',[OrderController::class,'updatecart']);
Route::put('/cf_order/{order}',[MyOrderController::class,'cf_order']);
Route::put('/track/{order}',[OrderController::class,'addtrack'])->name('addtrack');
Route::get('/logout/',[LoginController::class,'logout'])->name('logout');
Route::get('/shop',[StoreController::class,'shopindex'])->name('shop');
Route::get('/store/detail',[StoreController::class,'itemDetail'])->name('detail');
Route::get('/getdetail/{id?}',[MyOrderController::class,'getorder_detail']);
Route::get('/test',[StoreController::class,'test'])->name('test');
Route::get('/search/{order?}',[StoreController::class,'search']);
Route::get('/searchorder/{search?}',[OrderController::class,'searchorder']);
Route::get('/checkpw/{pw?}',[UserController::class,'checkpw']);
Route::post('/newpw',[UserController::class,'newpw']);
Route::post('/deletepic',[UserController::class,'deletepic']);
Route::put('/editpic/{user}',[UserController::class,'editpic'])->name('editpic');
Route::get('/checkuser',[registerController::class,'checkusername']);

Route::get('/ordersuccess',[MyOrderController::class,'ordersuccess'])->name('ordersuccess');

//Route::get('/editpro',[UserController::class,'edit'])->name('editpro');


Route::get('/test2',[ItemsController::class,'index2'],)->name('index2');




Route::get('/addbrand',function (){
  return view('items.addbrand');
})->name('addbrand');

//Route::get('/shop',function (){
  //  return view('store.customer');
//})->name('CusStore');

