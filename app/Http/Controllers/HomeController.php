<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today_date = date('d-m-y');
        $this_year = date("Y");
        $this_month = date("F");

        $today_sales = Order::where('order_date', $today_date)->sum('sub_total');
        $total_order = Order::count();
        $advance_salary = AdvanceSalary::sum('advance_salary');
        $total_customers = Customer::count();
        $total_employees = Employee::count();
        $total_supplier = Supplier::count();
        $expense = Expense::where('month', $this_month)->sum('amount');
        $products = Product::count();
        return view('home', compact('today_sales', 'total_order', 'advance_salary', 'total_customers', 'total_employees', 'total_supplier', 'expense', 'products'));
    }
}
