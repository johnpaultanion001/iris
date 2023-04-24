<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckIfUserValidToken
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
        if (! $user = auth()->setRequest($request)->user()) {
            return $this->responseUnauthorized();
        }

        return $next($request);
    }
}
