<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('/siswa/index');
});

Route::prefix('siswa')->group(function() {
    Route::get('/', function() {
        return view('/siswa/index');
    })->name('siswa');

    Route::get('/siswa.menu', function() {
        return view('/siswa/menu');
    })->name('menu');

    Route::get('/siswa.history', function() {
        return view('/siswa/history');
    })->name('history');

    Route::get('/cart', function() {
        return view('/siswa/cart');
    })->name('cart');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
