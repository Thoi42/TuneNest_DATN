<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\Ajax\AjaxDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{product_slug}',[ProductController::class,'product_details'])->name('shop.product.details');
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/register', [UserController::class, 'register'])->name('user.register');

Route::get('/cart', [OrderController::class, 'index'])->name('cart.index');

// AJAX
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    //Showroom
    Route::prefix('showroom')->group(function () {
        Route::get('create', [ShowroomController::class, 'create'])->name('showroom.create'); // Route mới
        Route::post('store', [ShowroomController::class, 'store'])->name('showroom.store'); // Route mới
        Route::get('category', [ShowroomController::class,'index'])->name('showroomcategory.index');
        Route::get('edit/{id}', [ShowroomController::class, 'edit'])->name('showroom.edit'); // Route để sửa
        Route::put('{id}', [ShowroomController::class, 'update'])->name('showroom.update'); // Route để cập nhật
        Route::put('toggle-publish/{id}', [ShowroomController::class, 'togglePublish'])->name('showroom.togglePublish'); // Route mới
    });
    //Banner
    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'create'])->name('showroom.create'); // Route mới
        
    });
    // POST CATEGORY
    Route::prefix('post')->group(function () {
        
        Route::get('category', [PostCategoryController::class,'index'])->name('postCatagory.index');
    });
    
});