<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;



class User extends Authenticatable{



    use Notifiable;
    use Sluggable;
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




    public function sluggable(){

        return [
            'slug' => [
                'source' => ['firstname', 'middlename', 'lastname', 'HashedSlug']
            ]
        ];

    }





    public function getHashedSlugAttribute(){

        return md5(microtime());

    }





    /** Setters **/

    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);

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





    public function getCreatedDefaultsAttribute(){

        return [

            'user_id' => $this->userIdIncrement,
            'is_logged' => false,
            'is_active' => true, 

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'machine_created' => gethostname(),
            'machine_updated' => gethostname(),
            'ip_created' => request()->ip(), 
            'ip_updated' => request()->ip(),
            'last_login_time' => null,
            'last_login_machine' => null,
            'last_login_ip' => null,
            'user_created' => Auth::user()->user_id,
            'user_updated' => Auth::user()->user_id,

        ];

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






    public function getBoolean($value){

        if($value == 'true'){

            return true;

        }elseif($value == 'false'){

            return false;

        }else{

            return null;

        }

    }





    /** QUERIES **/

    public function indexFilter(Request $request, $paginate){

        $user = $this->newQuery();
        $search = $request->search;

        if(!$search == null){
            $user->where(function ($user) use ($search) {
                $user->where('firstname', 'LIKE', '%'. $search .'%')
                   ->orwhere('middlename', 'LIKE', '%'. $search .'%')
                   ->orwhere('lastname', 'LIKE', '%'. $search .'%')
                   ->orwhere('username', 'LIKE', '%'. $search .'%');
            });
        }

        if(!$request->is_logged == null){
            $user->where('is_logged', $this->getBoolean($request->is_logged));
        }

        return $user->orderBy('created_at', 'DESC')
                    ->paginate($paginate);

    }






    public function hunt($slug){

        return $this->where('slug', $slug)->firstOrFail();

    }




}
