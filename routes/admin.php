<?php

use App\Http\Controllers\Admin\ItemBimbelController;
use App\Http\Controllers\Admin\ItemBookController;
use App\Http\Controllers\Admin\ItemLayananController;
use App\Http\Controllers\Admin\ItemSeminarController;

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        // Auth routes
        Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [\App\Http\Controllers\Admin\Auth\EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [\App\Http\Controllers\Admin\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [\App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
        Route::get('/layanan', [ItemLayananController::class, 'index'])->name('item-layanan.index');
        Route::get('/layanan/create', [ItemLayananController::class, 'create'])->name('item-layanan.create');
        Route::post('/layanan', [ItemLayananController::class, 'store'])->name('item-layanan.store');
        Route::get('/layanan/{id}/edit', [ItemLayananController::class, 'edit'])->name('item-layanan.edit');
        Route::put('/layanan/{id}', [ItemLayananController::class, 'update'])->name('item-layanan.update');
        Route::delete('/layanan/{id}', [ItemLayananController::class, 'destroy'])->name('item-layanan.destroy');
        Route::get('/layanan/{id}', [ItemLayananController::class, 'show'])->name('item-layanan.show');
        Route::resource('item_layanan', ItemLayananController::class);
        // Route::get('layanan', [ItemLayananController::class, 'customerIndex'])->name('layanan.customer');
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        Route::resource('item-seminars', ItemSeminarController::class);
        Route::get('/seminar', [ItemSeminarController::class, 'index'])->name('item-seminars.index');
        Route::get('/seminar/create', [ItemSeminarController::class, 'create'])->name('item-seminars.create');
        Route::post('/seminar', [ItemSeminarController::class, 'store'])->name('item_seminar.store');
        Route::get('/seminar/{id}/edit', [ItemSeminarController::class, 'edit'])->name('item-seminars.edit');
        Route::put('/seminar/{id}', [ItemSeminarController::class, 'update'])->name('item-seminars.update');
        Route::delete('/seminar/{id}', [ItemSeminarController::class, 'destroy'])->name('item-seminars.destroy');
        Route::get('/seminar/{id}', [ItemSeminarController::class, 'show'])->name('item-seminars.show');
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        // General routes
        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
    Route::resource('/book', ItemBookController::class);
        // Route::resource('/bimbel', ItemBimbelController::class);
        // Route::get('/book', [\App\Http\Controllers\Admin\ItemBookController::class, 'index'])->name('book.index');
        Route::resource('item_bimbel', ItemBimbelController::class);
        // admin.bimbel.index
    Route::resource('bimbel', ItemBimbelController::class)->except(['show']); 
    Route::delete('/bimbel/{itemBimbel}', [ItemBimbelController::class, 'destroy'])->name('item-bimbel.destroy');
    Route::post('/bimbel/create', [ItemBimbelController::class, 'store'])->name('item-bimbel.store');
    Route::get('/bimbel', [ItemBimbelController::class, 'index'])->name('item-bimbel.index');
    Route::get('/bimbel/{itemBimbel}', [ItemBimbelController::class, 'show'])->name('item-bimbel.show');
    Route::get('/admin/item-bimbel/{itemBimbel}', [ItemBimbelController::class, 'show'])->name('item-bimbel.show');
    Route::get('/admin/bimbel/create', [ItemBimbelController::class, 'create'])->name('item-bimbel.create');
    Route::get('/books/{id}/edit', [ItemBookController::class, 'edit'])->name('item-bimbel.edit');
    });
    Route::get('/books', [ItemBookController::class, 'index'])->name('item-books.index');
    Route::get('/books/create', [ItemBookController::class, 'create'])->name('item-books.create');
    Route::post('/books', [ItemBookController::class, 'store'])->name('item-books.store');
    Route::get('/books/{id}/edit', [ItemBookController::class, 'edit'])->name('item-books.edit');
    Route::put('/books/{id}', [ItemBookController::class, 'update'])->name('item-books.update');
    Route::delete('/books/{id}', [ItemBookController::class, 'destroy'])->name('item-books.destroy');
    Route::get('/books/{id}', [ItemBookController::class, 'show'])->name('item-books.show');

    // Route::resource('item-seminars', ItemSeminarController::class);
    // Route::get('/seminar', [ItemSeminarController::class, 'index'])->name('item-seminars.index');
    // Route::get('/seminar/create', [ItemSeminarController::class, 'create'])->name('item-seminars.create');
    // Route::post('/seminar', [ItemSeminarController::class, 'store'])->name('item_seminar.store');
    // Route::get('/seminar/{id}/edit', [ItemSeminarController::class, 'edit'])->name('item-seminars.edit');
    // Route::put('/seminar/{id}', [ItemSeminarController::class, 'update'])->name('item-seminars.update');
    // Route::delete('/seminar/{id}', [ItemSeminarController::class, 'destroy'])->name('item-seminars.destroy');
    // Route::get('/seminar/{id}', [ItemSeminarController::class, 'show'])->name('item-seminars.show');

    // Route::get('/layanan', [ItemLayananController::class, 'index'])->name('item-layanan.index');
    // Route::get('/layanan/create', [ItemLayananController::class, 'create'])->name('item-layanan.create');
    // Route::post('/layanan', [ItemLayananController::class, 'store'])->name('item-layanan.store');
    // Route::get('/layanan/{id}/edit', [ItemLayananController::class, 'edit'])->name('item-layanan.edit');
    // Route::put('/layanan/{id}', [ItemLayananController::class, 'update'])->name('item-layanan.update');
    // Route::delete('/layanan/{id}', [ItemLayananController::class, 'destroy'])->name('item-layanan.destroy');
    // Route::get('/layanan/{id}', [ItemLayananController::class, 'show'])->name('item-layanan.show');
    // Route::resource('item_layanan', ItemLayananController::class);
});
// Route::get('/layanan', [ItemLayananController::class, 'index'])->name('item-layanan.index');
// Route::get('/layanan/create', [ItemLayananController::class, 'create'])->name('item-layanan.create');
// Route::post('/layanan', [ItemLayananController::class, 'store'])->name('item-layanan.store');
// Route::get('/layanan/{id}/edit', [ItemLayananController::class, 'edit'])->name('item-layanan.edit');
// Route::put('/layanan/{id}', [ItemLayananController::class, 'update'])->name('item-layanan.update');
// Route::delete('/layanan/{id}', [ItemLayananController::class, 'destroy'])->name('item-layanan.destroy');
// Route::get('/layanan/{id}', [ItemLayananController::class, 'show'])->name('item-layanan.show');
// Route::resource('item_layanan', ItemLayananController::class);

