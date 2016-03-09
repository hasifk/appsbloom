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

    public function handle($request, Closure $next) {

        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role != "SuperAdm") {
                 return $next($request);
            } else {
                return redirect()->intended('success');
            }
        } else {
            return redirect('login');
        }
    }

}
