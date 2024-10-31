<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/posts')->with('success', 'You are logged in!');
        }else{
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }
    


    public function registerPage(){
        return view('auth.register');
    }


    public function register(StoreUsersRequest $request){  
        // dd($request);
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user->email_verified_at = $request->email_verified_at ? $request->email_verified_at : null;
            $user->save();
    
            return redirect('/login')->with('success', 'User Registered successfully. Please Login!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function logout(){
        FacadesAuth::logout();
        return redirect('/')->with('success', 'You have been logged out.');
    }

}
