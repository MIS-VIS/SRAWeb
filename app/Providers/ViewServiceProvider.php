<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;


class ViewServiceProvider extends ServiceProvider{
    

    public function boot(){
        
        View::composer('*', 'App\ViewComposers\EmployeesComposer');
        View::composer('*', 'App\ViewComposers\BURProjectsComposer');
        View::composer('*', 'App\ViewComposers\DepartmentsComposer');

    }


    public function register(){
      
    }


}
