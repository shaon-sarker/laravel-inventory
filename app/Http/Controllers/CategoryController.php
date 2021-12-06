<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;


class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }
    public function insert(CategoryPost $request)
    {
        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        $new_category_photo = $request->category_image;
        $extension = $new_category_photo->getClientOriginalExtension();
        $new_category_name = $category_id . '.' . $extension;

        Image::make($new_category_photo)->save(base_path('public/uploads/category/' . $new_category_name));
        Category::find($category_id)->update([
            'category_image' => $new_category_name,
        ]);
        $notification = array(
            'message' => 'Category Added Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function display()
    {
        $categorys = Category::all();
        return view('category.view', compact('categorys'));
    }
    public function Activecategory($category_id)
    {
        Category::findOrFail($category_id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Category Status active',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
        // return back()->with('status', 'Category Status Inactive');
    }
    public function Inactivecategory($category_id)
    {
        Category::findOrFail($category_id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Category Status Inactive',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
        // return back()->with('status', 'Category Status Inactive');
    }

    public function distroy($category_id)
    {
        $image = Category::find($category_id);
        $old_image = $image->category_image;
        $delete_path = public_path() . '/uploads/category/' . $old_image;
        unlink($delete_path);
        Category::find($category_id)->delete();
        $notification = array(
            'message' => 'Category Deleted Succesfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
