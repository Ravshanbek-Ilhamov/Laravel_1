<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function comments(){
        $comments = Comment::all();
        return view('adminPage.comments',['comments' => $comments]);
    }

    public function create_page(){
        $posts = Post::all();
        return view('adminPage.creation.comment_create',['posts' => $posts]);
    }

    public function store(Request $request){
    // dd($request->all());
    
    $request->validate(
        [
            'post_id' => 'required|integer|exists:posts,id',
            'body' => 'required'
        ]);
        
        $comment = new Comment();
        
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        
        $comment->save();

        return redirect('/comments');
    }

}
