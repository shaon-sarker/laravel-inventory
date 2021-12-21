<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerPost;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customer.index');
    }
    public function insert(CustomerPost $request)
    {
        $customer_id = Customer::insertGetId([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'branch_name' => $request->branch_name,
            'bank_name' => $request->bank_name,
            'created_at' => Carbon::now(),
        ]);
        $new_customer_photo = $request->photo;
        $extension = $new_customer_photo->getClientOriginalExtension();
        $new_customer_name = $customer_id . '.' . $extension;

        Image::make($new_customer_photo)->save(base_path('public/uploads/customers/' . $new_customer_name));
        Customer::find($customer_id)->update([
            'photo' => $new_customer_name,
        ]);
        $notification = array(
            'message' => 'Customer Added Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function display()
    {
        $customers = Customer::all();
        return view('customer.view', compact('customers'));
    }
    public function edit($customer_id)
    {
        $customer_edit = Customer::find($customer_id);
        return view('customer.edit', compact('customer_edit'));
    }
    public function update(Request $request)
    {
        $customer_id = Customer::find($request->customer_id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'branch_name' => $request->branch_name,
            'bank_name' => $request->bank_name,
            'created_at' => Carbon::now(),
        ]);
        // $request->validate([
        //     'photo' => 'image',
        //     'photo' => 'file|size:1024',

        // ]);
        $new_customer_photo = $request->photo;
        $extension = $new_customer_photo->getClientOriginalExtension();
        $new_customer_name = $request->customer_id . '.' . $extension;

        Image::make($new_customer_photo)->save(base_path('public/uploads/customers/' . $new_customer_name));
        Customer::find($request->customer_id)->update([
            'photo' => $new_customer_name,
        ]);
        $notification = array(
            'message' => 'Customer Updated Succesfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function distroy($customer_id)
    {
        $image = Customer::find($customer_id);
        $old_image = $image->photo;
        $delete_path = public_path() . '/uploads/customers/' . $old_image;
        unlink($delete_path);
        Customer::find($customer_id)->delete();
        $notification = array(
            'message' => 'Customer Deleted Succesfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
