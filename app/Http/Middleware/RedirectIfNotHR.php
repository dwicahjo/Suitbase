<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotHR
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
        if (Auth::check())
        {
            if(Auth::user()->type != 'HR')
            {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
