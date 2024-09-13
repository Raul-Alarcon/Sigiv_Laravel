<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchasestatusController;
use App\Http\Controllers\ProductstatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\GenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::post('/categories', 'store')->name('categories.store');
    Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');
    Route::put('/categories/{id}', 'update')->name('categories.update');
    Route::patch('/categories/{id}', 'updateStatus')->name('categories.update.status');
});


Route::controller(ChargeController::class)->group(function () {
    Route::get('/charges', 'index')->name('charges.index');
    Route::post('/charges','store')->name('charges.store');
    Route::delete('/charges/{id}', 'destroy')->name('charges.destroy');
    Route::put('/charges/{id}', 'update')->name('charges.update');
    Route::patch('/charges/{id}', 'updateStatus')->name('charges.update.status');
});


Route::controller(SectorController::class)->group(function () {
    Route::get('/sectors', 'index')->name('sectors.index');
    Route::post('/sectors', 'store')->name('sectors.store');
    Route::delete('/sectors/{id}', 'destroy')->name('sectors.destroy');
    Route::put('/sectors/{id}', 'update')->name('sectors.update');
    Route::patch('/sectors/{id}', 'changeStatus')->name('sectors.update.status');
});

Route::controller(GenderController::class)->group(function () {
    Route::get('/generes', 'index')->name('generes.index');
    Route::post('/generes', 'store')->name('generes.store');
    Route::delete('/generes/{id}', 'destroy')->name('generes.destroy');
    Route::put('/generes/{id}', 'update')->name('generes.update');
    Route::patch('/generes/{id}', 'updateStatus')->name('generes.update.status');
});

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


