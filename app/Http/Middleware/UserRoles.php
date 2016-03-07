<?php

namespace App\Http\Middleware;

use Closure;

class UserRoles
{   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && $request->user()->role=="clinic")
        {
            return $next($request);
            

        }
        return redirect()->route('home');
    }
}
