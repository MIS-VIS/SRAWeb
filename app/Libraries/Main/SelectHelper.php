<?php

namespace App\Libraries\Main;
use Route;

class SelectHelper {


    public static function selectMOP(){
    	return array('Check' => '01', 'Cash' => '02', 'Others' => '03');
    }


    public static function selectFundSource(){
    	return array('SIDA' => 'SIDA', 'Corporate' => 'Corporate');
    }

    public static function selectProjectId(){
    	return array('BACOLOD CITY' => '1', 'QUEZON CITY' => '2');
    }



}