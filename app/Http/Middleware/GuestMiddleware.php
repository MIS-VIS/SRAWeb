<?php

namespace App\Http\Middleware;

use App\User as user;
use Closure;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware{


    public function handle($request, Closure $next){

        if (Auth::check()){

        	return redirect('admin/');

        }

        return $next($request);
        
    }


}

