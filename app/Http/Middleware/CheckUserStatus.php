<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckUserStatus
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
        if (auth("api")->user()->status == "INACTIVE") {
            return response()->json([
                'status' => 401,
                'message' => "This user is INACTIVE",
            ], 401);
        }

        return $next($request);
    }
}
