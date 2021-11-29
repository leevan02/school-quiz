<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( Auth::user()->Role_as() == 'admin' OR Auth::user()->Role_as() == 'teacher') {
                 return redirect(route('home'));
            }

            // allow user to proceed with request
            else if ( Auth::user()->Role_as() == 'student' ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
    
}
