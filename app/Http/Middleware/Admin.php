<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        // this middleware handles redirection to admin 
        if(auth()->user()->isAdmin == 1){
            return redirect('/admin');
        }

        //if not admin
        return $next($request);
        
    }
}
