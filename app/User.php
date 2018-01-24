<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'username', 
        'password',
        'lastname',
        'firstname',
        'middlename',
        'position',
    ];


    protected $hidden = [
        'password', 
        'remember_token',
    ];


    protected $attributes = [
        'user_id' => '',
        'username' => '',
        'password' => '',
        'lastname' =>'',
        'firstname' => '',
        'middlename' => '',
        'position' => '',
        'user_rights' => false,
        'is_logged' => false,
        'is_active' => false,
        'canview' => false,
        'user_menu' => false,
        'created_at' => '',
        'created_by' => '',
    ];


    public function menu() {
        return $this->hasMany('App\Menu','user_id','user_id');
    }
}
