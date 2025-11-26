<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAccountentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('staff')->user();

        if ($user && $user->role === 'Account') {
            // User is accountant, allow access
            return $next($request);
        }

        // If logged in but not accountant, redirect to profile
        if ($user) {
            return redirect('/staff-profile');
        }

        // If not logged in at all, redirect to login
        return redirect('/staff-login'); // change this to your staff login route

    }
}
