<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PenjualProdukController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// HALAMAN UTAMA
Route::get('/', [OrderController::class, 'index'])
    ->name('orders.index');

// AUTENTIKASI
Auth::routes();

// HOME
Route::get('/home', function () {
    if (auth()->check() && auth()->user()->role === 'penjual') {
        return redirect()->route('penjual.dashboard');
    }

    return app(HomeController::class)->index();
})->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth');

Route::get('/logout', [
    App\Http\Controllers\Auth\LoginController::class,
    'logout'
])->name('logout.get');

// MENU / TOKO
Route::get('/menu', [ShopController::class, 'filter'])
    ->name('menu');

Route::get('/menu/search', [ShopController::class, 'search'])
    ->name('search');

// HALAMAN SISWA / PEMBELI
Route::get('/pesanan', function () {
    return view('siswa.pesanan');
});

Route::get('/Riwayat', function () {
    return view('siswa.history');
});

Route::get('/editProfile', function () {
    return view('siswa.edit');
});

Route::get('/pesanan/{id}', [OrderController::class, 'show'])
    ->name('orders.show');

// REGISTRASI SELLER
Route::get('/register-option', function () {
    return view('auth.register-choice');
})->name('register.options');

Route::get('/register/seller', function () {
    return view('auth.register-seller');
})->name('register.seller');

Route::post('/register/seller', [
    App\Http\Controllers\Auth\RegisterController::class,
    'register'
])->name('register.seller.submit');

// CRUD STOCK
Route::middleware('auth')->group(function () {
    Route::resource('crud-stock', StockController::class);
});

// DASHBOARD DAN CRUD PRODUK PENJUAL
Route::middleware('auth')
    ->prefix('penjual')
    ->name('penjual.')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', [
            PenjualProdukController::class,
            'dashboard'
        ])->name('dashboard');

        // MANAJEMEN PESANAN
        Route::get('/pesanan', function () {
            return view('penjual.pesanan');
        })->name('pesanan.index');

        // KELOLA PRODUK
        Route::get('/produk', [
            PenjualProdukController::class,
            'index'
        ])->name('produk.index');

        // TAMBAH PRODUK
        Route::get('/produk/tambah', [
            PenjualProdukController::class,
            'create'
        ])->name('produk.create');

        Route::post('/produk', [
            PenjualProdukController::class,
            'store'
        ])->name('produk.store');

        // EDIT PRODUK
        Route::get('/produk/{id}/edit', [
            PenjualProdukController::class,
            'edit'
        ])->name('produk.edit');

        Route::put('/produk/{id}', [
            PenjualProdukController::class,
            'update'
        ])->name('produk.update');

        // HAPUS PRODUK
        Route::delete('/produk/{id}', [
            PenjualProdukController::class,
            'destroy'
        ])->name('produk.destroy');
    });
