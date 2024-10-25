<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function products(){
        $products = Product::all();
        return view('adminPage.product.products',['products' => $products]);
    }

    public function create_page(){
        $users = User::all();
        $categories = Category::all();
        return view('adminPage.product.product_create',['users' => $users,'categories' => $categories]);
    }


    public function store(ProductStoreRequest $request){
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = date('y-m-d') . '_' . time() . '.' . $extension;
            $file->move('product_images/', $filename);
            $data['image'] = 'product_images/' . $filename; // Set image path in $data
        }
    
        Product::create($data);
    
        return redirect('/products')->with('success', 'Product created successfully!');
    }
    
    public function destroy(Product $product){
        try {
            if ($product) {
                $product->delete();
                return redirect()->back()->with('success', 'Product deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete product');
        }
    
        return redirect()->back()->with('error', 'Product not found');
    }
    


}
