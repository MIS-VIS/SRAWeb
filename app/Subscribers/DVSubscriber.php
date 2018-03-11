<?php

namespace App\Subscribers;



use Auth;
use Session;
use Carbon\Carbon;
use App\Libraries\Main\CacheHelper;



class DVSubscriber {




	public function onCreate($dv){

		$this->createDefaults($dv);

		CacheHelper::deletePattern('sraweb_cache:dv:all:*');
		CacheHelper::deletePattern('sraweb_cache:dv:byUser:'. $dv->user_id .':*');
		CacheHelper::deletePattern('sraweb_cache:dv:incomings:*');

		Session::flash('SESSION_DV_STORE_SLUG', $dv->slug);
      	Session::flash('SESSION_DV_STORE', 'Your data has been successfully saved!');

	}



	public function onUpdate($dv){

		$this->updateDefaults($dv);

		CacheHelper::deletePattern('sraweb_cache:dv:all:*');
		CacheHelper::deletePattern('sraweb_cache:dv:byUser:'. $dv->user_id .':*');
		CacheHelper::deletePattern('sraweb_cache:dv:incomings:*');

		Session::flash('SESSION_DV_UPDATE_SLUG', $dv->slug);
        Session::flash('SESSION_DV_UPDATE', 'Your data has been successfully updated!');

	}



	public function onSetDvNo($dv){

		$this->updateDefaults($dv);

		CacheHelper::deletePattern('sraweb_cache:dv:all:*');
		CacheHelper::deletePattern('sraweb_cache:dv:byUser:'. $dv->user_id .':*');
		CacheHelper::deletePattern('sraweb_cache:dv:incomings:*');

		Session::flash('SESSION_SET_DV_NO_SLUG', $dv->slug);
        Session::flash('SESSION_SET_DV_NO', 'DV No. Successfully Set !');

	}



	public function onDelete($dv){

		CacheHelper::deletePattern('sraweb_cache:dv:all:*');
		CacheHelper::deletePattern('sraweb_cache:dv:byUser:'. $dv->user_id .':*');
		CacheHelper::deletePattern('sraweb_cache:dv:incomings:*');

		Session::flash('SESSION_SET_DV_NO_SLUG', $dv->slug);
        Session::flash('SESSION_SET_DV_NO', 'DV No. Successfully Set !');

	}




	public function createDefaults($dv){

		$dv->slug = md5(microtime());
		$dv->user_id = Auth::user()->user_id;
		$dv->doc_no = 'DV' . rand(1000000, 9999999);
		$dv->dv_date = Carbon::now()->format('Y-m-d');
		$dv->created_at = Carbon::now();
		$dv->updated_at = Carbon::now();
		$dv->machine_created = gethostname();
		$dv->machine_updated = gethostname();
		$dv->ip_created = request()->ip();
		$dv->ip_updated = request()->ip();
		$dv->save();

	}




	public function updateDefaults($dv){

		$dv->updated_at = Carbon::now();
		$dv->machine_updated = gethostname();
		$dv->ip_updated = request()->ip();
		$dv->save();

	}




	public function subscribe($events){

		$events->listen('dv.create', 'App\Subscribers\DVSubscriber@onCreate');
		$events->listen('dv.update', 'App\Subscribers\DVSubscriber@onUpdate');
		$events->listen('dv.set_dv_no', 'App\Subscribers\DVSubscriber@onSetDvNo');
		$events->listen('dv.delete', 'App\Subscribers\DVSubscriber@onDelete');

	}





}