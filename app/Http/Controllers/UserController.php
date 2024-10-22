<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_page(){
        return view('userPage.index');
    }

    public function admin_page(){
        return view('adminPage.index');
    }


    public function index2(){
        return view('adminPage.index2');
    }

    public function index3(){
        return view('adminPage.index3');
    }

    public function calendar_page(){
        return view('adminPage.pages.calendar');
    }

    public function gallery_page(){
        return view('adminPage.pages.gallery');
    }

}