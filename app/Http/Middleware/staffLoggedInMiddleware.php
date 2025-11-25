<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class staffLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('staff') -> user() && Auth::guard('staff')-> user() ->role != 'Account'){
            return redirect('/staff-profile');
        }
        if(Auth::guard('staff') -> user() && Auth::guard('staff')-> user() ->role == 'Account'){
            return redirect('/staff-account');
    }

        return $next($request);
    }
}
