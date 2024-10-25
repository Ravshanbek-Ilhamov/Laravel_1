<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
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
       
    public function store(CategoryStoreRequest $request){
        try {
            if ($request->id) {
                $category = Category::find($request->id);
            } else {
                $category = new Category();
            } 

            $category->name = $request->name;
            $category->tr = $request->tr;
            $category->active = $request->active;
            $category->save();

            session()->flash('success', 'Category saved successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'There was an issue saving the category.');
        }

        return redirect('/categories');
    }     
    
    public function edit(Category $category){
        return view('adminPage.category.category_edit', compact('category'));
    }

    public function destroy(Category $category){
        try {
            $category->delete();
            session()->flash('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'There was an issue deleting the category.');
        }
        return redirect('/categories');
    }
}