<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DvFormRequest extends FormRequest{
   
   
    public function authorize(){
        return true;
    }



    public function rules(){
        return [
            'dv_fund_source'=>'required|string',
            'dv_payee'=>'required|string',
            'dv_tin'=>'required|string',
            'dv_address'=>'required|string',
            'dv_dept_code'=>'required|string',
            'dv_proj_code'=>'required|string',
            'dv_explanation'=>'required',
            'dv_amount'=>'required|string',
            'dv_certified_by'=>'required|string',
            'dv_certified_by_position'=>'required|string',
            'dv_approved_by'=>'required|string',
            'dv_approved_by_position'=>'required|string'
        ];
    }



    public function messages(){
	    return [
            'dv_fund_source.required'  => 'Fund Source field is required.',
	        'dv_fund_source.string'  => 'Invalid Input! You must enter a string value.',

            'dv_payee.required'  => 'Payee field is required.',
            'dv_payee.string'  => 'Invalid Input! You must enter a string value.',
	        
            'dv_tin.required'  => 'TIN field is required.',
            'dv_tin.string'  => 'Invalid Input! You must enter a string value.',
	        
            'dv_address.required'  => 'Address field is required.',
            'dv_address.string'  => 'Invalid Input! You must enter a string value.',
            
            'dv_dept_code.required'  => 'Department field is required.',
            'dv_dept_code.string'  => 'Invalid Input! You must enter a string value.',
	        
            'dv_proj_code.required'  => 'Account Code field is required.',
            'dv_proj_code.string'  => 'Invalid Input! You must enter a string value.',
	        
            'dv_explanation.required'  => 'Explanation field is required.',
	        
            'dv_amount.required'  => 'Amount field is required.',
            'dv_amount.string'  => 'Invalid Input! You must enter a string value.',
	        
            'dv_certified_by.required'  => 'Certified by field is required.',
            'dv_certified_by.string'  => 'Invalid Input! You must enter a string value.',
            'dv_certified_by_position.required'  => 'Certified by position field is required.',
            'dv_certified_by_position.string'  => 'Invalid Input! You must enter a string value.',
	        
            'dv_approved_by.required'  => 'Approved by field is required.',
            'dv_approved_by.string'  => 'Invalid Input! You must enter a string value.',
	        'dv_approved_by_position.required'  => 'Approved by position field is required.',
            'dv_approved_by_position.string'  => 'Invalid Input! You must enter a string value.',
	    ];
	}



}
