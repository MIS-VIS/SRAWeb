<?php

namespace App\Http\Controllers;

use App\DV;
use App\Http\Requests\DvFormRequest;
use App\Http\Requests\DvFilterRequest;
use App\Http\Requests\DvSetDvNoRequest;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;


class DVController extends Controller{
    

    protected $dv;


    public function __construct(DV $dv){

        $this->dv = $dv;

    }




    public function index(DvFilterRequest $request){

        $dvList = $this->dv->indexFilter($request, 10);
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
            Session::flash('SESSION_SET_DV_NO_SLUG', $dv->slug);
            Session::flash('SESSION_SET_DV_NO', 'DV No. Successfully Set !');
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
            Session::flash('SESSION_DV_STORE_SLUG', $dv->slug);
            Session::flash('SESSION_DV_STORE', 'Your data has been successfully saved!');
            return redirect()->back();

        }

        return route('admin.dv.create');

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
            Session::flash('SESSION_DV_UPDATE_SLUG', $dv->slug);
            Session::flash('SESSION_DV_UPDATE', 'Your data has been successfully updated!');
            return view('admin.dv.dv-edit')->with('dv', $dv);

        }

        return abort(404);

    }





    public function destroy($slug){

        $dv = $this->dv->hunt($slug);

        if(count($dv) == 1){

            $dv->delete();
            Session::flash('SESSION_DV_DELETE', 'Your data has been successfully Deleted!');
            return redirect()->back();

        }

        return abort(404);
        
    }





}
