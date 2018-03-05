<?php
 
namespace App\Repositories\DV;

use App\DV;
use Illuminate\Http\Request;
use App\Repositories\DV\DVInterface;

use App\Repositories\BaseRepository;
 
class DVRepository{
	       

	protected $dv;
	public $fetch;
	public $where;


    public function __construct(DV $dv){

        $this->dv = $dv;
    
    }



    public function fetchAllPaginate($n){ 

        $this->fetch = $this->dv->orderBy('updated_at', 'DESC')->paginate($n);

        return $this;
    }



    public function whereA(){

      	$this->where = $this->dv->where('dv_proj_code', '17-GAD1');
      	return $this;


    }



    public function instantiate(){

        return new $this;
    
    }


    // public function search($key){

    //     $key = $key;

    //     return $this->dv->where(function ($dv) use ($key) {
    //                 $dv->where('dv_payee', 'LIKE', '%'. $key .'%')
    //                    ->orwhere('dv_no', 'LIKE', '%'. $key .'%')
    //                    ->orwhere('doc_no', 'LIKE', '%'. $key .'%')
    //                    ->orwhere('dv_dept_code', 'LIKE', '%'. $key .'%')
    //                    ->orwhere('dv_unit_code', 'LIKE', '%'. $key .'%')
    //                    ->orwhere('dv_proj_code', 'LIKE', '%'. $key .'%')
    //                    ->orwhere('dv_fund_source', 'LIKE', '%'. $key .'%');
    //             });

    // }



    // public function filters($array = []){

    //     $query = $this->dv->newQuery();

    //     if(count($array) > 0){

    //         foreach ($array as $key => $value) {
                    
    //             if(!$value == null){

    //                 $query = $this->dv->where($key, '=', $value);

    //             }

    //             return $query;

    //         }

    //         return $query;

    //    }

    //    return $query;

    // }




    // public function dateBetween($from, $to){

    //     $from = Carbon::parse($from)->format('Y-m-d');
    //     $to = Carbon::parse($to)->format('Y-m-d');

    //     if(!$from == null || !$to == null){

    //       return $this->dv->betweenDvDate($from, $to);

    //     }


    // }




    //  public function getByUser_SNF(Request $request){

    //     $dv = $this->dv->newQuery();
    //     $date = $this->dv->getDateRequests($request);
    //     $search = $request->search;

    //     if(!$search == null){
    //         $dv->where(function ($dv) use ($search) {
    //             $dv->search($search);
    //         });
    //     }

    //     if(!$request->fund_source == null){
    //         $dv->whereDvFundSource($request->fund_source);
    //     }

    //     if(!$request->project_code == null){
    //         $dv->whereDvProjCode($request->project_code);
    //     }
        
    //     if(!$request->fromDate == null || !$request->toDate == null){
    //         $dv->betweenDvDate($date['fromDate'], $date['toDate']);
    //     }

    //     //Input::flash();

    //     return $dv->populate();

    // }





    // public function getByIncomings_SNF(Request $request){

    //     $dv = $this->dv->newQuery();
    //     $search = $request->search;

    //     if(!$search == null){
    //         $dv->where(function ($dv) use ($search) {
    //             $dv->search($search);
    //         });
    //     }

    //     if(!$request->department == null){
    //         $dv->whereDvDeptCode($request->department);
    //     }

    //     Input::flash();

    //     return $dv->incomings()->populate();

    // }





    // public function updateDvNo(Request $request){
        
    //     if($request->isMethod('post')){

    //         $dv = $this->dv->findSlug($request->slug);

    //         if(count($dv) == 1){

    //             $dv->update(['dv_no' => $request->dv_no] + $this->dv->updatedDefaults);
    //             $this->event->fire('dv.set_dv_no', $dv);
    //             return redirect()->back();

    //         }

    //         return redirect()->back();

    //     }

    //     return abort(404);

    // }




    // public function create(Request $request){

    //     if($request->isMethod('post')){

    //         $dv = $this->dv->create($request->all() + $this->dv->createdDefaults);
    //         $this->event->fire('dv.create', $dv);
    //         return redirect()->back();

    //     }

    //     return redirect()->back();

    // }




    // public function show($slug){

    //     $dv = $this->dv->findSlug($slug);
        
    //     if(count($dv) == 1){

    //         return view('admin.dv.dv-show')->with('dv', $dv);

    //     } 

    //     return abort(404);

    // }




    // public function edit($slug){

    //     $dv = $this->dv->findSlug($slug);
        
    //     if(count($dv) == 1){

    //         return view('admin.dv.dv-edit')->with('dv', $dv);

    //     } 

    //     return abort(404);

    // }




    // public function update(Request $request, $slug){

    //     $dv = $this->dv->findSlug($slug);

    //     if(count($dv) == 1){

    //         $dv->update($request->all() + $this->dv->updatedDefaults);
    //         $this->event->fire('dv.update', $dv);
    //         return view('admin.dv.dv-edit')->with('dv', $dv);

    //     }

    //     return abort(404);

    // }




    // public function delete($slug){

    //     $dv = $this->dv->findSlug($slug);

    //     if(count($dv) == 1){

    //         $dv->delete();
    //         $this->event->fire('dv.delete', $dv);
    //         return redirect()->back();

    //     }

    //     return abort(404);
        
    // }



}