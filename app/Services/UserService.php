<?php
 
namespace App\Services;

use Input;
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




    public function __construct(User $user, Menu $menu, SubMenu $submenu, UserMenu $user_menu, UserSubMenu $user_submenu){

        $this->user = $user;
        $this->menu = $menu;
        $this->submenu = $submenu;
        $this->user_menu = $user_menu;
        $this->user_submenu = $user_submenu;

    }




    public function fetchAllPaginate_SNF(Request $request){
    	
    	Input::flash();

    	$user = $this->user->newQuery();

    	$user->search($request->search);

    	if(!$request->is_logged == null){

    		$user->filterIsLogged($this->user->getBoolean($request->is_logged));
    		
    	}
    	

    	$userList = $user->populate();

    	return view('admin.user.user-index')->with('userList', $userList);

    }









}