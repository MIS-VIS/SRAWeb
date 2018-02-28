<?php

namespace App\ViewComposers;

use View;
use App\SubMenu;



class SubMenuComposer{
   

    public function compose($view){

        $submenus = SubMenu::select('menu_id','submenu_id', 'name', 'is_nav')->get();
    	
    	$view->with('submenus', $submenus);
    	
    }




}