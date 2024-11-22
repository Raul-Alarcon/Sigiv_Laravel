<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchasestatusController;
use App\Http\Controllers\ProductstatusController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/Charge', function () { return Inertia::render('Charge/index'); })->name('charge.page');

    Route::get('/ProductStatus', function () { return Inertia::render('ProductStatus/index'); })->name('productstatus.page');

    Route::get('/PurchaseStatus', function () { return Inertia::render('PurchaseStatus/index'); })->name('purchasestatus.page');

    Route::get('/categories', function () { return Inertia::render('Category/index'); })->name('categories.page');

    Route::get('/generes', function () { return Inertia::render('Gender/index'); })->name('generes.page');

    Route::get('/sectors', function () { return Inertia::render('Sector/index'); })->name('sectors.page');

    Route::get('/socialmedia', function () { return Inertia::render('SocialMedia/index'); })->name('socialmedia.page');

    Route::get('/suppliers', function () { return Inertia::render('Supplier/index'); })->name('suppliers.page');

    Route::get('/campanies', function () { return Inertia::render('Company/index'); })->name('company.page');
});


