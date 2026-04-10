<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});


Route::get('/tentang', function () {
    return '<h1>Ini adalah halaman tentang aplikasi eventHub</h1>';
});

Route::get('/bantuan', function () {
    return view('bantuan');
});  

Route::get('/kontak', function () {
    return view('contact');
});

