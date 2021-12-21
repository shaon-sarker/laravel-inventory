<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting_info = Setting::first();
        return view('setting.index', compact('setting_info'));
    }

    // print_r($setting->all());
    // die();



    // public function edit($setting_id)
    // {
    //     $setting_info = Setting::find($setting_id);
    //     return view('setting.index', compact('setting_info'));
    // }

    public function update(Request $request)
    {
        $setting_id = Setting::find($request->setting_id)->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_email' => $request->company_email,
            'company_phone' => $request->company_phone,
            'company_mobile' => $request->company_mobile,
            'company_city' => $request->company_city,
            'company_country' => $request->company_country,
            'company_zipcode' => $request->company_zipcode,
        ]);
        // $request->validate([
        //     'company_logo' => 'image',
        //     'company_logo' => 'file|size:3024',

        // ]);
        $new_setting_photo = $request->company_logo;
        $extension = $new_setting_photo->getClientOriginalExtension();
        $new_setting_name = $setting_id . '.' . $extension;

        Image::make($new_setting_photo)->save(base_path('public/uploads/setting/' . $new_setting_name));
        Setting::find($setting_id)->update([
            'company_logo' => $new_setting_name,
        ]);
        $notification = array(
            'message' => 'Settings Updated Succesfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
