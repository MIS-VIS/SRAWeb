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
                    

                    <div class="col-md-12" id="" style="padding-top:20px;">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-11">
                                        <h4 class="card-title">User Menu</h4>
                                    </div>
                                    
                                    <div class="col-sm-1" style="margin-top: 25px;">
                                        <a href="#" id="add_row" type="button" class="btn btn-sm btn-fab bg-success-600 text-auto"><i class="icon-plus"></i></a>
                                    </div>
                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>SubMenus</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_body" id="table_body" >
                                        
                                        <tr class="table_row" id="table_row">

                                            <td>
                                                <select id="menu" name="menu[]" class="form-control">        
                                                    <option>Select</option>
                                                </select>
                                            </td>

                                            <td>
                                                <select id="submenu" name="submenu[]" class="form-control" multiple="multiple">      
                                                    <option>Select</option>
                                                </select>
                                            </td>

                                            <td>
                                                <button role="button" class="btn btn-sm btn-fab btn-danger" id="delete_row"><i class="icon-close"></i></button>
                                            </td>
                                     
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>


                    {!! FormHelper::submitButton('btn-secondary ', 'Save', 'user-submit') !!}

    			{!! Form::close() !!}
                <div style="padding-top:100px;"></div>
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


    <script>

        // SELECT
        $(document).ready(function() {
            $("select").select2({width:400});
        });




        //APPEND ROW
        $(document).ready(function() {

            $("#add_row").on("click", function() {
                $('select').select2('destroy');
                var content ='<tr>' + 
                                '<td>' +
                                    '<select name="menu" class="form-control">' +    
                                        '<option>Select</option>' +
                                    '</select>' +
                                '</td>' +
                                '<td>' +
                                    '<select name="submenu" class="form-control" multiple="multiple">' +     
                                        '<option>Select</option>' +
                                    '</select>' +
                                '</td>' +
                                '<td>' +
                                    '<button role="button" class="btn btn-sm btn-fab btn-danger" id="delete_row"><i class="icon-close"></i></button>' +
                                '</td>' +
                            '</tr>';

            $("#table_body").append($(content));
            $('select').select2({width:400});
            });




            //DELETE ROW
            $(document).on("click","#delete_row" ,function(e) {
                $(this).closest('tr').remove();

            });

         });

    </script>


@endsection

