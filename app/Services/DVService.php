<?php
 
namespace App\Services;

use Auth;
use Input;
use Cache;
use App\DV;
use Illuminate\Http\Request;
use Illuminate\Events\Dispatcher;

use App\Libraries\Main\CacheHelper;

use DB;
 
class DVService{
	


	protected $dv;
	protected $event;



    public function __construct(DV $dv, Dispatcher $event){

        $this->dv = $dv;
        $this->event = $event;

    }




    public function fetchAllPaginate_SNF(Request $request){

        $key = str_slug($request->fullUrl(), '_');

        Input::flash();

        $dvList = Cache::rememberForever('dv:all:' . $key, function() use ($request){

           $dv = $this->dv->newQuery();

            if(!$request->search == null){
                $dv->search($request->search);
            }

            $dv->filters([
                'dv_fund_source' => $request->fund_source, 
                'dv_project_id' => $request->station,
                'dv_dept_code' => $request->department,
                'dv_unit_code' => $request->unit,
                'dv_proj_code' => $request->project_code,
            ]);

            if(!$request->fromDate == null || !$request->toDate == null){
                $dv->BetweenDvDate($request->fromDate, $request->toDate);
            }

            return $dv->populate();

        });

        return view('admin.dv.dv-index')->with('dvList', $dvList);

    }





    public function fetchByUserPaginate_SNF(Request $request){

        $key = str_slug($request->fullUrl(), '_');

    	Input::flash();

        $dvUserList = Cache::rememberForever('dv:byUser:'. Auth::user()->user_id .':'. $key, function() use ($request){

            $dv = $this->dv->newQuery();

            if(!$request->search == null){
                $dv->search($request->search);
            }

            $dv->filters([
                'dv_fund_source' => $request->fund_source,
                'dv_proj_code' => $request->project_code,
            ]);

            if(!$request->fromDate == null || !$request->toDate == null){
                $dv->BetweenDvDate($request->fromDate, $request->toDate);
            }

            return $dv->getByUser()->populate();

        });

        return view('admin.dv.dv-userIndex')->with('dvUserList', $dvUserList);

    }





    public function fetchByIncomingsPaginate_SNF(Request $request){
        
        $key = str_slug($request->fullUrl(), '_');

        Input::flash();

        $dvIncomings = Cache::rememberForever('dv:incomings:'. $key, function() use ($request){

            $dv = $this->dv->newQuery();

            if(!$request->search == null){
                $dv->search($request->search);
            }

            $dv->filters([
            	'dv_dept_code' => $request->department,
            ]);

            return $dv->getByIncomings()->populate();

        });

        return view('admin.dv.dv-incomings')->with('dvIncomings', $dvIncomings);

    }





    public function create(Request $request){

    	$dv = $this->dv->create($request->all());
    	$this->event->fire('dv.create', $dv);
    	return redirect()->back();

    }




     public function show($slug){

        $dv = Cache::rememberForever('dv:find:'. $slug, function() use ($slug) {
            return $this->dv->findSlug($slug);
        });

        return view('admin.dv.dv-show')->with('dv', $dv);

    }





    public function edit($slug){

        $dv = Cache::rememberForever('dv:find:'. $slug, function() use ($slug) {
            return $this->dv->findSlug($slug);
        });

        return view('admin.dv.dv-edit')->with('dv', $dv);

    }





    public function update(Request $request, $slug){

    	$dv = $this->dv->findSlug($slug);
    	$dv->update($request->all());
		$this->event->fire('dv.update', $dv);
		return redirect()->back()->with('dv', $dv);

    }





    public function delete($slug){

        $dv = $this->dv->findSlug($slug);
        $dv->delete();
        $this->event->fire('dv.delete', $dv);
        return redirect()->back();
        
    }





    public function updateDvNo(Request $request){
        
        $dv = $this->dv->findSlug($request->slug);
        $dv->update(['dv_no' => $request->dv_no]);
        $this->event->fire('dv.set_dv_no', $dv);
        return redirect()->back();

    }





}