<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {

            // if (auth()->guard('admin')->check()) { // Check for 'admin' guard
            //     return route('admin.admin.dashboard'); // Redirect to admin dashboard
            // } elseif (auth()->guard('parent')->check()) {
            //     // dd(auth()->guard('parent')->check());
            //     return view('user.dashboard'); // Redirect to parents dashboard
            // }
        }

        return null;
    }
}
