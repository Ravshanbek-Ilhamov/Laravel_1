<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function users(){
        $users = User::all();
        return view('adminPage.user.users',['users' => $users]);
    }

    public function create_page(){
        return view('adminPage.user.user_create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'email_verified_at' => 'nullable|date',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = $request->email_verified_at ? $request->email_verified_at : null;
        // $user->remember_token = Str::random(10);

        $user->save();

        return redirect('/');
    }


    // UserController.php
    public function destroy($id)
    {
        $user = User::find($id);
        
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }


}