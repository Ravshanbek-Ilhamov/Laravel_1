<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function products(){
        $products = Product::all();
        return view('adminPage.products',['products' => $products]);
    }

    public function create_page(){
        $users = User::all();
        $categories = Category::all();
        return view('adminPage.creation.product_create',['users' => $users,'categories' => $categories]);
    }


    public function store(Request $request){
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'category_id' => 'required|integer|exists:categories,id',
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'image' => 'required|string|max:255',
        'count' => 'required|integer|min:0',
        'premium' => 'required|boolean',
    ]);

    $product = new Product();
    $product->user_id = $request->user_id;
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->price = $request->price;
    $product->image = $request->image;
    $product->count = $request->count;
    $product->premium = $request->premium;

    $product->save();

    return redirect('/products')->with('success', 'Product created successfully!');
}

}
