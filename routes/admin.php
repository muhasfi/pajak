<?php

use App\Http\Controllers\Admin\BrevetABController;
use App\Http\Controllers\Admin\BrevetCController;
use App\Http\Controllers\Admin\InHouseTrainingController;
use App\Http\Controllers\Admin\ItemBimbelController;
use App\Http\Controllers\Admin\ItemBookController;
use App\Http\Controllers\Admin\ItemLayananController;
use App\Http\Controllers\Admin\ItemSeminarController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\WebinarController;
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
        
       
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {

        
        Route::resource('brevetab', BrevetABController::class);
        // Route::delete('/brevet-ab/{id}', [BrevetABController::class, 'destroy'])->name('brevet-ab.destroy');
        Route::resource('brevet-c', BrevetCController::class);
        Route::resource('webinars', WebinarController::class);
        Route::resource('in_house_trainings', InHouseTrainingController::class);
        Route::resource('item-seminar', ItemSeminarController::class);
        Route::resource('trainings', TrainingController::class);
        // 
        Route::resource('services', ServiceController::class);
        Route::get('/layanan', [ItemLayananController::class, 'index'])->name('item-layanan.index');
        Route::get('/layanan/create', [ItemLayananController::class, 'create'])->name('item-layanan.create');
        Route::post('/layanan', [ItemLayananController::class, 'store'])->name('item-layanan.store');
        Route::get('/layanan/{id}/edit', [ItemLayananController::class, 'edit'])->name('item-layanan.edit');
        Route::put('/layanan/{id}', [ItemLayananController::class, 'update'])->name('item-layanan.update');
        Route::delete('/layanan/{id}', [ItemLayananController::class, 'destroy'])->name('item-layanan.destroy');
        Route::get('/layanan/{id}', [ItemLayananController::class, 'show'])->name('item-layanan.show');
        
        Route::resource('item_layanan', ItemLayananController::class);
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        // General routes
        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        Route::resource('/book', ItemBookController::class);
        
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
        
});


