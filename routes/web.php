<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//halaman home
Route::get('/', function () {
    return view('home');
});

