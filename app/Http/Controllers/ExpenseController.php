<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpensePost;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('expense.index');
    }
    public function insert(ExpensePost $request)
    {
        Expense::insert([
            'details' => $request->details,
            'amount' => $request->amount,
            'month' => $request->month,
            'date' => $request->date,
            'year' => $request->year,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Expense Added Succesfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function todayexpense()
    {
        $expense_date = date("d/m/y");
        $today_expense = Expense::where('date', $expense_date)->get();
        $today_total_purchae = Expense::where('date', $expense_date)->sum('amount');
        return view('expense.today_expense', compact('today_expense', 'today_total_purchae'));
    }
    public function edit($expense_id)
    {

        $expense_edit = Expense::find($expense_id);
        return view('expense.edit', compact('expense_edit'));
    }
    public function update(Request $request)
    {

        Expense::find($request->expense_id)->update([
            'details' => $request->details,
            'amount' => $request->amount,
            'month' => $request->month,
            'date' => $request->date,
            'year' => $request->year,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Expense Update Succesfully',
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }

    public function monthexpense()
    {
        $expense_month = date("F");
        $month_expense = Expense::where('month', $expense_month)->get();
        $monthly_total_purchae = Expense::where('month', $expense_month)->sum('amount');
        return view('expense.monthly_expense', compact('month_expense', 'monthly_total_purchae'));
    }

    public function yearexpense()
    {
        $expense_year = date("Y");
        $year_expense = Expense::where('year', $expense_year)->get();
        $yearly_total_purchae = Expense::where('year', $expense_year)->sum('amount');
        return view('expense.year_expense', compact('year_expense', 'yearly_total_purchae'));
    }

    public function januarymonth()
    {

        $expense_month = "January";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function februarymonth()
    {

        $expense_month = "February";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function marchmonth()
    {

        $expense_month = "March";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function aprilmonth()
    {

        $expense_month = "April";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function maymonth()
    {

        $expense_month = "May";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function junemonth()
    {

        $expense_month = "June";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function julymonth()
    {

        $expense_month = "July";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function augustmonth()
    {

        $expense_month = "August";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function septembermonth()
    {

        $expense_month = "September";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function octobermonth()
    {

        $expense_month = "October";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function novembermonth()
    {

        $expense_month = "November";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
    public function decembermonth()
    {

        $expense_month = "December";
        $month_expense = Expense::where('month', $expense_month)->get();
        return view('expense.monthly_expense', compact('month_expense'));
    }
}
