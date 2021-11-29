<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                /** @var User $user */
                $user = Auth::guard($guard);

                // to admin dashboard
                if(Auth::user()->role_as=='admin') {
                    return redirect(route('home'));
                }

                // to user dashboard
                else if(Auth::user()->role_as=='teacher') {
                    return redirect(route('home'));
                }

                else if(Auth::user()->role_as=='student') {
                    return redirect(route('home'));
                }
            }
        }

        return $next($request);
    }
}
