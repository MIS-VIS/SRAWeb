<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest{




    public function authorize(){

        return true;
        
    }

   



    public function rules(){

        $rules =  [

            'firstname'=>'required|string|max:100',
            'middlename'=>'required|string|max:100',
            'lastname'=>'required|string|max:100',
            'username'=>'required|string|max:50',
            
        ];


        if($this->request->get('password')){

            $rules['password'] = 'required|confirmed|string|min:6|max:50';

        }



        if(count($this->request->get('menu')) > 0){

          foreach($this->request->get('menu') as $key => $value){

            $rules['menu.'.$key] = 'required|string';

            } 

        }

        

        if(count($this->request->get('submenu')) > 0){

            foreach($this->request->get('submenu') as $key => $value){

                $rules['submenu.'.$key] = '';

            }
        }


        return $rules;

    }





    public function messages(){

        $messages = [

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
        
        foreach($this->request->get('menu') as $key => $value) {

            $messages['menu.'.$key.'.required'] = ' Menu Field is Required.';
            $messages['menu.'.$key.'.string'] = ' Invalid Input! You must enter a string value.';

        }

        return $messages;

    }




}
