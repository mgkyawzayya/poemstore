<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('accepted', '=', true)->paginate(20);
        return view('orders.index', compact('orders'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $orders = Order::where('accepted', '=', false)->paginate(20);
        return view('orders.pendings', compact('orders'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:orders',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->accepted = false;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('uploads', $imageName, 'public');

            $order->photo = '/storage/'. $path;
        } else {
            $order->photo = null;
        }
        $order->save();

        return redirect()->back()->with('message', 'Order Confirmation Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        
        $order->update(['accepted' => true]);

        return redirect()->route('pending-orders.index')->with('message', 'Order Confirmation Completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
