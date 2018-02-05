<?php

namespace App\Libraries\Statics;
use Route;

class DVUtil {



	public static function filterSanitize( $string = null ) {
        $char = array("'", " ");
        $string = str_replace($char, "", $string);
        $string = htmlspecialchars($string);
        $string = strip_tags($string);
        return $string;
    }



    public static function searchSanitize( $string = null ) {
        $string = preg_replace('/[^ \w]+/', '', $string);
        $string = str_replace(" ", "%", $string);
        $string = htmlspecialchars($string);
        $string = strip_tags($string);
        return $string;
    }



}