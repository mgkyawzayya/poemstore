<?php

namespace App\Http\Controllers;

use App\Order;
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
        $orders = Order::count();
        $pending_orders = Order::where('accepted', '=', false)->count();
        $total_price = Order::sum('price');
        return view('index', compact(['orders', 'pending_orders', 'total_price']));
    }

    /**
     *
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $orders = Order::count();
        $pending_orders = Order::where('accepted', '=', false)->count();
        $total_price = Order::sum('price');
        return view('index', compact(['orders', 'pending_orders', 'total_price']));
    }
}
