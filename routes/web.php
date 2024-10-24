<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

#category
Route::get('/categories',[CategoryController::class,'categories']);
Route::get('/category-create',[CategoryController::class,'create_page']);
Route::post('/category_creation',[CategoryController::class,'store']);

#orders
Route::get('/orders',[OrderController::class,'orders']);
Route::get('/order-create',[OrderController::class,'create_page']);
Route::post('/order_creation',[OrderController::class,'store']);

#users
Route::get('/',[UserController::class,'users']);
Route::get('/user-create',[UserController::class,'create_page']);
Route::post('/user_creation',[UserController::class,'store']);

#likes
Route::get('/likes',[LikeController::class,'likes']);
Route::get('/like-create',[LikeController::class,'create_page']);
Route::post('/like_creation',[LikeController::class,'store']);

#products
Route::get('/products',[ProductController::class,'products']);
Route::get('/product-create',[ProductController::class,'create_page']);
Route::post('/product_creation',[ProductController::class,'store']);

#posts
Route::get('/posts',[PostController::class,'posts']);
Route::get('/post-create',[PostController::class,'create_page']);
Route::post('/post_creation',[PostController::class,'store']);

#comments
Route::get('/comments',[CommentController::class,'comments']);
Route::get('/comment-create',[CommentController::class,'create_page']);
Route::post('/comment_creation',[CommentController::class,'store']);

