<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\Api\StockCategoryController;
use App\Http\Controllers\AuthController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('animals', AnimalController::class);
    Route::apiResource('stores', EstoqueController::class);
    Route::apiResource('users', EstoqueController::class);
    Route::get('/stock-categories', [StockCategoryController::class, 'index']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
//});