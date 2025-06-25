<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\PostAPIController;

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected API Routes (with Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [PostAPIController::class, 'index']);
    Route::post('/posts', [PostAPIController::class, 'store']);
    Route::get('/posts/{id}', [PostAPIController::class, 'show']);
    Route::put('/posts/{id}', [PostAPIController::class, 'update']);
    Route::delete('/posts/{id}', [PostAPIController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
