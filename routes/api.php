<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EstoqueController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('animals', AnimalController::class);
Route::apiResource('stores', EstoqueController::class);
Route::apiResource('users', EstoqueController::class);
