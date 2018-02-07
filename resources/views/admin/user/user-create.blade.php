@extends('layout.admin-master')
	
@section('content')
	

<div class="page-layout carded full-width" id="dv_add">
    <div class="top-bg bg-blue"></div>
        <div class="page-content">
            <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="logo row no-gutters align-items-start">
                        <div class="logo-icon mr-3 mt-1">
                            <i class="icon-account-plus"></i>
                        </div>
                        <div class="logo-text">
                            <div class="h4">Add User</div>
                            <div class="">Please fill up the necessary fields.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-card" id="dv-card">
                <div class="p-5 col-12">

    			{!! ContentHelper::loader('loader') !!}
                
                {!! Form::open(['route' => 'admin.user.store', 'method' => 'POST', 'class' => 'row', 'id' => 'userForm']) !!}

    				{!! FormHelper::padding('col-md-12') !!}

    				<div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Information</h4>

                            	{!! FormHelper::textBox(
			                        'up', 'col-md-12', 'firstname', 'Firstname:', 'text', 'firstname', old('firstname'), 'required', $errors->first('firstname')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'middlename', 'Middlename:', 'text', 'middlename', old('middlename'), 'required', $errors->first('middlename')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'lastname', 'Lastname:', 'text', 'lastname', old('lastname'), 'required', $errors->first('lastname')
			                    ) !!}

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Account</h4>

                            	{!! FormHelper::textBox(
			                        'up', 'col-md-12', 'username', 'Username:', 'text', 'username', old('username'), 'required', $errors->first('username')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'password', 'Password:', 'password', 'password', old('password'), 'required', $errors->first('password')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'c_password', 'Confirm Password:', 'password', 'c_password', old('c_password'), 'required', $errors->first('c_password')
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

    @if(Session::has('created'))
        {!! ContentHelper::modalPrint('dvConfirmAdd', '<i class="icon-file-check"></i> SAVED!', Session::get('created'), route('admin.dv.show', Session::get('slug')) ) !!}
    @endif

@endsection



@section('scripts')
    {!! JSHelper::AjaxSelectToSelect('dv_dept_code', 'dv_unit_code', '/admin/dv-add/response-unit/', 'dept_unit', 'dept_unit') !!}
    {!! JSHelper::AjaxSelectToSelect('dv_dept_code', 'dv_proj_code', '/admin/dv-add/response-accountCode/', 'acct_code', 'acct_code') !!}
    {!! JSHelper::AjaxSelectToInput('dv_certified_by', 'dv_certified_by_position', '/admin/dv-add/response-certPos/', 'position') !!}
    {!! JSHelper::AjaxSelectToInput('dv_approved_by', 'dv_approved_by_position', '/admin/dv-add/response-apprPos/', 'position') !!}
    {!! JSHelper::ModalShow('dvConfirmAdd') !!}
    {!! JSHelper::RichText('dv_explanation') !!}
    {!! JSHelper::SelectSearch('dv_certified_by') !!}
    {!! JSHelper::SelectSearch('dv_approved_by') !!}
    {!! JSHelper::SelectSearch('dv_dept_code') !!}
    {!! JSHelper::SelectSearch('dv_unit_code') !!}
    {!! JSHelper::SelectSearch('dv_proj_code') !!}
    {!! JSHelper::SelectNormal('dv_project_id') !!}
    {!! JSHelper::SelectNormal('dv_fund_source') !!}
    {!! JSHelper::SelectNormal('dv_mop') !!}
    {!! JSHelper::PriceInput('dv_amount') !!}
@endsection

