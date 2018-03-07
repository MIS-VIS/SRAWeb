<?php
 
namespace App\Services;

use Input;
use Session;
use App\User;
use App\Menu;
use App\SubMenu;
use App\UserMenu;
use App\UserSubMenu;
use Illuminate\Http\Request;
use Illuminate\Events\Dispatcher;


 
class UserService{


	protected $user;
    protected $menu;
    protected $user_menu;
    protected $submenu;
    protected $user_submenu;
    protected $event;




    public function __construct(User $user, Menu $menu, SubMenu $submenu, UserMenu $user_menu, UserSubMenu $user_submenu, Dispatcher $event){

        $this->user = $user;
        $this->menu = $menu;
        $this->submenu = $submenu;
        $this->user_menu = $user_menu;
        $this->user_submenu = $user_submenu;
        $this->event = $event;

    }





    public function fetchAllPaginate_SNF(Request $request){
    	
        Input::flash();

    	$user = $this->user->newQuery();

    	$user->search($request->search);

    	$user->filterIsLogged($request->is_logged);

    	$userList = $user->populate();

    	return view('admin.user.user-index')->with('userList', $userList);

    }





    public function create(Request $request){

        if(!$this->user->usernameExist($request->username) == 1){

            $user = new User;
            $this->event->fire('user.userCreate', [$user, $request]);

            for($i = 0; $i < count($request->menu); $i++){

            $menu = $this->menu->whereMenuId($request->menu[$i])->first();

            $user_menu = new UserMenu;
            $this->event->fire('user.userMenuCreate', [$user_menu, $user, $menu]);

            if($request->submenu > 0){

                foreach($request->submenu as $data_submenu){

                $submenu = $this->submenu->whereSubmenuId($data_submenu)->first();

                if($menu->menu_id === $submenu->menu_id){

                    $user_submenu = new UserSubMenu;
                    $this->event->fire('user.userSubMenuCreate', [$user_submenu, $user_menu, $submenu]);

                }

                }

            }

            }

            $this->event->fire('user.createSuccess', $user);
            return redirect()->back();
            
        }

        $this->event->fire('user.createFail');
        return redirect()->back();
        
    }





    public function show($slug){

    	$user = $this->user->findSlug($slug);
    	return view('admin.user.user-show')->with('user', $user);

    }





    public function edit($slug){

    	$user = $this->user->findSlug($slug);
    	return view('admin.user.user-edit')->with('user', $user);

    }





    public function update(Request $request, $slug){

    	$user = $this->user->findSlug($slug);

    	$this->event->fire('user.userUpdate', [$user, $request]);

    	for($i = 0; $i < count($request->menu); $i++){

        $menu = $this->menu->whereMenuId($request->menu[$i])->first();

        $user_menu = new UserMenu;
        $this->event->fire('user.userMenuCreate', [$user_menu, $user, $menu]);

        if($request->submenu > 0){

	        foreach($request->submenu as $data_submenu){

	        $submenu = $this->submenu->whereSubmenuId($data_submenu)->first();

            if($menu->menu_id === $submenu->menu_id){

                $user_submenu = new UserSubMenu;
                $this->event->fire('user.userSubMenuCreate', [$user_submenu, $user_menu, $submenu]);

            }

	        }

	    }

        }

       	$this->event->fire('user.updateSuccess', $user);
        return view('admin.user.user-edit')->with('user', $user);

    }





    public function delete($slug){

    	$user = $this->user->findSlug($slug);
		$user->delete();
	    $user->userMenu()->delete();
	    $user->userSubmenu()->delete();
	    $this->event->fire('user.deleteSuccess');
	    return redirect()->back();


    }





}