<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->back()->with('success', 'Order created successfully.');
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->back()->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
?>