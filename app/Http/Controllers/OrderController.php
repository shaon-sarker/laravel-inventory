<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pending_order = Order::select('customers.name', 'orders.*')->join('customers', 'customers.id', '=', 'orders.customer_id')->where('order_status', 'pending')->get();
        return view('order.index', compact('pending_order'));
    }
    public function vieworder($id)
    {
        $orders = Order::join('customers', 'customers.id', '=', 'orders.customer_id')->select('customers.*', 'orders.*')->where('orders.id', $id)->first();
        $orders_details = OrderDetail::select('products.prodruct_name', 'products.product_serialno', 'order_details.*')->join('products', 'products.id', '=', 'order_details.product_id')->where('order_id', $id)->get();

        return view('order.order_confirm', compact('orders', 'orders_details'));
    }

    public function orderdone($id)
    {
        $approve_order = Order::where('id', $id)->update(['order_status' => 'success']);
        $notification = array(
            'message' => 'Order Confirm',
            'alert-type' => 'success'
        );
        return redirect()->route('pendingorder')->with($notification);
    }

    public function successorder()
    {
        $success_order = Order::select('customers.name', 'orders.*')->join('customers', 'customers.id', '=', 'orders.customer_id')->where('order_status', 'success')->get();
        return view('order.success_order', compact('success_order'));
    }
}
