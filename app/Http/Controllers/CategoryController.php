<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories(){
        $categories = Category::all();
        return view('adminPage.category.categories',['categories' => $categories]);
    }
    
    public function create_page(){
        return view('adminPage.category.category_create');
    }

    public function store(Request $request){
        $request->validate(
            [
            'name' => 'required|max:255',
            'tr' => 'required',
            'active' => 'required'
            ]);

        if ($request->id) {
            $category = Category::find($request->id);
        } else {
            $category = new Category();
        }

        $category->name = $request->name;
        $category->tr = $request->tr;
        $category->active = $request->active;
        $category->save();

        return redirect('/categories');
    }   
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('adminPage.category.category_edit', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/categories');
    }
}