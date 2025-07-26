<?php

use Illuminate\Support\Facades\Route;

// Frontend controllers
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;            // <-- User-OrderController

// Admin controllers
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;  // <-- alias!
use App\Http\Controllers\Admin\RecruitmentController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ApplicationController;
use App\Models\Recruitment;

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum','admin'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
         // Dashboard
         Route::get('/', fn() => view('admin.admin'))->name('admin');

         // CRUD Products, Sizes, Categories
         Route::resource('products',  AdminProductController::class);
         Route::resource('sizes',     SizeController::class);
         Route::resource('category',  CategoryController::class);
         Route::resource('recruitments', RecruitmentController::class);
         
         // Quản lý đơn hàng cho admin
         Route::resource('orders',    AdminOrderController::class);

         // Posts
         Route::resource('posts',     PostController::class)
              ->only(['index','create','store','edit','update','destroy']);

         // Users management
         Route::resource('users',     UserController::class)
              ->only(['index','edit','update','destroy']);

         // Ứng viên cho tuyển dụng
         Route::get('recruitments/{recruitment}/applications',
                    [RecruitmentController::class,'applications'])
              ->name('recruitments.applications');

         Route::patch('applications/{application}/contact-toggle',
                    [RecruitmentController::class,'toggleContacted'])
              ->name('applications.toggleContacted');
     });

/*
|--------------------------------------------------------------------------
| Cart & Order routes (frontend user)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function(){
    // Giỏ hàng
    Route::get(   'cart',                [CartController::class,'index'])->name('cart.index');
    Route::post(  'cart/add/{product}',  [CartController::class,'add'])->name('cart.add');
    Route::put(   'cart/update/{cartItem}', [CartController::class,'update'])->name('cart.update');
    Route::delete('cart/remove/{cartItem}', [CartController::class,'remove'])->name('cart.remove');
    Route::post(  'cart/clear',          [CartController::class,'clear'])->name('cart.clear');

    // Đơn hàng của user
    Route::get('/orders',       [OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class,'show'])
         ->whereNumber('order')
         ->name('orders.show');

    // Ứng tuyển
    Route::get('/ung-tuyen/{recruitment}', [ApplicationController::class,'create'])
         ->name('application.create');
    Route::post('/ung-tuyen/{recruitment}', [ApplicationController::class,'store'])
         ->name('application.store');
});

/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('index'))->name('home');
Route::get('/tuyen-dung', function(){
    $recruitments = Recruitment::latest()->get();
    return view('recruitment',compact('recruitments'));
})->name('recruitment');

// Product listing & detail
Route::get('/san-pham',           [ProductController::class,'index'])->name('products');
Route::get('/san-pham/{product}', [ProductController::class,'show'])->name('products.show');

// VNPAY payment
Route::post('/payment',           [PaymentController::class,'redirect'])
     ->middleware('auth')
     ->name('payment.redirect');
Route::get('/payment/callback',   [PaymentController::class,'callback'])
     ->name('payment.callback');
