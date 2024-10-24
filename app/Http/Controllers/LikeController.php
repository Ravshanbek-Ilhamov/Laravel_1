<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    

    public function likes(){
        $likes = Like::all();
        return view('adminPage.likes',['likes' => $likes]);
    }


    public function create_page(){
        $posts = Post::all();
        $users = User::all();
        return view('adminPage.creation.like_create',['posts' => $posts,'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'user_id' => 'required|integer|exists:users,id',
            'is_active' => 'required|boolean'
        ]);
    
        $like = new Like();
        $like->post_id = $request->post_id;
        $like->user_id = $request->user_id;
        $like->is_active = $request->is_active;
    
        $like->save();
    
        return redirect('/likes');
    }
    

}
