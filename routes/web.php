<?php

use App\Http\Controllers\Admin\CatogryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/layout', function () {
//         return view('front.pages.index');
//     });
// Route::get('/',function () {
//     return view('front.pages.index');
// });

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home',[HomeController::class,'redirect'])->name("home");
    //user products
    Route::get('/allproducts',[FrontProductController::class,'index'])->name('products.index');
    Route::get('/product/{id}',[FrontProductController::class,'show'])->name('front_product.show');
    Route::get('/products',[FrontProductController::class,'search'])->name('product.search');

    Route::get('/catogry/{id}',[HomeController::class,'catogry'])->name('catogry.index');
    //admin products
    Route::resource('/admin_catogry', CatogryController::class);
    Route::resource('/admin_product', ProductController::class);

    //carts
    Route::get('/create_cart/{id}',[CartController::class,'create'])->name('cart.create');
    Route::post('/sotre_cart/{id}',[CartController::class,'store'])->name('cart.store');
    Route::get('/show_cart',[CartController::class,'show'])->name('cart.show');
    Route::delete('/delete_cart/{id}',[CartController::class,'destroy'])->name('cart.destroy');

    //order

    Route::get('/user_orders',[OrderController::class,'index'])->name('order.index');
    Route::delete('/user_order/{id}',[OrderController::class,'cancelorder'])->name('order.destroy');
    Route::get('/order_cash',[OrderController::class,'cash'])->name('order.cash');
    Route::get('/stripe/{totalprice}',[OrderController::class,'stripe'])->name('stripe');
    Route::post('stripe/{totalprice}', [OrderController::class,'stripestore'])->name('stripe.post');

    //order admin

    Route::get('/orders',[AdminOrderController::class,'index'])->name('admin_order.index');
    Route::get('/order_status/{id}',[AdminOrderController::class,'order_status'])->name('admin.order_status');
    Route::get('/order_pdf/{id}',[AdminOrderController::class,'printpdf'])->name('admin.printpdf');
    Route::get('/send_mail/{id}',[AdminOrderController::class,'sendmail'])->name('admin.notification');
    Route::post('/store_mail/{id}',[AdminOrderController::class,'storemail'])->name('admin.storemail');
    Route::get('/order_search',[AdminOrderController::class,'search'])->name('order.search');


});

//home page

Route::get('/',[HomeController::class,'index']);


// sign with google

Route::get('/auth/google',[HomeController::class,'googlepage'])->name('google.page');
Route::get('/auth/google/callback',[HomeController::class,'googlecallback'])->name('google.callback');

