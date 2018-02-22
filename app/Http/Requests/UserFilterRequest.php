<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest{
   

    public function authorize(){
        
        return true;

    }




    
    public function rules(){

        return [
            
            'search'=>"string|nullable",
            'is_logged'=>'string|nullable',

        ];
    }






    public function messages(){
        
        return [

            'search.string'  => 'Invalid Input! You must enter a valid value',
            'is_logged.string'  => 'Invalid Input! You must enter a valid value',

        ];

    }



}
