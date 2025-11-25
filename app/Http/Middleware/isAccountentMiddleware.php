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
        if(Auth::guard('staff') -> user() && Auth::guard('staff')-> user() ->role == 'Account'){
            return $next($request);
        }


        if(Auth::guard('staff') -> user() && Auth::guard('staff')-> user() ->role != 'Account'){
            return redirect('/staff-profile');
        }

    }
}
