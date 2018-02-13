<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Route;
use App\Menu;
use App\Submenu;


class AdminMiddleware{



    protected $menu;
    protected $submenu;



    public function __construct(Menu $menu, Submenu $submenu){

        if(Auth::check()){

            $this->menu = count($menu->where('route', Route::currentRouteName())
                                     ->where('user_id', Auth::user()->user_id)
                                     ->first());

            $this->submenu = count($submenu->where('route', Route::currentRouteName())
                                     ->where('user_id', Auth::user()->user_id)
                                     ->first());
        }
        
    }





    public function handle($request, Closure $next){
        

        if(Auth::check()){

            if($this->menu == 1 || $this->submenu == 1){

                if(Auth::user()->is_logged == true){

                    return $next($request);  

                }

                Auth::logout();
                Session::flash('logout', 'Your account has been Logout or Deactivated!');
                return redirect('/');

            }

            return abort(403);

        }

        Session::flash('check', 'Please log-in to start your session!');
        return redirect('/');
        
    }





}
