<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view("frontend.custlogin");
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index')->with('message', 'You are logged in!');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
}

    public function register(){
        return view("frontend.custregister");
    }

    public function registerPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect(route("login"))->with('success', 'User Created Successfully');
        }

        return redirect(route("register"))->with('message', 'Failed to Create Account');
    }
}
