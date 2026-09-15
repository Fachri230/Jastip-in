<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController; // ← baris baru

Route::get('/menu', [ShopController::class, 'index'])
    ->name('menu');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');
Route::get('/', function () {
    return view('welcome');
});

// ← 2 baris baru di bawah ini
Route::get('/', [OrderController::class, 'index'])->name('orders.index');
Route::get('/pesanan/{id}', [OrderController::class, 'show'])->name('orders.show');
