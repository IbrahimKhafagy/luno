<?php

use App\Http\Controllers\user\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('user',[HomeController::class,'index'])->name('user-home');

        Route::get('shop',[HomeController::class,'shop'])->name('shop-page');

        Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add-cart');

        Route::get('cart/',[HomeController::class,'cart'])->name('cart');

        Route::delete('remove-from-cart', [HomeController::class, 'remove'])->name('remove.from.cart');

        Route::PATCH ('cart-update', [HomeController::class, 'updateCart'])->name('cart.update');

        Route::get('/details/{id}', [HomeController::class,'show'])->name('details-page');

        Route::get('/contact', [HomeController::class,'contact'])->name('contact-page');

    });

