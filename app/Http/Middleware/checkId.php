<?php

namespace App\Http\Middleware;

use Closure;

class checkId
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
       $request->id ++;
        return $next($request);
    }
}
