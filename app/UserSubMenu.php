<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubMenu extends Model{



    protected $table = 'user_submenu';
    public $timestamps = false;



    public function menu() {

    	return $this->belongsTo('App\UserMenu');

   	}





}
