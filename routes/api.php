<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchasestatusController;
use App\Http\Controllers\ProductstatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(SupplierController::class)->group(function () {
    Route::get('/suppliers', 'index');
    Route::post('/suppliers', 'store');
    Route::put('/suppliers/{id}', 'update');
    Route::delete('/suppliers/{id}', 'destroy');
    Route::patch('/suppliers/{id}', 'updateStatus');
});

Route::controller(PurchasestatusController::class)->group(function () {
    Route::get('/purchasestatuses', 'index');
    Route::post('/purchasestatuses', 'store');
    Route::put('/purchasestatuses/{id}', 'update');
    Route::delete('/purchasestatuses/{id}', 'destroy');
    Route::patch('/purchasestatuses/{id}', 'updateStatus');
});

Route::controller(ProductstatusController::class)->group(function () {
    Route::get('/productstatuses', 'index');
    Route::post('/productstatuses', 'store');
    Route::put('/productstatuses/{id}', 'update');
    Route::delete('/productstatuses/{id}', 'destroy');
    Route::patch('/productstatuses/{id}', 'updateStatus');
});