<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PassEnv
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $pass=request("password");
        if($pass !== env("DB_PASSWORD")) {
            return response()->view("cars.create");
        }
        return $next($request);
    }
}
