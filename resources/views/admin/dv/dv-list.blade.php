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
                                {!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}
                                    
                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                        <small>Fund Source</small><br>
                                        <select name="fund_source" id="fund_source" class="form-control">
                                            <option value="">None</option>
                                            <option value="SIDA" {{ old('fund_source') == "SIDA" ? 'selected' : ''}}>SIDA</option>
                                            <option value="Corporate" {{ old('fund_source') == "Corporate" ? 'selected' : ''}}>CORPORATE</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                        <small>Station</small><br>
                                        <select name="station" id="station" class="form-control">
                                            <option value="">None</option>
                                            <option value="1" {{ old('station') == 1 ? 'selected' : ''}}>Bacolod City</option>
                                            <option value="2" {{ old('station') == 2 ? 'selected' : ''}}>Quezon City</option>
                                        </select>
                                    </div>


                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                        <small>Department</small><br>
                                        <select name="department" id="department" class="form-control">
                                            <option value="">None</option>
                                            @foreach($burProjectsDeptId as $data)
                                                <option value="{{ $data->dept_id }}" {{ old('department') == $data->dept_id ? 'selected' : ''}}>{{ $data->dept_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                        <small>Unit</small><br>
                                        <select name="unit" id="unit" class="form-control">
                                            <option value="">None</option>
                                            @foreach($departmentsDeptUnit as $data)
                                                <option value="{{ $data->dept_unit }}" {{ old('unit') == $data->dept_unit ? 'selected' : ''}}>{{ $data->dept_unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                        <small>Project Code </small>
                                        <select name="project_code" id="project_code" class="form-control">
                                            <option value="">None</option>
                                            @foreach($burProjectsAcctCode as $data)
                                                <option value="{{ $data->acct_code }}" {{ old('project_code') == $data->acct_code ? 'selected' : ''}}>{{ $data->acct_code }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        Filter
                                    </button>
                                </div>

                                {!! Form::close() !!}
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
                                {!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}
                                    <div class="col-md-12 row" id="datepicker" style="margin-bottom:15px;"">
                                        <label for="fromDate" style="color:#696969;"><strong>From</strong></label>
                                        <input type="text" class="form-control is-valid date" id="fromDate" name="fromDate" value="{{ old('fromDate') }}" placeholder="mm-dd-yyyy" required>
                                        <small class="text-danger"></small>
                                    </div>

                                    <div class="col-md-12 row" id="datepicker" style="margin-bottom:15px;"">
                                        <label for="fromDate" style="color:#696969;"><strong>To</strong></label>
                                        <input type="text" class="form-control is-valid date" id="fromDate" name="fromDate" value="{{ old('fromDate') }}" placeholder="mm-dd-yyyy" required>
                                        <small class="text-danger"></small>
                                    </div>

                                    <div class="col-md-12 row" style="margin-bottom:15px;">
                                        <button type="submit" class="btn btn-secondary btn-sm">
                                            Filter
                                        </button>
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                </div>


            </aside>


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

                    <div class="thread ripple row no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6 unread">
                        <div class="info col px-6">
                            <div class="name row no-gutters align-items-center">
                                <img class="avatar mr-2" src="{{ asset('template/images/avatars/profile.jpg') }}"/>
                                <span class="">{{ $data->dv_payee }}</span>
                            </div>

                            <div class="message">
                                <p style="margin-top:5px; font-size:16px;">{!! str_limit(strip_tags($data->dv_explanation),75) !!}</p>
                                <p style="margin-top:-10px;">Doc No: <strong>{{ $data->doc_no }}</strong></p>
                                <p style="margin-top:-10px;">Fund Source: <strong>{{ $data->dv_fund_source }}</strong></p>
                                <div class="labels">
                                    <div class="label badge bg-primary-300">
                                        <span style="font-size:14px;">Department: <strong>{{ $data->dv_dept_code }}</strong></span>
                                    </div>
                                    <div class="label badge bg-primary-400">
                                        <span style="font-size:14px;">Unit: <strong>{{ $data->dv_unit_code }}</strong></span>
                                    </div>
                                    <div class="label badge bg-primary">
                                        <span style="font-size:14px;">Project Code: <strong>{{ $data->dv_proj_code }}</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-auto d-flex flex-sm-column justify-content-center align-items-center">
                            <div class="time mb-2" style="font-size:17px; padding-bottom:15px;">{{ Carbon::parse($data->created_at)->format('M d, Y') }}</div>
                            <div class="actions row no-gutters">
                                <a href="{{ route('admin.dv.edit', $data->slug) }}" type="button" class="btn btn-fab btn-sm btn-secondary">
                                    <i class="icon-pencil s-4"></i>
                                </a>&nbsp;
                                <a href="{{ route('admin.dv.show', $data->slug) }}" type="button" class="btn btn-fab btn-sm btn-info">
                                    <i class="icon-printer s-4"></i>
                                </a>&nbsp;
                                <a href="" type="button" class="btn btn-fab btn-sm btn-danger">
                                    <i class="icon-trash s-4"></i>
                                </a>
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
                                        {!! $dvList->appends(['search'=>Input::get('search'), 'fund_source' => Input::get('fund_source'), 'station'=>Input::get('station'), 'department' => Input::get('department'), 'unit' => Input::get('unit'), 'project_code' => Input::get('project_code') ])->render('vendor.pagination.bootstrap-4') !!}
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

@section('scripts')
    {!! JSHelper::SelectSearch('project_code') !!}
    {!! JSHelper::SelectSearch('department') !!}
    {!! JSHelper::SelectNormal('fund_source') !!}
    {!! JSHelper::SelectNormal('station') !!}
    {!! JSHelper::SelectSearch('unit') !!}
@endsection