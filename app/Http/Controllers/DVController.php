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
        $key = $disbVchr->sanitize($request->q);
        if(strlen($key) <= 9){
            $dvMyList = $disbVchr->search($key, 10);
            Input::flash();
            return view('admin.dv.dv-myList', compact('dvMyList'));
        }
        return redirect()->back(); 
    }




    public function create(DV $disbVchr){
        return view('admin.dv.dv-add', compact('dvCount'));
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
            return view('admin.dv.dv-add-print')->with('dv', $dv);
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




    public function filter(){
        return "Hello";
    }




}
