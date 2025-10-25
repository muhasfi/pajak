<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LayananPtController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\ProfileController;
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
Route::get('/checkout/cancel/{orderId}', [OrderController::class, 'checkoutCancel'])->name('checkout.expired');

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

// Route::prefix('bimbel')->group(function () {
//     Route::get('/', [BimbelController::class, 'index'])->name('bimbel.index');
//     // Route::view('/bimbel/a', 'product.bimbel.bimbel-a')->name('bimbel.a');
//     // Route::view('/bimbel/b', 'product.bimbel.bimbel-b')->name('bimbel.b');
//     Route::get('/courses', [BimbelController::class, 'courses'])->name('bimbel.courses.index');
//     Route::get('/courses/{id}', [BimbelController::class, 'show'])->name('bimbel.courses.show');
//     Route::post('/courses/{id}/enroll', [BimbelController::class, 'enroll'])->name('bimbel.courses.enroll');
// });

Route::get('/pelatihan', [App\Http\Controllers\PelatihanController::class, 'index'])->name('pelatihan');
Route::view('/kontak', 'kontak')->name('kontak');

Route::get('/pph21', [App\Http\Controllers\KertasKerjaController::class, 'pph21'])->name('pph21');
Route::get('/ppn', [App\Http\Controllers\KertasKerjaController::class, 'ppn'])->name('ppn');
Route::get('/spt', [App\Http\Controllers\KertasKerjaController::class, 'spt'])->name('spt');
Route::get('/kertas-kerja-spt-masa-unifikasi', [App\Http\Controllers\KertasKerjaController::class, 'spt_unifikasi'])->name('spt_unifikasi');
Route::get('/brevet-ab', [App\Http\Controllers\BrevetABController::class, 'index'])->name('brevet.ab');
Route::get('/brevet-c', [App\Http\Controllers\BrevetCController::class, 'index'])->name('brevet.c');
Route::get('/seminar', [App\Http\Controllers\SeminarController::class, 'index'])->name('seminar');
Route::get('/webinar', [App\Http\Controllers\WebinarController::class, 'index'])->name('webinar');
Route::get('/in-house-training', [App\Http\Controllers\TrainingController::class, 'index'])->name('in.house');
Route::get('/audit', [App\Http\Controllers\AuditController::class, 'index'])->name('audit');
Route::get('/jasa-akuntansi', [App\Http\Controllers\AccountingServiceController::class, 'index'])->name('jasa.akuntansi');
Route::get('/corporate-services', [LayananPtController::class, 'index'])->name('corporate.services');
Route::get('/jasa-perpajakan', [App\Http\Controllers\PajakController::class, 'index'])->name('jasa.perpajakan');
Route::get('/litigasi', [App\Http\Controllers\LitigasiController::class, 'index'])->name('litigasi');
Route::get('/transfer-pricing', [App\Http\Controllers\TransferController::class, 'index'])->name('transfer');
Route::get('/private', [App\Http\Controllers\KonsultasiController::class, 'index'])->name('private');
// Route::view('/brevet-c', 'product.pelatihan.brevet_c')->name('brevet.c');
// Route::view('/kertas-kerja-spt-masa-unifikasi', 'product.paper.spt_masa_unifikasi.kertas_spt_unifikasi')->name('spt.unifikasi');

Route::view('/order-ppn', 'product.ppn.order_ppn')->name('order.ppn');

Route::view('/order-spt', 'product.kertas_kerja.order_spt')->name('order.spt');
Route::view('/order-pph', 'product.kertas_kerja.order_pph')->name('order.pph');
Route::view('/order-spt-unifikasi', 'product.kertas_kerja.order_spt_uni')->name('order.spt.uni');
Route::view('/forum', 'product.konsultasi.forum')->name('forum');

require __DIR__.'/auth.php';

// Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth'])->group(function () {

        // Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        //     ->middleware('password.confirm')
        //     ->name('profile');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Route::get('/bimbel/my-courses', [BimbelController::class, 'list'])->name('bimbel.courses.list');
    // Route::get('/bimbel/{id}', [BimbelController::class, 'show'])->name('bimbel.show');
       
    Route::get('/transactions', [SiteController::class, 'transaction'])->name('transactions.transaction');
    Route::get('/transactions/{id}', [SiteController::class, 'show'])->name('transactions.show');
});