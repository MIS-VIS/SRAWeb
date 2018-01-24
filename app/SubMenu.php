<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model{

    protected $table = 'submenu';


    public function menu() {
    	return $this->belongsTo('App\Menu');
   	}
}
