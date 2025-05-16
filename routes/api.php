<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;


Route::resource('/user', UserController::class);

Route::get('/get-cache', function () {
    return Cache::get('users', 'default');
});
Route::get('/get-cache/{id}', function ($id) {
    return Cache::get('user_' . $id, 'User not found');
});


