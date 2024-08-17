<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberNotLoginAuthetication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if( !Auth::check() ){
            return $next($request);
        }else{
            return redirect()->back()->withErrors('Thao tác không đúng quy trình! Xin thử lại!');
        }
    }
}
