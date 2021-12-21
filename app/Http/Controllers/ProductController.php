<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorys = Category::all();
        $suppliers = Supplier::all();
        return view('product.index', compact('categorys', 'suppliers'));
    }
    public function insert(ProductPost $request)
    {
        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'product_serialno' => $request->product_serialno,
            'prodruct_name' => $request->prodruct_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_grage' => $request->product_grage,
            'product_route' => $request->product_route,
            'buy_date' => $request->buy_date,
            'expire_date' => $request->expire_date,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'created_at' => Carbon::now(),
        ]);
        $new_product_photo = $request->product_image;
        $extension = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id . '.' . $extension;

        Image::make($new_product_photo)->save(base_path('public/uploads/products/' . $new_product_name));
        Product::find($product_id)->update([
            'product_image' => $new_product_name,
        ]);
        $notification = array(
            'message' => 'Product Added Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function display()
    {
        $products = Product::all();
        return view('product.view', compact('products'));
    }
    public function edit($product_id)
    {
        $categorys = Category::all();
        $product_edit = Product::find($product_id);
        return view('product.edit', compact('product_edit', 'categorys'));
    }
    public function update(Request $request)
    {
        $product_id = Product::find($request->product_id)->update([
            'category_id' => $request->category_id,
            'product_serialno' => $request->product_serialno,
            'prodruct_name' => $request->prodruct_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'created_at' => Carbon::now(),
        ]);
        // $request->validate([
        //     'photo' => 'image',
        //     'photo' => 'file|size:1024',

        // ]);
        $new_product_photo = $request->product_image;
        $extension = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id . '.' . $extension;

        Image::make($new_product_photo)->save(base_path('public/uploads/products/' . $new_product_name));
        Product::find($product_id)->update([
            'product_image' => $new_product_name,
        ]);
        $notification = array(
            'message' => 'Product Updated Succesfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function distroy($product_id)
    {
        $image = Product::find($product_id);
        $old_image = $image->product_image;
        $delete_path = public_path() . '/uploads/products/' . $old_image;
        unlink($delete_path);
        Product::find($product_id)->delete();
        $notification = array(
            'message' => 'Prodcuts Deleted Succesfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
