<?php

namespace App\ViewComposers;

use View;
use App\Employees as Employees;
use App\BurProjects as BurProjects;
use App\Departments as Departments;


class EmployeesComposer{
   

    public function compose($view){

    	$employees = Employees::select('emp_name')->get();
        $view->with('employees', $employees);

    }


}