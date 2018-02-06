<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departments;
use App\BurProjects;
use App\Employees;

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



	public function dvAddEmpPosText(Request $request, $id, Employees $employees){
    	if($request->Ajax()){
	    	$cert_pos = $employees->select('position')->where('emp_name', $id)->get();
	    	return json_encode($cert_pos);
	    }
	    return abort(403);
	}



}
