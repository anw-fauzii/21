<?php

namespace App\Http\Middleware;

use Closure;

class UserWaitingRole
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
        if(auth()->user()->status === 'menunggu')
        {
            return redirect()->route('waiting');
        }
        return $next($request);
        
    }
}
