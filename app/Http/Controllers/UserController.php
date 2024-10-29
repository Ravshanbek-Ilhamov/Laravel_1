<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function users(Request $request)
    {
        $search = $request->input('search');
    
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);
    
        return view('adminPage.user.users', ['users' => $users]);
    }
    
    
    public function create_page(){
        return view('adminPage.user.user_create');
    }
    
    public function store(UserStoreRequest $request){
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = $request->email_verified_at ? $request->email_verified_at : null;
    
            $user->save();
    
            return redirect('/')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function update(UpdateUserRequest $request, User $user){
        dd($request->all(),$user);
        $user->update($request->validated());
    
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    
    public function destroy(User $user){
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        
        $users = User::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('email', 'LIKE', "%{$query}%")
                     ->get();
    
        return response()->json(['data' => $users]);
    }
}