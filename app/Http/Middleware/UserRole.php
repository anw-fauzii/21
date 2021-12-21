<?php

namespace App\Http\Middleware;

use Closure;

class UserRole
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
        if ( auth()->user()->roles === 'User' ) {
            // Redirect...
           return $next($request);  
        } else {
            abort(403, 'Unauthorized action.');  
        }  
        
    }
}
