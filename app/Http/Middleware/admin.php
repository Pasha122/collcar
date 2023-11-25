<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
     {
            if (Auth::user() &&  Auth::user()->type == 1) {
                return $next($request);
            }
            return abort(404);
        }
     
    /*
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

        // провіряємо права
    if ( Auth::check() && Auth::user()->isAdmin()==true )
    {
        return $next($request);
    }
    return redirect('/');
*/

}
