<?php

namespace App\Http\Middleware;

use App\Exceptions\TokenException;
use Closure;

class Token
{
    use \App\Util\Token;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('token');
        if (!$token) {
            throw new TokenException();
        }
        $request->login_uid = $this->checkToken($token);
        if (!$request->login_uid) {
            throw new TokenException();
        }
        return $next($request);
    }
}
