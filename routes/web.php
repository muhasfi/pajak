<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/book', [\App\Http\Controllers\BookController::class, 'index'])->name('book');

Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
Route::post('/cart/add', [OrderController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [\App\Http\Controllers\BookController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [OrderController::class, 'removeCart'])->name('cart.remove');
Route::get('/cart/clear', [OrderController::class, 'clearCart'])->name('cart.clear');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [OrderController::class, 'storeOrder'])->name('checkout.store');
Route::get('/checkout/order-pay/{order_code}', [OrderController::class, 'orderPay'])->name('checkout.orderPay');
Route::get('/checkout/success/{orderId}', [OrderController::class, 'checkoutSuccess'])->name('checkout.success');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.user.show');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::prefix('bimbel')->group(function () {
    Route::get('/', [BimbelController::class, 'index'])->name('bimbel.index');
    Route::get('/courses', [BimbelController::class, 'courses'])->name('bimbel.courses.index');
    Route::get('/courses/{id}', [BimbelController::class, 'show'])->name('bimbel.courses.show');
    Route::post('/courses/{id}/enroll', [BimbelController::class, 'enroll'])->name('bimbel.courses.enroll');
});

Route::prefix('bimbel')->group(function () {
    Route::get('/', [BimbelController::class, 'index'])->name('bimbel.index');
    Route::view('/bimbel/a', 'product.bimbel.bimbel-a')->name('bimbel.a');
    Route::view('/bimbel/b', 'product.bimbel.bimbel-b')->name('bimbel.b');
    Route::get('/courses', [BimbelController::class, 'courses'])->name('bimbel.courses.index');
    Route::get('/courses/{id}', [BimbelController::class, 'show'])->name('bimbel.courses.show');
    Route::post('/courses/{id}/enroll', [BimbelController::class, 'enroll'])->name('bimbel.courses.enroll');
});

Route::get('/pelatihan', [App\Http\Controllers\PelatihanController::class, 'index'])->name('pelatihan');
Route::view('/kontak', 'kontak')->name('kontak');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');

    Route::get('/bimbel/my-courses', [BimbelController::class, 'list'])->name('bimbel.courses.list');
    Route::get('/bimbel/{id}', [BimbelController::class, 'show'])->name('bimbel.show');
       
    Route::get('/transactions', [SiteController::class, 'transaction'])->name('transactions.transaction');
    Route::get('/transactions/{id}', [SiteController::class, 'show'])->name('transactions.show');
});
