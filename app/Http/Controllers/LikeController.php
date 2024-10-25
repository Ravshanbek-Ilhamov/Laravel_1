<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeStoreRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    

    public function likes(){
        $likes = Like::all();
        return view('adminPage.like.likes',['likes' => $likes]);
    }

    public function create_page(){
        $posts = Post::all();
        $users = User::all();
        return view('adminPage.like.like_create',['posts' => $posts,'users' => $users]);
    }

    public function store(LikeStoreRequest $request){
        try {
            $like = new Like();
            $like->post_id = $request->post_id;
            $like->user_id = $request->user_id;
            $like->is_active = $request->is_active;
            $like->save();

            return redirect('/likes')->with('success', 'Like added successfully');
        } catch (\Exception $e) {
            return redirect('/likes')->with('error', 'Failed to add like');
        }
    }

    public function destroy(Like $like){
        try {
            if ($like) {
                $like->delete();
                return redirect()->back()->with('success', 'Like deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete like');
        }
    }
}
