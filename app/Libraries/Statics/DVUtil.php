<?php

namespace App\Libraries\Statics;
use Route;

class DVUtil {




    public static function formSanitize( $string = null ) {

          $string = strip_tags($string);
          $string = htmlspecialchars($string);
          return $string;

    }




  	public static function filterSanitize( $string = null ) {

          $char = array("'", " ");
          $string = str_replace($char, "", $string);
          $string = strip_tags($string);
          $string = htmlspecialchars($string);
          return $string;

    }




    public static function searchSanitize( $string = null ) {

        $string = preg_replace('/[^ \w]+/', '', $string);
        $string = str_replace(" ", "%", $string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
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



    //Employee Custom Dropdown

    public static function employeeDropdown($class, $name, $label, $id, $array, $var1, $var2, $var3, $var4, $oldValue ,$errors, $required){

      return  '<div class="form-group '.$class.'">
                  <label for="'.$name.'" style="padding-bottom: 8.5px; color:#696969;"><strong>'.$label.'</strong></label>
                  <select class="form-control is-valid" id="'.$id.'" name="'.$name.'" '.$required.'>
                      <option value="">Select</option>
                      '. self::employeeOptions($array, $var1, $var2, $var3, $var4, $oldValue) .'
                  </select>
                  <small class="text-danger">'. $errors .'</small>
              </div>';

    }




    public static function employeeOptions($array, $var1, $var2, $var3, $var4, $oldValue){

      $string = '';

      foreach($array as $value){

        $string .= '<option value="'. $value->$var1 .'" '. self::condition($value->var1, $oldValue) .'>'. $value->$var2 .' '. substr($value->$var3, 0, 1) .'. '.$value->$var4.'</option>';

      }

      return $string;

    }




    public static function condition($var1, $oldValue){

        $selected = "selected";
        $empty = "";
        return $var1 == $oldValue ? $empty : $selected;

    }




}