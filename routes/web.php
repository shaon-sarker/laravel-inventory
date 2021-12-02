<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Employee Route
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.insert');
Route::get('/employee/view', [EmployeeController::class, 'display'])->name('employee.view');
Route::get('/employee/edit/{employee_id}', [EmployeeController::class, 'edit']);
Route::post('/employee/update', [EmployeeController::class, 'update']);
Route::get('/employee/delete/{employee_id}', [EmployeeController::class, 'distroy']);


//Customer Route
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::post('/customer/store', [CustomerController::class, 'insert'])->name('customer.insert');
Route::get('/customer/view', [CustomerController::class, 'display'])->name('customer.view');
Route::get('/customer/edit/{customer_id}', [CustomerController::class, 'edit']);
Route::post('/customer/update', [CustomerController::class, 'update']);
Route::get('/customer/delete/{customer_id}', [CustomerController::class, 'distroy']);


//Supplier Route
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier/store', [SupplierController::class, 'insert'])->name('supplier.insert');
// Route::get('/customer/view', [CustomerController::class, 'display'])->name('customer.view');
// Route::get('/customer/edit/{customer_id}', [CustomerController::class, 'edit']);
// Route::post('/customer/update', [CustomerController::class, 'update']);
// Route::get('/customer/delete/{customer_id}', [CustomerController::class, 'distroy']);