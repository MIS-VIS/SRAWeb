<?php

namespace App\Http\Controllers;


use Auth;
use App\DV;
use Illuminate\Events\Dispatcher;
use App\Http\Requests\DvFormRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\DvFilterRequest;
use App\Http\Requests\DvSetDvNoRequest;



use App\Repositories\DV\DVRepository;
use App\Services\DVService;



class DVController extends Controller{
    

    protected $dv_service;
    protected $dv_repo;


    public function __construct(DVRepository $dv_repo, DVService $dv_service){
        $this->dv_service = $dv_service;
        $this->dv_repo = $dv_repo;

    }




    public function index(DvFilterRequest $request){
        dd($this->dv_service->getAll_SNF());
        $dvList = $this->dv_service->getAll_SNF();
        return view('admin.dv.dv-index')->with('dvList', $dvList);

    }





    public function userIndex(DvFilterRequest $request){

        $dvUserList = $this->dv_repo->getByUser_SNF($request);
        dd($dvUserList);
        return view('admin.dv.dv-userIndex')->with('dvUserList', $dvUserList);

    }





    public function incomings(DvFilterRequest $request){

        $dvIncomings = $this->dv_repo->getByIncomings_SNF($request);
        return view('admin.dv.dv-incomings')->with('dvIncomings', $dvIncomings);

    }





    public function setDvNo(DvSetDvNoRequest $request){

        return $this->dv_repo->updateDvNo($request);

    }





    public function create(){

        return view('admin.dv.dv-create');

    }

   



    public function store(DVFormRequest $request){

        return $this->dv_repo->create($request);

    }

    



    public function show($slug){

       return $this->dv_repo->show($slug);

    }

    



    public function edit($slug){

        return $this->dv_repo->edit($slug);

    }

    



    public function update(DVFormRequest $request, $slug){

        return $this->dv_repo->update($request, $slug);

    }





    public function destroy($slug){

        return $this->dv_repo->delete($slug);
        
    }





}
