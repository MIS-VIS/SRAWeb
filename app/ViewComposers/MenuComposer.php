<?php

namespace App\ViewComposers;

use View;
use App\Menu;



class MenuComposer{
   

    public function compose($view){

        $menus = Menu::select('menu_id', 'name')->get();
    	
    	$view->with('menus', $menus);
    	
    }




}