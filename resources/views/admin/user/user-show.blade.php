@extends('layout.admin-master')
	
@section('content')
	

<div class="page-layout carded full-width" id="dv_add">
    <div class="top-bg bg-blue"></div>
    <div class="page-content">
        <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
            <div class="col-12 col-sm">
                <div class="logo row no-gutters align-items-start">
                    <div class="logo-icon mr-3 mt-1">
                        <i class="icon-account-card-details"></i>
                    </div>
                    <div class="logo-text">
                        <div class="h4">User Info</div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="" class="btn btn-secondary fuse-ripple-ready" onclick="window.history.back()">
                    <i style="font-size:15px;" class="icon-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="page-content-card" id="dv-card">
            <div class="p-5 col-12">

                <div class="row">


                    {!! FormHelper::padding('col-md-12') !!}


                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Information</h4>

                                 <div class="col-md-12">
                                    <span style="font-size:17px;">Firstname: <strong>{{ $user->firstname }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Middlename: <strong>{{ $user->middlename }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Lastname: <strong>{{ $user->lastname }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Account</h4>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Username: <strong>{{ $user->username }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Password: <strong class="text-danger">Not Available</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>

                            </div>
                        </div>
                    </div>


                    {!! FormHelper::padding('col-md-12') !!}


                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Account Modifications</h4>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Time Created: <strong>{{ Carbon::parse($user->created_at)->format('M d, Y - h:m A') }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Machine Created: <strong>{{ $user->machine_created }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">IP Created: <strong>{{ $user->ip_created }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Time Updated: <strong>{{ Carbon::parse($user->updated_at)->format('M d, Y - h:m A') }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Machine Updated: <strong>{{ $user->machine_updated }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">IP Updated: <strong>{{ $user->ip_updated }}</strong></span>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">User Activity</h4>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Last Login Time: <strong>{{ Carbon::parse($user->last_login_time)->format('M d, Y - h:m A') }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Last Login Machine: <strong>{{ $user->last_login_machine }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">Last Login IP: <strong>{{ $user->last_login_ip }}</strong></span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>
                                
                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>

                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>

                            </div>
                        </div>
                    </div>


                    {!! FormHelper::padding('col-md-12') !!}


                </div>


            </div>
	    </div>
    </div>
</div>

@endsection



@section('modals')

    @if(Session::has('user_created'))

        {!! ModalHelper::modalView('userConfirmAdd', '<i class="icon-file-check"></i> SAVED!', Session::get('user_created'), route('admin.user.show', Session::get('user_slug')) ) !!}
        
    @endif

@endsection



@section('scripts')
    
    {!! JSHelper::ModalShow('userConfirmAdd') !!}

@endsection

