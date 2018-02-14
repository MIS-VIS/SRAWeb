<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Libraries\Statics\DVUtil;

class DvFormRequest extends FormRequest{
   

   
    public function authorize(){

        return true;
    
    }




    public function rules(){

        $this->sanitize();

        return [
            'dv_fund_source'=>'required|string|max:20',
            'dv_payee'=>'required|string|max:100',
            'dv_tin'=>'required|string|max:20',
            'dv_bur_no'=>'max:20',
            'dv_address'=>'required|string|max:100',
            'dv_dept_code'=>'required|string|max:20',
            'dv_proj_code'=>'required|string|max:20',
            'dv_explanation'=>'required',
            'dv_amount'=>'required|string|max:20',
            'dv_certified_by'=>'required|string|max:100',
            'dv_certified_by_position'=>'required|string|max:100',
            'dv_approved_by'=>'required|string|max:100',
            'dv_approved_by_position'=>'required|string|max:100'
        ];

    }




    public function messages(){

	    return [

            'dv_fund_source.required'  => 'Fund Source field is required.',
	        'dv_fund_source.string'  => 'Invalid Input! You must enter a string value.',
            'dv_fund_source.max'  => 'The Fund Source field may not be greater than 20 characters.',

            'dv_payee.required'  => 'Payee field is required.',
            'dv_payee.string'  => 'Invalid Input! You must enter a string value.',
            'dv_payee.max'  => 'The Payee field may not be greater than 100 characters.',
	        
            'dv_tin.required'  => 'TIN field is required.',
            'dv_tin.string'  => 'Invalid Input! You must enter a string value.',
            'dv_tin.max'  => 'The TIN field may not be greater than 20 characters.',

            'dv_bur_no.max'  => 'The BUR No. field may not be greater than 20 characters.',
	        
            'dv_address.required'  => 'Address field is required.',
            'dv_address.string'  => 'Invalid Input! You must enter a string value.',
            'dv_address.max'  => 'The Address field may not be greater than 100 characters.',
            
            'dv_dept_code.required'  => 'Department field is required.',
            'dv_dept_code.string'  => 'Invalid Input! You must enter a string value.',
            'dv_dept_code.max'  => 'The Department field may not be greater than 20 characters.',
	        
            'dv_proj_code.required'  => 'Account Code field is required.',
            'dv_proj_code.string'  => 'Invalid Input! You must enter a string value.',
            'dv_proj_code.max'  => 'The Account Code field may not be greater than 20 characters.',
	        
            'dv_explanation.required'  => 'Explanation field is required.',
	        
            'dv_amount.required'  => 'Amount field is required.',
            'dv_amount.string'  => 'Invalid Input! You must enter a string value.',
            'dv_amount.max'  => 'The Amount field may not be greater than 20 characters.',
	        
            'dv_certified_by.required'  => 'Certified by field is required.',
            'dv_certified_by.string'  => 'Invalid Input! You must enter a string value.',
            'dv_certified_by.max'  => 'The Certified by field may not be greater than 100 characters.',

            'dv_certified_by_position.required'  => 'Certified by position field is required.',
            'dv_certified_by_position.string'  => 'Invalid Input! You must enter a string value.',
            'dv_certified_by_position.max'  => 'The Position field may not be greater than 100 characters.',
	        
            'dv_approved_by.required'  => 'Approved by field is required.',
            'dv_approved_by.string'  => 'Invalid Input! You must enter a string value.',
            'dv_approved_by.max'  => 'The Approved by field may not be greater than 100 characters.',

	        'dv_approved_by_position.required'  => 'Approved by position field is required.',
            'dv_approved_by_position.string'  => 'Invalid Input! You must enter a string value.',
            'dv_approved_by_position.max'  => 'The Position by field may not be greater than 100 characters.',

	    ];

	}



    public function sanitize(){
        $request = $this->all();
        $request['dv_project_id'] = DVUtil::formSanitize($request['dv_project_id']);
        $request['dv_fund_source'] = DVUtil::formSanitize($request['dv_fund_source']);
        $request['dv_mop'] = DVUtil::formSanitize($request['dv_mop']);
        $request['dv_payee'] = DVUtil::formSanitize($request['dv_payee']);
        $request['dv_tin'] = DVUtil::formSanitize($request['dv_tin']);
        $request['dv_bur_no'] = DVUtil::formSanitize($request['dv_bur_no']);
        $request['dv_address'] = DVUtil::formSanitize($request['dv_address']);
        $request['dv_dept_code'] = DVUtil::formSanitize($request['dv_dept_code']);
        $request['dv_unit_code'] = DVUtil::formSanitize($request['dv_unit_code']);
        $request['dv_proj_code'] = DVUtil::formSanitize($request['dv_proj_code']);
        $request['dv_explanation'] = $request['dv_explanation'];
        $request['dv_amount'] = str_replace(',', '', DVUtil::formSanitize($request['dv_amount']));
        $request['dv_certified_by'] = DVUtil::formSanitize($request['dv_certified_by']);
        $request['dv_certified_by_position'] = DVUtil::formSanitize($request['dv_certified_by_position']);
        $request['dv_approved_by'] = DVUtil::formSanitize($request['dv_approved_by']);
        $request['dv_approved_by_position'] = DVUtil::formSanitize($request['dv_approved_by_position']);
        $this->replace($request);
    }



}
