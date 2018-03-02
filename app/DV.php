<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
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
        'dv_no', 
        'dv_date', 
        'dv_project_id',
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
        'dv_no' => null,
        'dv_date' => null,
        'dv_project_id' => null,
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





    public function user(){
        return $this->hasOne('App\User', 'user_id', 'user_id');
    }




    public function getRouteKeyName(){

        return 'slug';

    }





    public function sluggable(){

        return [
            'slug' => [
                'source' => [ 'dv_proj_code', 'HashedSlug']
            ]
        ];

    }






    /** SCOPES **/

    public function scopeLikeDVFundSource($query, $search){

        $query->orwhere('dv_fund_source', 'LIKE', '%'. $search .'%');

    }



    public function scopeLikeDVPayee($query, $search){

        $query->orwhere('dv_payee', 'LIKE', '%'. $search .'%');

    }



    public function scopeLikeDVNo($query, $search){

        $query->orwhere('dv_no', 'LIKE', '%'. $search .'%');

    }



    public function scopeLikeDocNo($query, $search){

        $query->orwhere('doc_no', 'LIKE', '%'. $search .'%');

    }



    public function scopeLikeDVDeptCode($query, $search){

        $query->orwhere('dv_dept_code', 'LIKE', '%'. $search .'%');

    }



    public function scopeLikeDVUnitCode($query, $search){

        $query->orwhere('dv_unit_code', 'LIKE', '%'. $search .'%');

    }



    public function scopeLikeDVProjCode($query, $search){

        $query->orwhere('dv_proj_code', 'LIKE', '%'. $search .'%');

    }



    public function indexFilter(Request $request, $paginate){

        $dv = $this->newQuery();
        $date = $this->getDateRequests($request);
        $search = $request->search;

        if(!$search == null){
            $dv->where(function ($dv) use ($search) {
                $dv->where('dv_payee', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_no', 'LIKE', '%'. $search .'%')
                   ->orwhere('doc_no', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_dept_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_unit_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_proj_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_fund_source', 'LIKE', '%'. $search .'%');
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
                  ->paginate($paginate); 

    }






    public function userIndexFilter(Request $request, $paginate){

        $dv = $this->newQuery();
        $date = $this->getDateRequests($request);

        if(!$request->search == null){
            $dv->where('doc_no', 'LIKE', '%'. $request->search .'%');
        }

        if(!$request->project_code == null){
            $dv->where('dv_proj_code', '=', $request->project_code);
        }

        if(!$request->fund_source == null){
            $dv->where('dv_fund_source', '=', $request->fund_source);
        }

        if(!$request->fromDate == null || !$request->toDate == null){
            $dv->whereBetween('dv_date', [$date['fromDate'], $date['toDate']]);
        }

        return $dv->where('user_id', Auth::user()->user_id)
                  ->orderBy('created_at', 'DESC')
                  ->paginate($paginate);

    }






    public function incomingsFilter(Request $request, $pagination){

        $dv = $this->newQuery();
        $search = $request->search;

        if(!$search == null){
            $dv->where(function ($dv) use ($search) {
                $dv->where('dv_payee', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_no', 'LIKE', '%'. $search .'%')
                   ->orwhere('doc_no', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_dept_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_unit_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_proj_code', 'LIKE', '%'. $search .'%')
                   ->orwhere('dv_fund_source', 'LIKE', '%'. $search .'%');
            });
        }

        if(!$request->department == null){
            $dv->where('dv_dept_code', '=', $request->department);
        }

        return $dv->whereDate('dv_date', Carbon::now()->format('Y-m-d'))
                  ->orderBy('created_at', 'DESC')
                  ->paginate($pagination)
                  ->appends(['department' => $request->department]);        
        
    }





    public function hunt($slug){

        return $this->where('slug', $slug)->firstOrFail();

    }





    /** SETTERS **/
    
    public function setDvPayeeAttribute($value){

        $this->attributes['dv_payee'] = strtoupper($value); 

    }




    public function setDvAmountAttribute($value){

        $this->attributes['dv_amount'] = str_replace(',', '', $value);

    }





    /** GETTERS **/

    public function getDateRequests(Request $request){

        return [

            'fromDate' => Carbon::parse($request->fromDate)->format('Y-m-d'),
            'toDate' => Carbon::parse($request->toDate)->format('Y-m-d')

        ];

    }





    public function getHashedSlugAttribute(){

        return md5(microtime());

    }





    public static function getCreatedDefaultsAttribute(){

        return [

            'user_id' => Auth::user()->user_id,
            'doc_no' => 'DV' . rand(1000000, 9999999),
            'dv_date' => Carbon::now()->format('Y-m-d'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'machine_created' => gethostname(),
            'machine_updated' => gethostname(),
            'ip_created' => request()->ip(), 
            'ip_updated' => request()->ip(), 

        ];

    }






    public static function getUpdatedDefaultsAttribute(){

        return [

            'updated_at' => Carbon::now(),
            'machine_updated' => gethostname(),
            'ip_updated' => request()->ip(),

        ];

    }






}
