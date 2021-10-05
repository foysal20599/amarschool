<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UrlCheckMiddleware
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
        if('register' == request()->path()){
            return redirect('noaccess');
        }else{
            return $next($request);
        }
        
    }
}
