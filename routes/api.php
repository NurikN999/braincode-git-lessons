<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/test', [TestController::class, 'index']);


Route::middleware('jwt.auth')->group(function () {
    // Users routes
    Route::prefix('users')->group(function() {
        Route::post('', [UserController::class, 'store']);
        Route::get('', [UserController::class, 'index']);
    });

    // Books routes
    Route::prefix('books')->group(function () {
        Route::put('/{book}', [BookController::class, 'update']);
        Route::delete('/{book}', [BookController::class, 'delete']);
        Route::get('/', [BookController::class, 'index']);
        Route::get('/{book}', [BookController::class, 'show']);
    });
});
