<?php

namespace App\Libraries;
use Route;

class NavHelper {

    public static function menuStatus($routeName, $status){
      return Route::currentRouteNamed($routeName) ? $status : '';
    }

}
