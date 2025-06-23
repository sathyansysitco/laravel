<?php
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
