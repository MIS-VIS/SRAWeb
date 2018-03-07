<?php

namespace App\Subscribers;

use Auth;
use Input;
use Session;
use App\User;
use App\UserMenu;
use App\UserSubMenu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class UserSubscriber {


	protected $user;
	protected $user_menu;



	public function __construct(User $user, UserMenu $user_menu){

		$this->user = $user;
		$this->user_menu = $user_menu;

	}




	public function subscribe($events){

		$events->listen('user.userCreate', 'App\Subscribers\UserSubscriber@onUserCreate');
		$events->listen('user.userMenuCreate', 'App\Subscribers\UserSubscriber@onUserMenuCreate');
		$events->listen('user.userSubMenuCreate', 'App\Subscribers\UserSubscriber@onUserSubMenuCreate');
		$events->listen('user.createSuccess', 'App\Subscribers\UserSubscriber@onCreateSuccess');
		$events->listen('user.createFail', 'App\Subscribers\UserSubscriber@onCreateFail');
		$events->listen('user.userUpdate', 'App\Subscribers\UserSubscriber@onUserUpdate');
		$events->listen('user.updateSuccess', 'App\Subscribers\UserSubscriber@onUpdateSuccess');
		$events->listen('user.deleteSuccess', 'App\Subscribers\UserSubscriber@onDeleteSuccess');

	}



	public function onUserCreate($user, $request){

		$user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $this->createDefaults($user);
        $user->save();

	}



	public function onUserMenuCreate($user_menu, $user, $menu){

		$user_menu->user_menu_id = $this->user_menu->menuIdIncrement;
        $user_menu->user_id = $user->user_id;
        $user_menu->menu_id = $menu->menu_id;
        $user_menu->name = $menu->name;
        $user_menu->route = $menu->route;
        $user_menu->icon = $menu->icon;
        $user_menu->data_target = $menu->data_target;
        $user_menu->is_dropdown = $menu->is_dropdown;            
        $user_menu->save();

	}



	public function onUserSubMenuCreate($user_submenu, $user_menu, $submenu){

        $user_submenu->submenu_id = $submenu->submenu_id;
        $user_submenu->user_menu_id = $user_menu->user_menu_id;
        $user_submenu->user_id = $user_menu->user_id;
        $user_submenu->is_nav = $submenu->is_nav;
        $user_submenu->name = $submenu->name;
        $user_submenu->route = $submenu->route;
        $user_submenu->save();

	}



	public function onCreateSuccess($user){

		Session::flash('SESSION_USER_SLUG', $user->slug);
        Session::flash('SESSION_USER_CREATED', 'User Successfully Created!');

	}



	public function onCreateFail(){

		Input::flash();
        Session::flash('SESSION_USER_USERNAME_EXIST', 'NOTICE: The Username you provided is already used by an existing account. Please provide a unique Username.');

	}



	public function onUserUpdate($user, $request){

		$user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $this->updateDefaults($user);
        $user->save();
        $user->userMenu()->delete();
        $user->userSubMenu()->delete();

	}



	public function onUpdateSuccess($user){

		Session::flash('SESSION_USER_UPDATE_SLUG', $user->slug);
        Session::flash('SESSION_USER_UPDATE', 'Your data has been successfully updated!');

	}



	public function onDeleteSuccess(){

		Session::flash('SESSION_USER_DELETE', 'Your data has been successfully Deleted!');

	}



	public function createDefaults($user){

		$user->slug = md5(microtime());
		$user->user_id = $this->user->userIdIncrement;
		$user->is_logged = false;
        $user->is_active = true;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->machine_created = gethostname();
        $user->machine_updated = gethostname();
        $user->ip_created = request()->ip();
        $user->ip_updated = request()->ip();
        $user->last_login_time = null;
        $user->last_login_machine = null;
        $user->last_login_ip = null;
        $user->user_created = Auth::user()->user_id;
        $user->user_updated = Auth::user()->user_id;

	}



	public function updateDefaults($user){

		$user->updated_at = Carbon::now();
 		$user->machine_updated = gethostname();
 		$user->ip_updated = request()->ip();
		$user->user_updated = Auth::user()->user_id;

	}





}