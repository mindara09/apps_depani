<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/buat-reservasi', [HomeController::class, 'create_reservation'])->name('create_reservation');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/keranjang/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
Route::get('/keranjang', [HomeController::class, 'cart'])->name('cart');
Route::get('/hapus-keranjang/{id}', [HomeController::class, 'remove'])->name('remove');
Route::get('/keranjang-minus/{id}', [HomeController::class, 'minusToCart'])->name('minusToCart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/submit', [HomeController::class, 'submit'])->name('submit');
Route::get('/sukses', [HomeController::class, 'sukses'])->name('sukses');
Route::get('/review_customer', [HomeController::class, 'review_customer'])->name('review_customer');
Route::post('/submit_review', [HomeController::class, 'submit_review'])->name('submit_review');


Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login', [DashboardController::class, 'proses_login'])->name('proses_login');

Route::middleware(['auth.user'])->group(function () {
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/transaksi', [DashboardController::class, 'transaction'])->name('transaction');
    Route::post('/submit_transaksi', [DashboardController::class, 'submit_transaction'])->name('submit_transaction');
    Route::get('/pengguna', [DashboardController::class, 'users'])->name('users');
    Route::get('/reservasi', [DashboardController::class, 'reservation'])->name('reservation');
    Route::get('/status_reservation/{id}/{status_id}', [DashboardController::class, 'status_reservation'])->name('status_reservation');
    Route::get('/pengaturan',  [DashboardController::class, 'settings'])->name('settings');
    Route::post('/update_pengaturan', [DashboardController::class, 'update_settings'])->name('update_settings');
    Route::post('/update_password', [DashboardController::class, 'update_password'])->name('update_password');
    Route::get('/review', [DashboardController::class, 'review'])->name('review');
    Route::get('/produk', [DashboardController::class, 'product'])->name('product');
    Route::post('/produk', [DashboardController::class, 'process_product'])->name('process_product');
    Route::post('/produk/{id}', [DashboardController::class, 'update_product'])->name('update_product');
    Route::get('/produk/{id}', [DashboardController::class, 'delete_product'])->name('delete_product');
    Route::get('/status_stock/{id}/{status_stok}', [DashboardController::class, 'status_stock'])->name('status_stock');
});