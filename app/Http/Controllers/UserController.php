<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\UserMenu;
use App\SubMenu;
use App\UserSubMenu;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Session;



class UserController extends Controller{
   

    protected $user;
    protected $menu;
    protected $user_menu;
    protected $submenu;
    protected $user_submenu;



    public function __construct(User $user, Menu $menu, UserMenu $user_menu, SubMenu $submenu,UserSubMenu $user_submenu){

        $this->user = $user;
        $this->menu = $menu;
        $this->user_menu = $user_menu;
        $this->submenu = $submenu;
        $this->user_submenu = $user_submenu;

    }




    public function index(Request $request){
        
        $userList = $this->user->indexFilter($request, 10);
        Input::flash();
        return view('admin.user.user-index', compact('userList'));

    }




    public function create(){

        return view('admin.user.user-create');

    }




  
    public function store(UserFormRequest $request){
        
        $usernameExist = $this->user->where('username', $request->username)->count();
        $count_user_menu = count($request->menu);

        if(!$usernameExist == 1 && $request){

            $user = $this->user;
            $user->firstname = $request->firstname;
            $user->middlename = $request->middlename;
            $user->lastname = $request->lastname;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->user_id = $this->user->userIdIncrement;
            $user->save();

            for($i = 0; $i < $count_user_menu; $i++){

                $menu = $this->menu->where('menu_id', $request->menu[$i])->first();

                $user_menu = new UserMenu;
                $user_menu->user_id = $user->user_id;
                $user_menu->menu_id = $menu->menu_id;
                $user_menu->user_menu_id = $this->user_menu->menuIdIncrement;
                $user_menu->name = $menu->name;
                $user_menu->route = $menu->route;
                $user_menu->icon = $menu->icon;
                $user_menu->data_target = $menu->data_target;
                $user_menu->is_dropdown = $menu->is_dropdown;            
                $user_menu->save();

                if($request->submenu > 0){

                    foreach($request->submenu as $data_submenu){

                    $submenu = $this->submenu->where('submenu_id', $data_submenu)->first();

                    if($menu->menu_id === $submenu->menu_id){

                            $user_submenu = new UserSubMenu;
                            $user_submenu->submenu_id = $submenu->submenu_id;
                            $user_submenu->user_menu_id = $user_menu->user_menu_id;
                            $user_submenu->user_id = $user_menu->user_id;
                            $user_submenu->is_nav = $submenu->is_nav;
                            $user_submenu->name = $submenu->name;
                            $user_submenu->route = $submenu->route;
                            $user_submenu->save();

                    }

                    }

                }

            }

            Session::flash('SESSION_USER_SLUG', $user->slug);
            Session::flash('SESSION_USER_CREATED', 'User Successfully Created!');
            return redirect()->back();
            
        }

        Input::flash();
        Session::flash('SESSION_USER_USERNAME_EXIST', 'NOTICE: The Username you provided is already used by an existing account. Please provide a unique Username.');
        return redirect()->back();
        
    }




    public function show($slug){

        $user = $this->user->hunt($slug);
        
        if(count($user) == 1){

            return view('admin.user.user-show')->with('user', $user);

        } 

        return abort(404);
        
    }




  
    public function edit($slug){

        $user = $this->user->hunt($slug);
        if(count($user) == 1){

            return view('admin.user.user-edit')->with('user', $user);

        } 

        return abort(404);

        
    }




   
    public function update(UserFormRequest $request, $slug){

        $user = $this->user->hunt($slug);
        $count_user_menu = count($request->menu);

        if(count($user) == 1){

            $user->firstname = $request->firstname;
            $user->middlename = $request->middlename;
            $user->lastname = $request->lastname;
            $user->username = $request->username;
            $user->save();
            $user->userMenu()->delete();
            $user->userSubMenu()->delete();

            for($i = 0; $i < $count_user_menu; $i++){

                $menu = $this->menu->where('menu_id', $request->menu[$i])->first();

                $user_menu = new UserMenu;
                $user_menu->user_id = $user->user_id;
                $user_menu->menu_id = $menu->menu_id;
                $user_menu->user_menu_id = $this->user_menu->menuIdIncrement;
                $user_menu->name = $menu->name;
                $user_menu->route = $menu->route;
                $user_menu->icon = $menu->icon;
                $user_menu->data_target = $menu->data_target;
                $user_menu->is_dropdown = $menu->is_dropdown;            
                $user_menu->save();

                if($request->submenu > 0){

                    foreach($request->submenu as $data_submenu){

                    $submenu = $this->submenu->where('submenu_id', $data_submenu)->first();

                    if($menu->menu_id == $submenu->menu_id){

                            $user_submenu = new UserSubMenu;
                            $user_submenu->submenu_id = $submenu->submenu_id;
                            $user_submenu->user_menu_id = $user_menu->user_menu_id;
                            $user_submenu->user_id = $user_menu->user_id;
                            $user_submenu->is_nav = $submenu->is_nav;
                            $user_submenu->name = $submenu->name;
                            $user_submenu->route = $submenu->route;
                            $user_submenu->save();

                    }

                    }

                }

            }
            Session::flash('SESSION_USER_UPDATE_SLUG', $user->slug);
            Session::flash('SESSION_USER_UPDATE', 'Your data has been successfully updated!');
            return view('admin.user.user-edit')->with('user', $user);
        } 

        abort(404);

    }




    
    public function destroy($slug){

        $user = $this->user->hunt($slug);

        if(count($user) == 1){

            $user->delete();
            $user->userMenu()->delete();
            $user->userSubmenu()->delete();
            Session::flash('SESSION_USER_DELETE', 'Your data has been successfully Deleted!');
            return redirect()->back();

        }

        return abort(404);
 
    }





}



