<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $today_date = date('d/m/y');
        // $today_sales = Order::total();
        // $today_sales = Order::orderBy('id', 'desc')->sum('total');
        // echo $today_sales;
        // die();
        return view('home');
    }
}
