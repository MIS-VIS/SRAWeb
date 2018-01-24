<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Departments as Dept;
use App\BurProjects as Bp;
use App\Employees as Emp;

class AjaxController extends Controller{


    public function dvAddUnitDropdown(Request $request, $id){
	    if($request->Ajax()){
	    	$dept = Dept::select('dept_unit')->where('dept_id', $id)->get();
	    	return json_encode($dept);
	    }
	    return abort(403);
    }



    public function dvAddAccountCodeDropdown(Request $request, $id){
    	if($request->Ajax()){
	    	$acct_code = Bp::select('acct_code')->where('dept_id', $id)->get();
	    	return json_encode($acct_code);
	    }
	    return abort(403);
	}



	public function dvAddEmpPosText(Request $request, $id){
    	if($request->Ajax()){
	    	$cert_pos = Emp::select('position')->where('emp_name', $id)->get();
	    	return json_encode($cert_pos);
	    }
	    return abort(403);
	}



}
