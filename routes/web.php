<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SeminarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])
    ->name('index');
Route::get('/book', [\App\Http\Controllers\BookController::class, 'index'])
    ->name('book');

    // artikel
    Route::get('/artikel ', [ArtikelController::class, 'index'])->name('product.artikel');
    // bimbel
    Route::get('/bimbel ', [BimbinganController::class, 'index'])->name('product.bimbel');
    // seminar
    Route::get('/seminar ', [SeminarController::class, 'index'])->name('product.seminar');


Route::get('/cart', [\App\Http\Controllers\BookController::class, 'cart'])->name('cart');
Route::post('/cart/add', [\App\Http\Controllers\BookController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [\App\Http\Controllers\BookController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [\App\Http\Controllers\BookController::class, 'removeCart'])->name('cart.remove');
Route::get('/cart/clear', [\App\Http\Controllers\BookController::class, 'clearCart'])->name('cart.clear');

Route::get('/checkout', [\App\Http\Controllers\BookController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [\App\Http\Controllers\BookController::class, 'storeOrder'])->name('checkout.store');
Route::post('/checkout/store/{orderId}', [\App\Http\Controllers\BookController::class, 'checkoutSuccess'])->name('checkout.success');
Route::post('/cart/clear', [\App\Http\Controllers\BookController::class, 'clear'])->name('cart.clear');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
});
