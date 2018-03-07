<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;



class User extends Authenticatable{



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
        'user_created',
        'user_updated',
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
        'user_created' => null,
        'user_updated' => null,
        'last_login_time' => null,
        'last_login_machine' => null,
        'last_login_ip' => null,
    ];




    public function userMenu() {

        return $this->hasMany('App\UserMenu','user_id','user_id');

    }
    


    public function userSubMenu() {

        return $this->hasMany('App\UserSubMenu','user_id','user_id');

    }



    public function dv()
    {
        return $this->belongsTo('App\DV', 'user_id', 'user_id');
    }




    /** Getters **/

    public function getFullnameAttribute(){

        return strtoupper($this->firstname . " " . substr($this->middlename , 0, 1) . ". " . $this->lastname);

    }




    public function getFullnameShortAttribute(){

        return strtoupper(substr($this->firstname , 0, 1) . ". " . $this->lastname);

    }




    public function getLastUserAttribute(){

        $user = $this->select('user_id')->orderBy('user_id', 'desc')->first();

        return $user->user_id;

    }




    public function getUserIdIncrementAttribute(){

        $id = '1001';

        if($id != null){

            $id = $this->lastUser + 1;
        
        }

        return $id;

    }





    public function getLoginDefaultsAttribute(){

        return [

            'is_logged' => true,

        ];

    }





    public function getLogoutDefaultsAttribute(){

        return [

            'is_logged' => false,
            'last_login_time' => Carbon::now(),
            'last_login_machine' => gethostname(),
            'last_login_ip' => request()->ip(),

        ];

    }






    /** SCOPES **/


    public function scopeSearch($query, $key){

        if(!$key == null){

            return $query->where(function ($query) use ($key) {
                    $query->where('firstname', 'LIKE', '%'. $key .'%')
                          ->orwhere('middlename', 'LIKE', '%'. $key .'%')
                          ->orwhere('lastname', 'LIKE', '%'. $key .'%')
                          ->orwhere('username', 'LIKE', '%'. $key .'%');
            });

        }

    }




    public function scopeFilterIsLogged($query, $value){

        if(!$value == null){

            return $query->where('is_logged', $this->getBoolean($value));

        }

    }




    public function scopePopulate($query){

        return $query->orderBy('updated_at', 'DESC')->paginate(10);

    }




    public function scopeFindSlug($query, $slug){

        return $query->where('slug', $slug)->firstOrFail();

    }




    public function scopeUsernameExist($query, $value){

        return $query->where('username', $value)->count();

    }





    /** UTILS **/

    public function getBoolean($value){

        if($value == 'true'){

            return true;

        }elseif($value == 'false'){

            return false;

        }

    }





}
