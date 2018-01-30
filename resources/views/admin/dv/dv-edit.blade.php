@extends('layout.admin-master')

@section('content')

<div class="page-layout carded full-width" id="dv_edit">
    <div class="top-bg bg-blue"></div>
        <div class="page-content">
            <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="logo row no-gutters align-items-start">
                        <div class="logo-icon mr-3 mt-1">
                            <i class="icon-cube-outline"></i>
                        </div>
                        <div class="logo-text">
                            <div class="h4">Edit Voucher</div>
                            <div class="">Doc No: {{ $dv->doc_no }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-card" id="dv-card">
                <div class="p-5 col-12">

                {!!ContentHelper::loader('loader')!!} 
                
                {!! Form::open(['route' => ['admin.dv.update', $dv->slug], 'method' => 'PUT', 'class' => 'row', 'id' => 'dvForm']) !!}

                    {!! FormHelper::padding('col-md-12') !!}

                    {!! FormHelper::dropdownStatic(
                        'col-md-4', 'dv_project_id', 'Station:', 'dv_project_id', SelectHelper::selectProjectId(), $dv->dv_project_id, $errors->first('dv_project_id'), 'required'
                    ) !!}

                    {!! FormHelper::dropdownStatic(
                        'col-md-4', 'dv_fund_source', 'Fund Source:', 'dv_fund_source', SelectHelper::selectFundSource(), $dv->dv_fund_source, $errors->first('dv_fund_source'), 'required'
                    ) !!}

                    {!! FormHelper::dropdownStatic(
                        'col-md-4', 'dv_mop', 'Mode of Payment:', 'dv_mop', SelectHelper::selectMOP(), $dv->dv_mop, $errors->first('dv_mop'), ''
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-6', 'dv_payee', 'Payee:', 'text', 'dv_payee', $dv->dv_payee, 'required', $errors->first('dv_payee')
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-3', 'dv_tin', 'Tin/Employee No:', 'text', 'dv_tin', $dv->dv_tin, 'required', $errors->first('dv_tin')
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-3', 'dv_bur_no', 'BUR No:', 'text', 'dv_bur_no', $dv->dv_bur_no, '', $errors->first('dv_bur_no')
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-6', 'dv_address', 'Address:', 'text', 'dv_address', $dv->dv_address, 'required', $errors->first('dv_address')
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-2', 'dv_dept_code', 'Department:', 'dv_dept_code', $burProjectsDeptId, 'dept_id', 'dept_id', $dv->dv_dept_code , $errors->first('dv_dept_code'), 'required'
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-2', 'dv_unit_code', 'Unit:', 'dv_unit_code', $departmentsDeptUnit, 'dept_unit', 'dept_unit', $dv->dv_unit_code , $errors->first('dv_unit_code'), ''
                    ) !!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-2','dv_proj_code', 'Account Code:', 'dv_proj_code', $burProjectsAcctCode, 'acct_code', 'acct_code', $dv->dv_proj_code, $errors->first('dv_proj_code'), 'required'
                    ) !!}

                    {!! FormHelper::textArea(
                        'col-md-9', 'dv_explanation', 'Explanation:', 'dv_explanation', $dv->dv_explanation, $errors->first('dv_explanation'), 'required', '30'
                    ) !!}

                    {!! FormHelper::textBox(
                        'up', 'col-md-3', 'dv_amount', 'Amount:', 'text', 'dv_amount', $dv->dv_amount, 'required', $errors->first('dv_amount')
                    ) !!}

                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Certified</h4>

                            {!! FormHelper::dropdownDynamic(
                                'col-md-12', 'dv_certified_by', 'Name:', 'dv_certified_by', $employees, 'emp_name', 'emp_name', $dv->dv_certified_by, $errors->first('dv_certified_by'), 'required'
                            ) !!} 

                            {!! FormHelper::readOnly(
                                'col-md-12', 'dv_certified_by_position', 'Position:', '', $dv->dv_certified_by_position
                            ) !!}

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Approved</h4>

                            {!! FormHelper::dropdownDynamic(
                                'col-md-12', 'dv_approved_by', 'Name:', 'dv_approved_by', $employees, 'emp_name', 'emp_name', $dv->dv_approved_by , $errors->first('dv_approved_by'), 'required'
                            ) !!} 

                            {!! FormHelper::readOnly(
                                'col-md-12', 'dv_approved_by_position', 'Position:', '', $dv->dv_approved_by_position
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

    @if(Session::has('success'))
        {!! ContentHelper::modalPrint('dvConfirmUpdate', '<i class="icon-file-check"></i> UPDATED!', Session::get('success'), route('admin.dv.show', Session::get('slug')) ) !!}
    @endif

@endsection



@section('scripts')
    {!! JSHelper::AjaxSelectToSelect('dv_dept_code', 'dv_unit_code', '/admin/dv-add/response-unit/', 'dept_unit', 'dept_unit') !!}
    {!! JSHelper::AjaxSelectToSelect('dv_dept_code', 'dv_proj_code', '/admin/dv-add/response-accountCode/', 'acct_code', 'acct_code') !!}
    {!! JSHelper::AjaxSelectToInput('dv_certified_by', 'dv_certified_by_position', '/admin/dv-add/response-certPos/', 'position') !!}
    {!! JSHelper::AjaxSelectToInput('dv_approved_by', 'dv_approved_by_position', '/admin/dv-add/response-apprPos/', 'position') !!}
    {!! JSHelper::ModalShow('dvConfirmUpdate') !!}
    {!! JSHelper::RichText('dv_explanation') !!}
    {!! JSHelper::SelectSearch('dv_certified_by') !!}
    {!! JSHelper::SelectSearch('dv_approved_by') !!}
    {!! JSHelper::PriceInput('dv_amount') !!}
@endsection