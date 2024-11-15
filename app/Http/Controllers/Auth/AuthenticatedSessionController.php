<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //authenticate the user
        $request->authenticate();


        //Regenerate the session to protect against session fixations attacks
        $request->session()->regenerate();

        //check the user's role and redirect acordingly
        $user = Auth::user();

        //var_dump($user);

        if($user->role === 'Admin'){
            //Redirect to the admin dashboard if the is an admin
            return redirect()->route('admin.dashboard');
        }elseif($user->role === 'Employee'){
            //Redirect to the admin dashboard if the is an admin
            return redirect()->route('employee.dashboard');
        }

        //return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        //logout the user
        Auth::guard('web')->logout();


       //invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
