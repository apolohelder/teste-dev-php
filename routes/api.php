<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SupplierApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\UserApiController;

Route::get('/fornecedores', [SupplierApiController::class, 'index']);
Route::post('/fornecedores', [SupplierApiController::class, 'store']);
Route::get('/fornecedores/{id}', [SupplierApiController::class, 'show']);
Route::put('/fornecedores/{id}', [SupplierApiController::class, 'update']);
Route::delete('/fornecedores/{id}', [SupplierApiController::class, 'destroy']);

Route::get('/produtos', [ProductApiController::class, 'index']);
Route::post('/produtos', [ProductApiController::class, 'store']);
Route::get('/produtos/{id}', [ProductApiController::class, 'show']);
Route::put('/produtos/{id}', [ProductApiController::class, 'update']);
Route::delete('/produtos/{id}', [ProductApiController::class, 'destroy']);

Route::middleware('auth:api')->group(function() {
    Route::get('/users', [UserApiController::class, 'index']);
    Route::post('/users', [UserApiController::class, 'store']);
    Route::get('/users/{id}', [UserApiController::class, 'show']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);
});