<?php

use App\Http\Controllers\EmployeeController;
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
