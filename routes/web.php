<?php

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

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\UrlController;
use App\Http\Controllers\ThxController;

Auth::routes();

/* FRONTEND */

Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/zasady', [HomeController::class, 'index'])->name('front.home.rules');
Route::get('/produkty', [HomeController::class, 'index'])->name('front.home.products');
Route::get('/kontakt', [HomeController::class, 'index'])->name('front.home.contact');
Route::get('/formularz', [ApplicationController::class, 'form'])->name('front.application.form');
Route::post('/formularz/zapisz', [ApplicationController::class, 'store'])->name('front.application.save');
Route::get('/podziekowania/rejestracja', [ThxController::class, 'form'])->name('front.thx.form');
Route::get('/podziekowania/promocja', [ThxController::class, 'promotion'])->name('front.thx.promotion');
Route::get('/potwierdzam/{application}/{token}', [ConfirmController::class, 'application'])->name('front.confirm.application');
Route::post('/kontakt/wyslij', [ContactController::class, 'send'])->name('front.contact.send');

/* BACKEND */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/panel', [\App\Http\Controllers\Panel\HomeController::class, 'index'])->name('back.home');

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('/panel/zgloszenie', [\App\Http\Controllers\Panel\ApplicationController::class, 'index'])->name('back.application');
        Route::get('/panel/zgloszenie/{promotion}', [\App\Http\Controllers\Panel\ApplicationController::class, 'show'])->name('back.application.show');

        Route::get('/panel/produkt', [ProductController::class, 'index'])->name('back.product');
        Route::get('/panel/produkt/dodaj', [ProductController::class, 'create'])->name('back.product.create');
        Route::get('/panel/produkt/zmien/{product}', [ProductController::class, 'edit'])->name('back.product.edit');
        Route::get('/panel/produkt/{product}', [ProductController::class, 'show'])->name('back.product.show');

        Route::get('/panel/linki', [UrlController::class, 'index'])->name('back.url');
        Route::get('/panel/linki/dodaj', [UrlController::class, 'create'])->name('back.url.create');
        Route::get('/panel/linki/zmien/{url}', [UrlController::class, 'edit'])->name('back.url.edit');
        Route::get('/panel/linki/{url}', [UrlController::class, 'show'])->name('back.url.show');
    });
});
