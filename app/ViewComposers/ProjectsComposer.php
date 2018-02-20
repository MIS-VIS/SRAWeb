<?php

namespace App\ViewComposers;

use View;
use App\Projects;


class ProjectsComposer{
   


    public function compose($view){

        $projects = Projects::select('project_id', 'project_address')->get();
        $view->with('projects', $projects);

    }



}