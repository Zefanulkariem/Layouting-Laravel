<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Middleware\IsAdmin;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('user', App\Http\Controllers\UsersController::class);
});

Route::get('/', [FrontController::class, 'index']);
Route::get('contact', [FrontController::class, 'contact']);
Route::get('shop', [FrontController::class, 'shop']);
Route::get('track', [FrontController::class, 'track']);
Route::get('checkout', [FrontController::class, 'checkout']);
Route::get('cart', [FrontController::class, 'cart']);
Route::get('shop-detail', [FrontController::class, 'detail']);
Route::get('about', [FrontController::class, 'about']);