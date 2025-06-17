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
<<<<<<< HEAD
//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
=======
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    
>>>>>>> ba6f3a070c62a7c35fcb585a80bb83cf2d795c34
    Route::apiResource('animals', AnimalController::class);
    Route::apiResource('stores', EstoqueController::class);
    Route::apiResource('users', EstoqueController::class);
    Route::get('/stock-categories', [StockCategoryController::class, 'index']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
<<<<<<< HEAD
//});
=======
});
>>>>>>> ba6f3a070c62a7c35fcb585a80bb83cf2d795c34
