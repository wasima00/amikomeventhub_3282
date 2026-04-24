<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{id}', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket/{id}', [EventController::class, 'ticket'])->name('ticket');

// Rute Admin Area
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/events', [AdminEventController::class, 'indexAdmin'])->name('events.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/transactions', function() {
        return view('admin.transactions');
    })->name('transactions.index');
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
