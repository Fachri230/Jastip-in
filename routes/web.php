<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth');


Route::get('/menu', [ShopController::class, 'filter'])->name('menu');


Route::get('/pesanan', function() {
    return view('siswa.pesanan');
});


Route::get('/Riwayat', function() {
    return view('siswa.history');
});


Route::get('/editProfile', function() {
    return view('siswa.edit');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [OrderController::class, 'index'])->name('orders.index');
Route::get('/pesanan/{id}', [OrderController::class, 'show'])->name('orders.show');
