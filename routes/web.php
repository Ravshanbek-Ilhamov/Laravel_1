<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProductController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#category
Route::get('/categories',[CategoryController::class,'categories']);
Route::get('/category-create',[CategoryController::class,'create_page']);
Route::post('/category_creation',[CategoryController::class,'store']);
Route::get('/category-edit/{category}', [CategoryController::class, 'edit']);
Route::delete('/category-delete/{category}', [CategoryController::class, 'destroy']);

#orders
Route::get('/orders',[OrderController::class,'orders']);
Route::get('/order-create',[OrderController::class,'create_page']);
Route::post('/order_creation',[OrderController::class,'store']);
Route::delete('/order-delete/{order}', [OrderController::class, 'destroy']);


#users
Route::get('/',[UserController::class,'users']);
Route::get('/user-create',[UserController::class,'create_page']);
Route::post('/user_creation',[UserController::class,'store']);
Route::delete('/user-delete/{user}', [UserController::class, 'destroy'])->name('user.delete');


#likes
Route::get('/likes',[LikeController::class,'likes']);
Route::get('/like-create',[LikeController::class,'create_page']);
Route::post('/like_creation',[LikeController::class,'store']);
Route::delete('/like-delete/{like}', [LikeController::class, 'destroy']);


#products
Route::get('/products',[ProductController::class,'products']);
Route::get('/product-create',[ProductController::class,'create_page']);
Route::post('/product_creation',[ProductController::class,'store']);
Route::delete('/product-delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');


#posts
Route::get('/posts',[PostController::class,'posts']);
Route::get('/post-create',[PostController::class,'create_page']);
Route::post('/post_creation',[PostController::class,'store']);
Route::delete('/post-delete/{post}', [PostController::class, 'destroy'])->name('post.delete');


#comments
Route::get('/comments',[CommentController::class,'comments']);
Route::get('/comment-create',[CommentController::class,'create_page']);
Route::post('/comment_creation',[CommentController::class,'store']);
Route::delete('/comment-delete/{comment}', [CommentController::class, 'destroy']);


#companies
Route::get('/companies',[CompanyController::class,'index']);
Route::get('/company-create',[CompanyController::class,'create']);
Route::post('/company_creation',[CompanyController::class,'store']);
Route::delete('/company-delete/{company}', [CompanyController::class, 'destroy']);


#companyProducts
Route::get('/company-products',[CompanyProductController::class,'index']);
Route::get('/company-products-create',[CompanyProductController::class,'create']);
Route::post('/company-products_creation',[CompanyProductController::class,'store']);
Route::delete('/company-products-delete/{companyProduct}', [CompanyProductController::class, 'destroy']);