<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LogoutIfNotActiveUser
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
        // $user = Auth::user();
        if (Auth::attempt())
        {
            
        }
        else
        {
            redirect('/login');
        }

        return $next($request);
    }
}
