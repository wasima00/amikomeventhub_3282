<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/my-ticket/{id}', [EventController::class, 'ticket'])->name('ticket');

// [Phase 2] Route Payment Success — akan diaktifkan setelah integrasi Midtrans
// Route::get('/payment/success/{order_id}', [PaymentController::class, 'success'])->name('payment.success');

// Rute Admin Area
Route::prefix('admin')->name('admin.')->group(function () {

    // Rute Auth (bebas akses, tanpa middleware)
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
        Route::get('register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('register', [AuthController::class, 'register'])->name('register.post');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Mengamankan Route Administrasi di balik Middleware
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', EventAdminController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners', PartnerController::class);
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    });
});


// Route::get('/profil', function () {
//     return view('profil');
// });

// Route::get('/katalog', function () {
//     return view('katalog');
// });

// Route::get('/tentang', function () {
//     return '<h1>Ini adalah halaman tentang aplikasi eventHub</h1>';
// });

// Route::get('/bantuan', function () {
//     return view('bantuan');
// });  

// Route::get('/kontak', function () {
//     return view('contact');
// });
