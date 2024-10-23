<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'users']);
Route::get('/likes',[UserController::class,'likes']);

Route::get('/products',[UserController::class,'products']);
Route::get('/orders',[UserController::class,'orders']);

Route::get('/posts',[UserController::class,'posts']);
Route::get('/categories',[UserController::class,'categories']);
Route::get('/comments',[UserController::class,'comments']);
