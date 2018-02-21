<?php

namespace App\Libraries\Main;

use Route;

class ContentHelper{




    public static function loader($id){

      return'<div class="page-overlay" id="'.$id.'">
                <div class="spinner">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                </div>
            </div>';

    }
    



    public static function menuStatus($routeName, $status){
      return Route::currentRouteNamed($routeName) ? $status : '';
      
    }




}