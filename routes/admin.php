<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BrevetABController;
use App\Http\Controllers\Admin\BrevetCController;
use App\Http\Controllers\Admin\ItemBimbelController;
use App\Http\Controllers\Admin\ItemBookController;
use App\Http\Controllers\Admin\ItemPaperController;
use App\Http\Controllers\Admin\ItemSeminarController;
use App\Http\Controllers\Admin\ItemTrainingController;
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
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        // General routes
        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        
        Route::resource('/book', ItemBookController::class)->names('admin.book');
        Route::resource('/bimbel', ItemBimbelController::class)->names('admin.bimbel');
        Route::resource('/artikel', ArtikelController::class)->names('admin.artikel');
        Route::resource('/paper', ItemPaperController::class)->names('admin.paper');
        Route::post('/artikel/upload', [ArtikelController::class, 'upload'])->name('ckeditor.upload');
        Route::resource('brevetab', BrevetABController::class)->names('admin.brevetab');
        Route::resource('brevet-c', BrevetCController::class)->names('admin.brevetc');
        Route::resource('brevet-c', BrevetCController::class)->names('admin.brevetc');
        Route::resource('webinars', WebinarController::class)->names('admin.webinar');
        Route::resource('item-seminar', ItemSeminarController::class)->names('admin.seminar');
        Route::resource('trainings', ItemTrainingController::class)->names('admin.training');

        // Route::get('/book', [\App\Http\Controllers\Admin\ItemBookController::class, 'index'])->name('book.index');
    });
});

