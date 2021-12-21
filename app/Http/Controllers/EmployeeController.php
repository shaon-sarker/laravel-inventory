<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeePost;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('employee.index');
    }
    public function store(EmployeePost $request)
    {
        $emoloyee_id = Employee::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'slaray' => $request->slaray,
            'city' => $request->city,
            'created_at' => Carbon::now(),
        ]);
        $new_employee_photo = $request->photo;
        $extension = $new_employee_photo->getClientOriginalExtension();
        $new_employee_name = $emoloyee_id . '.' . $extension;

        Image::make($new_employee_photo)->save(base_path('public/uploads/employess/' . $new_employee_name));
        Employee::find($emoloyee_id)->update([
            'photo' => $new_employee_name,
        ]);
        $notification = array(
            'message' => 'Employee Added Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function display()
    {
        $employee = Employee::all();
        return view('employee.view', compact('employee'));
    }
    public function edit($employee_id)
    {
        $employee_edit = Employee::find($employee_id);
        return view('employee.edit', compact('employee_edit'));
    }
    public function update(Request $request)
    {
        $employee_id = Employee::find($request->employee_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'slaray' => $request->slaray,
            'city' => $request->city,
        ]);
        // $request->validate([
        //     'photo' => 'image',
        //     'photo' => 'file|size:1024',

        // ]);
        $new_employee_photo = $request->photo;
        $extension = $new_employee_photo->getClientOriginalExtension();
        $new_employee_name = $request->employee_id . '.' . $extension;

        Image::make($new_employee_photo)->save(base_path('public/uploads/employess/' . $new_employee_name));
        Employee::find($request->employee_id)->update([
            'photo' => $new_employee_name,
        ]);
        $notification = array(
            'message' => 'Employee Updated Succesfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function distroy($emoloyee_id)
    {
        $image = Employee::find($emoloyee_id);
        $old_image = $image->photo;
        $delete_path = public_path() . '/uploads/employess/' . $old_image;
        unlink($delete_path);
        Employee::find($emoloyee_id)->delete();
        $notification = array(
            'message' => 'Employee Deleted Succesfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
        // return back()->with('delete', 'Product delete succesfully');
    }
}
