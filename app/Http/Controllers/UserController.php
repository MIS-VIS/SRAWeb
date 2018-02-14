<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Input;
use Session;



class UserController extends Controller{
   


    protected $user;



    public function __construct(User $user){

        $this->user = $user;
        
    }




    public function index(){
        


    }




    public function create(){

        return view('admin.user.user-create');

    }




  
    public function store(UserFormRequest $request){

        $usernameExist = $this->user->where('username', $request->username)->count();

        if(!$usernameExist == 1 && $request){

            $user = $this->user->create($request->all() + $this->user->createdDefaults);
            Session::flash('user_slug', $user->slug);
            Session::flash('user_created', 'User Successfully Created!');
            return redirect()->back();
            
        }

        Input::flash();
        Session::flash('username_exist', 'NOTICE: The Username you provided is already used by an existing account. Please provide a unique Username.');
        return redirect()->back();
        
    }




    public function show($slug){

        $user = $this->user->hunt($slug);
        
        if(count($user) == 1){

            return view('admin.user.user-show')->with('user', $user);

        } 

        return abort(404);
        
    }




  
    public function edit($slug){



        
    }




   
    public function update(Request $request, $slug){



        
    }




    
    public function destroy($slug){



        
    }





}



