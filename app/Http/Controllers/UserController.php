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

class UserController extends Controller
{

    public function users(){
        $users = User::all();
        return view('adminPage.users',['users' => $users]);
    }

    public function products(){
        $products = Product::all();
        return view('adminPage.products',['products' => $products]);
    }
    
    public function posts(){
        $posts = Post::all();
        return view('adminPage.posts',['posts' => $posts]);
    }

    public function likes(){
        $likes = Like::all();
        return view('adminPage.likes',['likes' => $likes]);
    }


    public function orders(){
        $orders = Order::all();
        return view('adminPage.orders',['orders' => $orders]);
    }

    public function categories(){
        $categories = Category::all();
        return view('adminPage.categories',['categories' => $categories]);
    }

    public function comments(){
        $comments = Comment::all();
        return view('adminPage.comments',['comments' => $comments]);
    }
}