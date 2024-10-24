<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function posts(){
        $posts = Post::all();
        return view('adminPage.post.posts',['posts' => $posts]);
    }


    public function create_page(){
        $categories = Category::all();
        return view('adminPage.post.post_create',['categories' => $categories]);
    }


    public function store(Request $request){
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'likes' => 'nullable|integer|min:0',
            'dislikes' => 'nullable|integer|min:0',
        ]);

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->likes = $request->likes ?? 0; 
        $post->dislikes = $request->dislikes ?? 0;

        $post->save();

        return redirect('/posts');
    }

    // PostController.php
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if ($post) {
            $post->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }


}
