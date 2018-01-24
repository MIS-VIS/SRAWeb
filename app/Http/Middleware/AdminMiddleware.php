<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class AdminMiddleware{


    public function handle($request, Closure $next){
        if(Auth::check()){
            if(Auth::user()->is_logged == true){
                return $next($request);  
            }
            Auth::logout();
            Session::flash('logout', 'Your account has been Logout or Deactivated!');
            return redirect('/');
        }
        Session::flash('check', 'Please log-in to start your session!');
        return redirect('/');
    }


}
