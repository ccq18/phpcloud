<?php

namespace App\Http\Middleware;

use Closure;

class CertMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->auth($request->get('time'), $request->get('token'))) {
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }


    public function auth($time, $token)
    {
        if ($time < time() - env('VALID_TIME')) {
            return false;
        }

        return md5($time . $this->env('CERT_KEY')) == $token;
    }
}
