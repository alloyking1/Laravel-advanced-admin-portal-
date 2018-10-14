<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminSuper
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
        if(auth()->user()->isAdminSuper == 1){
            return redirect('/adminSuper');
        }
        return $next($request);
    }
}
