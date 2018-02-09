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
                                    
                                <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <small>Fund Source</small><br>
                                    <select name="fund_source" id="fund_source" class="form-control" onchange="this.form.submit()">
                                        <option value="">None</option>
                                        <option value="SIDA" {{ old('fund_source') == "SIDA" ? 'selected' : ''}}>SIDA</option>
                                        <option value="Corporate" {{ old('fund_source') == "Corporate" ? 'selected' : ''}}>CORPORATE</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('fund_source') }}</small>
                                </div>

                                <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <small>Station</small><br>
                                    <select name="station" id="station" class="form-control" onchange="this.form.submit()">
                                        <option value="">None</option>
                                        <option value="1" {{ old('station') == 1 ? 'selected' : ''}}>Bacolod City</option>
                                        <option value="2" {{ old('station') == 2 ? 'selected' : ''}}>Quezon City</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('station') }}</small>
                                </div>


                                <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <small>Department</small><br>
                                    <select name="department" id="department" class="form-control" onchange="this.form.submit()">
                                        <option value="">None</option>
                                        @foreach($burProjectsDeptId as $data)
                                            <option value="{{ $data->dept_id }}" {{ old('department') == $data->dept_id ? 'selected' : ''}}>{{ $data->dept_id }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('department') }}</small>
                                </div>


                                <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <small>Unit</small><br>
                                    <select name="unit" id="unit" class="form-control" onchange="this.form.submit()">
                                        <option value="">None</option>
                                        @foreach($departmentsDeptUnit as $data)
                                            <option value="{{ $data->dept_unit }}" {{ old('unit') == $data->dept_unit ? 'selected' : ''}}>{{ $data->dept_unit }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('unit') }}</small>
                                </div>


                                <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <small>Project Code </small>
                                    <select name="project_code" id="project_code" class="form-control" onchange="this.form.submit()">
                                        <option value="">None</option>
                                        @foreach($burProjectsAcctCode as $data)
                                            <option value="{{ $data->acct_code }}" {{ old('project_code') == $data->acct_code ? 'selected' : ''}}>{{ $data->acct_code }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('project_code') }}</small>
                                </div>

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

                                <div class="col-md-12 row" id="datepicker" style="margin-bottom:15px;"">
                                    <label for="fromDate" style="color:#696969;"><strong>From</strong></label>
                                    <input type="text" class="form-control is-valid date" id="fromDate" name="fromDate" value="{{ old('fromDate') }}" placeholder="dd-mm-yyyy" required>
                                    <small class="text-danger">{{ $errors->first('fromDate') }}</small>
                                </div>

                                <div class="col-md-12 row" id="datepicker" style="margin-bottom:15px;"">
                                    <label for="toDate" style="color:#696969;"><strong>To</strong></label>
                                    <input type="text" class="form-control is-valid date" id="toDate" name="toDate" value="{{ old('toDate') }}" placeholder="dd-mm-yyyy" required>
                                    <small class="text-danger">{{ $errors->first('toDate') }}</small>
                                </div>

                                <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        Filter
                                    </button>
                                </div>

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
                                        <div class="row align-items-center">
                                            <div class="col-sm-5">
                                                <input type="search" class="form-control" placeholder="Search any" name="search" value="{{ old('search') }}">
                                                <small class="text-danger">{{ $errors->first('search') }}</small>
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="submit" class="btn btn-fab btn-primary btn-sm">
                                                    <i class="icon icon-magnify s-4"></i>
                                                </button>
                                            </div>
                                        </div>
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

                    <div class="thread ripple row no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6 unread" data-form="dvRecord" 
                    style="{!! Session::has('slug') && Session::get('slug') == $data->slug ? "background-color: #b3e5fc" : '' !!}">
                        <div class="info col px-6">
                            <div class="name row no-gutters align-items-center">
                                <div class="avatar mr-2 bg-blue">{!! substr($data->dv_payee, 0, 1) !!}</div>
                                <span>&nbsp;<strong>{{ $data->dv_payee }}</strong></span>
                            </div>

                            <div class="message">
                                <p style="margin-top:5px;">Explanation: <strong>{!! str_limit(strip_tags($data->dv_explanation),75) !!}</strong></p>
                                <p style="margin-top:-10px;">DV No: <strong>{!! $data->dv_no == null ? '<span class="text-danger">Not Set</span>' : $data->dv_no !!}</strong></p>
                                <p style="margin-top:-10px;">Document No: <strong>{{ $data->doc_no }}</strong></p>
                                <p style="margin-top:-10px;">Fund Source: <strong>{{ $data->dv_fund_source }}</strong></p>
                                <div class="labels">
                                    <div class="label badge bg-primary-50 text-auto" style="background-color:#ececee;">
                                        <span style="font-size:14px;">Department: <strong>{{ $data->dv_dept_code }}</strong></span>
                                    </div>
                                    <div class="label badge bg-primary-50 text-auto" style="background-color:#ececee;">
                                        <span style="font-size:14px;">Unit: <strong>{{ $data->dv_unit_code }}</strong></span>
                                    </div>
                                    <div class="label badge bg-primary-50 text-auto" style="background-color:#ececee;">
                                        <span style="font-size:14px;">Project Code: <strong>{{ $data->dv_proj_code }}</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-auto d-flex flex-sm-column justify-content-center align-items-center">
                            <div class="time mb-2" style="font-size:17px; padding-bottom:15px;">{{ Carbon::parse($data->created_at)->format('M d, Y') }}</div>
                            <div class="actions row no-gutters">
                                <a href="#" class="btn btn-fab btn-sm bg-light" data-toggle="modal" data-target="#setDvNo" data-slug="{{ $data->slug }}" data-value="{{ $data->dv_no }}" id="dv_no_button">
                                    <i class="icon-attachment s-5"></i>
                                </a>&nbsp;&nbsp;

                                <a href="{{ route('admin.dv.edit', $data->slug) }}" class="btn btn-fab btn-sm bg-light">
                                    <i class="icon-pencil s-5"></i>
                                </a>&nbsp;&nbsp;

                                <a href="{{ route('admin.dv.show', $data->slug) }}" class="btn btn-fab btn-sm bg-light">
                                    <i class="icon-printer s-5"></i>
                                </a>&nbsp;&nbsp;

                                {!! Form::open(['method' => 'delete', 'route' => ['admin.dv.destroy', $data->slug], 'class' =>'formDelete']) !!}
                                    <button href="" type="submit" class="btn btn-fab btn-sm bg-light">
                                        <i class="icon-trash s-5"></i>
                                    </button>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>

                    @endforeach

                    @if($dvList->isEmpty())
                        <div class="alert alert-danger fade show" role="alert">
                            No Records Found!
                        </div>
                    @endif

                    <div class="divider"></div>
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
    {!! ContentHelper::modalDelete('deleteDv') !!}

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
    {!! JSHelper::ModalCallDelete('div[data-form="dvRecord"]', 'deleteDv') !!}

    @if(Session::has('deleted'))
       {!! JSHelper::Snackbar(Session::get('deleted')) !!}
    @endif

    @if(Session::has('set'))
       {!! JSHelper::Snackbar(Session::get('set')) !!}
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