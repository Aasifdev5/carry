<?php

namespace App\Http\Middleware;

use Closure;

class VendorAuthenticate
{
    public function handle($request, Closure $next)
    {
        // Perform action
        if ($request->session()->has('vendor_session')) {
            return $next($request);
        }else{
            return redirect('/vendor-login');
        }
        
    }
}