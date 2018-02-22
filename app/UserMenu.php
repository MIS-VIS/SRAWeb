<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model{



    protected $table = 'user_menu';



    public function submenu() {
    	return $this->hasMany('App\UserSubmenu','menu_id','menu_id');
   	}




   	public function user() {
    	return $this->belongsTo('App\User');
   	}
   	



   	public function usersubmenu() {
      return $this->submenu->where('is_nav', true);
    }
   	  



}
