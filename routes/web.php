<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ExamController;

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

Route::get('/cart', [\App\Http\Controllers\BookController::class, 'cart'])->name('cart');
Route::post('/cart/add', [\App\Http\Controllers\BookController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [\App\Http\Controllers\BookController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [\App\Http\Controllers\BookController::class, 'removeCart'])->name('cart.remove');
Route::get('/cart/clear', [\App\Http\Controllers\BookController::class, 'clearCart'])->name('cart.clear');

Route::get('/checkout', [\App\Http\Controllers\BookController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [\App\Http\Controllers\BookController::class, 'storeOrder'])->name('checkout.store');
Route::post('/checkout/store/{orderId}', [\App\Http\Controllers\BookController::class, 'checkoutSuccess'])->name('checkout.success');
Route::post('/cart/clear', [\App\Http\Controllers\BookController::class, 'clear'])->name('cart.clear');

Route::prefix('bimbel')->group(function () {
    Route::get('/', [BimbelController::class, 'index'])->name('bimbel.index');
    Route::get('/courses', [BimbelController::class, 'courses'])->name('bimbel.courses.index');
    Route::get('/courses/{id}', [BimbelController::class, 'show'])->name('bimbel.courses.show');
    Route::post('/courses/{id}/enroll', [BimbelController::class, 'enroll'])->name('bimbel.courses.enroll');
});

Route::prefix('bimbel')->group(function () {
    Route::get('/', [BimbelController::class, 'index'])->name('bimbel.index');
    Route::get('/courses', [BimbelController::class, 'courses'])->name('bimbel.courses.index');
    Route::get('/courses/{id}', [BimbelController::class, 'show'])->name('bimbel.courses.show');
    Route::post('/courses/{id}/enroll', [BimbelController::class, 'enroll'])->name('bimbel.courses.enroll');
});
// Route::get('/', [ExamController::class, 'index'])->name('exam.index');
// Route::get('/exam/start', [ExamController::class, 'index'])->name('exam.start');
// Route::get('/exam/{id}', [ExamController::class, 'show'])->name('exam.show');
// Route::post('/exam/{id}/answer', [ExamController::class, 'answer'])->name('exam.answer');
// Route::get('/exam/results', [ExamController::class, 'results'])->name('exam.results');

Route::get('/', [ExamController::class, 'index'])->name('exam.index');
Route::get('/exam/start', [ExamController::class, 'index'])->name('exam.start');
Route::get('/exam/{id}', [ExamController::class, 'show'])->name('exam.show');
Route::post('/exam/{id}/answer', [ExamController::class, 'answer'])->name('exam.answer');
Route::get('/exam/results', [ExamController::class, 'results'])->name('exam.results');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
});
