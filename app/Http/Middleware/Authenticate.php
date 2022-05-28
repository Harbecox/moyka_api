<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if(!\Auth::guard("web")->check() && !\Auth::guard("api")->check()){
            $this->redirectTo($request);
        }
        return $next($request);
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
