<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\GenderController;
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


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', function () { return Inertia::render('Category/index'); })->name('categories.page'); 
    });


    Route::get('/socialmedia', [SocialMediaController::class, 'index'])->name('socialmedia.index');
    Route::post('/socialmedia', [SocialMediaController::class, 'store'])->name('socialmedia.store');
    Route::delete('/socialmedia/{Id}', [SocialMediaController::class, 'destroy'])->name('socialmedia.destroy');
    Route::put('/socialmedia/{Id}', [SocialMediaController::class,'update'])->name('socialmedia.update');
    
    Route::get('/sectors', [SectorController::class, 'index'])->name('sectors.index');
    Route::patch('/sectors/{id}',[SectorController::class, 'changeStatus'])->name('sector.update.status');
    Route::post('/sectors', [SectorController::class, 'store'])->name('sector.store');
    Route::delete('/sectors/{id}', [SectorController::class, 'destroy'])->name('sector.destroy');
    Route::put('/sectors/{idSector}', [SectorController::class, 'update'])->name('sector.update');

    Route::get('/charges', [ChargeController::class, 'index'])->name('charges.index');
    Route::post('/charges', [ChargeController::class, 'store'])->name('charges.store');
    Route::delete('/charges/{Id}', [ChargeController::class, 'destroy'])->name('charges.destroy');
    Route::put('/charges/{Id}', [ChargeController::class,'update'])->name('charges.update');

    Route::get('/gender', [ChargeController::class,'index'])->name('gender.index');
    Route::post('/gender', [ChargeController::class,'store'])->name('gender.store');
    Route::delete('/gender/{Id}', [ChargeController::class, 'destroy'])->name('gender.destroy');
    Route::put('/gender/{Id}', [ChargeController::class,'update'])->name('gender.update');
});


