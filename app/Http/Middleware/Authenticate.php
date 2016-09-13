<?php

namespace ZeroIssues\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            } else
            {
                return redirect()->guest(route('auth.login'));
            }
        }
        return $next($request);
    }
}
