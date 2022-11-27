<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;

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

//edit
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');

//delete
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.delete');

//service api 
//get
Route::get('services/all', [ServiceController::class, 'getService'])->name('service.all');
//post
Route::post('/services/store', [ServiceController::class, 'store'])->name('service.store');

//delete
Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('service.delete');


//customer
//get
Route::get('/customers/all', ['uses' => 'CustomerController@getCustomerAll', 'as' => 'customer.getcustomerall']);
//post
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customer.store');

//delete
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');