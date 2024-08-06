<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SectorController;
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


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/sectors', [SectorController::class, 'index'])->name('sectors.index');
    Route::patch('/sectors/{id}',[SectorController::class, 'changeStatus'])->name('sector.update.status');
    Route::post('/sectors', [SectorController::class, 'store'])->name('sector.store');
    Route::delete('/sectors/{id}', [SectorController::class, 'destroy'])->name('sector.destroy');
    Route::put('/sectors/{idSector}', [SectorController::class, 'update'])->name('sector.update');
});


