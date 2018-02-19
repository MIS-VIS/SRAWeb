@extends('layout.admin-master')

@section('content')

<div class="content">
    <div id="contacts" class="page-layout simple left-sidebar-floating">
    <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between p-6">
        <div class="row no-gutters align-items-center">
            <div class="logo-icon mr-3 mt-1">
                <i class="icon-file-multiple"></i>
            </div>
            <div class="logo-text">
                <div class="h4">My Vouchers</div>
                <div class="">Records : {{ $dvUserList->total() }}</div>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.dv.create') }}" class="btn btn-secondary fuse-ripple-ready">
                <i style="font-size:20px;" class="icon icon-playlist-plus"></i> New
            </a>
        </div>
    </div>



	
	<div class="page-content-wrapper">

            {!! Form::open(['route' => 'admin.dv.userIndex', 'method' => 'GET']) !!}
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
                                {!! Form::open(['route' => 'admin.dv.userIndex', 'method' => 'GET']) !!}
                                    <div class="row align-items-center">
                                        <div class="col-sm-5">
                                            <input type="search" class="form-control" placeholder="Search Doc No." name="search" value="{{ old('search') }}">
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
                                    <a href="{{ route('admin.dv.userIndex') }}" class="btn btn-fab btn-sm btn-primary">
                                        <i class="icon icon-refresh s-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
				    <div class="thread-list">
				    	<div class="content">
					        <div class="page-content-card">
					            <table class="table dataTable">
					                <thead>
					                    <tr>

                                            @foreach(DVUtil::userIndexTableHeader() as $data)

    					                    	<th>
    					                            <div class="table-header">
    					                                <span class="column-title">{!! $data !!}</span>
    					                            </div>
    					                        </th>

                                            @endforeach

					                    </tr>
					                </thead>
					                <tbody>

					                	@foreach($dvUserList as $data)
                                            
					                        <tr>
					                        	<td>{!! $data->doc_no !!}</td>
                                                <td>{!! $data->dv_no == '' ? '<span class="badge bg-deep-orange-500 text-auto">Filed</span>' : '<span class="badge bg-teal-500 text-auto">Processing..</span>' !!}</td>
					                            <td>{!! $data->dv_proj_code !!}</td>
					                            <td>{{ Carbon::parse($data->created_at)->format('M d, Y') }}</td>
					                            <td>
                                                    <div class="actions row no-gutters">
                                                        <div class="dropdown show">
                                                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="overflow: hidden;">
                                                                <a class="dropdown-item" href="{{ route('admin.dv.show', $data->slug) }}">Print</a>
                                                                <a class="dropdown-item" href="{{ route('admin.dv.edit', $data->slug) }}">Edit</a>
                                                            </div>

                                                        </div>
                                                    </div>
					                            </td>

					                        </tr>

					                    @endforeach

									</tbody>
					            </table>
					        </div>
	    				</div>
			   		</div>
			   	</div>


			   		@if($dvUserList->isEmpty())
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

				                		<strong>Displaying {{ $dvUserList->firstItem() > 0 ? $dvUserList->firstItem() : 0 }} - {{ $dvUserList->lastItem() > 0 ? $dvUserList->lastItem() : 0 }} out of {{ $dvUserList->total()}} Records</strong>
                                        
				                	</span>
	    						</div>
				                <div class="col-lg-6">
				                	<nav aria-label="..." style="float:right;">

				                		{!! $dvUserList->appends([
                                                        'search'=>Input::get('search'),
                                                        'fund_source' => Input::get('fund_source'),
                                                        'project_code' => Input::get('project_code'),
                                                        'fromDate' => Input::get('fromDate'),
                                                        'toDate' => Input::get('toDate')])
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


@section('scripts')

    {!! JSHelper::SelectSearch('project_code') !!}
    {!! JSHelper::SelectNormal('fund_source') !!}
    
@endsection