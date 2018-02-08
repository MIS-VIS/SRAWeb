<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Libraries\Statics\DVUtil;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class DV extends Model{


    protected $table = 'dv';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
    use Sluggable;



    protected $fillable = [
        'slug',
        'doc_no',
        'dv_project_id',
        'dv_no', 
        'dv_fund_source',
        'dv_mop',
        'dv_payee',
        'dv_address',
        'dv_tin',
        'dv_bur_no',
        'dv_dept_code',
        'dv_unit_code',
        'dv_proj_code',
        'dv_explanation',
        'dv_amount',
        'dv_certified_by',
        'dv_certified_by_position',
        'dv_certified_by_sig_date',
        'dv_approved_by',
        'dv_approved_by_position',
        'dv_approved_by_sig_date',
        'created_at',
        'updated_at',
        'machine_created',
        'machine_updated',        
        'ip_created',
        'ip_updated',
        'user_id'
    ];  




    protected $attributes = [
        'slug' => null ,
        'doc_no' => null,
        'dv_project_id' => null,
        'dv_no' => null,
        'dv_fund_source' => null,
        'dv_mop' => null,
        'dv_payee' => null,
        'dv_address' => null,
        'dv_tin' => null,
        'dv_bur_no' => null,
        'dv_dept_code' => null,
        'dv_unit_code' => null,
        'dv_proj_code' => null,
        'dv_explanation' => null,
        'dv_amount' => null,
        'dv_certified_by' => null,
        'dv_certified_by_position' => null,
        'dv_certified_by_sig_date' => null,
        'dv_approved_by' => null,
        'dv_approved_by_position' => null,
        'dv_approved_by_sig_date' => null,
        'created_at' => null,
        'updated_at' => null,
        'machine_created' => null,
        'machine_updated' => null,
        'ip_created' => null,
        'ip_updated' => null,
        'user_id' => null,
    ];





    public function getRouteKeyName(){
        return 'slug';
    }




    public function filtersRequest(Request $request){

        return [

            'search' => DVUtil::searchSanitize($request->search),
            'fund_source' => DVUtil::filterSanitize($request->fund_source),
            'station' => DVUtil::filterSanitize($request->station),
            'department' => DVUtil::filterSanitize($request->department),
            'unit' => DVUtil::filterSanitize($request->unit),
            'project_code' => DVUtil::filterSanitize($request->project_code),
            'fromDate' => Carbon::parse(DVUtil::filterSanitize($request->fromDate))->format('Y-m-d'), 
            'toDate' => Carbon::parse(DVUtil::filterSanitize($request->toDate))->format('Y-m-d h:i:s')

        ];

    }





    public function indexFilter(Request $request, $paginate){

        $dv = $this->newQuery();
        $filter = $this->filtersRequest($request);
        $search = $filter['search'];
        
        if(!$search == null){
            $dv->where(function ($dv) use ($search) {
                $dv->where('dv_payee', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_no', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_dept_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_unit_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_proj_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_fund_source', 'LIKE', '%'. $search .'%');
            });
        }

        if(!$filter['fund_source'] == null){
            $dv->where('dv_fund_source', '=', $filter['fund_source']);
        }

        if(!$filter['station'] == null){
            $dv->where('dv_project_id', '=', $filter['station']);
        }

        if(!$filter['department'] == null){
            $dv->where('dv_dept_code', '=', $filter['department']);
        }

        if(!$filter['unit'] == null){
            $dv->where('dv_unit_code', '=', $filter['unit']);
        }

        if(!$filter['project_code'] == null){
            $dv->where('dv_proj_code', '=', $filter['project_code']);
        }
        
        if(!$request->fromDate == null || !$request->toDate == null){
            $dv->whereBetween('created_at', [$filter['fromDate'], $filter['toDate']]);
        }


        return $dv->orderBy('created_at', 'DESC')
                  ->paginate($paginate); 

    }





    public function userIndexFilter(Request $request, $paginate){

        $dv = $this->newQuery();
        $filter = $this->filtersRequest($request);

        if(!$filter['search'] == null){
            $dv->where('doc_no', 'LIKE', '%'. $filter['search'] .'%');   
        }

        if(!$filter['project_code'] == null){
            $dv->where('dv_proj_code', '=', $filter['project_code']);
        }

        if(!$filter['fund_source'] == null){
            $dv->where('dv_fund_source', '=', $filter['fund_source']);
        }

        if(!$request->fromDate == null || !$request->toDate == null){
            $dv->whereBetween('created_at', [$filter['fromDate'], $filter['toDate']]);
        }

        return $dv->where('user_id', Auth::user()->user_id)
                  ->orderBy('created_at', 'DESC')
                  ->paginate($paginate);

    }





    public function incomingsFilter(Request $request, $pagination){
        $dv = $this->newQuery();
        $filter = $this->filtersRequest($request);
        $search = $filter['search'];
        if(!$search == null){
            $dv->where(function ($dv) use ($search) {
                $dv->where('dv_payee', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_no', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_dept_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_unit_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_proj_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_fund_source', 'LIKE', '%'. $search .'%');
            });
        }

        if(!$filter['department'] == null){
            $dv->where('dv_dept_code', '=', $filter['department']);
        }

        return $dv->whereDate('created_at', Carbon::now()->format('Y-m-d'))
                  ->orderBy('created_at', 'DESC')
                  ->paginate($pagination)
                  ->appends(['department' => $request->department]);        
        
    }





    public function hunt($slug){
        return $this->where('slug', $slug)->firstOrFail();
    }





    public function sluggable(){
        return [
            'slug' => [
                'source' => [ 'dv_proj_code', 'HashedSlug']
            ]
        ];
    }





    public function getHashedSlugAttribute(){
        return md5(microtime());
    }





    public static function getCreatedDefaultsAttribute(){
        return [
            'doc_no' => 'DV' . rand(1000000, 9999999),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'machine_created' => gethostname(),
            'machine_updated' => gethostname(),
            'ip_created' => request()->ip(), 
            'ip_updated' => request()->ip(), 
            'user_id' => Auth::user()->user_id,
        ];
    }





    public static function getUpdatedDefaultsAttribute(){
        return array(
            'updated_at' => Carbon::now(),
            'machine_updated' => gethostname(),
            'ip_updated' => request()->ip(),
        );
    }





}
