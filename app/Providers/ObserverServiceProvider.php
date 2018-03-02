<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider{
    


    public function boot(){

        \App\User::observe(\App\Observers\UserObserver::class);
        \App\DV::observe(\App\Observers\DVObserver::class);

    }

    


    public function register(){
        
    }



}
