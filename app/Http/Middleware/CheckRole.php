<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if ($role=='sinhvien' && Auth::guard('sinhvien')->check()) {
                return $next($request);
        }
        else if ($role=='giaovien' && Auth::guard('giaovien')->check()) {
                return $next($request);
        }
        
        return back();
    }
}