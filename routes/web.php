<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\CheckoutController; // Pastikan ini diimport

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great! 
| 
*/

Route::get('/', function () {
    return view('auth.landing');
});

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route (Protected by Middleware)
Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth');

// About Routes
Route::middleware('auth')->group(function () {
    Route::get('/about', [AboutController::class, 'index'])->name('auth.about');
    Route::post('/about', [AboutController::class, 'store'])->name('auth.about.store');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('auth.about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('auth.about.destroy');
});

// Produk Routes
Route::namespace('Produk')->group(function () {
    Route::get('produk', [ProductsController::class, 'index'])->name('produk.index');
    Route::get('cart', [ProductsController::class, 'cart'])->name('produk.cart');
    Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('produk.add_to_cart');
    Route::patch('update-cart', [ProductsController::class, 'update'])->name('produk.update_cart');
    Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('produk.remove_from_cart');
});

// Route untuk pembayaran
Route::namespace('Pembayaran')->group(function () {
    Route::post('/session', [StripeController::class, 'session'])->name('pembayaran.session');
    Route::get('/success', [StripeController::class, 'success'])->name('pembayaran.success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('pembayaran.cancel');
});

// Contact Routes
Route::resource('contact', ContactMessageController::class);

// Checkout Routes (Diubah untuk menghindari duplikasi)
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.index'); // Halaman checkout
    Route::post('/', [CheckoutController::class, 'processCheckout'])->name('checkout.process'); // Proses checkout

    Route::get('/payment', [CheckoutController::class, 'showPaymentForm'])->name('checkout.payment'); // Halaman pembayaran
    Route::post('/payment', [CheckoutController::class, 'processPayment'])->name('checkout.payment.process'); // Proses pembayaran

    Route::get('/success', [CheckoutController::class, 'success'])->name('checkout.success'); // Halaman sukses
    Route::get('/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel'); // Halaman cancel
});

// Cart Empty Route
Route::get('/cart/empty', function() {
    return view('cart.empty');
})->name('cart.empty');
