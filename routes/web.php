<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/index2', function () {
    return view('index2');
});


Route::get('/index3', function () {
    return view('index3');
});


Route::get('/calendar', function () {
    return view('pages.calendar');
});


Route::get('/gallery', function () {
    return view('pages.gallery');
});
