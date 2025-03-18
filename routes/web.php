<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/profile', [UserController::class, 'show'])->name('profile');
Route::get('/update-profile', [UserController::class, 'edit'])->name('update.profile');
Route::post('/update-profile', [UserController::class, 'update'])->name('update.profile.post');

Route::get('/update-password', [UserController::class, 'changePassword'])->name('update.password');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password.post');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'showadmin'])->name('users.show');


// Public Routes
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/trang-moi', [PagesController::class, 'trangMoi']);
Route::get('/tim-kiem', [PagesController::class, 'timKiem'])->name('timkiem.sanpham');
Route::get('/products', [PagesController::class, 'sort'])->name('products.index');
Route::get('/detail/{id}', [PagesController::class, 'detail'])->name('sanpham.chitiet');

// Login and Registration Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.post');
Route::get('/register', [LoginController::class, 'Register'])->name('address.index'); // Corrected name consistency
Route::post('/register', [LoginController::class, 'Register'])->name('address.store');
Route::post('/', [LoginController::class, 'logout'])->name('logout');
Route::get('/checkemail', [LoginController::class, 'showcheckemail'])->name('checkemail');
Route::post('/checkemail', [LoginController::class, 'checkemail'])->name('checkemail.process');
Route::get('/forget', [LoginController::class, 'forget'])->name('Login.forget');
Route::post('/forget', [LoginController::class, 'resetpassword'])->name('resetpassword');
Route::get('/List', [PagesController::class, 'List'])->name('Admin.list');

// Authenticated Routes (Requires Login)
Route::middleware('auth')->group(function () {
    Route::get('/qr_momo', [CartController::class, 'qr'])->name('qr_momo');
    Route::get('/cart', [CartController::class, 'Checkcart'])->name('cart');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/buy-now', [CartController::class, 'buyNow'])->name('buy.now');
    Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('update.quantity');
    Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
});

// Admin Routes
Route::prefix('Admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('Admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('Admin.create');
    Route::post('/', [AdminController::class, 'store'])->name('Admin.store');
    Route::get('/{product}', [AdminController::class, 'show'])->name('Admin.show');
    Route::get('/{product}/edit', [AdminController::class, 'edit'])->name('Admin.edit');
    Route::put('/{product}', [AdminController::class, 'update'])->name('Admin.update');
    Route::patch('/{product}', [AdminController::class, 'update']);
    Route::delete('/{product}', [AdminController::class, 'destroy'])->name('Admin.destroy');
});


// Invoice Routes
Route::prefix('invoices')->group(function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('{mahd}', [InvoiceController::class, 'show'])->name('invoices.show');
});
?>