<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Route;
use App\UserMenu;
use App\UserSubmenu;


class AdminMiddleware{


    protected $usermenu;
    protected $usersubmenu;



    public function __construct(UserMenu $usermenu, UserSubmenu $usersubmenu){

        if(Auth::check()){

            $this->usermenu = count($usermenu->where('route', Route::currentRouteName())
                                     ->where('user_id', Auth::user()->user_id)
                                     ->first());

            $this->usersubmenu = count($usersubmenu->where('route', Route::currentRouteName())
                                     ->where('user_id', Auth::user()->user_id)
                                     ->first());
        }
        
    }







    public function handle($request, Closure $next){
        

        if(Auth::check()){

            if($this->usermenu == 1 || $this->usersubmenu == 1){

                if(Auth::user()->is_logged == true){

                    return $next($request);  

                }

                Auth::logout();
                Session::flash('SESSION_AUTH_LOGOUT', 'Your account has been Logout or Deactivated!');
                return redirect('/');

            }

            return abort(403);

        }

        Session::flash('SESSION_AUTH_RESTRICT', 'Please log-in to start your session!');
        return redirect('/');
        
    }







}
