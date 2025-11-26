<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsStaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('staff')->user();

        if ($user && $user->role !== 'Account') {
            // User is staff (not accountant), allow access
            return $next($request);
        }

        if ($user && $user->role === 'Account') {
            // User is accountant, redirect to accountant page
            return redirect('/staff-account');
        }

        // User not logged in, redirect to login
        return redirect('/staff-login'); // change this to your staff login route
    }
}
