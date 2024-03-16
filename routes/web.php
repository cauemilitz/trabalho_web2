<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\IndexController;
use Illuminate\Contracts\Cache\Store;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', [IndexController::class,'index'])->name('home');

Route::post('/search', [IndexController::class,'search'])->name('search');

Route::post('/add-item', [IndexController::class,'add'])->name('add-item');

Route::get('/carrinho', [CartController::class,'cart'])->name('cart');

Route::post('/operation', [CartController::class,'operation'])->name('operation');

Route::post('/remove-cart', [CartController::class,'removeCart'])->name('remove-cart');

Route::post('/finish-pay', [CartController::class,'finishPay'])->name('finish-pay');

Route::get('/checkout', [CheckoutController::class,'checkout'])->name('checkout');

Route::post('/store', [CheckoutController::class,'store'])->name('store');

Route::get('/pagamento', [PaymentController::class,'payment'])->name('payment');

Route::post('/simulacso', [PaymentController::class,'simulate'])->name('simulate');

Route::prefix('admin')->group(function () {
    Route::get('/products', [ProductController::class,'index'])->name('product_list');
    Route::get('/products/create', [ProductController::class,'create'])->name('product_create');
    Route::post('/products/store', [ProductController::class,'store'])->name('product_store');
    Route::get('/products/edit/{id}', [ProductController::class,'edit'])->name('product_edit');
    Route::put('/products/edit/{id}', [ProductController::class,'update'])->name('product_update');
    Route::delete('/products/destroy/{id}', [ProductController::class,'destroy'])->name('product_destroy');

    Route::get('/customer', [CustomerController::class,'index'])->name('customer_list');
    Route::get('/customer/create', [CustomerController::class,'create'])->name('customer_create');
    Route::post('/customer/store', [CustomerController::class,'store'])->name('customer_store');
    Route::get('/customer/edit/{id}', [CustomerController::class,'edit'])->name('customer_edit');
    Route::put('/customer/edit/{id}', [CustomerController::class,'update'])->name('customer_update');
});

