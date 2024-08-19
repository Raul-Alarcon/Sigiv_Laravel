<?php

use App\Http\Controllers\CategoryController;
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

Route::controller(GenderController::class)->group(function () {
    Route::get('/generes', 'index')->name('generes.index');
    Route::post('/generes', 'store')->name('generes.store');
    Route::delete('/generes/{id}', 'destroy')->name('generes.destroy');
    Route::put('/generes/{id}', 'update')->name('generes.update');
    Route::patch('/generes/{id}', 'updateStatus')->name('generes.update.status');
});
