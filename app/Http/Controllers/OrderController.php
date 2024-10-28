<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderController extends Controller
{

    public function orders(){
        $orders = Order::all()->pagination();
        $products = Product::all();
        $users = User::all();
        return view('adminPage.order.orders',['orders' => $orders,'products' => $products,'users' => $users]);
    }

    public function create_page(){
        $products = Product::all();
        $users = User::all();
        return view('adminPage.order.order_create',['products' => $products,'users' => $users]);
    }

    public function store(OrderStoreRequest $request){
        try {
            $order = new Order();
            
            $order->client_id = $request->client_id;
            $order->seller_id = $request->seller_id;
            $order->product_id = $request->product_id;
            $order->count = $request->quantity;
            $order->status = $request->status;
        
            $order->save();
            
            return redirect('/orders')->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            return redirect('/orders')->with('error', 'Failed to create order');
        }
    }
    
    public function update(UpdateOrderRequest $request, Order $order){
        $order->update($request->validated());
    
        return redirect()->route('order.index')->with('success', 'Order updated successfully');
    }
    
    public function destroy(Order $order){
        if ($order) {
            $order->delete();
            return redirect()->back()->with('success', 'Order deleted successfully!');
        }

        return redirect()->back()->with('error', 'Order not found.');
    }

}