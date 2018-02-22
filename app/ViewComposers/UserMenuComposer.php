<?php

namespace App\ViewComposers;

use View;
use App\UserMenu;
use Auth;

class UserMenuComposer{
   


    public function compose($view){
        
        $usermenus = [];

        if(Auth::check()){
            $usermenus = UserMenu::where('user_id', Auth::user()->user_id )->get();
        }
    	
    	$view->with('usermenus', $usermenus);
    	
    }




}