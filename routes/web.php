<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;

Route::get('/trang-moi', [PagesController::class, 'trangMoi']);
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::post('/', [LoginController::class, 'logout'])->name('logout');
Route::get('/tim-kiem', [PagesController::class, 'timKiem'])->name('timkiem.sanpham');
Route::get('/products', [PagesController::class, 'sort'])->name('products.index');
Route::get('/detail/{id}', [PagesController::class, 'detail'])->name('sanpham.chitiet');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.post');
Route::post('/register', [LoginController::class, 'Register'])->name('address.store');
Route::get('/register', [LoginController::class, 'Register'])->name('address.index');
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'Checkcart'])->name('cart');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/buy-now', [CartController::class, 'buyNow'])->name('buy.now');
    Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('update.quantity');
    Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
});
