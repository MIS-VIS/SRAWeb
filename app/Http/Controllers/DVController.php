<?php

namespace App\Http\Controllers;


use App\Services\DVService;
use App\Http\Requests\DvFormRequest;
use App\Http\Requests\DvFilterRequest;
use App\Http\Requests\DvSetDvNoRequest;



class DVController extends Controller{
    


    protected $dv_service;



    public function __construct(DVService $dv_service){
        
        $this->dv_service = $dv_service;

    }




    public function index(DvFilterRequest $request){

        return $this->dv_service->fetchAllPaginate_SNF($request);
        
    }




    public function userIndex(DvFilterRequest $request){

        return  $this->dv_service->fetchByUserPaginate_SNF($request);
         

    }




    public function incomings(DvFilterRequest $request){

        return $this->dv_service->fetchByIncomingsPaginate_SNF($request);
        

    }




    public function setDvNo(DvSetDvNoRequest $request){

        return $this->dv_service->updateDvNo($request);

    }




    public function create(){

        return view('admin.dv.dv-create');

    }

   


    public function store(DVFormRequest $request){

        return $this->dv_service->create($request);
        
    }





    public function show($slug){

       return $this->dv_service->show($slug);

    }

    


    public function edit($slug){

        return $this->dv_service->edit($slug);

    }

    


    public function update(DVFormRequest $request, $slug){

        return $this->dv_service->update($request, $slug);
        

    }




    public function destroy($slug){

        return $this->dv_service->delete($slug);
        
    }




}
