<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{id}', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket/{id}', [EventController::class, 'ticket'])->name('ticket');

// Rute Admin Area
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventAdminController::class);
    Route::resource('categories', CategoryController::class)->except(['show', 'create', 'edit']);
    Route::resource('partners', PartnerController::class)->except(['show', 'create', 'edit']);
    Route::get('/transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
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
