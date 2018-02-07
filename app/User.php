<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $dates = ['created_at', 'updated_at', 'last_login_time'];
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'username', 
        'password',
        'role',
        'lastname',
        'firstname',
        'middlename',
        'position',
        'is_logged',
        'is_active',
        'canview',
        'user_menu',
        'created_at',
        'updated_at',
        'machine_created',
        'machine_updated',
        'ip_created',
        'ip_updated',
        'last_login_time',
        'last_login_machine',
        'last_login_ip',
    ];


    protected $hidden = [
        'password', 
        'remember_token',
    ];


    protected $attributes = [
        'user_id' => null,
        'username' => null,
        'password' => null,
        'role' => null,
        'lastname' =>null,
        'firstname' => null,
        'middlename' => null,
        'position' => null,
        'is_logged' => false,
        'is_active' => false,
        'canview' => false,
        'user_menu' => null,
        'created_at' => null,
        'updated_at' => null,
        'machine_created' => null,
        'machine_updated' => null,
        'ip_created' => null,
        'ip_updated' => null,
        'last_login_time' => null,
        'last_login_machine' => null,
        'last_login_ip' => null,
    ];


    public function menu() {
        return $this->hasMany('App\Menu','user_id','user_id');
    }



    public static function getCreatedDefaultsAttribute(){
        return [
            'user_id' => 'DV' . rand(1000000, 9999999),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'machine_created' => gethostname(),
            'machine_updated' => gethostname(),
            'ip_created' => request()->ip(), 
            'ip_updated' => request()->ip(),
        ];
    }



}
