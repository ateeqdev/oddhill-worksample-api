<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return response()->json([
        'message' => 'Unauthenticated',
        'error' => 'Please login to access this resource'
    ], 401);
})->name('login');

Route::get('/register', function () {
    return response()->json([
        'message' => 'Registration page',
        'redirect_to_api' => '/api/register'
    ]);
})->name('register');
