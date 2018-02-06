<?php

namespace App\ViewComposers;

use View;
use App\Departments as Departments;


class DepartmentsComposer{
   


    public function compose($view){

        $departmentsDeptUnit = Departments::select('dept_unit')->get();
        $view->with('departmentsDeptUnit', $departmentsDeptUnit);

    }



}