<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('salary.index', compact('employees'));
    }
    public function insert(Request $request)
    {
        $month = $request->month;
        $employee_id = $request->employee_id;
        $advanced_salary = AdvanceSalary::where('month', $month)->where('employee_id', $employee_id)->first();
        // $advanced = DB::table('advance_salaries')
        //     ->where('month', $month)
        //     ->where('emp_id', $employee_id)
        //     ->first();

        if ($advanced_salary == NULL) {
            $employee_salary = array();
            $employee_salary['employee_id'] = $request->employee_id;
            $employee_salary['month'] = $request->month;
            $employee_salary['year'] = $request->year;
            $employee_salary['advance_salary'] = $request->advance_salary;

            $advanced_salary = AdvanceSalary::insert($employee_salary);
            if ($advanced_salary) {
                $notification = array(
                    'messege' => 'Successfully Advanced Paid',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Oopss!! Allready advanced Paid in this month',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allsalary()
    {
        $advanced_salary = AdvanceSalary::all();
        return view('salary.view_salary', compact('advanced_salary'));
    }
    public function paysalary()
    {
        $pay_salary = Employee::all();
        return view('salary.pay_salary', compact('pay_salary'));
    }
}
