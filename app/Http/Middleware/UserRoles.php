<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRoles { /**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */

    public function handle($request, Closure $next,$guard = null) {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else if (Auth::user()->role == "clini") {
               // return redirect()->guest('login');
                 return redirect('success');
            }
        }
        return $next($request);
//        if (Auth::user()->role == "clinic") {
//            return redirect('success');
//        }
       
    }

}
