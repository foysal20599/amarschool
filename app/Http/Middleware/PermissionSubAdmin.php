<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionSubAdmin
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
        if(!Auth::check()){
            return redirect('noaccess');
        }else{
            if(Auth::user()->type == 1 || Auth::user()->type == 3){
                return $next($request);
            }else{
                return redirect('noaccess');
            }
          
        }
    }
}
