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
        Route::post('/add', [\App\Http\Controllers\Shop\CartController::class, 'add'])->name('add');
        Route::post('/remove', [\App\Http\Controllers\Shop\CartController::class, 'remove'])->name('remove');
        Route::post('/reset', [\App\Http\Controllers\Shop\CartController::class, 'reset'])->name('reset');
        Route::post('/update', [\App\Http\Controllers\Shop\CartController::class, 'update'])->name('update');
    });
});

