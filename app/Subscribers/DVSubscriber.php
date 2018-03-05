<?php

namespace App\Subscribers;
use Session;

class DVSubscriber {



	public function onCreate($dv){

		Session::flash('SESSION_DV_STORE_SLUG', $dv->slug);
      	Session::flash('SESSION_DV_STORE', 'Your data has been successfully saved!');

	}



	public function onUpdate($dv){

		Session::flash('SESSION_DV_UPDATE_SLUG', $dv->slug);
        Session::flash('SESSION_DV_UPDATE', 'Your data has been successfully updated!');

	}



	public function onSetDvNo($dv){

		Session::flash('SESSION_SET_DV_NO_SLUG', $dv->slug);
        Session::flash('SESSION_SET_DV_NO', 'DV No. Successfully Set !');

	}



	public function onDelete($dv){

		Session::flash('SESSION_SET_DV_NO_SLUG', $dv->slug);
        Session::flash('SESSION_SET_DV_NO', 'DV No. Successfully Set !');

	}



	public function subscribe($events){

		$events->listen('dv.create', 'App\Subscribers\DVSubscriber@onCreate');
		$events->listen('dv.update', 'App\Subscribers\DVSubscriber@onUpdate');
		$events->listen('dv.set_dv_no', 'App\Subscribers\DVSubscriber@onSetDvNo');
		$events->listen('dv.delete', 'App\Subscribers\DVSubscriber@onDelete');

	}





}