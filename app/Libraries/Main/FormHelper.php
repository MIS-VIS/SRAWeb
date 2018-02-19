<?php
namespace App\Libraries\Main;

use App\Libraries\Main\SanitizeHelper;

class FormHelper {



    /** TEXTBOX **/

    public static function textBox($formType, $class, $name, $label, $type, $id, $value, $required, $errors){

      if($formType == 'up'){

        return'<div class="form-group '.$class.'">
                  <label for="'. $name .'" style="color:#696969;"><strong>'. $label .'</strong></label>
                  <input type="'. $type .'" class="form-control is-valid" id="'. $id .'" name="'. $name .'" value="'. SanitizeHelper::stringOutputSanitize($value) .'" '.$required.'>
                  <small class="text-danger">'. $errors .'</small>
                </div>';

      }

        return'<div class="form-group '. $class .'">
                  <input type="'.$type.'" name="'.$name.'" class="form-control" id="'.$name.'" value="'. SanitizeHelper::stringOutputSanitize($value) .'" aria-describedby="'.$name.'" '.$required.'>
                  <label for="'.$name.'" class="col-form-label">'.$label.'</label>
                  <small class="text-danger">'. $errors .'</small>
               </div>';

    }





    /** DROPDOWN **/

    public static function dropdownStatic($class, $name, $label, $id, $array, $oldValue, $errors, $required){

      return  '<div class="form-group '.$class.'">
                  <label for="'.$name.'" style="padding-bottom: 8.5px; color:#696969;"><strong>'.$label.'</strong></label>
                  <select class="form-control is-valid" id="'.$id.'" name="'.$name.'" '.$required.'>
                      <option value="">Select</option>
                      '. self::optionsStatic($array, SanitizeHelper::stringOutputSanitize($oldValue)) .'
                  </select>
                  <small class="text-danger">'. $errors .'</small>
              </div>';

    }

    



    public static function optionsStatic($array, $oldValue){

      $string = '';

      foreach($array as $item => $value){

        $condition = $value == $oldValue ? 'selected' : '';

        $string .= '<option value="'. $value .'" '. $condition .'>'. $item .'</option>';

      }

      return $string;

    }





    public static function dropdownDynamic($class, $name, $label, $id, $array, $var1, $var2 ,$oldValue ,$errors, $required){

      return  '<div class="form-group '.$class.'">
                  <label for="'.$name.'" style="padding-bottom: 8.5px; color:#696969;"><strong>'.$label.'</strong></label>
                  <select class="form-control is-valid" id="'.$id.'" name="'.$name.'" '.$required.'>
                      <option value="">Select</option>
                      '. self::optionsDynamic($array, $var1, $var2, SanitizeHelper::stringOutputSanitize($oldValue)) .'
                  </select>
                  <small class="text-danger">'. $errors .'</small>
              </div>';

    }





    public static function optionsDynamic($array, $var1, $var2, $oldValue){

      $string = '';

      foreach($array as $value){

        $condition = $value->$var1 == $oldValue ? 'selected' : '';
        
        $string .= '<option value="'. $value->$var1 .'" '. $condition .'>'. $value->$var2 .'</option>';

      }

      return $string;

    }




    /** DATEINPUT **/

    public static function datepicker($class, $name, $label, $id, $value, $format ,$required, $errors){

      return'<div class="form-group '. $class .'" id="datepicker">
                <label for="'. $name .'" style="color:#696969;"><strong>'. $label .'</strong></label>
                <input type="text" class="form-control is-valid date" id="'. $id .'" name="'. $name .'" value="'. SanitizeHelper::stringOutputSanitize($value) .'" placeholder="'. $format .'" '.$required.'>
                <small class="text-danger">'. $errors .'</small>
              </div>';

    }




    /** TEXTAREA **/

    public static function textArea($class, $label, $title, $name, $value, $errors, $required){

      return '<div class="form-group '.$class.' summernote">
                <label for="'.$label.'" style="color:#696969;"><strong>'.$title.'</strong></label>
                <textarea class="form-control" id="'.$name.'" name="'.$name.'" rows="3" '.$required.'>'. htmlspecialchars($value) .'</textarea>
                <small class="text-danger">'. $errors .'</small>
              </div>';

    }



     /** READONLY **/

    public static function readOnly($class, $name, $label, $placeholder, $value){

      return '<div class="form-group '.$class.'">
                  <label for="'. $name .'" style="color:#696969;"><strong>'. $label .'</strong></label>
                  <input readonly="" class="form-control" name="'.$name.'" id="'.$name.'" value="'. SanitizeHelper::stringOutputSanitize($value) .'" placeholder="'.$placeholder.'" type="text">
                </div>';
      
    }





    public static function alert($session, $message, $type){

      if($session){

        return'<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    '. $message .'
                </div>';

      } 

    }





    public static function submitButton($class, $name, $id){

      return'<button type="submit" class="submit-button btn m-4 fuse-ripple-ready '. $class .'" id="'.$id.'">
                '. $name .' <i class="icon icon-arrow-right-box"></i>
            </button>';
      
    }






    public static function padding($class){

      return '<div class="form-group '.$class.'">
              </div>';
      
    }





}
