<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;


class ViewServiceProvider extends ServiceProvider{
    

    public function boot(){
        
        View::composer('*', 'App\ViewComposers\BURProjectsComposer');
        View::composer('*', 'App\ViewComposers\DepartmentsComposer');
        View::composer('*', 'App\ViewComposers\SignatoriesComposer');

    }


    public function register(){
      
    }


}
