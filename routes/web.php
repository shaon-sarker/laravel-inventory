<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SettingController;
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
Route::get('/supplier/delete/{supplier_id}', [SupplierController::class, 'distroy']);

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

//Product Route
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/product/store', [ProductController::class, 'insert'])->name('product.insert');
Route::get('/product/view', [ProductController::class, 'display'])->name('product.view');
Route::get('/product/edit/{product_id}', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
Route::get('/product/delete/{product_id}', [ProductController::class, 'distroy']);


//Expense Route
Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');
Route::post('/expense/store', [ExpenseController::class, 'insert'])->name('expense.insert');
Route::get('/expense/view', [ExpenseController::class, 'display'])->name('expense.view');
Route::get('/todayexpense', [ExpenseController::class, 'todayexpense'])->name('today.expense');
Route::get('/expense/edit/{expense_id}', [ExpenseController::class, 'edit']);
Route::post('/expense/update', [ExpenseController::class, 'update']);
Route::get('/monthlyexpense', [ExpenseController::class, 'monthexpense'])->name('month.expense');
Route::get('/yearlyexpense', [ExpenseController::class, 'yearexpense'])->name('year.expense');

//More Month Expense Route-------
Route::get('/expense/month', [ExpenseController::class, 'januarymonth'])->name('january.expense');
Route::get('/expense/scmonth', [ExpenseController::class, 'februarymonth'])->name('feb.expense');
Route::get('/expense/tmonth', [ExpenseController::class, 'marchmonth'])->name('march.expense');
Route::get('/expense/fmonth', [ExpenseController::class, 'aprilmonth'])->name('april.expense');
Route::get('/expense/fimonth', [ExpenseController::class, 'maymonth'])->name('may.expense');
Route::get('/expense/smonth', [ExpenseController::class, 'junemonth'])->name('june.expense');
Route::get('/expense/semonth', [ExpenseController::class, 'julymonth'])->name('july.expense');
Route::get('/expense/emonth', [ExpenseController::class, 'augustmonth'])->name('august.expense');
Route::get('/expense/nmonth', [ExpenseController::class, 'septembermonth'])->name('september.expense');
Route::get('/expense/temonth', [ExpenseController::class, 'octobermonth'])->name('october.expense');
Route::get('/expense/elemonth', [ExpenseController::class, 'novembermonth'])->name('november.expense');
Route::get('/expense/twemonth', [ExpenseController::class, 'decembermonth'])->name('december.expense');

//Attendence Route------
Route::get('/attendence', [AttendenceController::class, 'index'])->name('attendence');
Route::post('/attendence/store', [AttendenceController::class, 'insert'])->name('attendence.insert');
Route::get('/attendence/view', [AttendenceController::class, 'display'])->name('attendence.view');
Route::get('/attendence/edit/{edit_date}', [AttendenceController::class, 'edit']);
Route::post('/attendence/update', [AttendenceController::class, 'update']);

//Settings Route--------
Route::get('/setting', [SettingController::class, 'index'])->name('setting');
Route::post('/setting/update', [SettingController::class, 'update']);

//POS Route-------
Route::get('/pos', [PosController::class, 'index'])->name('pos');
Route::post('/create-invoice', [PosController::class, 'invoice'])->name('invoice');
Route::post('/final-invoice/insert', [PosController::class, 'finalinvoice'])->name('invoicefinal');

//Cart Controller
Route::post('/add-cart', [CartController::class, 'AddCart']);
Route::post('/updatecart/{rowId}', [CartController::class, 'Cartupdate']);
Route::get('/deletecart/{rowId}', [CartController::class, 'Cartdelete']);

//Order Pending-----
Route::get('/pending', [OrderController::class, 'index'])->name('pendingorder');
Route::get('/pending/view/{id}', [OrderController::class, 'vieworder']);
Route::get('/pending/done/{id}', [OrderController::class, 'orderdone']);
Route::get('/success/order', [OrderController::class, 'successorder'])->name('successorder');
