@extends('layout.admin-master')

@section('content')

	{!!ContentHelper::openCont('simple1' , 'icon-file-multiple', 'My Vouchers' , 'My Vouchers: ', '' , '', '', '', route('admin.dv.create'))!!}


		{!! ContentHelper::openCard('', 'dv-myList') !!}
			<div class="page-content">
				<div class="toolbar row no-gutters align-items-center p-4 p-sm-6">
			        <div class="col">
			            <div class="row no-gutters align-items-center">
			                <div class="col-lg-12">

						        <form>
								    <div class="form-row align-items-center">
								        <div class="col-sm-3">
								            <label class="sr-only" for="dv_search">Search for..</label>
								            <input type="search" class="form-control" id="dv_search" placeholder="Search for.." >
								        </div>
								        <div class="col-auto">
								            <button type="submit" class="btn btn-secondary">Filter!</button>
								        </div>
								    </div>
								</form>

    						</div>
			            </div>
			        </div>
			    </div>
			</div>
		{!! ContentHelper::closeCard('') !!}


		{!!ContentHelper::openCard('', 'dv-myList')!!}	
			<div class="page-content">
			    <div class="toolbar row no-gutters align-items-center p-4 p-sm-6">
			        <div class="col">
			            <div class="row no-gutters align-items-center">
			                <div class="col-lg-12">

						        {!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}
						        	<div class="row align-items-center">
								        <div class="col-sm-3">
								            <input type="search" class="form-control" placeholder="Search Doc No." name="search" value="{{ old('search') }}">
								            <small class="text-danger">{{ $errors->first('q') }}</small>
								        </div>
								        <div class="col-sm-1">
								            <button type="submit" class="btn btn-primary">
								            	Search&nbsp;<i class="icon icon-magnify s-4"></i>
								        	</button>
								        </div>
								    </div>
								{!! Form::close() !!}

    						</div>
			            </div>
			        </div>

			        <div class="col-auto">
			            <div class="row no-gutters align-items-center">
			            	<div>
					            <a href="{{ route('admin.dv.index') }}" class="btn btn-fab btn-sm btn-primary">
					            	<i class="icon icon-refresh s-4"></i>
					            </a>
					        </div>
					        &nbsp;&nbsp;&nbsp;
			              	{!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}
			              		<span>Records:</span>&nbsp;
		                        <select name="r" class="h6 custom-select" onchange="this.form.submit()">
		                            <option value="10">10</option>
		                            <option value="25">25</option>
		                            <option value="50">50</option>
		                        </select>
                    		{!! Form::close() !!}
			            </div>
			        </div>

			    </div>

			    <div class="divider"></div>
			    
			    <div class="thread-list">
			    	<div class="page-content">
				        <div class="page-content-card">
				            <table class="table dataTable">
				                <thead>
				                    <tr>
				                    	<th>
				                            <div class="table-header">
				                                <span class="column-title">Doc No.</span>
				                            </div>
				                        </th>

				                        <th>
				                            <div class="table-header">
				                                <span class="column-title">Explanation</span>
				                            </div>
				                        </th>

				                        <th>
				                            <div class="table-header">
				                                <span class="column-title">Project Code</span>
				                            </div>
				                        </th>

				                        <th>
				                            <div class="table-header">
				                                <span class="column-title">Status</span>
				                            </div>
				                        </th>

				                        <th>
				                            <div class="table-header">
				                                <span class="column-title">Created</span>
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
				                	@foreach($dvMyList as $data)
				                        <tr>
				                        	<td>{!! $data->doc_no !!}</td>
				                            <td>{!! str_limit(strip_tags($data->dv_explanation),50) !!}</td>
				                            <td>{!! $data->dv_proj_code !!}</td>
				                            <td><span class="badge badge-success">Pending</span></td>
				                            <td>{{ Carbon::parse($data->created_at)->format('M d, Y') }}</td>
				                            <td>
				                            	<a href="{{ route('admin.dv.show', $data->slug) }}" type="button" class="btn btn-info btn-fab btn-sm">
				                                    <i class="icon icon-eye-outline s-4"></i>
				                                </a>
				                                <a href="{{ route('admin.dv.edit', $data->slug) }}" type="button" class="btn btn-secondary btn-fab btn-sm">
				                                    <i class="icon icon-pencil s-4"></i>
				                                </a>
				                            </td>
				                        </tr>
				                    @endforeach
								</tbody>
				            </table>
				        </div>
    				</div>
		   		</div>
		   		@if($dvMyList->isEmpty())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">×</span>
	                    </button>
	                    No Records Found!
	                </div>
            	@endif
		   		<div class="divider"></div>
		   		<div class="toolbar row no-gutters align-items-center p-sm-3">
			        <div class="col">
			            <div class="row no-gutters align-items-center">
			            	<div class="col-lg-6">
			                	<span>
			                		<strong>Displaying 
			                			{{ $dvMyList->firstItem() }} - {{ $dvMyList->lastItem() }} out of {{ $dvMyList->total()}} Records
			                		</strong>
			                	</span>
    						</div>
			                <div class="col-lg-6">
			                	<nav aria-label="..." style="float:right;">
			                		{!! $dvMyList->appends(array('q' => Input::get('q')))->render('vendor.pagination.bootstrap-4') !!}
			                	</nav>
    						</div>
			            </div>
			        </div>
			    </div>

			</div>
		{!!ContentHelper::closeCard('')!!}


	{!!ContentHelper::closeCont('')!!}

@endsection

