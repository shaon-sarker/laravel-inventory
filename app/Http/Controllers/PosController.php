<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerPost;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

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
}
