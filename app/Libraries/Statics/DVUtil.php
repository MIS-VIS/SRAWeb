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



    public static function selectMOP(){
        return array('Check' => '01', 'Cash' => '02', 'Others' => '03');
    }



    public static function selectFundSource(){
        return array('SIDA' => 'SIDA', 'Corporate' => 'Corporate');
    }



    public static function selectProjectId(){
        return array('BACOLOD CITY' => '1', 'QUEZON CITY' => '2');
    }



    public static function userIndexTableHeader(){
        return array('Doc No.', 'DV No.', 'Explanation', 'Project Code', 'Created', 'Actions');
    }




}