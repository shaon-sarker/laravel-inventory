<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendenceController extends Controller
{
    public function index()
    {
        $attendence = Employee::all();
        return view('attendence.index', compact('attendence'));
    }
    public function insert(Request $request)
    {
        $attendence_date = $request->attendence_date;
        $attendence_info = Attendence::where('attendence_date', $attendence_date)->first();
        if ($attendence_info) {
            $notification = array(
                'message' => 'Already Attendence Added',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        } else {
            foreach ($request->employee_id as $employee_id) {
                Attendence::insert([
                    'employee_id' => $employee_id,
                    'attendence' => $request->attendence[$employee_id],
                    'attendence_date' => $request->attendence_date,
                    'attendence_year' => $request->attendence_year,
                    'month' => date('F'),
                    'edit_date' => date('d_m_y'),
                    'created_at' => Carbon::now(),
                ]);
            }
            $notification = array(
                'message' => 'Attendence Added Succesfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function display()
    {
        $all_attendence = Attendence::select('edit_date', 'month')->groupBy('edit_date', 'month')->get();
        return view('attendence.view', compact('all_attendence'));
    }

    public function edit($edit_date)
    {
        // $edit_attendence = Attendence::where('edit_date', $edit_date)->get();
        $edit_attendence = Attendence::select('employees.name', 'employees.photo', 'attendences.*')->join('employees', 'employees.id', '=', 'attendences.employee_id')->where('edit_date', $edit_date)->get();

        // return  $edit_attendence;
        return view('attendence.edit', compact('edit_attendence'));
    }

    public function update(Request $request)
    {
        foreach ($request->id as $id) {
            $attendence_data = [
                'attendence' => $request->attendence[$id],
                'attendence_date' => $request->attendence_date,
                'attendence_year' => $request->attendence_year,
                'month' => date('F'),
                'created_at' => Carbon::now(),
            ];
            $attendence = Attendence::where(['attendence_date' => $request->attendence_date, 'id' => $id])->first();
            $attendence->update($attendence_data);
        }
        $notification = array(
            'message' => 'Attendence Update Succesfully',
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }

    // public function distroy(){

    // }
}
