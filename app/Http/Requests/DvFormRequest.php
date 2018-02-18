<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DvFormRequest extends FormRequest{
   

   
    public function authorize(){

        return true;
    
    }




    public function rules(){

        return [

            'dv_project_id'=>'required|string|min:1|max:1',
            'dv_fund_source'=>'required|string|max:10',
            'dv_mop'=>'nullable|string',
            'dv_payee'=>'required|string|max:100',
            'dv_tin'=>'required|string|max:20',
            'dv_bur_no'=>'nullable|string|max:20',
            'dv_address'=>'required|string|max:100',
            'dv_dept_code'=>'required|string|max:20',
            'dv_unit_code'=>'nullable|string|max:20',
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

                'dv_project_id.required'  => 'Station field is required.',
                'dv_project_id.string'  => 'Invalid Input! You must enter a string value.',
                'dv_project_id.min'  => 'The Station field may not be lesset than 1 character.',
                'dv_project_id.max'  => 'The Station field may not be greater than 1 character.',
                
                'dv_fund_source.required'  => 'Fund Source field is required.',
    	        'dv_fund_source.string'  => 'Invalid Input! You must enter a string value.',
                'dv_fund_source.max'  => 'The Fund Source field may not be greater than 20 characters.',

                'dv_mop.string'  => 'Invalid Input! You must enter a string value.',

                'dv_payee.required'  => 'Payee field is required.',
                'dv_payee.string'  => 'Invalid Input! You must enter a string value.',
                'dv_payee.max'  => 'The Payee field may not be greater than 100 characters.',
    	        
                'dv_tin.required'  => 'TIN field is required.',
                'dv_tin.string'  => 'Invalid Input! You must enter a string value.',
                'dv_tin.max'  => 'The TIN field may not be greater than 20 characters.',

                'dv_bur_no.string'  => 'Invalid Input! You must enter a string value.',
                'dv_bur_no.max'  => 'The BUR No. field may not be greater than 20 characters.',
    	        
                'dv_address.required'  => 'Address field is required.',
                'dv_address.string'  => 'Invalid Input! You must enter a string value.',
                'dv_address.max'  => 'The Address field may not be greater than 100 characters.',
                
                'dv_dept_code.required'  => 'Department field is required.',
                'dv_dept_code.string'  => 'Invalid Input! You must enter a string value.',
                'dv_dept_code.max'  => 'The Department field may not be greater than 20 characters.',

                'dv_unit_code.required'  => 'Unit field is required.',
                'dv_unit_code.string'  => 'Invalid Input! You must enter a string value.',
                'dv_unit_code.max'  => 'The Unit field may not be greater than 20 characters.',
    	        
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





}
