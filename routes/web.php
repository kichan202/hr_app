<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;


// Root route that redirects based on authentication and role
Route::get('/', function () {
    if (Auth::check()) {
        // Check user role and redirect to the correct dashboard
        if (Auth::user()->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif(Auth::user()->role === 'Employee') {
            return redirect()->route('employee.dashboard');
        }
    }
    return redirect()->route('login'); // Redirect to login if not authenticated
})->name('home');



Route::middleware(['auth', 'role:Admin'])->get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware(['auth', 'role:Employee'])->get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

require __DIR__.'/auth.php';
