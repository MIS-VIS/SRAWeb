<?php

namespace App\Http\Controllers;


use App\DV as DV;
use Illuminate\Http\Request;
use App\Http\Requests\DvFormRequest;
use App\Http\Requests\DvSearchRequest;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;

class DVController extends Controller{
    


    public function index(DvSearchRequest $request, DV $disbVchr){
        $dvList = $disbVchr->indexFilter($request, 10);
        Input::flash();
        return view('admin.dv.dv-list', compact('dvList'));
    }




    public function userIndex(DvSearchRequest $request, DV $disbVchr){
        $dvUserList = $disbVchr->userIndexFilter($request, 10);
        Input::flash();
        return view('admin.dv.dv-userList', compact('dvUserList'));
    }





    public function create(DV $disbVchr){
        return view('admin.dv.dv-add');
    }

   


    public function store(DVFormRequest $request, DV $disbVchr){
        if($request){
            $dv = $disbVchr->create($request->all() + $disbVchr->createdDefaults);
            Session::flash('slug', $dv->slug);
            Session::flash('success', 'Your data has been successfully saved!');
            return redirect()->back();
        }
        return route('admin.dv.create');
    }

    


    public function show($slug, DV $disbVchr){
        $dv = $disbVchr->hunt($slug);
        if(count($dv) > 0){
            Session::flash('print', 'You can now Print your voucher!');
            return view('admin.dv.dv-print')->with('dv', $dv);
        } 
        return abort(404);
    }

    


    public function edit($slug, DV $disbVchr){
        $dv = $disbVchr->hunt($slug);
        if(count($dv) > 0){
            Session::flash('print', 'You can now Edit your voucher!');
            return view('admin.dv.dv-edit')->with('dv', $dv);
        } 
        return abort(404);
    }

    


    public function update(DVFormRequest $request, $slug, DV $disbVchr){
        $dv = $disbVchr->hunt($slug);
        if(count($dv) > 0){
            $dv->update($request->all() + $disbVchr->updatedDefaults);
            Session::flash('slug', $dv->slug);
            Session::flash('success', 'Your data has been successfully updated!');
            return view('admin.dv.dv-edit')->with('dv', $dv);
        }
        return abort(404);
    }

    


    public function destroy($id){
        
    }




}
