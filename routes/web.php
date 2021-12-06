<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
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
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

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
Route::get('/supplier/view', [SupplierController::class, 'display'])->name('supplier.view');
Route::get('/supplier/edit/{supplier_id}', [SupplierController::class, 'edit']);
Route::post('/supplier/update', [SupplierController::class, 'update']);
Route::get('/customer/delete/{customer_id}', [CustomerController::class, 'distroy']);

//Salary Route
Route::get('/salary', [SalaryController::class, 'index'])->name('salary');
Route::post('/salary/store', [SalaryController::class, 'insert'])->name('salary.insert');
Route::get('/salary/advance-salary', [SalaryController::class, 'allsalary'])->name('all.advanceslary');
Route::get('/salary/pay-salary', [SalaryController::class, 'paysalary'])->name('pay.salary');

//Category Rute
Route::get('/category', [CategoryController::class, 'index'])->name('catgeory');
Route::post('/category/store', [CategoryController::class, 'insert'])->name('catgeory.insert');
Route::get('/category/view', [CategoryController::class, 'display'])->name('catgeory.view');
Route::get('/category/active/{category_id}', [CategoryController::class, 'Activecategory']);
Route::get('/category/inactive/{category_id}', [CategoryController::class, 'Inactivecategory']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'distroy']);
