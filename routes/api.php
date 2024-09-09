<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\SectorController;
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
