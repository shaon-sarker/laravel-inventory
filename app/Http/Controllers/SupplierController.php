<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierPost;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('supplier.index');
    }
    public function insert(SupplierPost $request)
    {
        $supplier_id = Supplier::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'type' => $request->type,
            'shop' => $request->shop,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'branch_name' => $request->branch_name,
            'bank_name' => $request->bank_name,
            'created_at' => Carbon::now(),
        ]);
        $new_supplier_photo = $request->photo;
        $extension = $new_supplier_photo->getClientOriginalExtension();
        $new_supplier_name = $supplier_id . '.' . $extension;

        Image::make($new_supplier_photo)->save(base_path('public/uploads/suppliers/' . $new_supplier_name));
        Supplier::find($supplier_id)->update([
            'photo' => $new_supplier_name,
        ]);
        $notification = array(
            'message' => 'Supplier Added Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function display()
    {
        $suppliers = Supplier::all();
        return view('supplier.view', compact('suppliers'));
    }
    public function edit($supplier_id)
    {
        $supplier_edit = Supplier::find($supplier_id);
        return view('supplier.edit', compact('supplier_edit'));
    }
    public function update(Request $request)
    {
        $supplier_id = Supplier::find($request->supplier_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'type' => $request->type,
            'shop' => $request->shop,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'branch_name' => $request->branch_name,
            'bank_name' => $request->bank_name,
            'updated_at' => Carbon::now(),
        ]);
        // $request->validate([
        //     'photo' => 'image',
        //     'photo' => 'file|size:1024',

        // ]);
        $new_supplier_photo = $request->photo;
        $extension = $new_supplier_photo->getClientOriginalExtension();
        $new_supplier_name = $supplier_id . '.' . $extension;

        Image::make($new_supplier_photo)->save(base_path('public/uploads/suppliers/' . $new_supplier_name));
        Supplier::find($supplier_id)->update([
            'photo' => $new_supplier_name,
        ]);
        $notification = array(
            'message' => 'Supplier Added Succesfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function distroy($supplier_id)
    {
        $image = Supplier::find($supplier_id);
        $old_image = $image->photo;
        $delete_path = public_path() . '/uploads/suppliers/' . $old_image;
        unlink($delete_path);
        Supplier::find($supplier_id)->delete();
        $notification = array(
            'message' => 'Supplier Deleted Succesfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
