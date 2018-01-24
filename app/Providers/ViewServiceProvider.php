<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Employees as Employees;
use App\BurProjects as BurProjects;
use App\Departments as Departments;



class ViewServiceProvider extends ServiceProvider{
    
    public function boot(){
        
        View::composer('*', function($view){
            $employees = Employees::select('emp_name')->get();
            $burProjectsDeptId = BurProjects::select('dept_id')->groupBy('dept_id')->get();
            $departmentsDeptUnit = Departments::select('dept_unit')->get();
            $burProjectsAcctCode = BurProjects::select('acct_code')->get();
            
            $data = array(
                'employees'  => $employees,
                'burProjectsDeptId'   => $burProjectsDeptId,
                'departmentsDeptUnit'   => $departmentsDeptUnit,
                'burProjectsAcctCode' => $burProjectsAcctCode,
            );

            $view->with($data);
        });

    }



    public function register(){
      
    }


}
