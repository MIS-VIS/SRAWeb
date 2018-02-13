<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class GuestMiddleware{


    public function handle($request, Closure $next){

        if (Auth::check()){

        	return redirect('admin/');

        }

        return $next($request);
        
    }


}

