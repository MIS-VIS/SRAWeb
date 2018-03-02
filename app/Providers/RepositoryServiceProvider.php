<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{


    
    public function boot(){
        
    }

    
    public function register(){

        $this->app->bind('App\Repositories\DV\DVInterface', 'App\Repositories\DV\DVRepository');
    }


}
