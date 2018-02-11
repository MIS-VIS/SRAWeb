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
            'fromDate.date_format'  => 'Invalid Format! The Date does not match the format dd-mm-yyyy',
            'toDate.date_format'  => 'Invalid Format! The Date does not match the format dd-mm-yyyy',
        ];

    }




    public function sanitize(){

    $request = $this->all();

        if(count($request) > 0){

            if(array_key_exists('search', $request)){
                $request['search'] =  DVUtil::searchSanitize($request['search']);
            }

            if(array_key_exists('fund_source', $request)){
                $request['fund_source'] =  DVUtil::filterSanitize($request['fund_source']);
            }

            if(array_key_exists('station', $request)){
                $request['station'] =  DVUtil::filterSanitize($request['station']);
            }

            if(array_key_exists('department', $request)){
                $request['department'] =  DVUtil::filterSanitize($request['department']);
            }

            if(array_key_exists('unit', $request)){
                $request['unit'] =  DVUtil::filterSanitize($request['unit']);
            }

            if(array_key_exists('project_code', $request)){
                $request['project_code'] =  DVUtil::filterSanitize($request['project_code']);
            }

            if(array_key_exists('fromDate', $request)){
                $request['fromDate'] =  DVUtil::filterSanitize($request['fromDate']);
            }

            if(array_key_exists('toDate', $request)){
                $request['toDate'] =  DVUtil::filterSanitize($request['toDate']);
            }

        }

    $this->replace($request);

    }





}
