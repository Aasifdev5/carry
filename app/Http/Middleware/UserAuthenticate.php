<?php

namespace App\Http\Middleware;

use Closure;

class UserAuthenticate
{
    public function handle($request, Closure $next)
    {
        // Perform action
        if ($request->session()->has('customer_session')) {
            return $next($request);
        }else{
            return redirect('/user-login');
        }
        
    }
}