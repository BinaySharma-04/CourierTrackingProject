<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.adminlogin');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Find the staff member by email
        $staff = StaffModel::where('email', $request->email)->first();
    
        // Check if the staff member exists and if the password matches
        if ($staff && $request->password === $staff->password) { // Comparing plain text password
            // Log in the user
            Auth::login($staff);
    
            // Redirect to the intended page or admin dashboard
            return redirect('/admin'); // Change to your dashboard route
        }
    
        // If authentication fails, redirect back to the login with error
        return redirect()->back()
            ->withErrors(['email' => 'Invalid email or password. Please try again.'])
            ->withInput($request->only('email')); // Retain the email input
    }
    
}
