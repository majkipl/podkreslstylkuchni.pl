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
use App\Http\Controllers\ThxController;

/* FRONTEND */

Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/formularz', [ApplicationController::class, 'form'])->name('front.application.form');
Route::post('/formularz/zapisz', [ApplicationController::class, 'store'])->name('front.application.save');
Route::get('/podziekowania/rejestracja', [ThxController::class, 'form'])->name('front.thx.form');
Route::get('/podziekowania/promocja', [ThxController::class, 'promotion'])->name('front.thx.promotion');
Route::get('/potwierdzam/{application}/{token}', [ConfirmController::class, 'application'])->name('front.confirm.application');
Route::post('/kontakt/wyslij', [ContactController::class, 'send'])->name('front.contact.send');

/* BACKEND */

