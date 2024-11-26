<?php
 
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

    // Route::get('/Charge', function () { return Inertia::render('Charge/index'); })->name('charge.page');

    Route::get('/ProductStatus', function () { return Inertia::render('ProductStatus/index'); })->name('productstatus.page');

    Route::get('/PurchaseStatus', function () { return Inertia::render('PurchaseStatus/index'); })->name('purchasestatus.page');

    Route::get('/categories', function () { return Inertia::render('Category/index'); })->name('categories.page');

    Route::get('/generes', function () { return Inertia::render('Gender/index'); })->name('generes.page');

    Route::get('/sectors', function () { return Inertia::render('Sector/index'); })->name('sectors.page');

    Route::get('/socialmedia', function () { return Inertia::render('SocialMedia/index'); })->name('socialmedia.page'); 

    Route::get('/campanies', function () { return Inertia::render('Company/index'); })->name('company.page');
    Route::get('/customers', function () { 
        return Inertia::render('Administration/customers'); })->name('customers.page');

    Route::get('/employee', function () { 
            return Inertia::render('Administration/Employee'); })->name('employee.page');
            
    Route::get('/users', function () { 
        return Inertia::render('Administration/Users'); })->name('users.page');


    Route::get('/charge', function () { 
        return Inertia::render('Administration/Charge'); })->name('charge.page');

    Route::get('/supplier', function () { 
        return Inertia::render('Administration/Supplier'); })->name('supplier.page');  

    
    Route::get('/products', function () { 
            return Inertia::render('Inventory/Products'); })->name('products.page'); 

    Route::get('/warehouse-request', function () { 
            return Inertia::render('Inventory/WarehouseRequest'); 
    })->name('warehouse-request.page');
                
    Route::get('/warehouse', function () { 
        return Inertia::render('Inventory/Warehouse'); 
    })->name('warehouse.page');
    // Route::prefix("Inventory")
    // ->name("inventory.")
    // ->group(function(){
    //     Route::get('/products', function () { 
    //         return Inertia::render('Inventory/Products'); })->name('products.page'); 
    // });

});


