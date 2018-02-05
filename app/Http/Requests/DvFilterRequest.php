<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Libraries\Statics\DVUtil;

class DvFilterRequest extends FormRequest{



    public function authorize(){
        return true;
    }

    

    public function rules(){

        $this->sanitize();

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


    

    public function sanitize(){

        $attributes = $this->all();

        if(array_key_exists('search', $attributes)){
            $attributes['search'] = DVUtil::searchSanitize($attributes['search']);
        }

        if(array_key_exists('fund_source', $attributes)){
            $attributes['fund_source'] = DVUtil::filterSanitize($attributes['fund_source']);
        }

        if(array_key_exists('station', $attributes)){
            $attributes['station'] = DVUtil::filterSanitize($attributes['station']);
        }

        if(array_key_exists('department', $attributes)){
            $attributes['department'] = DVUtil::filterSanitize($attributes['department']);
        }

        if(array_key_exists('unit', $attributes)){
            $attributes['unit'] = DVUtil::filterSanitize($attributes['unit']);
        }

        if(array_key_exists('project_code', $attributes)){
            $attributes['project_code'] = DVUtil::filterSanitize($attributes['project_code']);
        }

        $this->replace($attributes); 
    }


    


}
