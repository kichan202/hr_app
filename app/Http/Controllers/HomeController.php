<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // If authenticated, check the user's role and redirect accordingly
            echo "wtf";
            $user = Auth::user();

            if ($user->role === 'Admin') {
                // Redirect to admin dashboard
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'Eployee') {
                // Redirect to user dashboard (or another route for regular users)
                return redirect()->route('user.dashboard');
            }

            // Default to redirecting to a default dashboard if no specific role matched
            return redirect()->route('default.dashboard');
        }

        // If the user is not authenticated, redirect to login page
        return redirect()->route('login');
    }
}
