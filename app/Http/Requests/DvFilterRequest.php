<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Libraries\Statics\DVUtil;

class DvFilterRequest extends FormRequest{



    public function authorize(){
        return true;
    }

    

    public function rules(){

        return [
            'search'=>'string|nullable',
            'fund_source'=>'string|nullable',
            'station'=>'integer|nullable',
            'department'=>'string|nullable',
            'unit'=>'string|nullable',
            'project_code'=>'string|nullable',
            'fromDate'=>'date_format:"d-m-Y"|nullable',
            'toDate'=>'date_format:"d-m-Y"|nullable',
        ];

    }





    public function messages(){
        
        return [
            'search.string'  => 'Invalid Input! You must enter a valid value',
            'fund_source.string'  => 'Invalid Input! You must enter a valid value',
            'station.integer'  => 'Invalid Input! You must enter a valid value',
            'department.string'  => 'Invalid Input! You must enter a valid value',
            'unit.string'  => 'Invalid Input! You must enter a valid value',
            'project_code.string'  => 'Invalid Input! You must enter a valid value',
            'fromDate.date_format'  => 'Invalid Input! You must enter a valid value',
            'toDate.date_format'  => 'Invalid Input! You must enter a valid value',
        ];

    }





}
