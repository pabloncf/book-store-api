<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Store\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# Auth routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->group(function () {
    # Book routes
    Route::apiResource('books', BookController::class);
    Route::post('books/{book}/add-store', [BookController::class, 'addStoreToBook']);

    # Stores routes
    Route::apiResource('stores', StoreController::class);
    Route::post('stores/{store}/add-book', [StoreController::class, 'addBookToStore']);
});
