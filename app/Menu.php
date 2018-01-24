<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model{

    protected $table = 'menu';


    public function submenu() {
    	return $this->hasMany('App\Submenu','menu_id','menu_id');
   	}


   	public function user() {
    	return $this->belongsTo('App\User');
   	}
   	

}
