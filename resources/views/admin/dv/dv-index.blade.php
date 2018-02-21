@extends('layout.admin-master')

@section('content')

<div class="content">
    <div id="contacts" class="page-layout simple left-sidebar-floating">
        <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between p-6">
            <div class="col">
                <div class="row no-gutters align-items-center flex-nowrap">
                     <div class="logo-icon mr-3 mt-1">
                    	<i class="icon-file-multiple"></i>
                	</div>

                    <div class="logo-text">
                        <div class="h4">All Vouchers</div>
                        <div class="">Records : {{ $dvList->total()}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content-wrapper">

            {!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}

                <aside class="page-sidebar p-6">

                    <div class="page-sidebar-card">

                        <div class="header p-4">
                            <div class="row no-gutters align-items-center">
                                <i class="icon-filter"></i>
                                <span class="font-weight-bold"> &nbsp;&nbsp;&nbsp;Filters</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="content">
                            <div class="p-2">
                                  
                                {!! 
                                    DVUtil::filterDropdown('fund_source', 'Fund Source', $fundSource, 'fund_source_name', 'fund_source_name' , old('fund_source'), $errors->first('fund_source')) 
                                !!}


                                {!! 
                                    DVUtil::filterDropdown('station', 'Station', $projects, 'project_id', 'project_address' , old('station'), $errors->first('station')) 
                                !!}


                                {!! 
                                    DVUtil::filterDropdown('department', 'Department', $burProjectsDeptId, 'dept_id', 'dept_id' , old('department'), $errors->first('department')) 
                                !!}


                                {!! 
                                    DVUtil::filterDropdown('unit', 'Unit', $departmentsDeptUnit, 'dept_unit', 'dept_unit' , old('unit'), $errors->first('unit')) 
                                !!} 


                                {!! 
                                    DVUtil::filterDropdown('project_code', 'Project Code', $burProjectsAcctCode, 'acct_code', 'acct_code' , old('project_code'), $errors->first('project_code')) 
                                !!} 
                                
                            </div>
                        </div>
                        
                    </div>


                    <br>

                    <div class="page-sidebar-card">

                        <div class="header p-4">
                            <div class="row no-gutters align-items-center">
                                <i class="icon-calendar"></i>
                                <span class="font-weight-bold"> &nbsp;&nbsp;&nbsp; Date Filter</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="content">
                            <div class="p-2">

                                {!! 
                                    DVUtil::filterDatepicker(old('fromDate'), $errors->first('fromDate'), old('toDate'), $errors->first('toDate')); 
                                !!}

                            </div>
                        </div>

                    </div>


                </aside>

             {!! Form::close() !!}

            <div class="page-content p-sm-6" style="margin-bottom:1000px;">
                <div class="contacts-list card">

                    <div class="contacts-list-header p-6">
                        <div class="row no-gutters align-items-center justify-content-between">
                            <div class="col-md-8">
                                {!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}
                                        
                                    {!! 
                                        DVUtil::filterSearch(old('search'), $errors->first('search')); 
                                    !!}

                                {!! Form::close() !!}
                            </div>
                            <div class="col-auto">
                                <div class="row no-gutters align-items-center">
                                    <a href="{{ route('admin.dv.index') }}" class="btn btn-fab btn-sm btn-primary">
                                        <i class="icon icon-refresh s-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($dvList as $data)

                        <div class="contacts-list card">

                            <!-- CONTACT ITEM -->
                            <div class="contact-item row no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6 fuse-ripple-ready"
                            style="{!! Session::has('SESSION_SET_DV_NO_SLUG') && Session::get('SESSION_SET_DV_NO_SLUG') == $data->slug ? "background-color: #b3e5fc;" : '' !!} overflow: visible;"
                            >

                                <div class="avatar mr-2 bg-primary">{{ substr($data->user->firstname, 0, 1) }} </div>

                                <div class="col-2 text-truncate font-weight-bold px-1">{{ $data->user->fullnameShort }}</div>

                                <div class="col email text-truncate px-1 d-none d-xl-flex">
                                    {{ $data->dv_proj_code }}
                                </div>

                                <div class="col-3 job-title px-1 d-none d-sm-flex">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span><strong>Doc No :</strong> {{ $data->doc_no }}</span><br>
                                        </div>
                                        <div class="col-md-12">
                                            <span><strong>DV No :</strong> {!! $data->dv_no == null ? '&nbsp<span class="text-danger">Not Set</span>' : $data->dv_no !!}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col company text-truncate px-1 d-none d-sm-flex">
                                    {{ Carbon::parse($data->created_at)->format('M d, Y') }}
                                </div>

                                <div class="col-auto actions">

                                    <div class="row no-gutters">
                            
                                        <div class="actions row no-gutters">
                                            <div class="dropdown show">
                                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#setDvNo" data-slug="{{ $data->slug }}" data-value="{{ $data->dv_no }}" id="dv_no_button"">Set DV No.</a>
                                                    <a class="dropdown-item" href="{{ route('admin.dv.show', $data->slug) }}">Print</a>
                                                    <a class="dropdown-item" href="{{ route('admin.dv.edit', $data->slug) }}">Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteBtn" data-slug="{{ $data->slug }}" data-url="{{ route('admin.dv.destroy', $data->slug) }}" id="delete_button">Delete</a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- CONTACT ITEM -->

                        </div>

                    @endforeach

                    @if($dvList->isEmpty())
                        <div class="alert alert-danger fade show" role="alert">
                            No Records Found!
                        </div>
                    @endif

                    <div class="toolbar row no-gutters align-items-center p-sm-3">
                        <div class="col">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-6">
                                    <span>
                                        <strong>Displaying {{ $dvList->firstItem() > 0 ? $dvList->firstItem() : 0 }} - {{ $dvList->lastItem() > 0 ? $dvList->lastItem() : 0 }} out of {{ $dvList->total()}} Records</strong>
                                    </span>
                                </div>
                                <div class="col-lg-6">
                                    <nav aria-label="..." style="float:right;">

                                        {!! $dvList->appends([
                                                    'search'=>Input::get('search'), 
                                                    'fund_source' => Input::get('fund_source'), 
                                                    'station'=>Input::get('station'), 
                                                    'department' => Input::get('department'), 
                                                    'unit' => Input::get('unit'), 
                                                    'project_code' => Input::get('project_code'),
                                                    'fromDate' => Input::get('fromDate'),
                                                    'toDate' => Input::get('toDate'), ])
                                                    ->render('vendor.pagination.bootstrap-4') 
                                        !!}
                                        
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection




@section('modals')

    {!! ModalHelper::modalDelete('deleteBtn') !!}

    <div id="setDvNo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            
                <div class="modal-content">
                    <div class="modal-body" id="set_dv_no_body">
                        {!! Form::open(['route' => 'admin.dv.setDvNo', 'method' => 'POST']) !!}
                        
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">DV No.</label>
                                <input type="hidden" class="form-control" name="slug" id="slug"/>
                                <input type="text" class="form-control" name="dv_no" id="dv_no"/>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary fuse-ripple-ready" role="button" data-dismiss="modal">Cancel</a>
                                <button href="" class="btn btn-primary fuse-ripple-ready" type="submit">Set</button>
                             </div>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>

@endsection





@section('scripts')

    {!! JSHelper::SelectSearch('project_code') !!}
    {!! JSHelper::SelectSearch('department') !!}
    {!! JSHelper::SelectNormal('fund_source') !!}
    {!! JSHelper::SelectNormal('station') !!}
    {!! JSHelper::SelectSearch('unit') !!}
    {!! JSHelper::ModalCallDelete() !!}

    @if(Session::has('SESSION_DV_DELETE'))
       {!! JSHelper::Snackbar(Session::get('SESSION_DV_DELETE')) !!}
    @endif

    @if(Session::has('SESSION_SET_DV_NO'))
       {!! JSHelper::Snackbar(Session::get('SESSION_SET_DV_NO')) !!}
    @endif

    <script>
        $(document).on("click", "#dv_no_button", function () {
            var slug = $(this).data('slug');
            var value = $(this).data('value');
            $("#set_dv_no_body #slug").val( slug );
            $("#set_dv_no_body #dv_no").val( value );
        });
    </script>

@endsection