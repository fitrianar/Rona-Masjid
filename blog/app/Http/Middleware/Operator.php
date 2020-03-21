<?php

namespace App\Http\Middleware;

use Closure;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role_akses_id == 3){ //if pengurus
            return $next($request);
        }else{
            abort(403);
        }
       
    }
}
