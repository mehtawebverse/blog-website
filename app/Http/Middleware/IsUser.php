<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if(auth()->check()){
            if (auth()->user()->id != 1) {
                return $next($request);
            } else {
                abort(403,'You do not have permission to access this route');
            }
        }
        return $next($request);
    }
}
