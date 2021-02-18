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
    });
});

