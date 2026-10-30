<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PenjualProdukController;
use App\Http\Controllers\StockController; // 🟢 Impor StockController wajib ada di sini
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- Rute Halaman Awal & Autentikasi Utama ---
Route::get('/', [OrderController::class, 'index'])->name('orders.index');

Auth::routes(); 

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth');
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');

// --- Rute Toko / Menu Depan ---
Route::get('/menu', [ShopController::class, 'filter'])->name('menu');
Route::get('/menu/search', [ShopController::class, 'search'])->name('search');

// --- Rute Siswa / Pembeli ---
Route::get('/pesanan', function() { return view('siswa.pesanan'); });
Route::get('/Riwayat', function() { return view('siswa.history'); });
Route::get('/editProfile', function() { return view('siswa.edit'); });
Route::get('/pesanan/{id}', [OrderController::class, 'show'])->name('orders.show');

// --- Rute Pilihan Registrasi Ganti Awal ---
Route::get('/register-option', function () { return view('auth.register-choice'); })->name('register.options');
Route::get('/register/seller', function () { return view('auth.register-seller'); })->name('register.seller');
Route::post('/register/seller', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.seller.submit');

// --- 🔴 GRUP ROUTE CRUD UTAMA (DIPROTEKSI AUTH) ---
Route::middleware('auth')->group(function () {
    // 1. Rute CRUD Stok Barang Logistik Penjual
    Route::resource('crud-stock', StockController::class);

    // 2. Rute CRUD Produk Penjual dengan Prefix Bawaan Anda
    Route::prefix('penjual')->name('penjual.')->group(function () {
        Route::get('/produk', [PenjualProdukController::class, 'index'])->name('produk.index');
        Route::get('/produk/tambah', [PenjualProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [PenjualProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [PenjualProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [PenjualProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [PenjualProdukController::class, 'destroy'])->name('produk.destroy');
    });
});
