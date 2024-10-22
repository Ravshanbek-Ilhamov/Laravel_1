<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'admin_page']);
Route::get('/user-page',[UserController::class,'user_page']);

Route::get('/index2',[UserController::class,'index2']);
Route::get('/index3',[UserController::class,'index3']);

Route::get('/calendar',[UserController::class,'calendar_page']);
Route::get('/gallery',[UserController::class,'gallery_page']);