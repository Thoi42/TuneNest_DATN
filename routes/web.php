<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\DiscountController;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\UploadCKImageController;
>>>>>>> Stashed changes
use App\Http\Controllers\Ajax\AjaxDashboardController;
<<<<<<< Updated upstream
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductShowroomController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\FavouriteController;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\DiscountController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
<<<<<<< Updated upstream
Route::get('/shop/{product_slug}',[ProductController::class,'product_details'])->name('shop.product.details');
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::get('/cart', [OrderController::class, 'index'])->name('cart.index');

// AJAX
=======
Route::get('/product/{slug}', [ProductController::class, 'product_details'])->name('product.detail');
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');
    Route::post('/discount', [CartController::class, 'discount'])->name('cart.discount');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/online', [CheckoutController::class, 'onlineCheckout'])->name('checkout.online');
    Route::get('vnpay-return', [CheckoutController::class, 'vnpay_return'])->name('vnpay.return');
    Route::get('/completed', [CheckoutController::class, 'order_completed'])->name('checkout.completed');
    Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('checkout.verify');
});
// user;
Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/do-login', [CustomerController::class, 'dologin'])->name('customer.dologin');
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
Route::get('/orders', [CustomerController::class, 'customerOrder'])->name('customer.orders');
Route::get('/orders/history', [CustomerController::class, 'customerOrderHistory'])->name('customer.orders.history');
Route::post('/orders/cancel', [CustomerController::class, 'customerOrderCancel'])->name('customer.orders.cancel');
Route::get('/orders/{id}', [CustomerController::class, 'customerOrderDetail'])->name('customer.orders.detail');



>>>>>>> Stashed changes
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


    // POST CATEGORY
    Route::prefix('post')->group(function () {
<<<<<<< Updated upstream
        
        Route::get('category', [PostCategoryController::class,'index'])->name('postCatagory.index');

        Route::get('category/search', [PostCategoryController::class,'search'])->name('postCatagory.search');
        Route::get('category/create', [PostCategoryController::class,'create'])->name('postCatagory.create');
        Route::post('category/store', [PostCategoryController::class,'store'])->name('postCatagory.store');
        Route::get('category/edit/{id}', [PostCategoryController::class,'edit'])->name('postCatagory.edit');
        Route::post('category/update/{id}', [PostCategoryController::class,'update'])->name('postCatagory.update');
        Route::delete('category/destroy/{id}', [PostCategoryController::class,'destroy'])->name('postCatagory.destroy');
    });
    
});

=======
        Route::get('category', [PostCategoryController::class,'index'])->name('postCategory.index');
        Route::get('category/deleted', [PostCategoryController::class,'deleted'])->name('postCategory.deleted');
        Route::get('category/search/{config}', [PostCategoryController::class,'search'])->name('postCategory.search');
        Route::get('category/create', [PostCategoryController::class,'create'])->name('postCategory.create');
        Route::post('category/store', [PostCategoryController::class,'store'])->name('postCategory.store');
        Route::get('category/edit/{slug}', [PostCategoryController::class,'edit'])->name('postCategory.edit');
        Route::post('category/update/{slug}', [PostCategoryController::class,'update'])->name('postCategory.update');
        Route::delete('category/destroy/{id}', [PostCategoryController::class,'destroy'])->name('postCategory.destroy');
        Route::get('category/restore/{id}', [PostCategoryController::class,'restore'])->name('postCategory.restore');
        Route::delete('category/forceDelete/{id}', [PostCategoryController::class,'forceDelete'])->name('postCategory.forceDelete');
    });
    // POST
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class,'index'])->name('post.index');
        Route::get('/test', [PostController::class,'test'])->name('post.test');
        Route::get('deleted', [PostController::class,'deleted'])->name('post.deleted');
        Route::get('search/{config}', [PostController::class,'search'])->name('post.search');
        Route::get('create', [PostController::class,'create'])->name('post.create');
        Route::post('store', [PostController::class,'store'])->name('post.store');
        Route::get('edit/{slug}', [PostController::class,'edit'])->name('post.edit');
        Route::post('update/{slug}', [PostController::class,'update'])->name('post.update');
        Route::delete('destroy/{id}', [PostController::class,'destroy'])->name('post.destroy');
        Route::get('restore/{id}', [PostController::class,'restore'])->name('post.restore');
        Route::delete('forceDelete/{id}', [PostController::class,'forceDelete'])->name('post.forceDelete');
    });
    Route::post('/admin/upload-ck-image', [UploadCKImageController::class, 'upload'])->name('ckeditor.upload');
    // PRODUCT CATEGORY
    Route::prefix('product')->group(function () {
        Route::get('category', [ProductCategoryController::class, 'index'])->name('productCategory.index');
        Route::get('category/deleted', [ProductCategoryController::class, 'deleted'])->name('productCategory.deleted');
        Route::get('category/create', [ProductCategoryController::class, 'create'])->name('productCategory.create');
        Route::post('category/store', [ProductCategoryController::class, 'store'])->name('productCategory.store');
        Route::get('category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('productCategory.edit');
        Route::post('category/update/{id}', [ProductCategoryController::class, 'update'])->name('productCategory.update');
        Route::delete('category/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('productCategory.destroy');
        Route::get('category/restore/{id}', [ProductCategoryController::class, 'restore'])->name('productCategory.restore');
        Route::delete('category/forceDelete/{id}', [ProductCategoryController::class, 'forceDelete'])->name('productCategory.forceDelete');
    });
    // PRODUCT
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
        Route::get('/deleted', [AdminProductController::class, 'deleted'])->name('product.deleted');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/restore/{id}', [AdminProductController::class, 'restore'])->name('product.restore');
        Route::delete('/forceDelete/{id}', [AdminProductController::class, 'forceDelete'])->name('product.forceDelete');
    });
    // BRAND
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('deleted', [BrandController::class, 'deleted'])->name('brand.deleted');
        Route::get('create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
        Route::get('restore/{id}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::delete('forceDelete/{id}', [BrandController::class, 'forceDelete'])->name('brand.forceDelete');
    });
<<<<<<< Updated upstream
    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('order.index');
        Route::get('/pending', [AdminOrderController::class, 'OrderPending'])->name('order.pending');
        Route::get('/detail/{id}', [AdminOrderController::class, 'OrderDetail'])->name('order.detail');
    });
<<<<<<< Updated upstream
=======
>>>>>>> Stashed changes
    Route::prefix('voucher')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('admin.discounts.index');
        Route::get('/create', [DiscountController::class, 'create'])->name('admin.discounts.create');
        Route::post('/', [DiscountController::class, 'store'])->name('admin.discounts.store');
        Route::get('/{discount}/edit', [DiscountController::class, 'edit'])->name('admin.discounts.edit');
        Route::put('/{discount}', [DiscountController::class, 'update'])->name('admin.discounts.update');
        Route::delete('/{discount}', [DiscountController::class, 'destroy'])->name('admin.discounts.destroy');
    });
<<<<<<< Updated upstream
});
<<<<<<< Updated upstream
=======
 });
>>>>>>> Stashed changes
=======
    Route::prefix('admin/discounts')->name('admin.discounts.')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('index');
        Route::get('/create', [DiscountController::class, 'create'])->name('create');
        Route::post('/', [DiscountController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DiscountController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DiscountController::class, 'update'])->name('update');
        Route::delete('/{id}', [DiscountController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/restore', [DiscountController::class, 'restore'])->name('restore');
    });
//     });
// });
//  });
>>>>>>> Stashed changes






>>>>>>> Stashed changes
=======

Route::prefix('user')->group(function () {
    Route::get('/profile', [User\ProfileController::class, 'show'])->name('user.profile'); // Route để xem hồ sơ người dùng
    Route::get('/orders', [User\CustomerController::class, 'customerOrder'])->name('user.orders'); // Route để xem đơn hàng
    Route::get('/orders/history', [User\CustomerController::class, 'customerOrderHistory'])->name('user.orders.history'); // Route để xem lịch sử đơn hàng
    Route::get('/orders/{id}', [User\CustomerController::class, 'customerOrderDetail'])->name('user.orders.detail'); // Route để xem chi tiết đơn hàng
    Route::post('/orders/cancel', [User\CustomerController::class, 'customerOrderCancel'])->name('user.orders.cancel'); // Route để hủy đơn hàng
});

Route::prefix('wishlist')->group(function () {
    Route::get('/', [FavouriteController::class, 'index'])->name('wishlist.index'); // Xem wishlist
    Route::post('/add/{id}', [FavouriteController::class, 'add'])->name('wishlist.add'); // Thêm sản phẩm vào wishlist
    Route::delete('/remove/{id}', [FavouriteController::class, 'remove'])->name('wishlist.remove'); // Xóa sản phẩm khỏi wishlist
});

<<<<<<< Updated upstream
Route::post('/wishlist/add/{id}', [FavouriteController::class, 'add'])->name('wishlist.add');

>>>>>>> Stashed changes
=======
// ADMIN LOGIN
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login'])->name('admin.check_login');

// ADMIN LOGOUT
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Footer 
Route::get('/shop/category/piano', [ProductController::class, 'category'])->name('category.piano');
Route::get('/shop/category/guitar', [ProductController::class, 'category'])->name('category.guitar');
Route::get('/shop/category/electric-guitar', [ProductController::class, 'category'])->name('category.electric_guitar');
Route::get('/shop/category/classic-guitar', [ProductController::class, 'category'])->name('category.classic_guitar');
Route::get('/shop/category', [ProductController::class, 'index'])->name('products.all');
>>>>>>> Stashed changes
