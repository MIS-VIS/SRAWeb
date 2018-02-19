<?php

namespace App\Libraries\Main;


class SanitizeHelper {



  	public static function stringOutputSanitize( $string = null ) {

          $string = strip_tags($string);
          $string = htmlspecialchars($string);
          return $string;

    }




}