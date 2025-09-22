<?php

use App\Http\Controllers\Admin\ItemBimbelController;
use App\Http\Controllers\Admin\ItemLayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PelatihanController;

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
// Route::get('layanan', [ItemLayananController::class, 'customerIndex'])->name('layanan.customer');
Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])
    ->name('index');
Route::get('/book', [\App\Http\Controllers\BookController::class, 'index'])
    ->name('book');
    Route::get('layanan', [\App\Http\Controllers\Admin\ItemLayananController::class, 'customerIndex'])
    ->name('layanan.index');

Route::get('/cart', [\App\Http\Controllers\BookController::class, 'cart'])->name('cart');
Route::post('/cart/add', [\App\Http\Controllers\BookController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [\App\Http\Controllers\BookController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [\App\Http\Controllers\BookController::class, 'removeCart'])->name('cart.remove');
Route::get('/cart/clear', [\App\Http\Controllers\BookController::class, 'clearCart'])->name('cart.clear');

Route::get('/checkout', [\App\Http\Controllers\BookController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [\App\Http\Controllers\BookController::class, 'storeOrder'])->name('checkout.store');
Route::get('/checkout/order-pay/{order_code}', [\App\Http\Controllers\BookController::class, 'orderPay'])->name('checkout.orderPay');
Route::get('/checkout/success/{orderId}', [\App\Http\Controllers\BookController::class, 'checkoutSuccess'])->name('checkout.success');


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
Route::prefix('bimbel')->name('customer.')->group(function () {
    Route::get('/', [ItemBimbelController::class, 'index'])->name('item_bimbel.index');
    Route::get('/{item_bimbel}', [ItemBimbelController::class, 'show'])->name('item_bimbel.show');
});


Route::get('/pelatihan', [App\Http\Controllers\PelatihanController::class, 'index'])->name('pelatihan');
Route::view('/kontak', 'kontak')->name('kontak');
require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
});
