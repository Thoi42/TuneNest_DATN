<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPostCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProductCategoryController;
use App\Http\Controllers\Admin\UploadCKImageController;
use App\Http\Controllers\Ajax\AjaxDashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductShowroomController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomerAuth;
use App\Http\Controllers\User\FavouriteController;

// ROUTES CỦA KHÁCH HÀNG
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{slug}', [ProductController::class, 'category'])->name('shop.category');
Route::get('/product/{product_slug}', [ProductController::class, 'product_details'])->name('product.detail');
Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
Route::get('/cart', [OrderController::class, 'index'])->name('cart.index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/product/{proId}/comment', [ProductController::class, 'post_comment'])->name('product.comment');


// AJAX
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');
    Route::post('/discount', [CartController::class, 'discount'])->name('cart.discount');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// THANH TOÁN
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/online', [CheckoutController::class, 'onlineCheckout'])->name('checkout.online');
    Route::get('vnpay-return', [CheckoutController::class, 'vnpay_return'])->name('vnpay.return');
    Route::get('momo-return', [CheckoutController::class, 'momo_return'])->name('momo.return');
    Route::get('/completed', [CheckoutController::class, 'order_completed'])->name('checkout.completed');
    Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('checkout.verify');
});

// TIN TỨC
Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.page');
    Route::get('/detail/{slug}', [PostController::class, 'detail'])->name('post.detail');
    Route::get('/category/{slug}', [PostController::class, 'category'])->name('post.category');
    Route::get('/category/all/{slug}', [PostController::class, 'categoryAll'])->name('post.category.all');
});

// USER AUTHENTICATION
Route::post('/do-login', [CustomerController::class, 'dologin'])->name('customer.dologin');
Route::get('/verify-account/{email}', [CustomerController::class, 'verify'])->name('customer.verify');
Route::post('/register', [CustomerController::class, 'check_register'])->name('customer.check_register');
Route::get('/forgot', [CustomerController::class, 'forgot'])->name('customer.forgot');
Route::post('/forgot', [CustomerController::class, 'check_forgot'])->name('customer.check_forgot');
Route::get('/reset-password/{token}', [CustomerController::class, 'reset_password'])->name('customer.reset_password');
Route::post('/reset-password/{token}', [CustomerController::class, 'check_reset_password'])->name('customer.check_reset_password');
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

// USER AUTHENTICATION ROUTES REQUIRING AUTH
Route::middleware(CustomerAuth::class)->group(function () {
    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/account-detail', [CustomerController::class, 'account_detail'])->name('customer.account_detail');
    Route::post('/account-detail', [CustomerController::class, 'check_account_detail'])->name('customer.check_account_detail');
    Route::get('/change-password', [CustomerController::class, 'change_password'])->name('customer.change_password');
    Route::post('/change-password', [CustomerController::class, 'check_change_password']);
    Route::get('/orders', [CustomerController::class, 'customerOrder'])->name('customer.orders');
    Route::get('/orders/history', [CustomerController::class, 'customerOrderHistory'])->name('customer.orders.history');
    Route::post('/orders/cancel', [CustomerController::class, 'customerOrderCancel'])->name('customer.orders.cancel');
    Route::get('/orders/{id}', [CustomerController::class, 'customerOrderDetail'])->name('customer.orders.detail');
});

// WISHLIST
Route::prefix('wishlist')->group(function () {
    Route::get('/', [FavouriteController::class, 'index'])->name('wishlist.index');
    Route::post('/add/{id}', [FavouriteController::class, 'add'])->name('wishlist.add');
    Route::delete('/remove/{id}', [FavouriteController::class, 'remove'])->name('wishlist.remove');
});

// ROUTES ADMIN
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login'])->name('admin.check_login');

Route::middleware(['AdminAuth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // ORDER ROUTES
    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('order.index');
        Route::get('/pending', [AdminOrderController::class, 'OrderPending'])->name('order.pending');
        Route::get('/detail/{id}', [AdminOrderController::class, 'show'])->name('order.show');
        Route::put('/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
    });

    // POST CATEGORY
    Route::prefix('post')->group(function () {
        Route::get('category', [AdminPostCategoryController::class, 'index'])->name('postCategory.index');
        Route::get('category/deleted', [AdminPostCategoryController::class, 'deleted'])->name('postCategory.deleted');
        Route::get('category/search/{config}', [AdminPostCategoryController::class, 'search'])->name('postCategory.search');
        Route::get('category/create', [AdminPostCategoryController::class, 'create'])->name('postCategory.create');
        Route::post('category/store', [AdminPostCategoryController::class, 'store'])->name('postCategory.store');
        Route::get('category/edit/{slug}', [AdminPostCategoryController::class, 'edit'])->name('postCategory.edit');
        Route::post('category/update/{slug}', [AdminPostCategoryController::class, 'update'])->name('postCategory.update');
        Route::delete('category/destroy/{id}', [AdminPostCategoryController::class, 'destroy'])->name('postCategory.destroy');
        Route::get('category/restore/{id}', [AdminPostCategoryController::class, 'restore'])->name('postCategory.restore');
        Route::delete('category/forceDelete/{id}', [AdminPostCategoryController::class, 'forceDelete'])->name('postCategory.forceDelete');
    });

    // SHOWROOM ROUTES
    Route::prefix('showroom')->group(function () {
        Route::get('create', [ShowroomController::class, 'create'])->name('showroom.create');
        Route::post('store', [ShowroomController::class, 'store'])->name('showroom.store');
        Route::get('category', [ShowroomController::class, 'index'])->name('showroomcategory.index');
        Route::get('category/deleted', [ShowroomController::class, 'deleted'])->name('showroomcategory.deleted');
        Route::get('edit/{id}', [ShowroomController::class, 'edit'])->name('showroom.edit');
        Route::put('{id}', [ShowroomController::class, 'update'])->name('showroom.update');
        Route::get('showroom/{id}/restore', [ShowroomController::class, 'restore'])->name('showroom.restore');
        Route::delete('showroom/{id}/force-delete', [ShowroomController::class, 'forceDelete'])->name('showroom.forceDelete');
        Route::delete('showroom/{id}', [ShowroomController::class, 'destroy'])->name('showroom.destroy');
    });
    
    // VOUCHER ROUTES
    Route::prefix('voucher')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('admin.discounts.index');
        Route::get('/create', [DiscountController::class, 'create'])->name('admin.discounts.create');
        Route::post('/', [DiscountController::class, 'store'])->name('admin.discounts.store');
        Route::get('/{discount}/edit', [DiscountController::class, 'edit'])->name('admin.discounts.edit');
        Route::put('/{discount}', [DiscountController::class, 'update'])->name('admin.discounts.update');
        Route::delete('/{discount}', [DiscountController::class, 'destroy'])->name('admin.discounts.destroy');
    });
});
