<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchasestatusController;
use App\Http\Controllers\ProductstatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;
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
    Route::get('/suppliers', 'index')->name('suppliers.index');
    Route::post('/suppliers', 'store')->name('suppliers.store');
    Route::put('/suppliers/{id}', 'update')->name('suppliers.update');
    Route::delete('/suppliers/{id}', 'destroy')->name('suppliers.destroy');
    Route::patch('/suppliers/{id}', 'updateStatus')->name('suppliers.update.status');
});

Route::controller(PurchasestatusController::class)->group(function () {
    Route::get('/purchasestatus', 'index')->name('purchasestatus.index');
    Route::post('/purchasestatus', 'store')->name('purchasestatus.store');
    Route::put('/purchasestatus/{id}', 'update')->name('purchasestatus.update');
    Route::delete('/purchasestatus/{id}', 'destroy')->name('purchasestatus.destroy');
    Route::patch('/purchasestatus/{id}', 'updateStatus')->name('purchasestatus.update.status');
});

Route::controller(ProductstatusController::class)->group(function () {
    Route::get('/productstatus', 'index')->name('productstatus.index');
    Route::post('/productstatus', 'store')->name('productstatus.store');
    Route::put('/productstatus/{id}', 'update')->name('productstatus.update');
    Route::delete('/productstatus/{id}', 'destroy')->name('productstatus.destroy');
    Route::patch('/productstatus/{id}', 'updateStatus')->name('productstatus.update.status');
});

Route::controller(SocialMediaController::class)->group(function () {
    Route::get('/socialmedia', 'index')->name('socialmedia.index');
    Route::post('/socialmedia', 'store')->name('socialmedia.store');
    Route::put('/socialmedia/{id}', 'update')->name('socialmedia.update');
    Route::delete('/socialmedia/{id}', 'destroy')->name('socialmedia.destroy');
});


Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::post('/companies', 'store')->name('companies.store');
    Route::put('/companies/{id}', 'update')->name('companies.update');
    Route::delete('/companies/{id}', 'destroy')->name('companies.destroy');
    Route::patch('/companies/{id}', 'updateStatus')->name('companies.update.status');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/userCompany', 'index')->name('userCompany.index');
    Route::post('/userCompany', 'store')->name('userCompany.store');
    Route::put('/userCompany/{id}', 'update')->name('userCompany.update');
    Route::delete('/userCompany/{id}', 'destroy')->name('userCompany.destroy');
    Route::patch('/userCompany/{id}', 'updateStatus')->name('userCompany.update.status');
});




