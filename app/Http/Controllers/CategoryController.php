<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories(){
        $categories = Category::all();
        return view('adminPage.categories',['categories' => $categories]);
    }
    
    public function create_page(){
        return view('adminPage.creation.category_create');
    }

    public function store(Request $request){
        $request->validate(
            [
            'name' => 'required|max:255',
            'tr' => 'required',
            'active' => 'required'
            ]);

        $category = new Category();
        
        $category->name = $request->name;
        $category->tr = $request->tr;
        $category->active = $request->active;
        $category->save();

        return redirect('/categories');
    }    

}