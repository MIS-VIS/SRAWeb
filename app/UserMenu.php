<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model{



    protected $table = 'user_menu';
    public $timestamps = false;



    public function userSubMenu() {
    	return $this->hasMany('App\UserSubMenu','user_menu_id','user_menu_id');
   	}
   	
    

    public function user() {
      return $this->belongsTo('App\User','user_id','user_id');
    }



   	public function usernav() {
      return $this->userSubmenu->where('is_nav', true);
    }
   	  


    //GETTERS
    public function getLastUserMenuAttribute(){

        $usermenu = $this->select('user_menu_id')->orderBy('user_menu_id', 'desc')->first();
        return $usermenu->user_menu_id;

    }




    public function getMenuIdIncrementAttribute(){

        $id = '1001';

        if($id != null){

            $id = $this->lastUserMenu + 1;
        
        }

        return $id;

    }




}
