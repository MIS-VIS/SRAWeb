<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;



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




  
    public function store(Request $request){


        if($request){

            $user = $this->user->create($request->all());
            
        }
        
    }




    public function show($id){



        
    }




  
    public function edit($id){



        
    }




   
    public function update(Request $request, $id){



        
    }




    
    public function destroy($id){



        
    }





}



