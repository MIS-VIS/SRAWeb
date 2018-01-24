<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DvSearchRequest extends FormRequest{


    public function authorize(){
        return true;
    }



    public function rules(){
        return [
            'q'=>'string|nullable',
        ];
    }



    public function messages(){
        return [
            'q.string'  => 'Invalid Input! You must enter a valid value',
        ];
    }




}
