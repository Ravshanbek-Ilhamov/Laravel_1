<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
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

    public function store(PostStoreRequest $request){
        try {
            $post = new Post();
            $post->category_id = $request->category_id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->likes = $request->likes ?? 0; 
            $post->dislikes = $request->dislikes ?? 0;
    
            $post->save();
    
            return redirect('/posts')->with('success', 'Post created successfully');
        } catch (\Exception $e) {
            return redirect('/posts')->with('error', 'Failed to create post');
        }
    }
    

    public function destroy(Post $post){
        try {
            if ($post) {
                $post->delete();
                return redirect()->back()->with('success', 'Post deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete post');
        }
    
        return redirect()->back()->with('error', 'Post not found');
    }
    

}
