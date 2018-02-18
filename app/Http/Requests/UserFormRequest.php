<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest{




    public function authorize(){

        return true;
        
    }

   



    public function rules(){

        return [

            'firstname'=>'required|string|max:100',
            'middlename'=>'required|string|max:100',
            'lastname'=>'required|string|max:100',
            'username'=>'required|string|max:50',
            'password'=>'required|confirmed|string|min:6|max:50',
            
        ];

    }





    public function messages(){

        return [

            'firstname.required'  => 'Firstname field is required.',
            'firstname.string'  => 'Invalid Input! You must enter a string value.',
            'firstname.max'  => 'The Firstname field may not be greater than 100 characters.',

            'middlename.required'  => 'Middlename field is required.',
            'middlename.string'  => 'Invalid Input! You must enter a string value.',
            'middlename.max'  => 'The Middlename field may not be greater than 100 characters.',

            'lastname.required'  => 'Lastname field is required.',
            'lastname.string'  => 'Invalid Input! You must enter a string value.',
            'lastname.max'  => 'The Lastname field may not be greater than 100 characters.',

            'username.required'  => 'Username field is required.',
            'username.string'  => 'Invalid Input! You must enter a string value.',
            'username.max'  => 'The Username field may not be greater than 50 characters.',

            'password.required'  => 'Password field is required.',
            'password.confirmed'  => 'The Password Confirmation does not match.',
            'password.string'  => 'Invalid Input! You must enter a string value.',
            'password.min'  => 'The Password field may not be lesser than 6 characters.',
            'password.max'  => 'The Password field may not be greater than 50 characters.',

        ];

    }




}
