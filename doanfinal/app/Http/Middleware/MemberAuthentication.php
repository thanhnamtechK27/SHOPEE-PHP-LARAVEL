<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MemberAuthentication
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level == 0) {
            return $next($request); // Allow frontend user to proceed
        }

        return redirect('/login_fe')->with('pleaseLogin', 'Please login to use this function');
    }
}
