@extends('layout.admin-master')

@section('content')

<div class="content">
    <div id="todo" class="page-layout carded left-sidebar">
    <div class="top-bg bg-blue"></div>
    <div class="page-content-wrapper">
        <aside class="page-sidebar" data-fuse-bar="todo-sidebar" data-fuse-bar-media-step="md">
            <div class="header d-flex flex-column justify-content-between p-6 bg-secondary text-auto">
                <div class="logo d-flex align-items-center pt-7">
                    <i class="icon-checkbox-marked mr-4"></i>
                    <span class="logo-text h4">Incomings</span>
                </div>
                <div class="account">
                    <div class="title">Records:  {!! $dvIncomings->total() !!}</div>
                </div>
            </div>

            <div>
                <ul class="nav flex-column">
                    <li class="divider"></li>
                    <li class="subheader">
                        Departments
                    </li>
                    @foreach($burProjectsDeptId as $data)
                         <li class="nav-item">
                            <a class="nav-link ripple" href="incomings?department={{$data->dept_id}}">
                                <i class="icon s-4 icon-label"></i>
                                <span>{!! $data->dept_id !!}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </aside>

        <div class="page-content">
        <div class="header d-flex flex-column justify-content-center bg-secondary text-auto">
            {!! Form::open(['route' => 'admin.dv.incomings', 'method' => 'GET']) !!}
                <div class="search-bar row align-items-center no-gutters bg-white text-auto">
                    <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none"
                            data-fuse-bar-toggle="todo-sidebar">
                        <i class="icon icon-menu"></i>
                    </button>

                    <i class="icon-magnify s-6 mx-4"></i>

                    <input class="search-bar-input col" type="text" placeholder="Search any" name="search" value="{{ old('search') }}">
                    <small class="text-danger">{{ $errors->first('search') }}</small>
                    <button type="submit" class="btn-md btn-secondary">
                        <i class="icon icon-magnify s-14"></i>
                    </button>
                </div>
            {!! Form::close() !!}
        </div>


        <div class="page-content-card" id="test">
            <div class="toolbar d-flex align-items-center justify-content-between p-4 p-sm-10">
                <div class="col-md-10"></div>
                <div class="col-auto">
                    <div class="row no-gutters align-items-center">
                        <a href="{{ route('admin.dv.incomings') }}" class="btn btn-fab btn-sm btn-primary">
                            <i class="icon icon-refresh s-4"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="todo-items" style="overflow: visible;">
                @foreach($dvIncomings as $data)
                        <div class="todo-item pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center" 
                            style="{!! Session::has('slug') && Session::get('slug') == $data->slug ? "background-color: #b3e5fc;" : ''!!} overflow: visible;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="avatar mr-2 bg-blue">{!! substr($data->dv_payee, 0, 1) !!}</div>
                            <div class="info col px-4">
                                <div class="title">
                                    {{ $data->dv_payee }}
                                </div>
                                <div class="notes mt-1">
                                    <span style="margin-top:-10px;">DV No: <strong>{!! $data->dv_no == null ? '<span class="text-danger">Not Set</span>' : $data->dv_no !!}</strong></span>
                                    <br>
                                    <span style="margin-top:-10px;">Explanation: <strong>{!! str_limit(strip_tags($data->dv_explanation),75) !!}</strong></span>
                                </div>
                                <div class="tags">
                                    <div class="tag badge mt-2 mr-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="tag-label">Department: <strong>{{ $data->dv_dept_code }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="tag badge mt-2 mr-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="tag-label">Project Code: <strong>{{ $data->dv_proj_code }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="tag badge mt-2 mr-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="tag-label">Fund Source: <strong>{{ $data->dv_fund_source }}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end" style="margin-right:20px;">
                                <span style="font-size:16px;">{{ Carbon::parse($data->created_at)->diffForHumans() }}</span>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp; 

                                <div class="dropdown show">

                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#setDvNo" data-slug="{{ $data->slug }}" data-value="{{ $data->dv_no }}" id="dv_no_button">Set DV No.</a>
                                        <a class="dropdown-item" href="{{ route('admin.dv.show', $data->slug) }}">Print</a>
                                    </div>
                                    
                                </div>

                            </div>

                            

                        </div>

                @endforeach

                @if($dvIncomings->isEmpty())
                        <div class="alert alert-danger fade show" role="alert">
                            No Records Found!
                        </div>
                @endif
            </div>

             <div class="pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">
                <div class="col-lg-6">
                    <span style="margin-left:20px;">
                        <strong>Displaying {{ $dvIncomings->firstItem() > 0 ? $dvIncomings->firstItem() : 0 }} - {{ $dvIncomings->lastItem() > 0 ? $dvIncomings->lastItem() : 0 }} out of {{ $dvIncomings->total()}} Records</strong>
                    </span>
                </div>
                <div class="col-lg-6">
                    <nav style="float:right;">
                        {!! $dvIncomings->appends([
                                    'search'=>Input::get('search')])
                                    ->render('vendor.pagination.bootstrap-4')
                        !!}
                    </nav>
                </div>
            </div>

        </div>
        </div>

@endsection



@section('modals')
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
