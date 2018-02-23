<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departments;
use App\BurProjects;
use App\Employees;
use App\SubMenu;

class AjaxController extends Controller{



    public function dvAddUnitDropdown(Request $request, $id, Departments $departments){

	    if($request->Ajax()){

	    	$dept = $departments->select('dept_unit')->where('dept_id', $id)->get();
	    	return json_encode($dept);

	    }

	    return abort(403);

    }





    public function dvAddAccountCodeDropdown(Request $request, $id, BurProjects $burProjects){

    	if($request->Ajax()){

	    	$acct_code = $burProjects->select('acct_code')->where('dept_id', $id)->get();
	    	return json_encode($acct_code);

	    }

	    return abort(403);

	}





	public function userAddSubmenuDropdown(Request $request, $id, Submenu $submenu){

    	if($request->Ajax()){

	    	$submenus = $submenu->select('submenu_id', 'name')->where('menu_id', $id)->get();
	    	return json_encode($submenus);

	    }

	    return abort(403);

	}






}
