<?php

namespace App\Libraries\Main;

use Cache;


class CacheHelper{



    public static function deletePattern($key){

       $redis = Cache::getRedis();

         $keys = $redis->keys($key);

         foreach($keys as $key){

             $redis->del($key);

         }

    }
    



}