@extends('layout.admin-master')

@section('content')

<div class="page-layout simple tabbed" id="dv_list">

	
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



	<div class="page-content row p-6">
        <div class="col-12">
            <div class="card">
				<div class="page-content">
					<div class="toolbar row no-gutters align-items-center p-4 p-sm-6">
				        <div class="col">
				            <div class="row no-gutters align-items-center">
				                <div class="col-lg-12">
				                	<span>Filters:</span>
	    						</div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>



	<div class="page-content row p-6">
        <div class="col-12">
            <div class="card">	
				<div class="page-content">
				    <div class="toolbar row no-gutters align-items-center p-4 p-sm-6">
				        <div class="col">
				            <div class="row no-gutters align-items-center">
				                <div class="col-lg-12">

							        {!! Form::open(['route' => 'admin.dv.index', 'method' => 'GET']) !!}
							        	<div class="row align-items-center">
									        <div class="col-sm-3">
									            <input type="search" class="form-control" placeholder="Search Doc No." name="search" value="{{ old('search') }}">
									            <small class="text-danger">{{ $errors->first('search') }}</small>
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
					            <a href="{{ route('admin.dv.index') }}" class="btn btn-fab btn-sm btn-primary">
					            	<i class="icon icon-refresh s-4"></i>
					            </a>
				            </div>
				        </div>

				    </div>
				    
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
					                	@foreach($dvUserList as $data)
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
				                		<strong>Displaying {{ $dvUserList->firstItem() }} - {{ $dvUserList->lastItem() }} out of {{ $dvUserList->total()}} Records</strong>
				                	</span>
	    						</div>
				                <div class="col-lg-6">
				                	<nav aria-label="..." style="float:right;">
				                		{!! $dvUserList->appends(array('q' => Input::get('q')))->render('vendor.pagination.bootstrap-4') !!}
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

