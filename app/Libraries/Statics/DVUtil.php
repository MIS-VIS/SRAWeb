<?php
namespace App\Libraries\Statics;


class DVUtil {



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

        return array('Doc No.', 'Status', 'Project Code', 'Created', 'Actions');

    }





    /** FILTER COMPONENTS**/

    public static function filterDropdown($name, $title,$array, $var1, $var2 ,$oldValue, $errors){

        return '<div class="col-md-12 row" style="margin-bottom:15px;">
                    <small>'. $title .'</small><br>
                    <select name="'. $name .'" id="'. $name .'" class="form-control" onchange="this.form.submit()">
                        <option value="">None</option>
                         '. self::filterOptions($array, $var1, $var2 ,$oldValue) .'
                    </select>
                    <small class="text-danger">'. $errors .'</small>
                </div>';

    }





    public static function filterOptions($array, $var1, $var2, $oldValue){

        $string = '';

            foreach($array as $value){

                $condition = $value->$var1 == $oldValue ? 'selected' : '';
            
                $string .= '<option value="'. $value->$var1 .'" '. $condition .'>'. $value->$var2 .'</option>';

            }

        return $string;

    }







}