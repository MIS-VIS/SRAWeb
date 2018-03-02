<?php

namespace App\Http\Controllers;

use App\DV;
use App\Http\Requests\DvFormRequest;
use App\Http\Requests\DvFilterRequest;
use App\Http\Requests\DvSetDvNoRequest;
use Illuminate\Support\Facades\Input;
use Auth;

use App\Repositories\DV\DVRepository;

class DVController extends Controller{
    

    protected $dv;
    protected $dv_repo;


    public function __construct(DV $dv, DVRepository $dv_repo){

        $this->dv = $dv;
         $this->dv_repo = $dv_repo;

    }




    public function index(DvFilterRequest $request){

        $dvList = $this->dv_repo->getAll_SNF($request);
        Input::flash();
        return view('admin.dv.dv-index', compact('dvList'));

    }





    public function userIndex(DvFilterRequest $request){

        $dvUserList = $this->dv->userIndexFilter($request, 10);
        Input::flash();
        return view('admin.dv.dv-userIndex', compact('dvUserList'));

    }





    public function incomings(DvFilterRequest $request){

        $dvIncomings = $this->dv->incomingsFilter($request ,10);
        Input::flash();
        return view('admin.dv.dv-incomings', compact('dvIncomings'));

    }





    public function setDvNo(DvSetDvNoRequest $request){

        $dv = $this->dv->hunt($request->slug);

        if(count($dv) == 1){

            $dv->update(['dv_no' => $request->dv_no] + $this->dv->updatedDefaults);
            return redirect()->back();

        }

        return abort(404);

    }





    public function create(){

        return view('admin.dv.dv-create');

    }

   



    public function store(DVFormRequest $request){

        if($request){

            $dv = $this->dv->create($request->all() + $this->dv->createdDefaults);
            return redirect()->back();

        }

        return redirect()->back();

    }

    



    public function show($slug){

        $dv = $this->dv->hunt($slug);
        
        if(count($dv) == 1){

            return view('admin.dv.dv-show')->with('dv', $dv);

        } 

        return abort(404);

    }

    



    public function edit($slug){

        $dv = $this->dv->hunt($slug);

        if(count($dv) == 1){

            return view('admin.dv.dv-edit')->with('dv', $dv);

        } 

        return abort(404);

    }

    



    public function update(DVFormRequest $request, $slug){

        $dv = $this->dv->hunt($slug);

        if(count($dv) == 1){

            $dv->update($request->all() + $this->dv->updatedDefaults);
            return view('admin.dv.dv-edit')->with('dv', $dv);

        }

        return abort(404);

    }





    public function destroy($slug){

        $dv = $this->dv->hunt($slug);

        if(count($dv) == 1){

            $dv->delete();
            return redirect()->back();

        }

        return abort(404);
        
    }





}
