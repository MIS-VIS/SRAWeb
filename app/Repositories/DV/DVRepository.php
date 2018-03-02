<?php
 
namespace App\Repositories\DV;

use App\Repositories\DV\DVInterface;
use App\DV;

use Illuminate\Http\Request;


 
class DVRepository implements DVInterface{
	

	protected $dv;
        



    public function __construct(DV $dv){

        $this->dv = $dv;
    
    }





    public function getAll_SNF(Request $request){

        $dv = $this->dv->newQuery();
        $date = $this->dv->getDateRequests($request);
        $search = $request->search;

        if(!$search == null){
            $dv->where(function ($dv) use ($search) {
                $dv->likeDVPayee($search)
                   ->likeDVNo($search)
                   ->likeDocNo($search)
                   ->likeDVDeptCode($search)
                   ->likeDVUnitCode($search)
                   ->likeDVProjCode($search)
                   ->likeDVFundSource($search);
            });
        }

        if(!$request->fund_source == null){
            $dv->where('dv_fund_source', '=', $request->fund_source);
        }

        if(!$request->station == null){
            $dv->where('dv_project_id', '=', $request->station);
        }

        if(!$request->department == null){
            $dv->where('dv_dept_code', '=', $request->department);
        }

        if(!$request->unit == null){
            $dv->where('dv_unit_code', '=', $request->unit);
        }

        if(!$request->project_code == null){
            $dv->where('dv_proj_code', '=', $request->project_code);
        }
        
        if(!$request->fromDate == null || !$request->toDate == null){
            $dv->whereBetween('dv_date', [ $date['fromDate'], $date['toDate'] ]);
        }


        return $dv->orderBy('created_at', 'DESC')
                  ->paginate(10);
    }







}