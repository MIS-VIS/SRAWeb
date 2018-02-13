<?php

namespace App\ViewComposers;

use View;
use App\Menu;
use Auth;

class MenuComposer{
   


    public function compose($view){
        
        $menus = [];

        if(Auth::check()){
            $menus = Menu::where('user_id', Auth::user()->user_id )->get();
        }
    	
    	$view->with('menus', $menus);
    	
    }




}