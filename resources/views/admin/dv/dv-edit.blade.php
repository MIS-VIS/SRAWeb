@extends('layout.admin-master')

@section('content')

    {!!ContentHelper::openCont('carded1' , 'icon-cube-outline', 'Add Voucher' , 'My Vouchers', '10', '', route('admin.dv.index'), '', '')!!}
        {!!ContentHelper::openCard('carded', 'dv-card')!!}

            {!!ContentHelper::loader('loader')!!} 
            
            {!! Form::open(['route' => ['admin.dv.update', $dv->slug], 'method' => 'PUT', 'class' => 'row', 'id' => 'dvForm']) !!}

                {!! FormHelper::padding('col-md-9') !!}
                        
                {!! FormHelper::readOnly(
                    'col-md-3', 'dv_no', 'No.:', 'To be filled by accounting', ''
                ) !!}

                {!! FormHelper::dropdownStatic(
                    'col-md-6', 'dv_fund_source', 'Fund Source:', 'dv_fund_source', StaticHelper::selectFundSource(), $dv->dv_fund_source, $errors->first('dv_fund_source'), 'required'
                ) !!}

                {!! FormHelper::dropdownStatic(
                    'col-md-6', 'dv_mop', 'Mode of Payment:', 'dv_mop', StaticHelper::selectMOP(), $dv->dv_mop, $errors->first('dv_mop'), ''
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


                {!!ContentHelper::openInCard('col-md-6' , 'Certified', '', '')!!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-12', 'dv_certified_by', 'Name:', 'dv_certified_by', $employees, 'emp_name', 'emp_name', $dv->dv_certified_by, $errors->first('dv_certified_by'), 'required'
                    ) !!} 

                    {!! FormHelper::readOnly(
                        'col-md-12', 'dv_certified_by_position', 'Position:', '', $dv->dv_certified_by_position
                    ) !!}

                {!!ContentHelper::closeInCard()!!}


                {!!ContentHelper::openInCard('col-md-6' , 'Approved', '', '')!!}

                    {!! FormHelper::dropdownDynamic(
                        'col-md-12', 'dv_approved_by', 'Name:', 'dv_approved_by', $employees, 'emp_name', 'emp_name', $dv->dv_approved_by , $errors->first('dv_approved_by'), 'required'
                    ) !!} 

                    {!! FormHelper::readOnly(
                        'col-md-12', 'dv_approved_by_position', 'Position:', '', $dv->dv_approved_by_position
                    ) !!}

                {!!ContentHelper::closeInCard()!!}


                {!! FormHelper::submitButton('btn-secondary ', 'Save', 'dv-submit') !!}

            {!! Form::close() !!}

        {!!ContentHelper::closeCard('carded')!!}
    {!!ContentHelper::closeCont('carded')!!}


    @section('modals')

        @if(Session::has('success'))
            {!! ContentHelper::modalConfirmUpdate('dvConfirmUpdate', '<i class="icon-file-check"></i> UPDATED!', Session::get('success') , '', route('admin.dv.index'), route('admin.dv.show', Session::get('slug')) ) !!}
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

@endsection