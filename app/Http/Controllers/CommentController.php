<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function comments(){
        $comments = Comment::all();
        return view('adminPage.comment.comments',['comments' => $comments]);
    }

    public function create_page(){
        $posts = Post::all();
        return view('adminPage.comment.comment_create',['posts' => $posts]);
    }

    public function store(CommentStoreRequest $request){
        try {
            $comment = new Comment();
            $comment->post_id = $request->post_id;
            $comment->body = $request->body;    
            $comment->save();

            return redirect('/comments')->with('success', 'Comment created successfully');
        } catch (\Exception $e) {
            return redirect('/comments')->with('error', 'Failed to create comment');
        }
    }
    
    public function destroy(Comment $comment){
        try {
            $comment->delete();
            return redirect('/comments')->with('success', 'Comment deleted successfully');
        } catch (\Exception $e) {
            return redirect('/comments')->with('error', 'Failed to delete comment');
        }
    }
}
