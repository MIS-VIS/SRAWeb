@extends('layout.admin-master')

@section('content')

<div class="page-layout carded full-width" id="dv_add">
    <div class="top-bg bg-blue"></div>
        <div class="page-content">
            <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="logo row no-gutters align-items-start">
                        <div class="logo-icon mr-3 mt-1">
                            <i class="icon-document"></i>
                        </div>
                        <div class="logo-text">
                            <div class="h4">Create Voucher</div>
                            <div class="">Please fill up the necessary fields.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-card" id="dv-card">
                <div class="p-5 col-12">

    	        {!!ContentHelper::loader('loader')!!}
                
                {!! Form::open(['route' => 'admin.dv.store', 'method' => 'POST', 'class' => 'row', 'id' => 'dvForm']) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-4', 'dv_project_id', 'Station:', 'dv_project_id', $projects, 'project_id', 'project_address', old('dv_project_id') , $errors->first('dv_project_id'), 'required'
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-4', 'dv_fund_source', 'Fund Source:', 'dv_fund_source', $fundSource, 'fund_source_name', 'fund_source_name', old('dv_fund_source') , $errors->first('dv_fund_source'), 'required'
                    ) !!}

                    {!! FormHelper::dropdownStatic(
                        'col-md-4', 'dv_mop', 'Mode of Payment:', 'dv_mop', DVUtil::selectMOP(), old('dv_mop'), $errors->first('dv_mop'), ''
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-6', 'dv_payee', 'Payee:', 'text', 'dv_payee', old('dv_payee'), 'required', $errors->first('dv_payee')
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-3', 'dv_tin', 'Tin/Employee No:', 'text', 'dv_tin', old('dv_tin'), 'required', $errors->first('dv_tin')
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-3', 'dv_bur_no', 'BUR No:', 'text', 'dv_bur_no', old('dv_bur_no'), '', $errors->first('dv_bur_no')
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-6', 'dv_address', 'Address:', 'text', 'dv_address', old('dv_address'), 'required', $errors->first('dv_address')
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-2', 'dv_dept_code', 'Department:', 'dv_dept_code', $burProjectsDeptId, 'dept_id', 'dept_id', old('dv_dept_code') , $errors->first('dv_dept_code'), 'required'
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-2', 'dv_unit_code', 'Unit:', 'dv_unit_code', $departmentsDeptUnit, 'dept_unit', 'dept_unit', old('dv_unit_code') , $errors->first('dv_unit_code'), ''
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-2','dv_proj_code', 'Account Code:', 'dv_proj_code', $burProjectsAcctCode, 'acct_code', 'acct_code', old('dv_proj_code'), $errors->first('dv_proj_code'), 'required'
                    ) !!}


                    <div class="col-md-12">
                        <div class="alert alert-warning fade show" role="alert">
                            Note: Please put your computations in the <strong>Explanation Field</strong>, and the Total/Net of your computation in the <strong>Amount Field.</strong>
                        </div>
                    </div>
        

                    {!! FormHelper::textArea(
                        'col-md-9', 'dv_explanation', 'Explanation:', 'dv_explanation', old('dv_explanation'), $errors->first('dv_explanation'), 'required'
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-3', 'dv_amount', 'Amount:', 'text', 'dv_amount', old('dv_amount'), 'required', $errors->first('dv_amount')
                    ) !!}

                            
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Certified</h4>

                                {!! FormHelper::readOnly(
                                    'col-md-12', 'dv_certified_by', 'Name:', '', $accountingSignatory->emp_name
                                ) !!} 

                                {!! FormHelper::readOnly(
                                    'col-md-12', 'dv_certified_by_position', 'Position:', '', $accountingSignatory->emp_position
                                ) !!}

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Approved</h4>

                                {!! FormHelper::readOnly(
                                    'col-md-12', 'dv_approved_by', 'Name:', '', $adminSignatory->emp_name
                                ) !!}

                                {!! FormHelper::readOnly(
                                    'col-md-12', 'dv_approved_by_position', 'Position:', '', $adminSignatory->emp_position
                                ) !!}

                            </div>
                        </div>
                    </div>

                    {!! FormHelper::submitButton('btn-secondary ', 'Save', 'dv-submit') !!}
                    
    			{!! Form::close() !!}
                
            </div>
	    </div>
    </div>
</div>

@endsection



@section('modals')

    @if(Session::has('SESSION_DV_STORE'))
        {!! ModalHelper::modalPrint('dvConfirmAdd', '<i class="icon-file-check"></i> SAVED!', Session::get('SESSION_DV_STORE'), route('admin.dv.show', Session::get('SESSION_DV_STORE_SLUG')) ) !!}
    @endif

@endsection



@section('scripts')

    {!! JSHelper::AjaxSelectToSelect('dv_dept_code', 'dv_unit_code', '/ajax/response-unit/', 'dept_unit', 'dept_unit') !!}
    {!! JSHelper::AjaxSelectToSelect('dv_dept_code', 'dv_proj_code', '/ajax/response-accountCode/', 'acct_code', 'acct_code') !!}
    {!! JSHelper::ModalShow('dvConfirmAdd') !!}
    {!! JSHelper::RichText('dv_explanation', '450') !!}
    {!! JSHelper::SelectSearch('dv_dept_code') !!}
    {!! JSHelper::SelectSearch('dv_unit_code') !!}
    {!! JSHelper::SelectSearch('dv_proj_code') !!}
    {!! JSHelper::SelectNormal('dv_project_id') !!}
    {!! JSHelper::SelectNormal('dv_fund_source') !!}
    {!! JSHelper::SelectNormal('dv_mop') !!}
    {!! JSHelper::PriceInput('dv_amount') !!}
    
@endsection