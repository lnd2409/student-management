<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('sinhvien')->check() || Auth::guard('giaovien')->check() || Auth::guard('quantri')->check()){
            return $next($request);
        }
        return redirect()->route('signIn');
    }
}
