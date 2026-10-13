<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualProdukController;

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth');


Route::get('/menu', [ShopController::class, 'filter'])->name('menu');
Route::get('/menu/search', [ShopController::class, 'search'])->name('search');


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


Route::middleware('auth')->prefix('penjual')->name('penjual.')->group(function () {
    Route::get('/produk', [PenjualProdukController::class, 'index'])
        ->name('produk.index');

    Route::get('/produk/tambah', [PenjualProdukController::class, 'create'])
        ->name('produk.create');

    Route::post('/produk', [PenjualProdukController::class, 'store'])
        ->name('produk.store');

    Route::get('/produk/{id}/edit', [PenjualProdukController::class, 'edit'])
        ->name('produk.edit');

    Route::put('/produk/{id}', [PenjualProdukController::class, 'update'])
        ->name('produk.update');

    Route::delete('/produk/{id}', [PenjualProdukController::class, 'destroy'])
        ->name('produk.destroy');
});