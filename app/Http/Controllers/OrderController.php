<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function orders(){
        $orders = Order::all();
        return view('adminPage.order.orders',['orders' => $orders]);
    }

    public function create_page(){
        $products = Product::all();
        $users = User::all();
        return view('adminPage.order.order_create',['products' => $products,'users' => $users]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
    
        $request->validate([
            'client_id' => 'required|integer|exists:users,id',
            'seller_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);
    
        $order = new Order();
        
        $order->client_id = $request->client_id;
        $order->seller_id = $request->seller_id;
        $order->product_id = $request->product_id;
        $order->count = $request->quantity;
        $order->status = $request->status;
    
        $order->save();
    
        return redirect('/orders');
    }

    // OrderController.php
    public function destroy($id)
    {
        $order = Order::find($id);
        
        if ($order) {
            $order->delete();
            return redirect()->back()->with('success', 'Order deleted successfully!');
        }

        return redirect()->back()->with('error', 'Order not found.');
    }

        

}