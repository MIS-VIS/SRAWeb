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
                            <div class="h4">Edit User</div>
                            <div class="">Please fill up the necessary fields.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-card" id="dv-card">
                <div class="p-5 col-12">

    			{!! ContentHelper::loader('loader') !!}
                
                {!! FormHelper::alert(Session::has('username_exist'), Session::get('username_exist'), 'danger') !!}

                {!! Form::open(['route' => ['admin.user.update', $user->slug], 'method' => 'PUT', 'class' => 'row', 'id' => 'userForm']) !!}


    				<div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Information</h4>

                            	{!! FormHelper::textBox(
			                        'up', 'col-md-12', 'firstname', 'Firstname:', 'text', 'firstname', $user->firstname, 'required', $errors->first('firstname')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'middlename', 'Middlename:', 'text', 'middlename', $user->middlename, 'required', $errors->first('middlename')
			                    ) !!}

			                    {!! FormHelper::textBox(
			                        'up', 'col-md-12', 'lastname', 'Lastname:', 'text', 'lastname', $user->lastname, 'required', $errors->first('lastname')
			                    ) !!}

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6" id="">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Account</h4>

                            	{!! FormHelper::textBox(
			                        'up', 'col-md-12', 'username', 'Username:', 'text', 'username', $user->username, 'required', $errors->first('username')
			                    ) !!}

                                <div class="col-md-12">
                                    <span style="font-size:17px;">&nbsp;</span>
                                </div>

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
                                            
                                        @if(old('menu'))

                                            @foreach(old('menu') as $key1 => $value1)

                                                <tr>

                                                    <td>
                                                        <select id="menu" name="menu[]" class="form-control">   
                                                            <option value="">Select</option>   
                                                            @foreach($menus as $data)  
                                                                <option value="{{ $data->menu_id }}" {!! old('menu.'.$key1) == $data->menu_id ? 'selected' : '' !!}>{{ $data->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="text-danger">{{ $errors->first('menu.'.$key1) }}</small>
                                                    </td>

                                                    <td>
                                                        <select id="submenu" name="submenu[]" class="form-control" multiple="multiple">      
                                                            <option value="">Select</option>
                                                            @foreach($submenus as $data)

                                                                @if(old('submenu') && $data->menu_id == old('menu.'.$key1))
                                                                      
                                                                    <option value="{{ $data->submenu_id }}" {!! in_array($data->submenu_id, old('submenu')) ? 'selected' : '' !!}>{{$data->name}}</option>

                                                                @else

                                                                    <option value="{{ $data->submenu_id }}">{{$data->name}}</option>

                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <button role="button" class="btn btn-sm btn-fab btn-danger" id="delete_row"><i class="icon-close"></i></button>
                                                    </td>
                
                                                </tr>

                                            @endforeach

                                        @else     

                                            @foreach($user->userMenu as $user_menu)

                                                <tr>

                                                    <td>
                                                        <select id="menu" name="menu[]" class="form-control">   
                                                            <option value="">Select</option>   
                                                                @foreach($menus as $data)  
                                                                    <option value="{{ $data->menu_id }}" {!! $user_menu->menu_id == $data->menu_id ? 'selected' : '' !!}>{{ $data->name }}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <select id="submenu" name="submenu[]" class="form-control" multiple="multiple">      
                                                            <option value="">Select</option>

                                                            @foreach($submenus as $data)

                                                                @if($data->menu_id == $user_menu->menu_id)
                                                                    
                                                                    <option value="{{ $data->submenu_id }}" {!! in_array($data->submenu_id, $user_menu->userSubMenu->pluck('submenu_id')->toArray()) ? 'selected' : '' !!}>{{$data->name}}</option>
                                                                
                                                                @endif

                                                            @endforeach

                                                        </select>
                                                    </td>

                                                    <td>
                                                        <button role="button" class="btn btn-sm btn-fab btn-danger" id="delete_row"><i class="icon-close"></i></button>
                                                    </td>
                                             
                                                </tr>

                                            @endforeach

                                        @endif

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

    @if(Session::has('SESSION_USER_UPDATE'))

        {!! ModalHelper::modalView('userConfirmUpdate', '<i class="icon-file-check"></i> Updated!', Session::get('SESSION_USER_UPDATE'), route('admin.user.show', Session::get('SESSION_USER_UPDATE_SLUG')) ) !!}
        
    @endif

@endsection



@section('scripts')


    {!! JSHelper::ModalShow('userConfirmUpdate') !!}


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
                                    '<select id="menu" name="menu[]" class="form-control">' + 
                                        '<option value="">Select</option>' +   
                                        '@foreach($menus as $data)' +
                                            '<option value="{{ $data->menu_id }}">{{ $data->name }}</option>' +
                                        '@endforeach' +
                                    '</select>' +
                                '</td>' +
                                '<td>' +
                                    '<select id="submenu" name="submenu[]" class="form-control" multiple="multiple">' +  
                                        '<option value="">Select</option>' +   
                                        '@foreach($submenus as $data)' +
                                            '<option value="{{ $data->submenu_id }}">{{$data->name}}</option>' +
                                        '@endforeach' +
                                    '</select>' +
                                '</td>' +
                                '<td>' +
                                    '<button role="button" class="btn btn-sm btn-fab btn-danger" id="delete_row"><i class="icon-close"></i></button>' +
                                '</td>' +
                            '</tr>';

            $("#table_body").append($(content));
            $('select').select2({width:400});
            });

         });



        //DELETE ROW
        $(document).on("click","#delete_row" ,function(e) {
            $(this).closest('tr').remove();

        });



        //AJAX
        $(document).ready(function() {
            $(document).on("change", "#menu", function() {
                var id = $(this).val();
                var parent = $(this).closest('tr');
                console.log(parent);
                if(id) {
                    $.ajax({
                        url: "/ajax/response-submenu/" + id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {   

                            $(parent).find("#submenu").empty();

                            $.each(data, function(key, value) {
                                $(parent).find("#submenu").append("<option value='" + value.submenu_id + "'>"+ value.name +"</option>");
                            });

                            $(parent).find("#submenu").append("<option value>Select</option>");  
                
                        }
                    });
                }else{
                    $(parent).find("#submenu").empty();
                }
            });
        });

    </script>


@endsection

