<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/ar',[HomeController::class,'index'])->name('home_ar');
Route::get('/pages_empty',[HomeController::class,'pages_empty'])->name('pages_empty');
Route::get('/search_products',[HomeController::class,'search_products'])->name('search_products');
Route::get('/product',[HomeController::class,'product'])->name('product');

Route::post('updateCountAndProice',[HomeController::class,'updateCountAndProice'])->name('updateCountAndProice');


Route::get('/shop',[HomeController::class,'shop'])->name('shop');
Route::get('/shop/{id}',[HomeController::class,'shop_show'])->name('shop_show');
Route::get('/aboutUsFor',[HomeController::class,'aboutUs'])->name('aboutUsFor');
Route::get('/contact-us',[HomeController::class,'contact_us'])->name('contact-us');
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/blog/{id}',[HomeController::class,'blog_show'])->name('blog_show');
Route::get('/product/{id}',[HomeController::class,'product_show'])->name('product_show');
Route::get('getInformation/{pages}',[HomeController::class,'getInformation'])->name('getInformation');

Route::post('cart.update',[HomeController::class,'cart_update'])->name('cart.update');
Route::post('addToCart',[HomeController::class,'addToCart'])->name('addToCart');
Route::post('DeletedCart',[HomeController::class,'DeletedCart'])->name('DeletedCart');

Route::post('addToWishlist',[HomeController::class,'addToWishlist'])->name('addToWishlist');
Route::post('DeletedCartWishlist',[HomeController::class,'DeletedCartWishlist'])->name('DeletedCartWishlist');



Route::post('createNewOrders',[HomeController::class,'createNewOrders'])->name('createNewOrders');


Route::get('shoppingCart',[HomeController::class,'shoppingCart'])->name('shoppingCart');
Route::get('checkoutDetails',[HomeController::class,'checkoutDetails'])->name('checkoutDetails');

Route::middleware('auth')->group(function (){
   Route::get('/account-dashboard',[HomeController::class,'account_dashboard'])->name('account-dashboard');
   Route::get('getOrders',[HomeController::class,'getOrders'])->name('getOrders');
   Route::get('getOrder/{id}',[HomeController::class,'getOrder'])->name('getOrder');
});

