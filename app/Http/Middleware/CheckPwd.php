<?php

namespace App\Http\Middleware;

use Closure;

class CheckPwd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->input('pwd')!=env('APP_KEY')) {
            return ['code'=>401,'message'=>'Unauthorized'];
        }

        return $next($request);
    }
}