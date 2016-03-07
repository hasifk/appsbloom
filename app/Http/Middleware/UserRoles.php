<?php

namespace App\Http\Middleware;

use Closure;

class UserRoles { /**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */

    public function handle($request, Closure $next) {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else if (Auth::user()->role == "clinic") {
               // return redirect()->guest('login');
                 return redirect('success');
            }
        }
//        if (Auth::user()->role == "clinic") {
//            return redirect('success');
//        }
       
    }

}
