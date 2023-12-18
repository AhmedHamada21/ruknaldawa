<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/updatedSetting', [AdminController::class, 'updatedSetting'])->name('updatedSetting');
    Route::get('aboutUs', [AdminController::class, 'aboutUs'])->name('aboutUs');
    Route::post('/UpdatedAboutUs', [AdminController::class, 'updatedAboutUs'])->name('updatedaboutUs');

    Route::resource('sliders', SliderController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('order', OrderController::class);
    Route::get('/users', [AdminController::class, 'users'])->name('users');

    Route::get('page/{page}',[AdminController::class,'page_update'])->name('page_update');
    Route::post('updatePage',[AdminController::class,'updatePage'])->name('updatePage');

});




