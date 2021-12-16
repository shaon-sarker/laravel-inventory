<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerPost;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Carbon\Carbon;

class PosController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $customers = Customer::all();
        $categorys = Category::all();
        return view('pos.index', compact('products', 'customers', 'categorys'));
    }

    public function invoice(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
        ]);
        $customer_id = $request->customer_id;
        $customer_name = Customer::where('id', $customer_id)->first();
        $contents =  Cart::content();
        // echo $contents;
        return view('invoice.index', compact('customer_name', 'contents'));
        // $contents =  Cart::content();
        // $customers = $request->customer_id;
        // echo "<pre>";
        // print_r($contents);
        // echo "<br>";
        // print_r($customers);
        // die();
    }
    public function finalinvoice(Request $request)
    {
        $order_id = Order::insertGetId([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'order_status' => $request->order_status,
            'total_products' => $request->total_products,
            'sub_total' => $request->sub_total,
            'vat' => $request->vat,
            'total' => $request->total,
            'total' => $request->total,
            'payment_status' => $request->payment_status,
            'pay' => $request->pay,
            'due' => $request->due,
            'created_at' => Carbon::now(),
        ]);
        $contents =  Cart::content();
        foreach ($contents as
            $content) {
            OrderDetail::insert([
                'order_id' => $order_id,
                'product_id' => $content->id,
                'product_quantity' => $content->qty,
                'unitcost' => $content->weight,
                'total' => $content->price,
                'created_at' => Carbon::now(),
            ]);
        }
        // Product::find($content->product_id)->decrement('product_quantity', $content->product_quantity);
        Cart::destroy();
        $notification = array(
            'message' => 'Succesfully Invoice Created | Please deliver the product',
            'alert-type' => 'success'
        );
        return redirect()->route('pos')->with($notification);
    }
}
