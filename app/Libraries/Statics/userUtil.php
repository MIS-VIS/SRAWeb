<?php
namespace App\Libraries\Statics;


class userUtil {



    public static function selectStatus(){

        return array('Active' => 'true', 'Inactive' => 'false');

    }





    /** FILTER COMPONENTS **/

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





    /** Date Component **/

    public static function filterDatepicker($fromValue, $fromError, $toValue, $toError ){

        return '<div class="col-md-12 row" id="datepicker" style="margin-bottom:15px;"">
                    <label for="fromDate" style="color:#696969;"><strong>From</strong></label>
                    <input type="text" class="form-control is-valid date" id="fromDate" name="fromDate" value="'. $fromValue .'" placeholder="dd-mm-yyyy" required>
                    <small class="text-danger">'. $fromError .'</small>
                </div>

                <div class="col-md-12 row" id="datepicker" style="margin-bottom:15px;"">
                    <label for="toDate" style="color:#696969;"><strong>To</strong></label>
                    <input type="text" class="form-control is-valid date" id="toDate" name="toDate" value="'. $toValue .'" placeholder="dd-mm-yyyy" required>
                    <small class="text-danger">'. $toError .'</small>
                </div>

                <div class="col-md-12 row" style="margin-bottom:15px;">
                    <button type="submit" class="btn btn-secondary btn-sm">
                        Filter
                    </button>
                </div>';

    }





    /** Search Component **/

    public static function filterSearch($value, $error){

        return '<div class="row align-items-center">
                    <div class="col-sm-7">
                        <input type="search" class="form-control" placeholder="Search any" name="search" value="'. $value .'">
                        <small class="text-danger">'. $error .'</small>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-fab btn-primary btn-sm">
                            <i class="icon icon-magnify s-4"></i>
                        </button>
                    </div>
                </div>';

    }





}