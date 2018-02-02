<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DvSetDvNoRequest extends FormRequest{



    public function authorize(){
        return true;
    }



    public function rules(){
        return [
            'dv_no' => 'string|nullable|max:20',
            'slug' => 'required|string',
        ];
    }


    public function messages(){
        return [
            'dv_no.string'  => 'Invalid Input! You must enter a valid value',
            'dv_no.max'  => 'The DV No. field may not be greater than 20 characters.',

            'slug.required'  => 'Invalid Input! You must enter a valid value',
            'slug.string'  => 'Invalid Input! You must enter a valid value',

        ];
    }


}
