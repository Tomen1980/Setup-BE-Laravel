<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return dd("Hello World");
});

Route::get('/welcome', function () {
    return view('welcome');
});
