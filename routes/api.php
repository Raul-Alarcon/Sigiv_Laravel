<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchasestatusController;
use App\Http\Controllers\ProductstatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\SectorController;
use app\Http\Controllers\CountryController;
use app\Http\Controllers\DepartmentController;
use app\Http\Controllers\MunicipalityController;
use app\Http\Controllers\DistrictController;
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

Route::controller(CountryController::class)->group(function () {
    Route::get('/countries', 'index')->name('countries.index');
    Route::post('/countries', 'store')->name('countries.store');
    Route::delete('/countries/{id}', 'destroy')->name('countries.destroy');
    Route::put('/countries/{id}', 'update')->name('countries.update');
    Route::patch('/countries/{id}', 'updateStatus')->name('countries.update.status');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::post('/departments', 'store')->name('departments.store');
    Route::delete('/departments/{id}', 'destroy')->name('departments.destroy');
    Route::put('/departments/{id}', 'update')->name('departments.update');
    Route::patch('/departments/{id}', 'updateStatus')->name('departments.update.status');
});

Route::controller(MunicipalityController::class)->group(function () {
    Route::get('/municipalities', 'index')->name('municipalities.index');
    Route::post('/municipalities', 'store')->name('municipalities.store');
    Route::delete('/municipalities/{id}', 'destroy')->name('municipalities.destroy');
    Route::put('/municipalities/{id}', 'update')->name('municipalities.update');
    Route::patch('/municipalities/{id}', 'updateStatus')->name('municipalities.update.status');
});

Route::controller(DistrictController::class)->group(function () {
    Route::get('/districts', 'index')->name('districts.index');
    Route::post('/districts', 'store')->name('districts.store');
    Route::delete('/districts/{id}', 'destroy')->name('districts.destroy');
    Route::put('/districts/{id}', 'update')->name('districts.update');
    Route::patch('/districts/{id}', 'updateStatus')->name('districts.update.status');
});