<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\IndexController;
use Illuminate\Contracts\Cache\Store;

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

Route::get('/', [IndexController::class,'index']);

Route::post('/search', [IndexController::class,'search'])->name('search');

Route::post('/add-item', [IndexController::class,'add'])->name('add-item');

Route::get('/carrinho', [CartController::class,'cart'])->name('cart');

Route::post('/operation', [CartController::class,'operation'])->name('operation');

Route::post('/remove-cart', [CartController::class,'removeCart'])->name('remove-cart');

Route::post('/finish-pay', [CartController::class,'finishPay'])->name('finish-pay');

Route::get('/checkout', [CheckoutController::class,'checkout'])->name('checkout');

Route::post('/store', [CheckoutController::class,'store'])->name('store');

Route::get('/pagamento', PaymentController::class);

