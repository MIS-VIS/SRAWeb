<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model{



    protected $table = 'user_menu';
    public $timestamps = false;


    public function submenu() {
    	return $this->hasMany('App\UserSubmenu','menu_id','menu_id');
   	}




   	public function user() {
    	return $this->belongsTo('App\User');
   	}
   	



   	public function usersubmenu() {
      return $this->submenu->where('is_nav', true);
    }
   	  


    //GETTERS
    public function getLastUserMenuAttribute(){

        $usermenu = $this->select('menu_id')->orderBy('menu_id', 'desc')->first();
        return $usermenu->menu_id;

    }




    public function getMenuIdIncrementAttribute(){

        $id = '1001';

        if($id != null){

            $id = $this->lastUserMenu + 1;
        
        }

        return $id;

    }




}
