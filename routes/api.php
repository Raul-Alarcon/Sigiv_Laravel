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

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreBranchController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

use App\Http\Controllers\ApplicationStatusController;

use App\Http\Controllers\FileController;

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


// Route::controller(CountryController::class)->group(function () {
//     Route::get('/countries', 'index')->name('countries.index');
//     Route::post('/countries', 'store')->name('countries.store');
//     Route::delete('/countries/{id}', 'destroy')->name('countries.destroy');
//     Route::put('/countries/{id}', 'update')->name('countries.update');
//     Route::patch('/countries/{id}', 'updateStatus')->name('countries.update.status');
// });

// Route::controller(DepartmentController::class)->group(function () {
//     Route::get('/departments', 'index')->name('departments.index');
//     Route::post('/departments', 'store')->name('departments.store');
//     Route::delete('/departments/{id}', 'destroy')->name('departments.destroy');
//     Route::put('/departments/{id}', 'update')->name('departments.update');
//     Route::patch('/departments/{id}', 'updateStatus')->name('departments.update.status');
// });

// Route::controller(MunicipalityController::class)->group(function () {
//     Route::get('/municipalities', 'index')->name('municipalities.index');
//     Route::post('/municipalities', 'store')->name('municipalities.store');
//     Route::delete('/municipalities/{id}', 'destroy')->name('municipalities.destroy');
//     Route::put('/municipalities/{id}', 'update')->name('municipalities.update');
//     Route::patch('/municipalities/{id}', 'updateStatus')->name('municipalities.update.status');
// });

// Route::controller(DistrictController::class)->group(function () {
//     Route::get('/districts', 'index')->name('districts.index');
//     Route::post('/districts', 'store')->name('districts.store');
//     Route::delete('/districts/{id}', 'destroy')->name('districts.destroy');
//     Route::put('/districts/{id}', 'update')->name('districts.update');
//     Route::patch('/districts/{id}', 'updateStatus')->name('districts.update.status');
// });

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

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers', 'index')->name('customers.index');
    Route::post('/customers', 'store')->name('customers.store');
    Route::put('/customers/{id}', 'update')->name('customers.update');
    Route::delete('/customers/{id}', 'destroy')->name('customers.destroy');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employees', 'index')->name('employees.index');
    Route::get('/employees/gender', 'getGenders')->name('employees-generders.index');
    Route::get('/employees/charge', 'getCharge')->name('employees-charges.index');
    Route::get('/employees/storebranch', 'getStoreBranches')->name('employees-storebranch.index');
    Route::post('/employees', 'store')->name('employees.store');
    Route::put('/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/suppliers', 'getSupplier')->name('products.suppliers.service');
    Route::get('/products/categories', 'getCategories')->name('products.category.service');
    Route::get('/products/storebranch', 'getStoreBranches')->name('products.category.service');
    Route::post('/products', 'store')->name('products.store');
    Route::put('/products/{id}', 'update')->name('products.update');
    Route::delete('/products/{id}', 'destroy')->name('products.destroy');
    Route::patch('/products/{id}', 'updateStatus')->name('products.update.status');
    Route::get('/products/stock', 'getProductsByStock')->name('products.stock');
});

Route::controller(StoreBranchController::class)->group(function () {
    Route::get('/storeBranches', 'index')->name('storeBranches.index');
    Route::post('/storeBranches', 'store')->name('storeBranches.store');
    Route::put('/storeBranches/{id}', 'update')->name('storeBranches.update');
    Route::delete('/storeBranches/{id}', 'destroy')->name('storeBranches.destroy');
});

Route::controller(ProductStockController::class)->group(function () {
    Route::get('/productStocks', 'index')->name('productStocks.index');
    Route::post('/productStocks', 'store')->name('productStocks.store');
    Route::put('/productStocks/{id}', 'update')->name('productStocks.update');
    Route::delete('/productStocks/{id}', 'destroy')->name('productStocks.destroy');
});

Route::controller(OrderStatusController::class)->group(function () {
    Route::get('/orderStatuses', 'index')->name('orderStatuses.index');
    Route::post('/orderStatuses', 'store')->name('orderStatuses.store');
    Route::put('/orderStatuses/{id}', 'update')->name('orderStatuses.update');
    Route::delete('/orderStatuses/{id}', 'destroy')->name('orderStatuses.destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders.index');
    Route::post('/orders', 'store')->name('orders.store');
    Route::put('/orders/{id}', 'update')->name('orders.update');
    Route::delete('/orders/{id}', 'destroy')->name('orders.destroy');
    Route::patch('/orders/{id}', 'updateStatus')->name('orders.update.status');
});

Route::controller(OrderDetailController::class)->group(function () {
    Route::get('/orderDetails', 'index')->name('orderDetails.index');
    Route::post('/orderDetails', 'store')->name('orderDetails.store');
    Route::put('/orderDetails/{id}', 'update')->name('orderDetails.update');
    Route::delete('/orderDetails/{id}', 'destroy')->name('orderDetails.destroy');
});

Route::controller(ApplicationStatusController::class)->group(function () {
    Route::get('/applicationStatuses', 'index')->name('applicationStatuses.index');
    Route::post('/applicationStatuses', 'store')->name('applicationStatuses.store');
    Route::put('/applicationStatuses/{id}', 'update')->name('applicationStatuses.update');
    Route::delete('/applicationStatuses/{id}', 'destroy')->name('applicationStatuses.destroy');
});

Route::post('/upload', [FileController::class, 'upload'])->name('upload_img');
Route::delete('/upload', [FileController::class, 'destroyImg'])->name('upload_destry_img');