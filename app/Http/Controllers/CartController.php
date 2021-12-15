<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function AddCart(Request $request)
    {
        $pos_data = array();
        $pos_data['id'] = $request->id;
        $pos_data['name'] = $request->name;
        $pos_data['qty'] = $request->qty;
        $pos_data['price'] = $request->price;
        $pos_data['weight'] = $request->weight;
        Cart::add($pos_data);
        $notification = array(
            'message' => 'Product Added Succesfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function Cartupdate(Request $request, $rowId)
    {
        $pos_quantity_update = $request->qty;
        Cart::update($rowId, $pos_quantity_update);
        $notification = array(
            'message' => 'Product Update Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Cartdelete($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Product Delete Succesfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
