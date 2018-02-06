<?php

namespace App\ViewComposers;

use View;
use App\BurProjects as BurProjects;


class BURProjectsComposer{
   

    public function compose($view){

    	$burProjectsDeptId = BurProjects::select('dept_id')->groupBy('dept_id')->get();
    	$burProjectsAcctCode = BurProjects::select('acct_code')->get();

    	$data = array(
            'burProjectsDeptId'  => $burProjectsDeptId,
            'burProjectsAcctCode' => $burProjectsAcctCode,
        );

        $view->with($data);

    }


}