<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubMenu extends Model{



    protected $table = 'user_submenu';
    public $timestamps = false;



    public function userMenu() {

    	return $this->belongsTo('App\UserMenu','user_menu_id','user_menu_id');

   	}





}
