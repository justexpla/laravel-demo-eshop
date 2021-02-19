<?php

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

Route::group(['as' => 'shop.', 'middleware' => ['with_left_menu']], function () {
    Route::get('/', [\App\Http\Controllers\Shop\IndexController::class, 'index'])->name('index');

    Route::group(['prefix' => 'catalog', 'as' => 'catalog.'], function () {
        Route::get('/category/{category}', [\App\Http\Controllers\Shop\Catalog\CatalogController::class, 'category'])->name('category');

        Route::get('/product/{product}', [\App\Http\Controllers\Shop\Catalog\CatalogController::class, 'product'])->name('product');
    });

    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', [\App\Http\Controllers\Shop\CartController::class, 'index'])->name('index');
        Route::post('/add', [\App\Http\Controllers\Sshop\CartController::class, 'add'])->name('add');
        Route::post('/remove', [\App\Http\Controllers\Shop\CartController::class, 'remove'])->name('remove');
        Route::post('/reset', [\App\Http\Controllers\Shop\CartController::class, 'reset'])->name('reset');
        Route::post('/update', [\App\Http\Controllers\Shop\CartController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'cabinet', 'as' => 'cabinet.', 'middleware' => ['auth']], function () {
        Route::get('/', [\App\Http\Controllers\Shop\Cabinet\CabinetController::class, 'index'])->name('index');

        Route::group(['prefix' =>'user', 'as' => 'user.'], function () {
            Route::get('/', [\App\Http\Controllers\Shop\Cabinet\UserController::class, 'show'])->name('show');
            Route::get('/edit', [\App\Http\Controllers\Shop\Cabinet\UserController::class, 'edit'])->name('edit');
            Route::patch('/edit', [\App\Http\Controllers\Shop\Cabinet\UserController::class, 'update'])->name('update');
        });
    });
});


Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
