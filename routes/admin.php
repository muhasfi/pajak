<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ItemArtikelController;
use App\Http\Controllers\ItemBimbelController;
use App\Http\Controllers\ItemBookController;
use App\Http\Controllers\ItemSeminarController;
use App\Http\Controllers\SeminarController;
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
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
        
    });
    // Routes untuk Book CRUD
Route::middleware(['auth:admin'])->group(function () {
    // Book Routes
    Route::get('/books', [ItemBookController::class, 'index'])->name('item-books.index');
    Route::get('/books/create', [ItemBookController::class, 'create'])->name('item-books.create');
    Route::post('/books', [ItemBookController::class, 'store'])->name('item-books.store');
    Route::get('/books/{id}/edit', [ItemBookController::class, 'edit'])->name('item-books.edit');
    Route::put('/books/{id}', [ItemBookController::class, 'update'])->name('item-books.update');
    Route::delete('/books/{id}', [ItemBookController::class, 'destroy'])->name('item-books.destroy');
    Route::get('/books/{id}', [ItemBookController::class, 'show'])->name('item-books.show');
    // Route::resource('item-books', ItemBookController::class);
    // artikel
    Route::resource('articles', ArticleController::class);
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('admin.product.artikel.show');
    Route::get('/articles', [ArticleController::class, 'customerIndex'])->name('admin.product.artikel.index');
    // artikel new
    Route::resource('artikel', ItemArtikelController::class)->except(['show']);
    Route::get('artikel', [ItemArtikelController::class, 'index'])->name('artikel.index');
    //seminar
    Route::resource('item-seminars', ItemSeminarController::class);
    Route::get('/seminar', [ItemSeminarController::class, 'index'])->name('item-seminars.index');
    Route::get('/seminar/create', [ItemSeminarController::class, 'create'])->name('item-seminars.create');
    Route::post('/seminar', [ItemSeminarController::class, 'store'])->name('item-seminars.store');
    Route::get('/seminar/{id}/edit', [ItemSeminarController::class, 'edit'])->name('item-seminars.edit');
    Route::put('/seminar/{id}', [ItemSeminarController::class, 'update'])->name('item-seminars.update');
    Route::delete('/seminar/{id}', [ItemSeminarController::class, 'destroy'])->name('item-seminars.destroy');
    Route::get('/seminar/{id}', [ItemSeminarController::class, 'show'])->name('item-seminars.show');
    // bimbel
    // admin.bimbel.index
    Route::resource('bimbel', ItemBimbelController::class)->except(['show']); 
    Route::delete('/bimbel/{itemBimbel}', [ItemBimbelController::class, 'destroy'])->name('item-bimbel.destroy');
    Route::post('/bimbel/create', [ItemBimbelController::class, 'store'])->name('item-bimbel.store');
    Route::get('/bimbel', [ItemBimbelController::class, 'index'])->name('item-bimbel.index');
    Route::get('/bimbel/{itemBimbel}', [ItemBimbelController::class, 'show'])->name('item-bimbel.show');
    Route::get('/admin/item-bimbel/{itemBimbel}', [ItemBimbelController::class, 'show'])->name('item-bimbel.show');
    Route::get('/admin/bimbel/create', [ItemBimbelController::class, 'create'])->name('item-bimbel.create');
    Route::get('/books/{id}/edit', [ItemBookController::class, 'edit'])->name('item-bimbel.edit');
    // try out
    Route::resource('questions', QuestionController::class);
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    // Route lainnya
    Route::get('/questions', [QuestionController::class, 'index'])->name('admin.questions.index');
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('admin.questions.show');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
    Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('admin.questions.destroy');
    // Route::resource('/books', ItemBookController::class);
});

});

