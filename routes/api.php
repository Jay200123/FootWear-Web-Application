<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// product api 
//get
Route::get('products/all', [ProductController::class, 'getProduct'])->name('product.all');
//post
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');

//edit and update
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('product.update');

//delete
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.delete');

//service api 
//get
Route::get('services/all', [ServiceController::class, 'getService'])->name('service.all');
//post
Route::post('/services/store', [ServiceController::class, 'store'])->name('service.store');

//edit and update
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/services/{id}', [ServiceController::class, 'update'])->name('service.update');

//delete
Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('service.delete');


//customer
//get
Route::get('/customers/all', [CustomerController::class, 'getCustomerAll'])->name('customer.all');
// Route::get('/customers/all', ['uses' => 'CustomerController@getCustomerAll', 'as' => 'customer.getcustomerall']);

//post
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customer.store');

//edit and update
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customers/{id}', [CustomerController::class, 'update'])->name('customer.update');

//delete
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

//employee
//get
Route::get('/employees/all', [EmployeeController::class, 'getEmployeeAll'])->name('employee.all');
//post
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee.store');


//delete
Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

//edit
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');