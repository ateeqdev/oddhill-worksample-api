<?php

use App\Http\Controllers\API\V1\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\BookController;
use App\Http\Controllers\AuthController;

$api_config = config('api.versions.v1');

Route::prefix($api_config['prefix'])
    ->group(function () {
        Route::apiResource('books', BookController::class);
        Route::apiResource('authors', AuthorController::class);
    });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout-all', [AuthController::class, 'logoutAll']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});
