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
                <div class="h4">Users</div>
                <div class="">Records : {{ $userList->total() }}</div>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.user.create') }}" class="btn btn-secondary fuse-ripple-ready">
                <i style="font-size:20px;" class="icon icon-playlist-plus"></i> New
            </a>
        </div>
    </div>



	
	<div class="page-content-wrapper">

            {!! Form::open(['route' => 'admin.user.index', 'method' => 'GET']) !!}
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
                                    <small>Status</small><br>

                                    <select name="is_logged" id="is_logged" class="form-control" onchange="this.form.submit()">
                                        <option value="">None</option>

                                         @foreach(userUtil::selectStatus() as $value => $key)

                                            <option value="{{ $key }}" {!! $key == old('is_logged') ? 'selected' : '' !!}>{{ $value }}</option>

                                         @endforeach

                                    </select>

                                    <small class="text-danger">{{ $errors->first('is_logged') }}</small>
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
                                {!! Form::open(['route' => 'admin.user.index', 'method' => 'GET']) !!}
                                    
                                    {!! 
                                        userUtil::filterSearch(old('search'), $errors->first('search')); 
                                    !!}

                                {!! Form::close() !!}
                            </div>
                            <div class="col-auto">
                                <div class="row no-gutters align-items-center">
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-fab btn-sm btn-primary">
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

					                    	<th>
					                            <div class="table-header">
					                                <span class="column-title">Name</span>
					                            </div>
					                        </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Username</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Active</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Last Modified</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Last Logged-in</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Actions</span>
                                                </div>
                                            </th>

					                    </tr>
					                </thead>
					                <tbody>

					                	@foreach($userList as $data)
                                            
					                        <tr>
					                        	<td>{!! $data->fullname !!}</td>
                                                <td>{!! $data->username !!}</td>
                                                <td>{!! $data->is_logged == true ? '<i class="icon-checkbox-marked-circle text-success"></i>' : '<i class="icon-cancel text-danger"></i>' !!}</td>
					                            
					                            <td>{{ Carbon::parse($data->updated_at)->format('M d, Y') }}</td>
                                                <td>{{ Carbon::parse($data->last_login_time)->format('M d, Y h:i A') }}</td>
					                            <td>
                                                    <div class="actions row no-gutters">
                                                        <div class="dropdown show">
                                                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="overflow: hidden;">
                                                                <a class="dropdown-item" href="{{ route('admin.user.show', $data->slug) }}">View</a>
                                                                <a class="dropdown-item" href="{{ route('admin.user.edit', $data->slug) }}">Edit</a>
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


			   		@if($userList->isEmpty())
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

				                		<strong>Displaying {{ $userList->firstItem() > 0 ? $userList->firstItem() : 0 }} - {{ $userList->lastItem() > 0 ? $userList->lastItem() : 0 }} out of {{ $userList->total()}} Records</strong>
                                        
				                	</span>
	    						</div>
				                <div class="col-lg-6">
				                	<nav aria-label="..." style="float:right;">

				                		{!! $userList->appends([
                                                        'search'=>Input::get('search'),
                                                        'is_logged' => Input::get('is_logged'),
                                                    ])->render('vendor.pagination.bootstrap-4') 
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

    {!! JSHelper::SelectNormal('is_logged') !!}
    
@endsection