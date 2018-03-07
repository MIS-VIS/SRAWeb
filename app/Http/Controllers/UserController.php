<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserFormRequest;

use App\Services\UserService;




class UserController extends Controller{
   

    protected $user_service;



    public function __construct(UserService $user_service){

        $this->user_service = $user_service;

    }





    public function index(Request $request){
        
        return $this->user_service->fetchAllPaginate_SNF($request);

    }




    public function create(){

        return view('admin.user.user-create');

    }




  
    public function store(UserFormRequest $request){
        
       return $this->user_service->create($request); 

    }





    public function show($slug){

        return $this->user_service->show($slug);
        
    }




  
    public function edit($slug){

        return $this->user_service->edit($slug);
        
    }




   
    public function update(UserFormRequest $request, $slug){

        return $this->user_service->update($request, $slug);

    }




    public function destroy($slug){

        return $this->user_service->delete($slug);
 
    }





}



