<?php

namespace App\Observers;

use App\DV;
use Session;
use Input;


class DVObserver{



   public function created($dv){

   		Session::flash('SESSION_DV_STORE_SLUG', $dv->slug);
        Session::flash('SESSION_DV_STORE', 'Your data has been successfully saved!');

   }




   public function updated($dv){

   		Session::flash('SESSION_DV_UPDATE_SLUG', $dv->slug);
        Session::flash('SESSION_DV_UPDATE', 'Your data has been successfully updated!');
   
   }




   public function saved($dv){

   		Session::flash('SESSION_SET_DV_NO_SLUG', $dv->slug);
        Session::flash('SESSION_SET_DV_NO', 'DV No. Successfully Set !');
   
   }




   public function deleted($dv){

   		Session::flash('SESSION_DV_DELETE', 'Your data has been successfully Deleted!');
   
   }




}