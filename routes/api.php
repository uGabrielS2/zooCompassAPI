<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\Api\StockCategoryController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('animals', AnimalController::class);
Route::apiResource('stores', EstoqueController::class);
Route::apiResource('users', EstoqueController::class);
Route::get('/stock-categories', [StockCategoryController::class, 'index']);