@extends('layout.admin-master')
	
@section('content')
	

<div class="page-layout carded full-width" id="dv_add">
    <div class="top-bg bg-blue"></div>
        <div class="page-content">
            <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="logo row no-gutters align-items-start">
                        <div class="logo-icon mr-3 mt-1">
                            <i class="icon-account-plus"></i>
                        </div>
                        <div class="logo-text">
                            <div class="h4">Add User</div>
                            <div class="">Please fill up the necessary fields.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-card" id="dv-card">
                <div class="p-5 col-12">

    			{!! ContentHelper::loader('loader') !!}
                
                {!! FormHelper::alert(Session::has('username_exist'), Session::get('username_exist'), 'danger') !!}

                {!! Form::open(['route' => 'admin.user.store', 'method' => 'POST', 'class' => 'row', 'id' => 'userForm']) !!}


    				<div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Information</h4>

                            	{!! FormHelper::textBox(
			                        'up', 'col-md-12', 'firstname', 'Firstname:', 'text', 'firstname', old('firstname'), 'required', $errors->first('firstname')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'middlename', 'Middlename:', 'text', 'middlename', old('middlename'), 'required', $errors->first('middlename')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'lastname', 'Lastname:', 'text', 'lastname', old('lastname'), 'required', $errors->first('lastname')
			                    ) !!}

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Account</h4>

                            	{!! FormHelper::textBox(
			                        'up', 'col-md-12', 'username', 'Username:', 'text', 'username', old('username'), 'required', $errors->first('username')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'password', 'Password:', 'password', 'password', old('password'), 'required', $errors->first('password')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'password_confirmation', 'Confirm Password:', 'password', 'password_confirmation','' , 'required', $errors->first('password')
			                    ) !!}   

                            </div>
                        </div>
                    </div>
                    

                    {!! FormHelper::submitButton('btn-secondary ', 'Save', 'user-submit') !!}

    			{!! Form::close() !!}
                
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

