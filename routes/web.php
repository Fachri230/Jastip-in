<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/menu', [ShopController::class, 'index'])
    ->name('menu');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
