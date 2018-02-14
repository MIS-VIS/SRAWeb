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
            'c_password'=>'required|string|max:50',
            'password'=>'required|string|max:50',
        ];
    }





}
