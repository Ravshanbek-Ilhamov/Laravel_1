<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProductController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MassalliqController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OvqatController;
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
Route::get('/orders',[OrderController::class,'orders'])->name('order.index');
Route::get('/order-create',[OrderController::class,'create_page']);
Route::post('/order_creation',[OrderController::class,'store']);
Route::put('/order_update/{order}',[OrderController::class,'update'])->name('order.update');
Route::delete('/order-delete/{order}', [OrderController::class, 'destroy']);


#users
Route::get('/',[UserController::class,'users'])->name('user.index');
Route::get('/user-create',[UserController::class,'create_page']);
Route::post('/user_creation',[UserController::class,'store']);
Route::put('/user_update/{user}',[UserController::class,'update'])->name('user.update');
Route::delete('/user-delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/users/search', [UserController::class, 'search'])->name('users.search');


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
Route::get('/companies',[CompanyController::class,'index'])->name('company.index');
Route::get('/company-create',[CompanyController::class,'create']);
Route::post('/company_creation',[CompanyController::class,'store']);
Route::put('/company_update/{company}',[CompanyController::class,'update'])->name('company.update');
Route::delete('/company-delete/{company}', [CompanyController::class, 'destroy']);


#companyProducts
Route::get('/company-products',[CompanyProductController::class,'index'])->name('companyProduct.index');
Route::get('/company-products-create',[CompanyProductController::class,'create']);
Route::post('/company-products_creation',[CompanyProductController::class,'store']);
Route::put('/company-products_update/{companyProduct}',[CompanyProductController::class,'update'])->name('companyProducts.update');
Route::delete('/company-products-delete/{companyProduct}', [CompanyProductController::class, 'destroy']);


// ingredients
Route::get('/ingredients',[MassalliqController::class,'index'])->name('massalliq.index');


// food
Route::get('/food',[OvqatController::class,'index'])->name('ovqat.index');
Route::get('/ovqat_create',[OvqatController::class,'create'])->name('ovqat.create');
Route::post('/food_store',[OvqatController::class,'store'])->name('ovqat.store');



// foodIngred
Route::get('/foodIngred',[OvqatController::class,'index'])->name('ovqatmass.index');

